<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Property;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class PropertyFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Factory::create('fr_FR');
        for ($i = 0; $i < 100; $i++){
           $property = new Property();
           $property
                ->setTitle($faker->words(3,true))
                ->setDescription($faker->sentences(3,true))
                ->setSurface($faker->numberbetween(20,350))
                ->setRooms($faker->numberbetween(2,10))
                ->setBedrooms($faker->numberbetween(1,9))
                ->setFloor($faker->numberbetween(0,15))
                ->setPrice($faker->numberbetween(80000,2000000))
                ->setHeat($faker->numberbetween(0,count(Property::HEAT) - 1))
                ->setCity($faker->city)
                ->setAddress($faker->address)
                ->setPostalCode($faker->PostCode)
                ->setSold(false);
            $manager->persist($property);
       }
        $manager->flush();
    }
}
