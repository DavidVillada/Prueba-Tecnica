<?php

namespace App\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

/**
 * Alquiler
 *
 * @ORM\Table(name="alquiler")
 * @ORM\Entity
 */
class Alquiler
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
     * @var int
     *
     * @ORM\Column(name="usuario_id", type="integer", nullable=false)
     */
    private $usuarioId;

    /**
     * @var int
     *
     * @ORM\Column(name="pelicula_id", type="integer", nullable=false)
     */
    private $peliculaId;

    /**
     * @var int
     *
     * @ORM\Column(name="valorTotal", type="integer", nullable=false)
     */
    private $valortotal;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechaInicio", type="date", nullable=false)
     */
    private $fechainicio;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechaFin", type="date", nullable=false)
     */
    private $fechafin;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsuarioId(): ?int
    {
        return $this->usuarioId;
    }

    public function setUsuarioId(int $usuarioId): self
    {
        $this->usuarioId = $usuarioId;

        return $this;
    }

    public function getPeliculaId(): ?int
    {
        return $this->peliculaId;
    }

    public function setPeliculaId(int $peliculaId): self
    {
        $this->peliculaId = $peliculaId;

        return $this;
    }

    public function getValortotal(): ?int
    {
        return $this->valortotal;
    }

    public function setValortotal(int $valortotal): self
    {
        $this->valortotal = $valortotal;

        return $this;
    }

    public function getFechainicio(): ?\DateTimeInterface
    {
        return $this->fechainicio;
    }

    public function setFechainicio(\DateTimeInterface $fechainicio): self
    {
        $this->fechainicio = $fechainicio;

        return $this;
    }

    public function getFechafin(): ?\DateTimeInterface
    {
        return $this->fechafin;
    }

    public function setFechafin(\DateTimeInterface $fechafin): self
    {
        $this->fechafin = $fechafin;

        return $this;
    }


}
