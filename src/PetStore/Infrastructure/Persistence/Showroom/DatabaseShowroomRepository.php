<?php
declare(strict_types=1);


namespace PetStore\Infrastructure\Persistence\Showroom;


use Doctrine\Common\Persistence\ObjectRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;
use PetStore\Domain\Showroom\Showroom;
use PetStore\Domain\Showroom\ShowroomRepositoryInterface;

class DatabaseShowroomRepository implements ShowroomRepositoryInterface
{
    /**
     * @var EntityManager
     */
    private $entityManager;

    /**
     * @var ObjectRepository|EntityRepository
     */
    private $showroomRepository;

    /**
     * DatabaseShowroomRepository constructor.
     * @param EntityManager $entityManager
     */
    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->showroomRepository = $entityManager->getRepository(Showroom::class);
    }

    /**
     * @return Showroom[]
     */
    public function findAll(): array
    {
        return $this->showroomRepository->findAll();
    }

    /**
     * @param int $id
     * @return object|Showroom
     */
    public function findById(int $id): Showroom
    {
        return $this->showroomRepository->find($id);
    }
}