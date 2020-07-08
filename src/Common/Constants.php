<?php

namespace Reniec\Idaas\Common;

/**
 * Created by Miguel Pazo <http://miguelpazo.com>.
 */
class Constants
{
    const ACR_ONLY_QUESTIONS = 'only_questions';
    const ACR_ONE_FACTOR = 'one_factor';
    const ACR_ONLY_PASSWORD = 'only_password';
    const ACR_TWO_FACTOR = 'two_factor';
    const ACR_FINGERPRINT_MOBILE = 'fingerprint_mobile';
    const ACR_PKI_DNIE = 'pki_dnie';
    const ACR_PKI_TOKEN = 'pki_token';
    const ACR_PKI_DNIE_MOBILE = 'pki_dnie_mobile';
    const ACR_PKI_DNIE_LEGACY = 'pki_dnie_legacy';
    const ACR_PKI_TOKEN_LEGACY = 'pki_token_legacy';
    const PROMPT_NONE = 'none';
    const PROMPT_LOGIN = 'login';
    const PROMPT_CONSENT = 'consent';
    const SCOPE_PROFILE = 'profile';
    const SCOPE_EMAIL = 'email';
    const SCOPE_PHONE = 'phone';
    const SCOPE_OFFLINE_ACCESS = 'offline_access';
}