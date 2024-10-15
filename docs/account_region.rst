.. _top:
.. title:: Account region

`Back to index <index.rst>`_

==============
Account region
==============

.. contents::
    :local:


List account regions
````````````````````

.. code-block:: php
    
    $result = $client->accountRegion->list([
        
        // optional params
        'pageSize' => 1000,
        'pageToken' => '{page_token}',
    ]);


Get account region
``````````````````

.. code-block:: php
    
    $name = 'london_2';
    $result = $client->accountRegion->get($name);


Create account region
`````````````````````

.. code-block:: php
    
    $result = $client->accountRegion->create([
        'displayName' => 'London 2',
        'postalCodeArea' => [
            'regionCode' => 'GB',
            'postalCodes' => [
                'begin' => 'GW6G',
            ],
        ],
        'regionalInventoryEligible' => true,
        'shippingEligible' => true,
    ], [
        'regionId' => 'london_2'
    ]);


Delete account region
`````````````````````

.. code-block:: php
    
    $name = 'london_2';
    $result = $client->accountRegion->delete($name);


`Back to top <#top>`_