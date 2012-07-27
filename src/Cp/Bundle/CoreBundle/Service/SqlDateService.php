<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Cp\Bundle\CoreBundle\Service;
/**
 * Description of SqlDateService
 *
 * @author Benjamin
 */
class SqlDateService {
    
    public function frUs($date)
    {
        $date = explode('/', str_replace('-', '/', $date));
        return $date[2].'/'.$date[1].'/'.$date[0];
    }
}

?>
