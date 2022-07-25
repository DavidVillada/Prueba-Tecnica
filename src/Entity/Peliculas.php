<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * Peliculas
 *
 * @ORM\Table(name="peliculas")
 * @ORM\Entity
 */
class Peliculas
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=100, nullable=false)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="sinopsis", type="string", length=255, nullable=false)
     */
    private $sinopsis;

    /**
     * @var int
     *
     * @ORM\Column(name="precioUnitario", type="integer", nullable=false)
     */
    private $preciounitario;

    /**
     * @var string
     *
     * @ORM\Column(name="genero", type="string", length=255, nullable=false)
     */
    private $genero;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechaEstreno", type="date", nullable=false)
     */
    private $fechaestreno;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getSinopsis(): ?string
    {
        return $this->sinopsis;
    }

    public function setSinopsis(string $sinopsis): self
    {
        $this->sinopsis = $sinopsis;

        return $this;
    }

    public function getPreciounitario(): ?int
    {
        return $this->preciounitario;
    }

    public function setPreciounitario(int $preciounitario): self
    {
        $this->preciounitario = $preciounitario;

        return $this;
    }

    public function getGenero(): ?string
    {
        return $this->genero;
    }

    public function setGenero(string $genero): self
    {
        $this->genero = $genero;

        return $this;
    }

    public function getFechaestreno(): ?\DateTimeInterface
    {
        return $this->fechaestreno;
    }

    public function setFechaestreno(\DateTimeInterface $fechaestreno): self
    {
        $this->fechaestreno = $fechaestreno;

        return $this;
    }


}
