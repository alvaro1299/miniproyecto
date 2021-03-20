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
     * Pedido constructor.
     * @param Producto[]|Collection $productos
     */
    public function __construct($productos)
    {
        $this->productos = $productos;
    }

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
     * @return \DateTime
     */
    public function getFechaPedido(): ?\Datetime
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

    /**
     * @ORM\ManyToMany(targetEntity="Producto", inversedBy="pedidos")
     * @var Producto[]|Collection
     */
    private $productos;

    /**
     * @return Usuario
     */
    public function getCliente(): Usuario
    {
        return $this->cliente;
    }

    /**
     * @param Usuario $cliente
     * @return Pedido
     */
    public function setCliente(Usuario $cliente): Pedido
    {
        $this->cliente = $cliente;
        return $this;
    }

    /**
     * @return Producto[]|Collection
     */
    public function getProductos()
    {
        return $this->productos;
    }

    /**
     * @param Producto[]|Collection $productos
     * @return Pedido
     */
    public function setProductos($productos)
    {
        $this->productos = $productos;
        return $this;
    }
}