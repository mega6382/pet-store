<?php
declare(strict_types=1);


namespace MyDataFixtures;

use DateTime;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Exception;
use PetStore\Domain\Transaction\Transaction;


class TransactionFixtureLoader extends AbstractFixture implements OrderedFixtureInterface
{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     * @throws Exception
     */
    public function load(ObjectManager $manager)
    {
        $pet2 = $this->getReference('pet2');
        $pet5 = $this->getReference('pet5');
        $pet8 = $this->getReference('pet8');
        $customer1 = $this->getReference('customer1');
        $customer2 = $this->getReference('customer2');
        $customer3 = $this->getReference('customer3');
        $insuranceType = $this->getReference('insuranceType');
        $claim1 = $this->getReference('claim1');

        $transaction1 = new Transaction(
            1,
            2,
            $pet2,
            1,
            $customer1,
            1,
            $insuranceType,
            1,
            $claim1,
            30000,
            10000,
            6000,
            40000,
            true,
            new DateTime('2019-08-26')
        );
        $transaction2 = new Transaction(
            1,
            5,
            $pet5,
            2,
            $customer2,
            1,
            $insuranceType,
            null,
            null,
            70000,
            10000,
            14000,
            80000,
            true,
            new DateTime('2019-08-27')
        );
        $transaction3 = new Transaction(
            1,
            8,
            $pet8,
            3,
            $customer3,
            null,
            null,
            null,
            null,
            35000,
            0,
            0,
            35000,
            true,
            new DateTime('2019-08-28')
        );

        $manager->persist($transaction1);
        $manager->persist($transaction2);
        $manager->persist($transaction3);
        $manager->flush();
    }

    /**
     * Get the order of this fixture
     *
     * @return int
     */
    public function getOrder(): int
    {
        return 11;
    }
}