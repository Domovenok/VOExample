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

class AddTenantCommand extends ContainerAwareCommand
{
    /**
     * @var EntityManager
     */
    protected $em;

    protected function configure()
    {
        $this
            ->setName('AddTenant')
            ->setDescription('...')
            ->addArgument('argument', InputArgument::OPTIONAL, 'Argument description')
            ->addOption('option', null, InputOption::VALUE_NONE, 'Option description')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->em = $this->getContainer()->get('doctrine')->getEntityManager();
        $email = new EmailValueObject("test@mail.com");
        $phone = new PhoneValueObject('8-700-24424-42');
        $code = new PostalValueObject('242424');
        $address = new Address('Some Street', $code, 'Some city', 'Some country');
        $person = new Person('Name', 'Last name', $phone, $email);
        $tenant = new Tenant();
        $tenant->setAddress($address);
        $tenant->setPerson($person);
        $this->em->getRepository('AppBundle:Tenant')->save($tenant);
    }

}
