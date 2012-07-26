<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Cp\Bundle\FilmBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Cp\Bundle\FilmBundle\Entity\Film;
/**
 * Commande permettant l'ajout d'un film via la console (pour le dev uniquement)
 *
 * @author Benjamin
 */
class AddCommand extends ContainerAwareCommand {
    
    protected function configure()
    {
        $this->setName('film:add')
                ->setDescription('Ajoute un film à la base de données')
                ->addArgument('titre', InputArgument::REQUIRED, 'Titre du film')
                ->addArgument('realisateur', InputArgument::REQUIRED, 'Réalisateur du film');
    }
    
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('Ajout d\'un nouveau film...');
        
        $em = $this->getContainer()->get('doctrine.orm.entity_manager');
        $film = new Film();
        
        $film->setTitre($input->getArgument('titre'));
        $film->setRealisateur($input->getArgument('realisateur'));
        
        $em->persist($film);
        $em->flush();
        
        $output->writeln('Film '.$input->getArgument('titre').' ajouté avec succès !');
             
    }
}

?>
