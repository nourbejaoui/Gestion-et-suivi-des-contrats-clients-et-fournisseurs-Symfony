<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;

class UserAddrolesCommand extends Command
{
    protected static $defaultName = 'app:user:addroles';

    protected function configure()
    {
        $this
            ->setDescription('Add a short description for your command')
            ->addArgument('email', InputArgument::OPTIONAL, 'Argument description')
            ->addArgument('roles', InputArgument::OPTIONAL, 'Argument description')
        ;
    }

    public function __construct(EntityManagerInterface $em){
        $this->em = $em;
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $email = $input->getArgument('email');
        $roles = $input->getArgument('roles');
        $userRepository = $this->em->getRepository(User::class);
        $user = $userRepository->findOneByEmail($email);
        if ($user) {
            $user->addroles($roles);
            $this->em->flush();

            $io->success('You have a new command! Now make it your own! Pass --help to see your options.');
        }else {
            $io->error('there is no user with that email address');
        }



        $io->success('You have a new command! Now make it your own! Pass --help to see your options.');

        return 0;
    }
}
