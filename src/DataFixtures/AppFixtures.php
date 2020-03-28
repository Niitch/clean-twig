<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Article;
use Faker\Factory;

class AppFixtures extends Fixture {

    public const NB_ARTICLES = 12;

    public function load(ObjectManager $manager) {
        
        $faker = Factory::create('fr_FR');

        for ( $i = 0 ; $i < self::NB_ARTICLES ; $i++ ) {
            $article = new Article();
            $article->setTitle($faker->words(3, true));
            $article->setSubtitle($faker->sentence(7, true));
            $article->setCreatedAt($faker->dateTimeAD('now', null));
            $article->setAuthor($faker->name(null));
            $article->setBody($faker->paragraphs(10, true));
            $article->setImage($faker->imageUrl(1000,500));

            $this->addReference('article'.$i, $article);
            $manager->persist($article);
        }
        
        $manager->flush();
    }
}
