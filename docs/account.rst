.. _top:
.. title:: Account

`Back to index <index.rst>`_

=======
Account
=======

.. contents::
    :local:


Get account
```````````

.. code-block:: php
    
    $accountId = 9999999999;
    $result = $client->account->get($accountId);


List accounts
`````````````

.. code-block:: php
    
    $result = $client->account->list([
        
        // optional params
        'pageSize' => 1000,
        'pageToken' => '{page_token}',
    ]);


List sub accounts
`````````````````

.. code-block:: php
    
    $result = $client->account->listSubaccounts([
        
        // optional params
        'pageSize' => 1000,
        'pageToken' => '{page_token}',
    ]);


Get business info
`````````````````

.. code-block:: php
    
    $result = $client->account->getBusinessInfo();


Update business info
````````````````````

.. code-block:: php
    
    $result = $client->account->updateBusinessInfo([
        'customerService' => [
            'uri' => 'https://www.example.com/customer_service.html',
            'email' => 'info@example.com',
        ],
    ], [
        'updateMask' => 'customerService',
    ]);


Get autofeed settings
`````````````````````

.. code-block:: php
    
    $result = $client->account->getAutofeedSettings();


Get business identity
`````````````````````

.. code-block:: php
    
    $result = $client->account->getBusinessIdentity();


Get email preferences
`````````````````````

.. code-block:: php
    
    $email = 'info@examle.com';
    $result = $client->account->getEmailPreferences($email);


Update email preferences
````````````````````````

.. code-block:: php
    
    $email = 'info@examle.com';
    $result = $client->account->updateEmailPreferences($email, [
        'newsAndTips' => 'OPTED_IN' // possible values: OPT_IN_STATE_UNSPECIFIED, OPTED_OUT, OPTED_IN and UNCONFIRMED
    ], [
        'updateMask' => 'newsAndTips',
    ]);


List issues
```````````

.. code-block:: php
    
    $result = $client->account->listIssues([
        
        // optional params
        'pageSize' => 1000,
        'pageToken' => '{page_token}',
    ]);


`Back to top <#top>`_