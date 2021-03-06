<?php

namespace OpenClassrooms\Tests\Cache\CacheProvider;

use Doctrine\Common\Cache\ArrayCache;
use Doctrine\Common\Cache\CacheProvider;

/**
 * @author Romain Kuzniak <romain.kuzniak@turn-it-up.org>
 */
class CacheProviderSpy extends CacheProvider
{
    const ID = 1;

    const NAMESPACE_ID = 'namespace_1';

    const NAMESPACE_ID_VALUE = 'namespace';

    const DATA = 'data';

    const NAMESPACE_DATA = 'namespace data';

    /**
     * @var ArrayCache
     */
    public $cacheProvider;

    /**
     * @var bool
     */
    public $fetchHasBeenCalled = false;

    /**
     * @var bool
     */
    public $containsHasBeenCalled = false;

    /**
     * @var bool
     */
    public $saveHasBeenCalled = false;

    /**
     * @var bool
     */
    public $deleteHasBeenCalled = false;

    /**
     * @var bool
     */
    public $getStatsHasBeenCalled = false;

    public $callToFetchCount = 0;

    /**
     * @var string
     */
    public $id;

    /**
     * @var string
     */
    public $data;

    /**
     * @var int
     */
    public $lifeTime;

    public function fetch($id)
    {
        $this->fetchHasBeenCalled = true;
        $this->callToFetchCount++;
        $this->id = $id;

        $data = $this->cacheProvider->fetch($id);

        return $data;
    }

    public function contains($id)
    {
        $this->containsHasBeenCalled = true;
        $this->id = $id;

        return $this->cacheProvider->contains($id);
    }

    public function save($id, $data, $lifeTime = null)
    {
        $this->saveHasBeenCalled = true;
        $this->id = $id;
        $this->data = $data;
        $this->lifeTime = $lifeTime;

        return $this->cacheProvider->save($id, $data, $lifeTime);
    }

    public function delete($id)
    {
        $this->deleteHasBeenCalled = true;
        $this->id = $id;

        return $this->cacheProvider->delete($id);
    }

    public function getStats()
    {
        $this->getStatsHasBeenCalled = true;

        return $this->cacheProvider->getStats();
    }

    /**
     * Fetches an entry from the cache.
     *
     * @param string $id The id of the cache entry to fetch.
     *
     * @return string|bool The cached data or FALSE, if no cache entry exists for the given id.
     */
    protected function doFetch($id)
    {
        return null;
    }

    /**
     * Tests if an entry exists in the cache.
     *
     * @param string $id The cache id of the entry to check for.
     *
     * @return boolean TRUE if a cache entry exists for the given cache id, FALSE otherwise.
     */
    protected function doContains($id)
    {
        return null;
    }

    /**
     * Puts data into the cache.
     *
     * @param string $id         The cache id.
     * @param string $data       The cache entry/data.
     * @param int    $lifeTime   The lifetime. If != 0, sets a specific lifetime for this
     *                           cache entry (0 => infinite lifeTime).
     *
     * @return boolean TRUE if the entry was successfully stored in the cache, FALSE otherwise.
     */
    protected function doSave($id, $data, $lifeTime = 0)
    {
        return null;
    }

    /**
     * Deletes a cache entry.
     *
     * @param string $id The cache id.
     *
     * @return boolean TRUE if the cache entry was successfully deleted, FALSE otherwise.
     */
    protected function doDelete($id)
    {
        return null;
    }

    /**
     * Flushes all cache entries.
     *
     * @return boolean TRUE if the cache entry was successfully deleted, FALSE otherwise.
     */
    protected function doFlush()
    {
        return null;
    }

    /**
     * Retrieves cached information from the data store.
     *
     * @since 2.2
     *
     * @return array|null An associative array with server's statistics if available, NULL otherwise.
     */
    protected function doGetStats()
    {
        return null;
    }

}
