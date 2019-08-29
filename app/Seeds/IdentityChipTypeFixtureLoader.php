<?php
declare(strict_types=1);


namespace MyDataFixtures;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use PetStore\Domain\IdentityChipType\IdentityChipType;


class IdentityChipTypeFixtureLoader extends AbstractFixture implements OrderedFixtureInterface
{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $chipType = new IdentityChipType(1, 2, 200);

        $manager->persist($chipType);
        $manager->flush();
        $this->addReference('chipType', $chipType);
    }

    /**
     * Get the order of this fixture
     *
     * @return int
     */
    public function getOrder(): int
    {
        return 3;
    }
}