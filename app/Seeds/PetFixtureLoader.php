<?php
declare(strict_types=1);


namespace MyDataFixtures;

use DateTime;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Exception;
use PetStore\Domain\IdentityChip\IdentityChip;
use PetStore\Domain\Pet\Pet;
use PetStore\Domain\PetType\PetType;


class PetFixtureLoader extends AbstractFixture implements OrderedFixtureInterface
{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     * @throws Exception
     */
    public function load(ObjectManager $manager)
    {
        /* @var $dog PetType */
        $dog = $this->getReference('dog');
        /* @var $cat PetType */
        $cat = $this->getReference('cat');
        /* @var $bird PetType */
        $bird = $this->getReference('bird');
        /* @var $chip1 IdentityChip */
        $chip1 = $this->getReference('chip1');
        /* @var $chip2 IdentityChip */
        $chip2 = $this->getReference('chip2');
        /* @var $chip3 IdentityChip */
        $chip3 = $this->getReference('chip3');
        /* @var $chip4 IdentityChip */
        $chip4 = $this->getReference('chip4');
        /* @var $chip5 IdentityChip */
        $chip5 = $this->getReference('chip5');
        /* @var $chip6 IdentityChip */
        $chip6 = $this->getReference('chip6');
        // Dogs
        $pet1 = new Pet(1, "Scooby Doo", new DateTime('2019-08-01'), 40000, 1, $dog, null, null, false);
        $pet2 = new Pet(2, "Charlie", new DateTime('2017-03-27'), 30000, 1, $dog, 1, $chip1, true);
        $pet3 = new Pet(3, "Coco", new DateTime('2017-09-27'), 20000, 1, $dog, 2, $chip2, false);

        // Cats
        $pet4 = new Pet(4, "Teddy", new DateTime('2019-07-25'), 50000, 2, $cat, null, null, false);
        $pet5 = new Pet(5, "Zeus", new DateTime('2019-06-27'), 70000, 2, $cat, 3, $chip3, true);
        $pet6 = new Pet(6, "Oscar", new DateTime('2017-05-27'), 60000, 2, $cat, 4, $chip4, false);

        // Birds
        $pet7 = new Pet(7, "Angel", new DateTime('2019-08-27'), 80000, 3, $bird, null, null, false);
        $pet8 = new Pet(8, "Pikachu", new DateTime('2018-12-07'), 35000, 3, $bird, 5, $chip5, true);
        $pet9 = new Pet(9, "Skittles", new DateTime('2018-10-16'), 25000, 3, $bird, 6, $chip6, false);

        $manager->persist($pet1);
        $manager->persist($pet2);
        $manager->persist($pet3);
        $manager->persist($pet4);
        $manager->persist($pet5);
        $manager->persist($pet6);
        $manager->persist($pet7);
        $manager->persist($pet8);
        $manager->persist($pet9);
        $manager->flush();
        $this->addReference('pet2', $pet2);
        $this->addReference('pet5', $pet5);
        $this->addReference('pet8', $pet8);
    }

    /**
     * Get the order of this fixture
     *
     * @return int
     */
    public function getOrder(): int
    {
        return 9;
    }
}