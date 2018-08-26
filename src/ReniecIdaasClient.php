<?php

namespace Reniec\Idaas;

use GuzzleHttp\Client;

/**
 * Created by Miguel Pazo <http://miguelpazo.com>.
 */
class ReniecIdaasClient
{
    private $oConfig = null;
    private $redirectUri;
    private $lstScopes = [];
    private $acr;
    private $prompt = null;
    private $maxAge = null;
    private $state = null;
    private $loginHint = null;

    /**
     * ReniecIdaasClient constructor.
     * @param $config Path for renied_idaas.json including file
     * @throws Exception
     */
    public function __construct($config)
    {
        if (file_exists($config)) {
            $this->oConfig = json_decode(file_get_contents($config));
        } else {
            throw new Exception("File $config not exist.", 500);
        }
    }

    public function getLoginUrl()
    {
        if ($this->oConfig == null) {
            return null;
        }

        $paramScope = "openid";
        $query = [
            'acr_values' => $this->acr,
            'client_id' => $this->oConfig->client_id,
            'response_type' => 'code',
            'redirect_uri' => $this->redirectUri
        ];

        if ($this->prompt != null) {
            $query['prompt'] = $this->prompt;
        }

        if ($this->state != null) {
            $query['state'] = $this->state;
        }

        if ($this->maxAge != null) {
            $query['max_age'] = $this->maxAge;
        }

        if ($this->loginHint != null) {
            $query['login_hint'] = $this->loginHint;
        }

        $this->lstScopes[] = $paramScope;
        $this->lstScopes = array_unique($this->lstScopes);

        $query['scope'] = implode(' ', $this->lstScopes);

        return $this->oConfig->auth_uri . '?' . http_build_query($query);
    }

    /**
     * @param $code Code from auth endpoint
     * @return mixed Tokens
     */
    public function getTokens($code)
    {
        $gClient = new Client();

        $gRequest = $gClient->post($this->oConfig->token_uri, [
            'form_params' => [
                'grant_type' => 'authorization_code',
                'code' => $code,
                'redirect_uri' => $this->redirectUri,
                'client_id' => $this->oConfig->client_id,
                'client_secret' => $this->oConfig->client_secret
            ]
        ]);

        $response = json_decode($gRequest->getBody()->getContents());

        return $response;
    }

    /**
     * @param $accessToken Access token for userinfo endpoint
     * @return mixed User info
     */
    public function getUserinfo($accessToken)
    {
        $gClient = new Client();

        $gRequest = $gClient->post($this->oConfig->userinfo_uri, [
            'headers' => [
                'Authorization' => 'Bearer ' . $accessToken
            ]
        ]);

        $response = json_decode($gRequest->getBody()->getContents());

        return $response;
    }

    public function getLogoutUri($redirectPostLogout)
    {
        $query = [
            'post_logout_redirect_uri' => $redirectPostLogout
        ];

        return $this->oConfig->logout_uri . '?' . http_build_query($query);
    }

    /**
     * @return mixed
     */
    public function getRedirectUri()
    {
        return $this->redirectUri;
    }

    /**
     * @param mixed $redirectUri
     */
    public function setRedirectUri($redirectUri)
    {
        $this->redirectUri = $redirectUri;
    }

    /**
     * @return array
     */
    public function getLstScopes()
    {
        return $this->lstScopes;
    }

    /**
     * @param $scope
     */
    public function addScope($scope)
    {
        $this->lstScopes[] = $scope;
    }

    /**
     * @return mixed
     */
    public function getAcr()
    {
        return $this->acr;
    }

    /**
     * @param mixed $acr
     */
    public function setAcr($acr)
    {
        $this->acr = $acr;
    }

    /**
     * @return null
     */
    public function getPrompt()
    {
        return $this->prompt;
    }

    /**
     * @param null $prompt
     */
    public function setPrompt($prompt)
    {
        $this->prompt = $prompt;
    }

    /**
     * @return null
     */
    public function getMaxAge()
    {
        return $this->maxAge;
    }

    /**
     * @param null $maxAge
     */
    public function setMaxAge($maxAge)
    {
        $this->maxAge = $maxAge;
    }

    /**
     * @return null
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param null $state
     */
    public function setState($state)
    {
        $this->state = $state;
    }

    /**
     * @return null
     */
    public function getLoginHint()
    {
        return $this->loginHint;
    }

    /**
     * @param null $loginHint
     */
    public function setLoginHint($loginHint)
    {
        $this->loginHint = $loginHint;
    }

}