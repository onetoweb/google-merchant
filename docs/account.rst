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


List subaccounts
````````````````

.. code-block:: php
    
    $result = $client->account->listSubaccounts([
        
        // optional params
        'pageSize' => 1000,
        'pageToken' => '{page_token}',
    ]);


`Back to top <#top>`_