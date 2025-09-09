<?php

declare(strict_types=1);

namespace Doctrine\Bundle\DoctrineBundle\Mapping;

use Doctrine\ORM\Mapping\ClassMetadata;

class ClassMetadataCollection
{
    private string|null $path      = null;
    private string|null $namespace = null;

    /** @param ClassMetadata[] $metadata */
    public function __construct(
        private readonly array $metadata,
    ) {
    }

    /** @return ClassMetadata[] */
    public function getMetadata(): array
    {
        return $this->metadata;
    }

    public function setPath(string $path): void
    {
        $this->path = $path;
    }

    public function getPath(): string|null
    {
        return $this->path;
    }

    public function setNamespace(string $namespace): void
    {
        $this->namespace = $namespace;
    }

    public function getNamespace(): string|null
    {
        return $this->namespace;
    }
}
