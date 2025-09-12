<?php

declare(strict_types=1);

namespace Doctrine\Bundle\DoctrineBundle\Tests\DependencyInjection;

use Doctrine\Bundle\DoctrineBundle\DependencyInjection\DoctrineExtension;
use Doctrine\Bundle\DoctrineBundle\Tests\DeprecationFreeConfig;
use Symfony\Component\DependencyInjection\ContainerBuilder;

use function array_unshift;

/** @phpstan-ignore class.extendsFinalByPhpDoc */
final class DeprecationFreeExtension extends DoctrineExtension
{
    /** @param list<array<string, mixed>> $configs */
    public function load(array $configs, ContainerBuilder $container): void
    {
        // Prepend the config so that it gets overridden by test-specific config
        array_unshift($configs, DeprecationFreeConfig::get());

        parent::load($configs, $container);
    }

    public function getAlias(): string
    {
        return 'doctrine';
    }
}
