<?php
declare(strict_types=1);


namespace MyDataFixtures;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use PetStore\Domain\InsuranceType\InsuranceType;


class InsuranceTypeFixtureLoader extends AbstractFixture implements OrderedFixtureInterface
{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $insuranceType = new InsuranceType(1, 3, 10000, 80);

        $manager->persist($insuranceType);
        $manager->flush();
        $this->addReference('insuranceType', $insuranceType);
    }

    /**
     * Get the order of this fixture
     *
     * @return int
     */
    public function getOrder(): int
    {
        return 4;
    }
}