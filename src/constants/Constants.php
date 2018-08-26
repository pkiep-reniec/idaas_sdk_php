<?php

namespace Reniec\Idaas\Constants;

/**
 * Created by Miguel Pazo <http://miguelpazo.com>.
 */
class Constants
{
    const ACR_ONE_FACTOR = 'one_factor';
    const ACR_TWO_FACTOR = 'two_factor';
    const ACR_PKI_DNIE = 'pki_dnie';
    const ACR_PKI_TOKEN = 'pki_token';
    const ACR_ONLY_PASSWORD = 'only_password';
    const PROMPT_NONE = 'none';
    const PROMPT_LOGIN = 'login';
    const PROMPT_CONSENT = 'consent';
    const SCOPE_PROFILE = 'profile';
    const SCOPE_EMAIL = 'email';
    const SCOPE_PHONE = 'phone';
    const SCOPE_OFFLINE_ACCESS = 'offline_access';
}