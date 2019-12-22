<?php

namespace App\Command;

use App\Entity\User;
use App\Manager\UserManager;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class CreateUserCommand extends Command
{
    protected static $defaultName = 'create-user';

    /** @var UserPasswordEncoderInterface  */
    private $passwordEncoder;

    /** @var UserManager  */
    private $userManager;

    public function __construct(string $name = null, UserPasswordEncoderInterface $passwordEncoder, UserManager $userManager)
    {
        parent::__construct($name);
        $this->passwordEncoder = $passwordEncoder;
        $this->userManager = $userManager;
    }

    protected function configure()
    {
        $this
            ->setDescription('Add a short description for your command')
            ->addArgument('email', InputArgument::REQUIRED, 'Email du user')
            ->addArgument('password', InputArgument::REQUIRED, 'Password du user')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        try {
            $io = new SymfonyStyle($input, $output);
            $email = $input->getArgument('email');
            $password = $input->getArgument('password');

            if ($email && $password) {
                $this->userManager->create($email, $password);
            }

            $io->success('Succès création user');
        } catch (\Exception $e) {
            $io->error('Exception levée : ' . $e->getMessage());
        }


        return 0;
    }
}
