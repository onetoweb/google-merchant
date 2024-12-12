.. _top:
.. title:: Report

`Back to index <index.rst>`_

======
Report
======

.. contents::
    :local:


Search reports
``````````````

* For details on how to construct your query see: `Merchant Center Query Language grammar <https://developers.google.com/shopping-content/guides/reports/query-language/grammar>`_
* For the full list of available tables and fields see: `Available fields <https://developers.google.com/shopping-content/guides/reports/fields>`_

.. code-block:: php
    
    $result = $client->report->search([
        'query' => 'SELECT product_view.id, product_view.title FROM product_view',
        
        // optional parameters
        'pageSize' => 1000,
        'pageToken' => '{page_token}',
    ]);


Search all reports
``````````````````

Lists all (1000+ results) using multiple requests.
Yields results using the Generator syntax.

.. code-block:: php
    
    $result = $client->report->searchAll('SELECT product_view.id, product_view.title FROM product_view');


`Back to top <#top>`_