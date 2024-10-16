.. title:: Index

Index
=====

.. contents::
    :local:


===========
Basic Usage
===========

Setup Client and Authorization Workflow

.. code-block:: php
    
    require 'vendor/autoload.php';
    
    use Onetoweb\GoogleMerchant\Client;
    use Onetoweb\GoogleMerchant\Token;
    use Onetoweb\GoogleMerchant\Config\{
        ConfigFromFile,
        Config
    };
    use Symfony\Component\HttpFoundation\Session\Session;
    use Symfony\Component\HttpFoundation\Request;
    
    // start session
    $session = new Session();
    $session->start();
    
    // load config
    $clientId = '{client_id}';
    $clientSecret = '{client_secret}';
    $config = new Config($clientId, $clientSecret);
    
    // or load config from file
    $configFile = '/path/to/config_file.json';
    $config = new ConfigFromFile($configFile);
    
    // (optional) set version (default to: v1beta)
    $version = 'v1beta';
    
    // setup client
    $client = new Client($config, $version);
    
    // set redirect url
    $redirectUrl = '{redirect_url}';
    $client->setRedirectUrl($redirectUrl);
    
    // set account id
    $accountId = 9999999999;
    $client->setAccountId($accountId);
    
    // set token update callback
    $client->setTokenUpdateCallback(function(Token $token) use ($session) {
        
        // store token
        $session->set('token', [
            'access_token' => $token->getAccessToken(),
            'refresh_token' => $token->getRefreshToken(),
            'expires' => $token->getExpires(),
        ]);
    });
    
    /**
     * Authorization workflow
     */
    
    // get request object
    $request = Request::createFromGlobals();
    
    if ($session->get('token') !== null) {
        
        // load token from storage
        $token = $session->get('token');
        
        // build token
        $token = new Token(
            $token['access_token'],
            $token['refresh_token'],
            $token['expires']
        );
        
        // set token
        $client->setToken($token);
        
    } elseif ($request->get('code')) {
        
        // check state
        if ($request->get('state') !== $session->get('state')) {
            throw new \Exception('states does not match');
        }
        
        // request token from code
        $client->requestTokenFromCode($request->get('code'));
        
    } else {
        
        // generate state
        $state = Client::generateState();
        
        // store state
        $session->set('state', $state);
        
        // get authorization url
        $authorizationUrl = $client->getAuthorizationUrl($state);
        
        // display authorization url
        printf('<a href="%1$s">%1$s</a>', $authorizationUrl);
    }


=================
Endpoint Examples
=================

* `Product <product.rst>`_
* `Data source <data_source.rst>`_
* `Notification <notification.rst>`_
* `Report <report.rst>`_
* `Quota <quota.rst>`_
* `Promotion <promotion.rst>`_
* `Account <account.rst>`_
* `Account program <account_program.rst>`_
* `Account region <account_region.rst>`_
* `Account user <account_user.rst>`_
* `Account terms of service <account_terms_of_service.rst>`_
* `Account terms of service state <account_terms_of_service_state.rst>`_
* `Account shipping settings <account_shipping_settings.rst>`_
* `Account online return policy <account_online_return_policy.rst>`_
* `Account homepage <account_homepage.rst>`_
* `Conversion source <conversion_source.rst>`_
* `Local inventory <local_inventory.rst>`_
* `Regional inventory <regional_inventory.rst>`_


`Back to top <#top>`_