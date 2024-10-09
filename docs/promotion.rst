.. _top:
.. title:: Promotion

`Back to index <index.rst>`_

=========
Promotion
=========

.. contents::
    :local:


List promotions
```````````````

.. code-block:: php
    
    $result = $client->promotion->list([
        
        // optional params
        'pageSize' => 1000,
        'pageToken' => '{page_token}',
    ]);


Get promotion
`````````````

.. code-block:: php
    
    $promotionName = 'online~en~NL~aaaaaaaaaaaa';
    $result = $client->promotion->get($promotionName);


Create promotion
````````````````

.. code-block:: php
    
    $dataSourceId = 99999999999;
    $result = $client->promotion->create($dataSourceId, [
        'promotion' => [
            'promotionId' => bin2hex(random_bytes(6)),
            'contentLanguage' => 'en',
            'targetCountry' => 'NL',
            'redemptionChannel' => [
                'ONLINE'
            ],
            'attributes' => [
                'offerType' => 'GENERIC_CODE',
                'genericRedemptionCode' => 'FOO_BAR_123',
                'longTitle' => 'foo bars',
                'promotionEffectiveTimePeriod' => [
                    'startTime' => (string) (new \DateTime())->modify('+1 day')->format(\DateTime::ATOM),
                    'endTime' => (string) (new \DateTime())->modify('+7 days')->format(\DateTime::ATOM),
                ]
            ]
        ],
    ]);


`Back to top <#top>`_