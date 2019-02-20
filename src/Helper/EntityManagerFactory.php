<?php

namespace Alura\Doctrine\Helper;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Tools\Setup;

class EntityManagerFactory
{
    /**
     * @return EntityManagerInterface
     * @throws \Doctrine\ORM\ORMException
     */
    public function getEntityManager(): EntityManagerInterface
    {
        $rootAppDir = __DIR__ . '/../..';
        $config = Setup::createAnnotationMetadataConfiguration([$rootAppDir . '/src'], true);
        $connection = [
            'driver' => 'pdo_sqlite',
            'path' => $rootAppDir . '/var/data/banco.sqlite'
        ];

        return EntityManager::create($connection, $config);
    }
}
