.. _top:
.. title:: Regional inventory

`Back to index <index.rst>`_

==================
Regional inventory
==================

.. contents::
    :local:


List regional inventories
`````````````````````````

.. code-block:: php
    
    $offerId = 'online~en~NL~aaaaaaaaa';
    $result = $client->localInventory->list($offerId, [
        
        // optional params
        'pageSize' => 1000,
        'pageToken' => '{page_token}',
    ]);


`Back to top <#top>`_