.. _top:
.. title:: Account homepage

`Back to index <index.rst>`_

================
Account homepage
================

.. contents::
    :local:


Get account homepage
````````````````````

.. code-block:: php
    
    $result = $client->accountHomepage->get();


Claim  account homepage
```````````````````````

.. code-block:: php
    
    $result = $client->accountHomepage->claim();


Unclaim  account homepage
`````````````````````````

.. code-block:: php
    
    $result = $client->accountHomepage->unclaim();


Update account homepage
```````````````````````

.. code-block:: php
    
    $result = $client->accountHomepage->update([
        'uri' => 'https://www.example.com/',
    ], [
        'updateMask' => 'uri',
    ]);


`Back to top <#top>`_