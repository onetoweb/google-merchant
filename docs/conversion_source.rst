.. _top:
.. title:: Conversion source

`Back to index <index.rst>`_

=================
Conversion source
=================

.. contents::
    :local:


List conversion sources
```````````````````````

.. code-block:: php
    
    $result = $client->conversionSource->list([
        
        // optional params
        'pageSize' => 1000,
        'pageToken' => '{page_token}',
    ]);


Create conversion sources
`````````````````````````

.. code-block:: php
    
    $result = $client->conversionSource->create([
        'merchantCenterDestination' => [
            'attributionSettings' => [
                'attributionLookbackWindowDays' => 7,
                'attributionModel' => 'CROSS_CHANNEL_LAST_CLICK',
                
                /*
                possible attributionModel values:
                 - ATTRIBUTION_MODEL_UNSPECIFIED
                 - CROSS_CHANNEL_LAST_CLICK,
                 - ADS_PREFERRED_LAST_CLICK,
                 - CROSS_CHANNEL_DATA_DRIVEN,
                 - CROSS_CHANNEL_FIRST_CLICK,
                 - CROSS_CHANNEL_LINEAR,
                 - CROSS_CHANNEL_POSITION_BASED,
                 - CROSS_CHANNEL_TIME_DECAY
                */
            ],
            'displayName' => 'foo bar',
            'currencyCode' => 'EUR',
        ]
    ]);


Get conversion source
`````````````````````

.. code-block:: php
    
    $name = 'aaaa:999999999';
    $result = $client->conversionSource->get($name);


Delete conversion source
````````````````````````

.. code-block:: php
    
    $name = 'aaaa:999999999';
    $result = $client->conversionSource->delete($name);


Undelete conversion source
``````````````````````````

.. code-block:: php
    
    $name = 'aaaa:999999999';
    $result = $client->conversionSource->undelete($name);


Update conversion source
````````````````````````

.. code-block:: php
    
    $name = 'aaaa:999999999';
    $result = $client->conversionSource->update($name, [
        'merchantCenterDestination' => [
            'attributionSettings' => [
                'attributionLookbackWindowDays' => 30,
            ]
        ]
    ], [
        'updateMask' => 'merchantCenterDestination.attributionSettings.attributionLookbackWindowDays',
    ]);


`Back to top <#top>`_