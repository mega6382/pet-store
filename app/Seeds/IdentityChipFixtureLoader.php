<?php
declare(strict_types=1);


namespace MyDataFixtures;

use DateTime;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Exception;
use PetStore\Domain\IdentityChip\IdentityChip;
use PetStore\Domain\IdentityChipType\IdentityChipType;


class IdentityChipFixtureLoader extends AbstractFixture implements OrderedFixtureInterface
{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     * @throws Exception
     */
    public function load(ObjectManager $manager)
    {
        /* @var $chipType IdentityChipType */
        $chipType = $this->getReference('chipType');
        $chip1 = new IdentityChip(1, 1, $chipType, new DateTime('2019-08-25'));
        $chip2 = new IdentityChip(2, 1, $chipType, new DateTime('2019-08-18'));
        $chip3 = new IdentityChip(3, 1, $chipType, new DateTime('2019-08-11'));
        $chip4 = new IdentityChip(4, 1, $chipType, new DateTime('2019-08-04'));
        $chip5 = new IdentityChip(5, 1, $chipType, new DateTime('2019-07-28'));
        $chip6 = new IdentityChip(6, 1, $chipType, new DateTime('2019-07-21'));

        $manager->persist($chip1);
        $manager->persist($chip2);
        $manager->persist($chip3);
        $manager->persist($chip4);
        $manager->persist($chip5);
        $manager->persist($chip6);
        $manager->flush();

        $this->addReference('chip1', $chip1);
        $this->addReference('chip2', $chip2);
        $this->addReference('chip3', $chip3);
        $this->addReference('chip4', $chip4);
        $this->addReference('chip5', $chip5);
        $this->addReference('chip6', $chip6);
    }

    /**
     * Get the order of this fixture
     *
     * @return int
     */
    public function getOrder(): int
    {
        return 8;
    }
}