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
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Cp\Bundle\ProgrammeBundle\Entity\Programme;
use Cp\Bundle\FilmBundle\Entity\Film;
/**
 * Description of AddFilmCommand
 *
 * @author Benjamin
 */
class AddFilmCommand extends ContainerAwareCommand {
    
    protected function configure()
    {
        $this->setName('prog:add:film')
                ->setDescription('Ajoute un film au programme')
                ->addArgument('programme', InputArgument::REQUIRED, 'L\id du programme')
                ->addArgument('film', InputArgument::REQUIRED, 'Le titre du film à lier');
    }
    
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $em = $this->getContainer()->get('doctrine.orm.entity_manager');
        $filmRepo = $em->getRepository('CpFilmBundle:Film');
        $progRepo = $em->getRepository('CpProgrammeBundle:Programme');
        
        $prog = $progRepo->find($input->getArgument('programme'));
        if(!$prog)
        {
            throw new NotFoundHttpException('Ce programme n\'existe pas !');
        }
        
        $film = $filmRepo->findOneByTitre($input->getArgument('film'));
        if(!$film)
        {
            throw new NotFoundHttpException('Ce film n\'existe pas !');
        }
        
        $prog->addFilm($film);
        
        $em->flush();
        
        $output->writeln('Le film '.$film->getTitre().' a bien été ajouté au programme du '.$prog->getDate());        
    }
}

?>
