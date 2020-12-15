<?php


namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="pedido")
 */

class Pedido
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     * @var int
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     * @var string
     */
    private $nombre;

    /**
     * @ORM\Column(type="boolean")
     * @var boolean
     */
    private $cerrado;


    /**
     * @ORM\Column(type="date")
     * @var date
     */
    private $fechaPedido;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getNombre(): string
    {
        return $this->nombre;
    }

    /**
     * @param string $nombre
     * @return Pedido
     */
    public function setNombre(string $nombre): Pedido
    {
        $this->nombre = $nombre;
        return $this;
    }

    /**
     * @return bool
     */
    public function isCerrado(): bool
    {
        return $this->cerrado;
    }

    /**
     * @param bool $cerrado
     * @return Pedido
     */
    public function setCerrado(bool $cerrado): Pedido
    {
        $this->cerrado = $cerrado;
        return $this;
    }

    /**
     * @return date
     */
    public function getFechaPedido(): date
    {
        return $this->fechaPedido;
    }

    /**
     * @param date $fechaPedido
     * @return Pedido
     */
    public function setFechaPedido(date $fechaPedido): Pedido
    {
        $this->fechaPedido = $fechaPedido;
        return $this;
    }

    /**
     * @ORM\ManyToOne(targetEntity="Usuario", inversedBy="pedidos")
     * @ORM\JoinColumn(nullable=false)
     * @var Usuario
     */
    private $cliente;
}