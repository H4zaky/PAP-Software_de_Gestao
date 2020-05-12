<?php

namespace App\DataFixtures;

use App\Entity\Funcionarios;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class FuncionariosFixtures extends Fixture
{
    private $encoder;

    public function __construct(UserPasswordEncoderInterface $encoder)
    {
        $this->encoder = $encoder;
    }

    public function load(ObjectManager $manager)
    {
        $user = new Funcionarios();
        $user->setEmail('admin@gmail.com');

        $password = $this->encoder->encodePassword($user, 'Carlos123');
        $user->setPassword($password);
        $user->setIsAdmin(true);

        $manager->persist($user);
        $manager->flush();
    }
}
