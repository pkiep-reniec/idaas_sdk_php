# ID Perú SDK for PHP
With this client you can connect with our solution of Identity as a Service (IDaaS) that implements OpenID Connect.

Installation:
```
$ composer require reniec/idaas
```

Integration example:
https://github.com/pkiep-reniec/integration_php_example

More project details:
https://idperu.reniec.gob.pe/site/

Demo online:
https://ecep.reniec.gob.pe/rp/

## Basic params
#### Scopes
- profile
    - Return: doc, first_name.
	
- offline_access
    - Offline access for a month.
	
#### ACR
- pki_dnie
    - Access with DNIe.

- pki_dnie_mobile
    - Access with mobile certificates (only for android devices).
	
- pki_token
    - Access with PJ digital certificate.
    
- pki_dnie_legacy
    - Access with DNIe using JNLP (Java 8 installed is required).
    
- pki_token_legacy 
    - Access with PJ digital certificate using JNLP (Java 8 installed is required).

# More params
If you want more params details, you can find it into OpenID Connect documentation:

https://openid.net/specs/openid-connect-core-1_0.html
