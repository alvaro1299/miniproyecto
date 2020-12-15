<?php


namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="producto")
 */

class Producto
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
     * @ORM\Column(type="float")
     * @var float
     */
    private $precio;

    /**
     * @ORM\Column(type="string")
     * @var string
     */
    private $marca;

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
     * @return Producto
     */
    public function setNombre(string $nombre): Producto
    {
        $this->nombre = $nombre;
        return $this;
    }

    /**
     * @return float
     */
    public function getPrecio(): float
    {
        return $this->precio;
    }

    /**
     * @param float $precio
     * @return Producto
     */
    public function setPrecio(float $precio): Producto
    {
        $this->precio = $precio;
        return $this;
    }

    /**
     * @return string
     */
    public function getMarca(): string
    {
        return $this->marca;
    }

    /**
     * @param string $marca
     * @return Producto
     */
    public function setMarca(string $marca): Producto
    {
        $this->marca = $marca;
        return $this;
    }

    /**
     * @ORM\ManyToMany(targetEntity="Categoria", mappedBy="productos")
     * @var Categoria[]|Collection
     */
    private $categorias;

    /**
     * @ORM\ManyToMany(targetEntity="Pedido", mappedBy="productos")
     * @var Pedido[]|Collection
     */
    private $pedidos;

    /**
     * @return Categoria[]|Collection
     */
    public function getCategorias()
    {
        return $this->categorias;
    }

    /**
     * @param Categoria[]|Collection $categorias
     * @return Producto
     */
    public function setCategorias($categorias)
    {
        $this->categorias = $categorias;
        return $this;
    }

    /**
     * @return Pedido[]|Collection
     */
    public function getPedidos()
    {
        return $this->pedidos;
    }

    /**
     * @param Pedido[]|Collection $pedidos
     * @return Producto
     */
    public function setPedidos($pedidos)
    {
        $this->pedidos = $pedidos;
        return $this;
    }




}