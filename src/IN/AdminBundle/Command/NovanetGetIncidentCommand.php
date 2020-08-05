<?php

namespace IN\AdminBundle\Command;
ini_set('ignore_repeated_errors',1);
error_reporting(E_ALL & ~E_NOTICE & ~E_USER_NOTICE);


use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class NovanetGetIncidentCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('novanet:get:incident')
            ->setDescription('...')
            ->addArgument('argument', InputArgument::OPTIONAL, 'Argument description')
            ->addOption('option', null, InputOption::VALUE_NONE, 'Option description')
        ;
    }

    // 2. Expose the EntityManager in the class level
    private $entityManager;


    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln([
            'User Creator',
            '============',
            '',
        ]);
        $email = new Imap();
        $connect = $email->connect(
            '{mail.malinova.tech:143/novalidate-cert/notls}INBOX', //host
            'sekou.sidibe@malinova.tech', //username
            'Malinova@2020' //password
        );


        if($connect){
            if(isset($_POST['inbox'])){
                // inbox array
                $inbox = $email->getMessages('html');
                echo json_encode($inbox, JSON_PRETTY_PRINT);
            }else if(!empty($_POST['uid']) && !empty($_POST['part']) && !empty($_POST['file']) && !empty($_POST['encoding'])){
                // attachments
                $inbox = $email->getFiles($_POST);
                echo json_encode($inbox, JSON_PRETTY_PRINT);
            }else {
                echo json_encode(array("status" => "error", "message" => "Not connect."), JSON_PRETTY_PRINT);
            }
        }else{
            echo json_encode(array("status" => "error", "message" => "Not connect."), JSON_PRETTY_PRINT);
        }
    }

}
