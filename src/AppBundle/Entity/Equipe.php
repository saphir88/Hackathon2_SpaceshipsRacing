<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Equipe
 *
 * @ORM\Table(name="equipe")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\EquipeRepository")
 */
class Equipe
{
    public function __toString()
    {
        return $this->nom;
    }

    /**
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Equipage", mappedBy="id_equipe")
     */
    private $membre;

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=100)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="img_symbole", type="string", length=255)
     */
    private $imgSymbole;

    /**
     * @var string
     *
     * @ORM\Column(name="img_vaisseau", type="string", length=255)
     */
    private $imgVaisseau;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Equipe
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set imgSymbole
     *
     * @param string $imgSymbole
     *
     * @return Equipe
     */
    public function setImgSymbole($imgSymbole)
    {
        $this->imgSymbole = $imgSymbole;

        return $this;
    }

    /**
     * Get imgSymbole
     *
     * @return string
     */
    public function getImgSymbole()
    {
        return $this->imgSymbole;
    }

    /**
     * Set imgVaisseau
     *
     * @param string $imgVaisseau
     *
     * @return Equipe
     */
    public function setImgVaisseau($imgVaisseau)
    {
        $this->imgVaisseau = $imgVaisseau;

        return $this;
    }

    /**
     * Get imgVaisseau
     *
     * @return string
     */
    public function getImgVaisseau()
    {
        return $this->imgVaisseau;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Equipe
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->membre = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add membre
     *
     * @param \AppBundle\Entity\Equipage $membre
     *
     * @return Equipe
     */
    public function addMembre(\AppBundle\Entity\Equipage $membre)
    {
        $this->membre[] = $membre;

        return $this;
    }

    /**
     * Remove membre
     *
     * @param \AppBundle\Entity\Equipage $membre
     */
    public function removeMembre(\AppBundle\Entity\Equipage $membre)
    {
        $this->membre->removeElement($membre);
    }

    /**
     * Get membre
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getMembre()
    {
        return $this->membre;
    }
}
