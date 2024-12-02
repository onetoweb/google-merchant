.. _top:
.. title:: Product

`Back to index <index.rst>`_

=======
Product
=======

.. contents::
    :local:


List products
`````````````

.. code-block:: php
    
    $result = $client->product->list([
        
        // optional params
        'pageSize' => 1000,
        'pageToken' => '{page_token}',
    ]);


List all products
`````````````````

Lists all (1000+ products) using multiple requests.
Yields products using the Generator syntax.

.. code-block:: php
    
    $result = $client->product->listAll();


Get product
```````````

.. code-block:: php
    
    $offerId = 'online~en~NL~aaaaaaaaa';
    $result = $client->product->get($offerId);


Create product
``````````````

.. code-block:: php
    
    $dataSourceId = 99999999999;
    $result = $client->product->create($dataSourceId, [
        'channel' => 'ONLINE',
        'offerId' => 'aaaaaaaaa',
        'contentLanguage' => 'en',
        'feedLabel' => 'NL',
        'attributes' => [
            'title' => 'Foo bar',
            'description' => 'foobar',
            'availability' => 'in stock',
            'condition' => 'new',
            'link' => 'https://www.example.com/foobar.html',
            'gtin' => [
                '012345678905'
            ],
            'price' => [
                'amountMicros' => '42000000',
                'currencyCode' => 'EUR',
            ],
            'includedDestinations' => [
                'SurfacesAcrossGoogle',
            ]
        ],
    ]);


Delete product
``````````````

.. code-block:: php
    
    $offerId = 'online~en~NL~aaaaaaaaa';
    $dataSourceId = 99999999999;
    $result = $client->product->delete($offerId, $dataSourceId);


`Back to top <#top>`_