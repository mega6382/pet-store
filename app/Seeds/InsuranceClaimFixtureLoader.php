<?php
declare(strict_types=1);


namespace MyDataFixtures;

use DateTime;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Exception;
use PetStore\Domain\InsuranceClaim\InsuranceClaim;


class InsuranceClaimFixtureLoader extends AbstractFixture implements OrderedFixtureInterface
{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     * @throws Exception
     */
    public function load(ObjectManager $manager)
    {
        $claim1 = new InsuranceClaim(1, true, 24000, true, new DateTime('2019-08-28'));

        $manager->persist($claim1);
        $manager->flush();

        $this->addReference('claim1', $claim1);
    }

    /**
     * Get the order of this fixture
     *
     * @return int
     */
    public function getOrder(): int
    {
        return 10;
    }
}