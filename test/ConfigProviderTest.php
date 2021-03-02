<?php

/**
 * @see       https://github.com/mezzio/mezzio-platesrenderer for the canonical source repository
 * @copyright https://github.com/mezzio/mezzio-platesrenderer/blob/master/COPYRIGHT.md
 * @license   https://github.com/mezzio/mezzio-platesrenderer/blob/master/LICENSE.md New BSD License
 */

declare(strict_types=1);

namespace MezzioTest\Plates;

use Mezzio\Plates\ConfigProvider;
use PHPUnit\Framework\TestCase;

class ConfigProviderTest extends TestCase
{
    /** @var ConfigProvider */
    private $provider;

    protected function setUp(): void
    {
        $this->provider = new ConfigProvider();
    }

    public function testInvocationReturnsArray(): array
    {
        $config = ($this->provider)();
        $this->assertIsArray($config);

        return $config;
    }

    /**
     * @depends testInvocationReturnsArray
     * @param array $config
     */
    public function testReturnedArrayContainsDependencies(array $config): void
    {
        $this->assertArrayHasKey('dependencies', $config);
        $this->assertArrayHasKey('templates', $config);
        $this->assertIsArray($config['dependencies']);
    }
}
