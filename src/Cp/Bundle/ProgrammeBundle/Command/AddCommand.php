<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Cp\Bundle\ProgrammeBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Cp\Bundle\ProgrammeBundle\Entity\Programme;

/**
 * Description of AddCommand
 *
 * @author Benjamin
 */
class AddCommand extends ContainerAwareCommand {
    
    protected function configure()
    {
        $this->setName('prog:add')
                ->setDescription('Ajoute un programme')
                ->addArgument('date', InputArgument::REQUIRED, 'Date de début du programme');
    }
    
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('Ajout d\'un programme...');
        
        $em = $this->getContainer()->get('doctrine.orm.entity_manager');
        $programme = new Programme();
        
        $dateFormat = explode('/', $input->getArgument('date'));
        $dateFormat = $dateFormat[2].'/'.$dateFormat[1].'/'.$dateFormat[0];
        
        $date = new \DateTime($dateFormat);
        
        $programme->setDate($date);
        $em->persist($programme);
        $em->flush();
       
    }
}

?>
