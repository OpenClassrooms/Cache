# Cache
[![Build Status](https://travis-ci.org/OpenClassrooms/Cache.svg?branch=master)](https://travis-ci.org/OpenClassrooms/Cache)
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/cb725585-b433-4a21-96aa-30a0148ecd9f/mini.png)](https://insight.sensiolabs.com/projects/cb725585-b433-4a21-96aa-30a0148ecd9f)
[![Coverage Status](https://coveralls.io/repos/OpenClassrooms/Cache/badge.png?branch=master)](https://coveralls.io/r/OpenClassrooms/Cache?branch=master)

Cache adds features to Doctrine Cache implementation
- Default lifetime
- Fetch with a namespace
- Save with a namespace
- Cache invalidation through namespace strategy
- CacheProvider Builder

## Installation
The easiest way to install Cache is via [composer](http://getcomposer.org/).

Create the following `composer.json` file and run the `php composer.phar install` command to install it.

```json
{
    "require": {
        "openclassrooms/cache": "*"
    }
}
```
```php
<?php
require 'vendor/autoload.php';

use OpenClassrooms\Cache\Cache\Cache;

//do things
```
<a name="install-nocomposer"/>

## Usage
### Instantiation
OC Cache needs a Doctrine CacheProvider to be instantiate.
```php
$cacheProvider = new ArrayCache();

$cache = new Cache($cacheProvider);
```
A Cache builder can be used.
```php
// Default builder, build a cache using ArrayCache Provider
$cache = new CacheBuilderImpl()->build();

// Using a CacheProvider
$cache = new CacheBuilderImpl()
    ->withCacheProvider($redisCache)
    ->build();

// Optional default lifetime
$cache = new CacheBuilderImpl()
    ->withCacheProvider($redisCache)
    ->withDefaultLifetime(300)
    ->build();
```

### Default lifetime
```php
$cache->setDefaultLifetime(300);
$cache->save($id, $data);
```

### Fetch with namespace
```php
$data = $cache->fetchWithNamespace($id, $namespaceId);
```

### Save with namespace
```php
// Namespace and life time can be null
$data = $cache->saveWithNamespace($id, $data, $namespaceId, $lifeTime);
```

### Cache invalidation
```php
$cache->invalidate($namespaceId);
```
### CacheProvider Builder
The library provides a CacheProvider Builder

```php
// Memcache
$cacheProvider = new CacheProviderBuilderImpl()
    ->create(CacheProviderType::MEMCACHE)
    ->withHost('127.0.0.1')
    ->withPort(11211) // Default 11211
    ->withTimeout(1) // Default 1
    ->build();

// Memcached
$cacheProvider = new CacheProviderBuilderImpl()
    ->create(CacheProviderType::MEMCACHED)
    ->withHost('127.0.0.1')
    ->withPort(11211) // Default 11211
    ->build();

// Redis
$cacheProvider = new CacheProviderBuilderImpl()
    ->create(CacheProviderType::REDIS)
    ->withHost('127.0.0.1')
    ->withPort(6379) // Default 6379
    ->withTimeout(0.0) // Default 0.0
    ->build();

// Array
$cacheProvider = new CacheProviderBuilderImpl()
    ->create(CacheProviderType::ARRAY_CACHE)
    ->build();

```
