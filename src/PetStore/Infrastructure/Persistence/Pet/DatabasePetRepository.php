<?php
declare(strict_types=1);


namespace PetStore\Infrastructure\Persistence\Pet;


use Doctrine\Common\Persistence\ObjectRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;
use PetStore\Domain\Pet\Pet;
use PetStore\Domain\Pet\PetRepositoryInterface;

class DatabasePetRepository implements PetRepositoryInterface
{
    /**
     * @var EntityManager
     */
    private $entityManager;

    /**
     * @var ObjectRepository|EntityRepository
     */
    private $petRepository;

    /**
     * DatabasePetRepository constructor.
     * @param EntityManager $entityManager
     */
    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->petRepository = $entityManager->getRepository(Pet::class);
    }

    /**
     * @return Pet[]
     */
    public function findAll(): array
    {
        return $this->petRepository->findAll();
    }

    /**
     * @param int $id
     * @return object|Pet
     */
    public function findById(int $id): Pet
    {
        return $this->petRepository->find($id);
    }

    /**
     * @return Pet[]
     */
    public function findPetsForShowroom(): array
    {

    }
}