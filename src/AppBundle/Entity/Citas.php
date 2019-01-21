<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Citas
 *
 * @ORM\Table(name="citas")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CitasRepository")
 */
class Citas
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \AppBundle\Entity\User
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * })
     */
    private $user;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_inicio", type="datetime")
     */
    private $startDateTime;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_fin", type="datetime")
     */
    private $endDateTime;

    /**
     * @var string
     *
     * @ORM\Column(name="observaciones", type="string", length=255)
     */
    private $observations;

    /**
     * @var int
     *
     * @ORM\Column(name="estatus", type="integer")
     */
    private $estatus;

    /**
     * @var int
     *
     * @ORM\Column(name="deleted", type="integer")
     */
    private $delete;


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
     * Set user
     *
     * @param \AppBundle\Entity\User $user
     *
     * @return Citas
     */
    public function setUser(\AppBundle\Entity\User $user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \AppBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set startDateTime
     *
     * @param \DateTime $startDateTime
     *
     * @return Citas
     */
    public function setStartDateTime($startDateTime)
    {
        $this->startDateTime = $startDateTime;

        return $this;
    }

    /**
     * Get startDateTime
     *
     * @return \DateTime
     */
    public function getStartDateTime()
    {
        return $this->startDateTime;
    }

    /**
     * Set endDateTime
     *
     * @param \DateTime $endDateTime
     *
     * @return Citas
     */
    public function setEndDateTime($endDateTime)
    {
        $this->endDateTime = $endDateTime;

        return $this;
    }

    /**
     * Get endDateTime
     *
     * @return \DateTime
     */
    public function getEndDateTime()
    {
        return $this->endDateTime;
    }

    /**
     * Set observations
     *
     * @param string $observations
     *
     * @return Citas
     */
    public function setObservations($observations)
    {
        $this->observations = $observations;

        return $this;
    }

    /**
     * Get observations
     *
     * @return string
     */
    public function getObservations()
    {
        return $this->observations;
    }

    /**
     * Set estatus
     *
     * @param integer $estatus
     *
     * @return Citas
     */
    public function setEstatus($estatus)
    {
        $this->estatus = $estatus;

        return $this;
    }

    /**
     * Get estatus
     *
     * @return int
     */
    public function getEstatus()
    {
        return $this->estatus;
    }

    /**
     * @return int
     */
    public function getDelete()
    {
        return $this->delete;
    }

    /**
     * @param int $delete
     */
    public function setDelete($delete)
    {
        $this->delete = $delete;
    }
}

