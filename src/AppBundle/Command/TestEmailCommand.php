<?php

namespace AppBundle\Command;

use AppBundle\VO\EmailValueObject;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class TestEmailCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('TestEmail')
            ->setDescription('...')
            ->addArgument('argument', InputArgument::OPTIONAL, 'Argument description')
            ->addOption('option', null, InputOption::VALUE_NONE, 'Option description')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $email = new EmailValueObject('john@example.com');
        assert((string) $email == 'john@example.com');
        print (string) $email . PHP_EOL;
    }

}
