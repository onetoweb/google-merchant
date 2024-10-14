.. _top:
.. title:: Account terms of service

`Back to index <index.rst>`_

========================
Account terms of service
========================

.. contents::
    :local:


Retrieve latest terms of service
````````````````````````````````

.. code-block:: php
    
    $result = $client->accountTermsOfService->retrieveLatest([
        'regionCode' => 'NL',
        'kind' => 'MERCHANT_CENTER',
    ]);


Get terms of service
````````````````````

.. code-block:: php
    
    $name = '252';
    $result = $client->accountTermsOfService->get($name);


Accept terms of service
```````````````````````

.. code-block:: php
    
    $name = '252';
    $accountId = 9999999999;
    $result = $client->accountTermsOfService->accept($name, [
        'account' => "accounts/$accountId",
        'regionCode' => 'NL',
    ]);


`Back to top <#top>`_