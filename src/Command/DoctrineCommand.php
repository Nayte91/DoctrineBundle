<?php

namespace Doctrine\Bundle\DoctrineBundle\Command;

use Doctrine\DBAL\Connection;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use InvalidArgumentException;
use Symfony\Component\Console\Command\Command;

use function assert;

/**
 * Base class for Doctrine console commands to extend from.
 *
 * @internal
 */
abstract class DoctrineCommand extends Command
{
    public function __construct(
        private readonly ManagerRegistry $doctrine,
    ) {
        parent::__construct();
    }

    /**
     * Get a doctrine entity manager by symfony name.
     *
     * @param string   $name
     * @param int|null $shardId
     *
     * @return EntityManagerInterface
     */
    protected function getEntityManager($name, $shardId = null)
    {
        $manager = $this->getDoctrine()->getManager($name);

        if ($shardId !== null) {
            throw new InvalidArgumentException('Shards are not supported anymore using doctrine/dbal >= 3');
        }

        assert($manager instanceof EntityManagerInterface);

        return $manager;
    }

    /**
     * Get a doctrine dbal connection by symfony name.
     *
     * @param string $name
     *
     * @return Connection
     */
    protected function getDoctrineConnection($name)
    {
        return $this->getDoctrine()->getConnection($name);
    }

    /** @return ManagerRegistry */
    protected function getDoctrine()
    {
        return $this->doctrine;
    }
}
