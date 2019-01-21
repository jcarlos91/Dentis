<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UserDetail
 *
 * @ORM\Table(name="user_detail")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserDetailRepository")
 */
class UserDetail
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
     *
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * })
     */
    private $userId;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=255)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="apellido_paterno", type="string", length=255)
     */
    private $apellidoPaterno;

    /**
     * @var string
     *
     * @ORM\Column(name="apellido_materno", type="string", length=255)
     */
    private $apellidoMaterno;

    /**
     * @var string
     *
     * @ORM\Column(name="curp", type="string", length=255)
     */
    private $curp;

    /**
     * @var string
     *
     * @ORM\Column(name="nss", type="string", length=255)
     */
    private $nss;

    /**
     * @var string
     *
     * @ORM\Column(name="rfc", type="string", length=255)
     */
    private $rfc;

    /**
     * @var string
     *
     * @ORM\Column(name="telefono_casa", type="string", length=255)
     */
    private $telefonoCasa;

    /**
     * @var string
     *
     * @ORM\Column(name="telefono_celular", type="string", length=255)
     */
    private $telefonoCelular;

    /**
     * @var string
     *
     * @ORM\Column(name="calle", type="string", length=255)
     */
    private $calle;

    /**
     * @var int
     *
     * @ORM\Column(name="no_int", type="integer")
     */
    private $noInt;

    /**
     * @var int
     *
     * @ORM\Column(name="no_ext", type="integer")
     */
    private $noExt;

    /**
     * @var string
     *
     * @ORM\Column(name="colonia", type="string", length=255)
     */
    private $colonia;

    /**
     * @var string
     *
     * @ORM\Column(name="delegacion", type="string", length=255)
     */
    private $delegacion;

    /**
     * @var string
     *
     * @ORM\Column(name="municipio", type="string", length=255)
     */
    private $municipio;

    /**
     * @var string
     *
     * @ORM\Column(name="ciudad", type="string", length=255)
     */
    private $ciudad;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha_nacimiento", type="datetime")
     */
    private $fechaNacimiento;


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
     * Set userId
     *
     * @param \AppBundle\Entity\User $userId
     *
     * @return UserDetail
     */
    public function setUserId(\AppBundle\Entity\User $userId)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * Get userId
     *
     * @return \AppBundle\Entity\User
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return UserDetail
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set apellidoPaterno
     *
     * @param string $apellidoPaterno
     *
     * @return UserDetail
     */
    public function setApellidoPaterno($apellidoPaterno)
    {
        $this->apellidoPaterno = $apellidoPaterno;

        return $this;
    }

    /**
     * Get apellidoPaterno
     *
     * @return string
     */
    public function getApellidoPaterno()
    {
        return $this->apellidoPaterno;
    }

    /**
     * Set apellidoMaterno
     *
     * @param string $apellidoMaterno
     *
     * @return UserDetail
     */
    public function setApellidoMaterno($apellidoMaterno)
    {
        $this->apellidoMaterno = $apellidoMaterno;

        return $this;
    }

    /**
     * Get apellidoMaterno
     *
     * @return string
     */
    public function getApellidoMaterno()
    {
        return $this->apellidoMaterno;
    }

    /**
     * Set curp
     *
     * @param string $curp
     *
     * @return UserDetail
     */
    public function setCurp($curp)
    {
        $this->curp = $curp;

        return $this;
    }

    /**
     * Get curp
     *
     * @return string
     */
    public function getCurp()
    {
        return $this->curp;
    }

    /**
     * Set nss
     *
     * @param string $nss
     *
     * @return UserDetail
     */
    public function setNss($nss)
    {
        $this->nss = $nss;

        return $this;
    }

    /**
     * Get nss
     *
     * @return string
     */
    public function getNss()
    {
        return $this->nss;
    }

    /**
     * Set rfc
     *
     * @param string $rfc
     *
     * @return UserDetail
     */
    public function setRfc($rfc)
    {
        $this->rfc = $rfc;

        return $this;
    }

    /**
     * Get rfc
     *
     * @return string
     */
    public function getRfc()
    {
        return $this->rfc;
    }

    /**
     * Set telefonoCasa
     *
     * @param string $telefonoCasa
     *
     * @return UserDetail
     */
    public function setTelefonoCasa($telefonoCasa)
    {
        $this->telefonoCasa = $telefonoCasa;

        return $this;
    }

    /**
     * Get telefonoCasa
     *
     * @return string
     */
    public function getTelefonoCasa()
    {
        return $this->telefonoCasa;
    }

    /**
     * Set telefonoCelular
     *
     * @param string $telefonoCelular
     *
     * @return UserDetail
     */
    public function setTelefonoCelular($telefonoCelular)
    {
        $this->telefonoCelular = $telefonoCelular;

        return $this;
    }

    /**
     * Get telefonoCelular
     *
     * @return string
     */
    public function getTelefonoCelular()
    {
        return $this->telefonoCelular;
    }

    /**
     * Set calle
     *
     * @param string $calle
     *
     * @return UserDetail
     */
    public function setCalle($calle)
    {
        $this->calle = $calle;

        return $this;
    }

    /**
     * Get calle
     *
     * @return string
     */
    public function getCalle()
    {
        return $this->calle;
    }

    /**
     * Set noInt
     *
     * @param integer $noInt
     *
     * @return UserDetail
     */
    public function setNoInt($noInt)
    {
        $this->noInt = $noInt;

        return $this;
    }

    /**
     * Get noInt
     *
     * @return int
     */
    public function getNoInt()
    {
        return $this->noInt;
    }

    /**
     * Set noExt
     *
     * @param integer $noExt
     *
     * @return UserDetail
     */
    public function setNoExt($noExt)
    {
        $this->noExt = $noExt;

        return $this;
    }

    /**
     * Get noExt
     *
     * @return int
     */
    public function getNoExt()
    {
        return $this->noExt;
    }

    /**
     * Set colonia
     *
     * @param string $colonia
     *
     * @return UserDetail
     */
    public function setColonia($colonia)
    {
        $this->colonia = $colonia;

        return $this;
    }

    /**
     * Get colonia
     *
     * @return string
     */
    public function getColonia()
    {
        return $this->colonia;
    }

    /**
     * Set delegacion
     *
     * @param string $delegacion
     *
     * @return UserDetail
     */
    public function setDelegacion($delegacion)
    {
        $this->delegacion = $delegacion;

        return $this;
    }

    /**
     * Get delegacion
     *
     * @return string
     */
    public function getDelegacion()
    {
        return $this->delegacion;
    }

    /**
     * Set municipio
     *
     * @param string $municipio
     *
     * @return UserDetail
     */
    public function setMunicipio($municipio)
    {
        $this->municipio = $municipio;

        return $this;
    }

    /**
     * Get municipio
     *
     * @return string
     */
    public function getMunicipio()
    {
        return $this->municipio;
    }

    /**
     * Set ciudad
     *
     * @param string $ciudad
     *
     * @return UserDetail
     */
    public function setCiudad($ciudad)
    {
        $this->ciudad = $ciudad;

        return $this;
    }

    /**
     * Get ciudad
     *
     * @return string
     */
    public function getCiudad()
    {
        return $this->ciudad;
    }

    /**
     * Set fechaNaciento
     *
     * @param \DateTime $fechaNacimiento
     *
     * @return UserDetail
     */
    public function setFechaNaciento($fechaNacimiento)
    {
        $this->fechaNacimiento = $fechaNacimiento;

        return $this;
    }

    /**
     * Get fechaNaciento
     *
     * @return \DateTime
     */
    public function getFechaNaciento()
    {
        return $this->fechaNacimiento;
    }

    public function __toString()
    {
        return $this->nombre ." " . $this->apellidoPaterno . " ". $this->apellidoMaterno;
    }
}

