<?php

namespace AppBundle\Command;

use AppBundle\Entity\Address;
use AppBundle\Entity\Person;
use AppBundle\Entity\Tenant;
use AppBundle\VO\EmailValueObject;
use AppBundle\VO\PhoneValueObject;
use AppBundle\VO\PostalValueObject;
use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Doctrine\ORM\EntityManager;

class UpdateTenantCommand extends ContainerAwareCommand
{
    /**
     * @var EntityManager
     */
    protected $em;
    protected function configure()
    {
        $this
            ->setName('UpdateTenant')
            ->setDescription('...')
            ->addArgument('argument', InputArgument::OPTIONAL, 'Argument description')
            ->addOption('option', null, InputOption::VALUE_NONE, 'Option description')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->em = $this->getContainer()->get('doctrine')->getEntityManager();
        $email = new EmailValueObject("test2@mail.com");
        $phone = new PhoneValueObject('8-999-999-999');
        $code = new PostalValueObject('00000');
        $address = new Address('Some Street 2', $code, 'Some city 2', 'Some country 2');
        $person = new Person('Name 2 ', 'Last name 2', $phone, $email);

        /** @var Tenant $tenant */
        $tenant = $this->em->getRepository('AppBundle:Tenant')->findById(4);
        $tenant->setAddress($address);
        $tenant->setPerson($person);
        $this->em->getRepository('AppBundle:Tenant')->save($tenant);
    }

}
