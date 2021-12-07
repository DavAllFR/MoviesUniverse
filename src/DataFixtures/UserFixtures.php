<?php

namespace App\DataFixtures;

use App\Entity\Utilisateur;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserFixtures extends Fixture
{
    private $passwordEncoder;
    
    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }
    
    public function load(ObjectManager $manager): void
    {
        $admin = new Utilisateur();
        $admin->setEmail("root@root.com");
        $admin->setUsername("root");
        $admin->setRoles(["ROLE_ADMIN", "ROLE_USER"]);
        $admin->setPassword($this->passwordEncoder->encodePassword($admin, "password"));
        $manager->persist($admin);
        
        $manager->flush();
    }
}
