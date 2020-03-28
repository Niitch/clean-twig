<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use App\DataFixtures\AppFixtures;
use App\Entity\Comment;
use Faker\Factory;

class CommentFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager) {
        
        $faker = Factory::create('fr_FR');
        
        for ( $i = 0 ; $i < AppFixtures::NB_ARTICLES ; $i++ )
            for ( $j = 0 ; $j < $faker->numberBetween(1,9) ; $j++ ) {
                $comment = new Comment();
                $comment->setName($faker->name(null));
                $comment->setCreatedAt($faker->dateTimeAD('now', null));
                $comment->setEmail($faker->email());
                $comment->setComment($faker->paragraph(3, true));
                $comment->setArticle($this->getReference('article'.$i));
                
                $manager->persist($comment);
            }

        $manager->flush();
    }

    public function getDependencies()
    {
        return array(
            AppFixtures::class,
        );
    }
}
