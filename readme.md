# RENIEC IDaaS SDK for PHP
With this client you can connect with our Identity as a Service (IDaaS).

Installation:
```
$ composer require reniec/idaas
```

Integration example:
https://github.com/pkiep-reniec/integration_php_example

More project details:
https://idaas.reniec.gob.pe/site/

## Basic params
#### Scopes
- profile
    - Return: doc, first_name.
	
- email
    - Return: email, email_verified.
	
- phone
    - Return: phone_number, phone_number_verified.
	
- offline_access
    - Offline access for a month.
	
#### ACR
##### Nivel 0:
- only_questions
    - Access only with secret questions.	

##### Nivel 1:
- one_factor
    - Access with Clave Nacional | OTP Email | OTP SMS.
    
- only_password
    - Access only with Clave Nacional.

##### Nivel 2:
- two_factor
    - Access with Clave Nacional + OTP Email | OTP SMS.
    
- fingerprint_mobile
    - Access with Biometric Validation and secret questions.

##### Nivel 3:
- pki_dnie
    - Access with DNIe.

- pki_dnie_mobile
    - Access with DNIe Mobile (only for android devices).
	
- pki_token
    - Access with PJ digital certificate.

	