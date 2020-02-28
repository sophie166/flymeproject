<?php

namespace App\DataFixtures;

use App\Entity\Activity;
use App\Entity\Adventurer;
use App\Entity\Astronaute;
use App\Entity\Depart;
use App\Entity\Pilot;
use App\Entity\Spaceship;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

        $depart = new Depart();
        $depart-> setCity('Houston');
        $depart-> setDescprition('Ville des départs américains');

            $manager->persist($depart);

        $activity = new Activity();
        $activity->setName('golf');
        $activity->setDescription('Effectuer un golf dans l\'espace');

            $manager->persist($activity);

        $astronaute =new Astronaute();
        $astronaute->setName('Thomas');
        $astronaute->setLastname('Pesquet');

            $manager->persist($astronaute);

        $spaceship = new Spaceship();
        $spaceship->setName('Space X11');
        $spaceship->setCapacity(170);

            $manager->persist($spaceship);

        $pilot = new Pilot();
        $pilot->setName('Mariana');
        $pilot->setLastname('Gomon');
        $pilot->setSpaceship($spaceship);

            $manager->persist($pilot);

        $adventurer = new Adventurer();
        $adventurer->setName('john');
        $adventurer->setLastname('Doe');
        $adventurer->setDescription('Je souhaite partir le plus vite possible, je suis super sociable');
        $adventurer->setActivity($activity);
        $adventurer-> setDepart($depart);
        $adventurer->setAstronaute($astronaute);
        $adventurer->setSpaceship($spaceship);

            $manager->persist($adventurer);

                $manager->flush();
    }
}
