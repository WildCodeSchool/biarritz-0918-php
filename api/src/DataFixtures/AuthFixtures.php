<?php

namespace App\DataFixtures;

use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Auth;

class AuthFixtures extends Fixture
{
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }
    public function load(ObjectManager $manager)
    {
        $auth = new Auth();
        $auth->setEmail('admin@admin.com');
    
        $password = $this->encoder->encodePassword($auth, 'pass_1234');
        $auth->setPassword($password);
    
        $manager->persist($auth);
        $manager->flush();
    }
}
