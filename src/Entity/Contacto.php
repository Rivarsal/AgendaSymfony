<?php

namespace App\Entity;

use App\Repository\ContactoRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=ContactoRepository::class)
 */
class Contacto
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     */
    private $Nombre;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     */
    private $Apellido;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     * @Assert\Regex("/^\+?\d+/")
     */
    private $Telefono;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
    
     */
    private $Correo;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Tipo;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     */
    private $Notas;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->Nombre;
    }

    public function setNombre(string $Nombre): self
    {
        $this->Nombre = $Nombre;

        return $this;
    }

    public function getApellido(): ?string
    {
        return $this->Apellido;
    }

    public function setApellido(string $Apellido): self
    {
        $this->Apellido = $Apellido;

        return $this;
    }

    public function getTelefono(): ?string
    {
        return $this->Telefono;
    }

    public function setTelefono(string $Telefono): self
    {
        $this->Telefono = $Telefono;

        return $this;
    }

    public function getCorreo(): ?string
    {
        return $this->Correo;
    }

    public function setCorreo(string $Correo): self
    {
        $this->Correo = $Correo;

        return $this;
    }

    public function getTipo(): ?string
    {
        return $this->Tipo;
    }

    public function setTipo(string $Tipo): self
    {
        $this->Tipo = $Tipo;

        return $this;
    }

    public function getNotas(): ?string
    {
        return $this->Notas;
    }

    public function setNotas(string $Notas): self
    {
        $this->Notas = $Notas;

        return $this;
    }
}
