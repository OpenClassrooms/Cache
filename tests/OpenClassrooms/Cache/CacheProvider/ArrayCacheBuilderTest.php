<?php

namespace OpenClassrooms\Tests\Cache\CacheProvider;

use OpenClassrooms\Cache\CacheProvider\CacheProviderType;

/**
 * @author Romain Kuzniak <romain.kuzniak@openclassrooms.com>
 */
class ArrayCacheBuilderTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function Build()
    {
        $cacheProvider = CacheBuilderMock::create(CacheProviderType::ARRAY_CACHE)
            ->build();
        $this->assertInstanceOf('Doctrine\Common\Cache\ArrayCache', $cacheProvider);
    }
}