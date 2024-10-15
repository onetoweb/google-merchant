.. _top:
.. title:: Account online return policy

`Back to index <index.rst>`_

============================
Account online return policy
============================

.. contents::
    :local:


List online return policies
```````````````````````````

.. code-block:: php
    
    $result = $client->accountOnlineReturnPolicy->list([
        
        // optional params
        'pageSize' => 1000,
        'pageToken' => '{page_token}',
    ]);


Get online return policy
````````````````````````

.. code-block:: php
    
    $name = '';
    $result = $client->accountOnlineReturnPolicy->get($name);


`Back to top <#top>`_