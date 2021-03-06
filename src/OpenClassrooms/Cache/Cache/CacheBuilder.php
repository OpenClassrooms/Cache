<?php

namespace OpenClassrooms\Cache\Cache;

use Doctrine\Common\Cache\CacheProvider;

/**
 * @author Romain Kuzniak <romain.kuzniak@turn-it-up.org>
 */
interface CacheBuilder
{
    /**
     * @return CacheBuilder
     */
    public function withCacheProvider(CacheProvider $cacheProvider);

    /**
     * @return CacheBuilder
     */
    public function withDefaultLifeTime($defaultLifetime);

    /**
     * @return Cache
     */
    public function build();
}
