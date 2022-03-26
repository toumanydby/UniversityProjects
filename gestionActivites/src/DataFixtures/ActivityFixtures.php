<?php

namespace App\DataFixtures;

use App\Entity\Activity;
use App\Entity\User;
use Faker;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class ActivityFixtures extends Fixture
{
    private UserPasswordHasherInterface $passwordHasher;

    public function __construct( UserPasswordHasherInterface $passwordHasher){
        $this->passwordHasher = $passwordHasher;
    }

    public function load(ObjectManager $manager): void
    {
        $faker = Faker\Factory::create();
        $user1 = new User();
        $user2 = new User();

        $user1
            ->setUsername("asdfgg")
            ->setPassword($this->passwordHasher->hashPassword($user1,"123456"))
            ->setRoles((array)"ROLE_ANIMATEUR")
            ->setNom("Doumbouya")
            ->setPrenom("Toumany");
        $user2
            ->setUsername("qwert")
            ->setPassword($this->passwordHasher->hashPassword($user1,"123456"))
            ->setRoles((array)"ROLE_ANIMATEUR")
            ->setNom("Sylla")
            ->setPrenom("Serigne");

        for ($i= 0; $i < 10; $i++){
            $activity = new Activity();
            $activity
                ->setName($faker->word())
                ->setDescription($faker->text())
            ;

            if($i < 5){
                $user1->addActivityId($activity);
            }
            else{
                $user2->addActivityId($activity);
            }
            $manager->persist($activity);
        }
        $manager->persist($user1);
        $manager->persist($user2);

        $manager->flush();
    }
}
