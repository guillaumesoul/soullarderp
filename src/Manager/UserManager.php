<?php


namespace App\Manager;


use App\Entity\User;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserManager
{
    /** @var EntityManagerInterface  */
    private $manager;

    /** @var UserPasswordEncoderInterface */
    private $passwordEncoder;

    public function __construct(
        EntityManagerInterface $manager,
        UserPasswordEncoderInterface $passwordEncoder
    )
    {
        $this->manager = $manager;
        $this->passwordEncoder = $passwordEncoder;
    }

    /**
     * @return ObjectManager
     */
    public function create(string $email, string $password): ?User
    {
        $user = new User();
        $user->setEmail($email);
        $user->setPassword($this->passwordEncoder->encodePassword($user, $password));
        $this->manager->persist($user);
        $this->manager->flush();
        return $user;
    }

}