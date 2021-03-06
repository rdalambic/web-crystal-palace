<?php

namespace Cp\Bundle\SeanceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cp\Bundle\SeanceBundle\Entity\Seance
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Cp\Bundle\SeanceBundle\Entity\SeanceRepository")
 */
class Seance
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
     * @var datetime $date
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @var smallint $salle
     *
     * @ORM\Column(name="salle", type="smallint")
     */
    private $salle;
    
    /**
     * @ORM\ManyToOne(targetEntity="Cp\Bundle\FilmBundle\Entity\Film")
     * @ORM\JoinColumn(nullable=false)
     */
    private $film;
    
    /**
     * @ORM\ManyToOne(targetEntity="Cp\Bundle\ProgrammeBundle\Entity\Programme")
     * @ORM\JoinColumn(nullable=true)
     */
    private $programme;
    

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
     * @param datetime $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * Get date
     *
     * @return datetime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set salle
     *
     * @param smallint $salle
     */
    public function setSalle($salle)
    {
        $this->salle = $salle;
    }

    /**
     * Get salle
     *
     * @return smallint 
     */
    public function getSalle()
    {
        return $this->salle;
    }

    /**
     * Set film
     *
     * @param Cp\Bundle\FilmBundle\Entity\Film $film
     */
    public function setFilm(\Cp\Bundle\FilmBundle\Entity\Film $film)
    {
        $this->film = $film;
    }

    /**
     * Get film
     *
     * @return Cp\Bundle\FilmBundle\Entity\Film 
     */
    public function getFilm()
    {
        return $this->film;
    }

    /**
     * Set programme
     *
     * @param Cp\Bundle\ProgrammeBundle\Entity\Programme $programme
     */
    public function setProgramme(\Cp\Bundle\ProgrammeBundle\Entity\Programme $programme)
    {
        $this->programme = $programme;
    }

    /**
     * Get programme
     *
     * @return Cp\Bundle\ProgrammeBundle\Entity\Programme 
     */
    public function getProgramme()
    {
        return $this->programme;
    }
}