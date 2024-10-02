.. _top:
.. title:: Data Source

`Back to index <index.rst>`_

===========
Data Source
===========

.. contents::
    :local:


List data sources
`````````````````

.. code-block:: php
    
    $result = $client->dataSource->list();


Create data source
``````````````````

.. code-block:: php
    
    $result = $client->dataSource->create([
        'name' => 'foobar',
        'displayName' => 'foobar',
        'input' => 'API',
        'primaryProductDataSource' => [
            'channel' => 'ONLINE_PRODUCTS',
            'countries' => [[
                'NL'
            ]]
        ]
    ]);


Delete data source
``````````````````

.. code-block:: php
    
    $dataSourceId = 99999999999;
    $result = $client->dataSource->delete($dataSourceId);


`Back to top <#top>`_