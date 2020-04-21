<?php

namespace App\DataFixtures;

use App\Entity\Product;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create();
        $faker->addProvider(new \Bezhanov\Faker\Provider\Commerce($faker));

        for ($i=0; $i<9 ; $i++) {
            $product = new Product();
            $product->setTitle($faker->text(8))
                ->setPrice($faker->randomFloat(2, 20, 200))
                ->setImage('https://via.placeholder.com/400');
            $manager->persist($product);
        }
        $manager->flush();
    }
}
