<?php

namespace App\Entity;

use App\Repository\AntHeredofamiliaresRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AntHeredofamiliaresRepository::class)
 */
class AntHeredofamiliares
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;


    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Patologia;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Parentesco;

    /**
     * @ORM\ManyToOne(targetEntity=Pacientes::class, inversedBy="antHeredofamiliares")
     * @ORM\JoinColumn(nullable=false)
     */
    private $pacientes;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $descripcion;

    /**
     * @ORM\ManyToOne(targetEntity=Consulta::class, inversedBy="antHeredofamiliares")
     * @ORM\JoinColumn(nullable=true)
     */
    private $consulta;


    public function getId(): ?int
    {
        return $this->id;
    }


    public function getPatologia(): ?string
    {
        return $this->Patologia;
    }

    public function setPatologia(string $Patologia): self
    {
        $this->Patologia = strtoupper ($Patologia);

        return $this;
    }

    public function getParentesco(): ?string
    {
        return $this->Parentesco;
    }

    public function setParentesco(string $Parentesco): self
    {
        $this->Parentesco = strtoupper($Parentesco);

        return $this;
    }

    public function getPacientes(): ?Pacientes
    {
        return $this->pacientes;
    }

    public function setPacientes(?Pacientes $pacientes): self
    {
        $this->pacientes = $pacientes;

        return $this;
    }

    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    public function setDescripcion(?string $descripcion): self
    {
        $this->descripcion = strtoupper($descripcion) ;

        return $this;
    }

    public function getConsulta(): ?Consulta
    {
        return $this->consulta;
    }

    public function setConsulta(?Consulta $consulta): self
    {
        $this->consulta = $consulta;

        return $this;
    }

}
