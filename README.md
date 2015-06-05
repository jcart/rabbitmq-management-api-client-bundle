Overview
--------

This bundle is a bridge between Symfony2 configuration and [rabbitmq-management-api](https://github.com/richardfullmer/rabbitmq-management-api) library.

Installation
------------

Download the dependency via composer

```{r, engine='bash', count_lines}
composer require jcart/rabbitmq-management-api-client-bundle
```

Install the bundle into your AppKernel. Add the following line to the bundle defintions:

```php
new JC\RabbitmqManagementApiClientBundle\JCRabbitmqManagementApiClientBundle(),
```

Configuration
-------------

The configuration supports a list of rabbitmq management clients.

```
jc_rabbitmq_management_api_client:
    clients:
        primary:
            secure: false
            host: rabbitmq.dev
            port: 15672
            username: guest
            password: guest
```

Usage
-----

For each client configuration defined, the bundle will register the container the following services for each client

```
jc_rabbitmq_management_api_client.%s
```