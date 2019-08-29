<?php
declare(strict_types=1);


namespace MyDataFixtures;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use PetStore\Domain\Customer\Customer;


class CustomerFixtureLoader extends AbstractFixture implements OrderedFixtureInterface
{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $customer1 = new Customer(1, "Joe Smith");
        $customer2 = new Customer(2, "John Doe");
        $customer3 = new Customer(3, "John Smith");

        $manager->persist($customer1);
        $manager->persist($customer2);
        $manager->persist($customer3);
        $manager->flush();

        $this->addReference('customer1', $customer1);
        $this->addReference('customer2', $customer2);
        $this->addReference('customer3', $customer3);
    }

    /**
     * Get the order of this fixture
     *
     * @return int
     */
    public function getOrder(): int
    {
        return 2;
    }
}