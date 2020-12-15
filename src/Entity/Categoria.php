<?php


namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="categoria")
 */

class Categoria
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
     * @return Categoria
     */
    public function setNombre(string $nombre): Categoria
    {
        $this->nombre = $nombre;
        return $this;
    }
    /**
     * @ORM\ManyToMany(targetEntity="Producto", inversedBy="categorias")
     * @var Producto[]|Collection
     */
    private $productos;

    /**
     * @return Producto[]|Collection
     */
    public function getProductos()
    {
        return $this->productos;
    }

    /**
     * @param Producto[]|Collection $productos
     * @return Categoria
     */
    public function setProductos($productos)
    {
        $this->productos = $productos;
        return $this;
    }

}