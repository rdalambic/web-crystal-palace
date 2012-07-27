<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Cp\Bundle\ProgrammeBundle\Service;

/**
 * Description of DateService
 *
 * @author Benjamin
 */
class DateService {
    
    const DAY_SECONDS = 86400;
    const REMAIN_MONDAY = 5;
    const REMAIN_TUESDAY = 6;
    const REMAIN_THURSDAY = 1;
    const REMAIN_FRIDAY = 2;
    const REMAIN_SATURDAY = 3;
    const REMAIN_SUNDAY = 4;

    public function getWedDate() {
        
        $semJour = date('N');
        $date = array(
            'jour' => date('j'),
            'mois' => date('n'),
            'annee' => date('Y')
        );

        $timeDate = mktime(0, 0, 0, $date['mois'], $date['jour'], $date['annee']);

        switch ($semJour) {
            case '1': //Lundi
                $remaining = self::REMAIN_MONDAY * self::DAY_SECONDS;
                break;

            case '2': //Mardi
                $remaining = self::REMAIN_TUESDAY * self::DAY_SECONDS;
                break;

            case '3': //Mercredi
                $remaining = 0;
                break;

            case '4': //Jeudi
                $remaining = self::REMAIN_THURSDAY * self::DAY_SECONDS;
                break;

            case '5': //Vendredi
                $remaining = self::REMAIN_FRIDAY * self::DAY_SECONDS;
                break;

            case '6': //Samedi
                $remaining = self::REMAIN_SATURDAY * self::DAY_SECONDS;
                break;

            case '7': //Dimanche
                $remaining = self::REMAIN_SUNDAY * self::DAY_SECONDS;
                break;
        }

        return date('d/m/Y', $timeDate - $remaining);
    }
    
    public function getLastDate()
    {
        $wed = $this->getWedDate();
        
        $break = explode('/', $wed);
        
        $date1 = mktime(0, 0, 0, $break[1], $break[0], $break[2]);
        
        $timeDiff = $date1 + (6 * self::DAY_SECONDS);
        
        return date('d/m/Y', $timeDiff);
    }

}

?>
