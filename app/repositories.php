<?php
declare(strict_types=1);

use DI\ContainerBuilder;
use Doctrine\ORM\EntityManager;
use PetStore\Domain\Pet\PetRepositoryInterface;
use PetStore\Domain\Showroom\ShowroomRepositoryInterface;
use PetStore\Domain\Transaction\TransactionRepositoryInterface;
use PetStore\Infrastructure\Persistence\Pet\DatabasePetRepository;
use PetStore\Infrastructure\Persistence\Showroom\DatabaseShowroomRepository;
use PetStore\Infrastructure\Persistence\Transaction\DatabaseTransactionRepository;

return function (ContainerBuilder $containerBuilder, EntityManager $entityManager) {
    $containerBuilder->addDefinitions([
        TransactionRepositoryInterface::class => new DatabaseTransactionRepository($entityManager),
        PetRepositoryInterface::class => new DatabasePetRepository($entityManager),
        ShowroomRepositoryInterface::class => new DatabaseShowroomRepository($entityManager),
    ]);
};