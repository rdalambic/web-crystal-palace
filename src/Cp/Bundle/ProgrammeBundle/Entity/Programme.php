<?php

namespace Cp\Bundle\ProgrammeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Cp\Bundle\FilmBundle\Entity\Film;

/**
 * Cp\Bundle\ProgrammeBundle\Entity\Programme
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Cp\Bundle\ProgrammeBundle\Entity\ProgrammeRepository")
 */
class Programme
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var date $date
     *
     * @ORM\Column(name="date", type="date")
     */
    private $date;
    
    /**
     * @var Films $films
     * 
     * @ORM\ManyToMany(targetEntity="Cp\Bundle\FilmBundle\Entity\Film")
     */
    private $films;
    
    
    public function __construct()
    {
        $this->films = new \Doctrine\Common\Collections\ArrayCollection;
    }
    
    public function getFilms()
    {
        return $this->films;
    }
    
    public function addFilm(Film $film)
    {
        $this->films[] = $film;
    }
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set date
     *
     * @param date $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * Get date
     *
     * @return date 
     */
    public function getDate()
    {
        return $this->date;
    }
}