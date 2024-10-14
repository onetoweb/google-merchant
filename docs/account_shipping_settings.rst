.. _top:
.. title:: Account shipping settings

`Back to index <index.rst>`_

=========================
Account shipping settings
=========================

.. contents::
    :local:


Get shipping settings
`````````````````````

.. code-block:: php
    
    $result = $client->accountShippingSettings->get();


Create shipping settings
````````````````````````

.. code-block:: php
    
    $result = $client->accountShippingSettings->create([
        'etag' => 'AAA=',
    ]);


`Back to top <#top>`_