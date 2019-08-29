<?php
declare(strict_types=1);


namespace PetStore\Infrastructure\Persistence\Transaction;


use Doctrine\Common\Persistence\ObjectRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;
use PetStore\Domain\Transaction\Transaction;
use PetStore\Domain\Transaction\TransactionRepositoryInterface;

class DatabaseTransactionRepository implements TransactionRepositoryInterface
{
    /**
     * @var EntityManager
     */
    private $entityManager;

    /**
     * @var ObjectRepository|EntityRepository
     */
    private $transactionRepository;

    /**
     * DatabaseTransactionRepository constructor.
     * @param EntityManager $entityManager
     */
    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->transactionRepository = $entityManager->getRepository(Transaction::class);
    }

    /**
     * @return Transaction[]
     */
    public function findAll(): array
    {
        return $this->transactionRepository->findAll();
    }

    /**
     * @param int $id
     * @return object|Transaction
     */
    public function findById(int $id): Transaction
    {
        return $this->transactionRepository->find($id);
    }

    /**
     * @return Transaction[]
     */
    public function findByCurrentWeek(): array
    {
        return $this->transactionRepository
            ->createQueryBuilder('transaction')
            ->where('transaction.transactionDate BETWEEN :n7days AND :today')
            ->setParameter('today', date('Y-m-d'))
            ->setParameter('n7days', date('Y-m-d', strtotime("-7 days")))
            ->getQuery()
            ->getResult();
    }
}