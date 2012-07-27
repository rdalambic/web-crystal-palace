<?php

namespace Cp\Bundle\FilmBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cp\Bundle\FilmBundle\Entity\Film
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Cp\Bundle\FilmBundle\Entity\FilmRepository")
 */
class Film
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
     * @var string $titre
     *
     * @ORM\Column(name="titre", type="string", length=255)
     */
    private $titre;

    /**
     * @var string $realisateur
     *
     * @ORM\Column(name="realisateur", type="string", length=255)
     */
    private $realisateur;

    /**
     * @var text $acteurs
     *
     * @ORM\Column(name="acteurs", type="text", nullable=true)
     */
    private $acteurs;

    /**
     * @var integer $duree_h
     *
     * @ORM\Column(name="duree_h", type="integer", nullable=true)
     */
    private $duree_h;

    /**
     * @var integer $duree_m
     *
     * @ORM\Column(name="duree_m", type="integer", nullable=true)
     */
    private $duree_m;

    /**
     * @var string $version
     *
     * @ORM\Column(name="version", type="string", length=255, nullable=true)
     */
    private $version;

    /**
     * @var text $resume
     *
     * @ORM\Column(name="resume", type="text", nullable=true)
     */
    private $resume;

    /**
     * @var text $fiche
     *
     * @ORM\Column(name="fiche", type="text", nullable=true)
     */
    private $fiche;

    /**
     * @var string $affiche
     *
     * @ORM\Column(name="affiche", type="string", length=255, nullable=true)
     */
    private $affiche;


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
     * Set titre
     *
     * @param string $titre
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;
    }

    /**
     * Get titre
     *
     * @return string 
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set realisateur
     *
     * @param string $realisateur
     */
    public function setRealisateur($realisateur)
    {
        $this->realisateur = $realisateur;
    }

    /**
     * Get realisateur
     *
     * @return string 
     */
    public function getRealisateur()
    {
        return $this->realisateur;
    }

    /**
     * Set acteurs
     *
     * @param text $acteurs
     */
    public function setActeurs($acteurs)
    {
        $this->acteurs = $acteurs;
    }

    /**
     * Get acteurs
     *
     * @return text 
     */
    public function getActeurs()
    {
        return $this->acteurs;
    }

    /**
     * Set duree_h
     *
     * @param integer $dureeH
     */
    public function setDureeH($dureeH)
    {
        $this->duree_h = $dureeH;
    }

    /**
     * Get duree_h
     *
     * @return integer 
     */
    public function getDureeH()
    {
        return $this->duree_h;
    }

    /**
     * Set duree_m
     *
     * @param integer $dureeM
     */
    public function setDureeM($dureeM)
    {
        $this->duree_m = $dureeM;
    }

    /**
     * Get duree_m
     *
     * @return integer 
     */
    public function getDureeM()
    {
        return $this->duree_m;
    }

    /**
     * Set version
     *
     * @param string $version
     */
    public function setVersion($version)
    {
        $this->version = $version;
    }

    /**
     * Get version
     *
     * @return string 
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * Set resume
     *
     * @param text $resume
     */
    public function setResume($resume)
    {
        $this->resume = $resume;
    }

    /**
     * Get resume
     *
     * @return text 
     */
    public function getResume()
    {
        return $this->resume;
    }

    /**
     * Set fiche
     *
     * @param text $fiche
     */
    public function setFiche($fiche)
    {
        $this->fiche = $fiche;
    }

    /**
     * Get fiche
     *
     * @return text 
     */
    public function getFiche()
    {
        return $this->fiche;
    }

    /**
     * Set affiche
     *
     * @param string $affiche
     */
    public function setAffiche($affiche)
    {
        $this->affiche = $affiche;
    }

    /**
     * Get affiche
     *
     * @return string 
     */
    public function getAffiche()
    {
        return $this->affiche;
    }
    
    public function getDuree()
    {
        if(empty($this->duree_h))
        {
            $this->duree_h = 0;
        }
        
        if(empty($this->duree_m))
        {
            $this->duree_m = '00';
        }
        
        return $this->duree_h.'h'.$this->duree_m;
    }
}