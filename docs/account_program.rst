.. _top:
.. title:: Account program

`Back to index <index.rst>`_

===============
Account program
===============

.. contents::
    :local:


List programs
`````````````

.. code-block:: php
    
    $result = $client->accountProgram->list();


Get program
```````````

.. code-block:: php
    
    $name = 'shopping-ads';
    $result = $client->accountProgram->get($name);


Enable program
``````````````

.. code-block:: php
    
    $name = 'shopping-ads';
    $result = $client->accountProgram->enable($name);


Disable program
```````````````

.. code-block:: php
    
    $name = 'shopping-ads';
    $result = $client->accountProgram->disable($name);


`Back to top <#top>`_