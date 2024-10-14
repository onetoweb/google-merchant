.. _top:
.. title:: Account terms of service state

`Back to index <index.rst>`_

==============================
Account terms of service state
==============================

.. contents::
    :local:


Retrieve terms of service state for application
```````````````````````````````````````````````

.. code-block:: php
    
    $result = $client->accountTermsOfServiceState->retrieveForApplication();


Get terms of service state
``````````````````````````

.. code-block:: php
    
    $name = 'MERCHANT_CENTER-NL';
    $result = $client->accountTermsOfServiceState->get($name);


`Back to top <#top>`_