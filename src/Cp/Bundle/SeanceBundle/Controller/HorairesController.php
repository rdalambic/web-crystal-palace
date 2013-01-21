<?php

namespace Cp\Bundle\SeanceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Description of HorairesController
 *
 * @author Benjamin
 */
class HorairesController extends Controller {

    public function planningAction() {
        //$wed = $this->get('programme.wed_date')->getWedDate();

        $weekdays = array('Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche', 'Lundi', 'Mardi');

        $programme = $this->getDoctrine()->getEntityManager()->getRepository('CpProgrammeBundle:Programme')->findOneByDate(new \DateTime($this->get('core.sql_date')->frUs($this->get('programme.wed_date')->getWedDate())));

        if (!$programme) {
            throw $this->createNotFoundException('Pas de programme cette semaine.');
        }

        $filmsToShows = array();

        foreach ($programme->getFilms() as $f) {
            
            //Each shows of the film related to the current programm
            $shows = $this->getDoctrine()->getEntityManager()->getRepository('CpSeanceBundle:Seance')->findBy(array(
                'film' => $f->getId(),
                'programme' => $programme->getId(),
                    ));            
            
            if ($shows) {
               
                //Each days of the movie week $day contain the standars value of week day num
                for ($i = 1; $i < 8; $i++) {
                    switch ($i) {
                        case 1:
                        case 2:
                        case 3:
                        case 4:
                        case 5:
                            $day = $i + 2;
                            break;
                        case 6:
                        case 7:
                            $day = $i - 5;
                    }
                    
                    //For each shows check date
                    foreach($shows as $s)
                    {                      
                        if($s->getDate()->format('N') == $day)
                        {                            
                            $filmsToShows[$f->getId()][$i][] = $s->getDate()->format('H:i');
                        }
                    }
                    
                }                
            }

        }

           
            return $this->render('CpSeanceBundle:Horaires:planning.twig.tpl', array(
                        'weekdays' => $weekdays,
                        'programme' => $programme,
                        'showsList' => $filmsToShows,
                    ));
        }
    }

?>
