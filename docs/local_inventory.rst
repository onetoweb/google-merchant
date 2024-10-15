.. _top:
.. title:: Local inventory

`Back to index <index.rst>`_

===============
Local inventory
===============

.. contents::
    :local:


List local inventories
``````````````````````

.. code-block:: php
    
    $offerId = 'online~en~NL~aaaaaaaaa';
    $result = $client->localInventory->list($offerId, [
        
        // optional params
        'pageSize' => 1000,
        'pageToken' => '{page_token}',
    ]);


`Back to top <#top>`_