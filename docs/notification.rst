.. _top:
.. title:: Notification

`Back to index <index.rst>`_

============
Notification
============

.. contents::
    :local:


List notifications
``````````````````

.. code-block:: php
    
    $result = $client->notification->list([
        
        // optional params
        'pageSize' => 1000,
        'pageToken' => '{page_token}',
    ]);


Get notification
````````````````

.. code-block:: php
    
    $notificationId = 9999999999;
    $result = $client->notification->get($notificationId);


Create notification
```````````````````

.. code-block:: php
    
    $result = $client->notification->create([
        'registeredEvent' => 'PRODUCT_STATUS_CHANGE',
        'callBackUri' => 'https://www.example.com/callback.php',
        'allManagedAccounts' => true,
    ]);


Update notification
```````````````````

.. code-block:: php
    
    $notificationId = 9999999999;
    $result = $client->notification->update($notificationId, [
        'callBackUri' => 'https://www.example.com/callback.php',
    ], [
        'updateMask' => 'callBackUri'
    ]);


Delete notification
```````````````````

.. code-block:: php
    
    $notificationId = 9999999999;
    $result = $client->notification->delete($notificationId);


`Back to top <#top>`_