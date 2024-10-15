.. _top:
.. title:: Account user

`Back to index <index.rst>`_

============
Account user
============

.. contents::
    :local:


List account users
``````````````````

.. code-block:: php
    
    $result = $client->accountUser->list([
        
        // optional params
        'pageSize' => 1000,
        'pageToken' => '{page_token}',
    ]);


Get account user
````````````````

.. code-block:: php
    
    $email = 'info@example.com';
    $result = $client->accountUser->get($email);


Create account user
```````````````````

.. code-block:: php
    
    $result = $client->accountUser->create([
        'state' => 'PENDING', // possible values: STATE_UNSPECIFIED, PENDING, VERIFIED
        'accessRights' => [
            'STANDARD', // possible values: ACCESS_RIGHT_UNSPECIFIED, STANDARD, ADMIN, PERFORMANCE_REPORTING
        ],
    ], [
        'userId' => 'info@example.com'
    ]);


Update account user
```````````````````

.. code-block:: php
    
    $email = 'info@example.com';
    $result = $client->accountUser->update($email, [
        'accessRights' => [
            'PERFORMANCE_REPORTING'
        ],
    ], [
        'updateMask' => 'accessRights'
    ]);


Delete account user
```````````````````

.. code-block:: php
    
    $email = 'info@example.com';
    $result = $client->accountUser->delete($email);


`Back to top <#top>`_