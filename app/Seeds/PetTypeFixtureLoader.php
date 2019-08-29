<?php
declare(strict_types=1);


namespace MyDataFixtures;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use PetStore\Domain\PetType\PetType;


class PetTypeFixtureLoader extends AbstractFixture implements OrderedFixtureInterface
{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $dog = new PetType(1, 'dog');
        $cat = new PetType(2, 'cat');
        $bird = new PetType(3, 'bird');

        $manager->persist($dog);
        $manager->persist($cat);
        $manager->persist($bird);
        $manager->flush();

        $this->addReference('dog', $dog);
        $this->addReference('cat', $cat);
        $this->addReference('bird', $bird);
    }

    /**
     * Get the order of this fixture
     *
     * @return int
     */
    public function getOrder(): int
    {
        return 5;
    }
}