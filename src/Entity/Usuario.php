<?php


namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity
 * @ORM\Table(name="usuario")
 */

class Usuario implements UserInterface
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
     * @ORM\Column(type="string")
     * @var string
     */
    private $apellidos;

    /**
     * @ORM\Column(type="string", unique=true)
     * @var string
     */
    private $dni;

    /**
     * Usuario constructor.
     * @param Pedido[]|Collection $pedidos
     */
    public function __construct()
    {
        $this->pedidos = new ArrayCollection();
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
     * @ORM\Column(type="string")
     * @var string
     */
    private $codigo;

    /**
     * @return string
     */
    public function getCodigo(): string
    {
        return $this->codigo;
    }

    /**
     * @param string $codigo
     * @return Usuario
     */
    public function setCodigo(string $codigo): Usuario
    {
        $this->codigo = $codigo;
        return $this;
    }

    /**
     * @param string $nombre
     * @return Usuario
     */
    public function setNombre(string $nombre): Usuario
    {
        $this->nombre = $nombre;
        return $this;
    }

    /**
     * @return string
     */
    public function getApellidos(): string
    {
        return $this->apellidos;
    }

    /**
     * @param string $apellidos
     * @return Usuario
     */
    public function setApellidos(string $apellidos): Usuario
    {
        $this->apellidos = $apellidos;
        return $this;
    }

    /**
     * @return string
     */
    public function getDni(): string
    {
        return $this->dni;
    }

    /**
     * @param string $dni
     * @return Usuario
     */
    public function setDni(string $dni): Usuario
    {
        $this->dni = $dni;
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
     * @return Usuario
     */
    public function setPedidos($pedidos)
    {
        $this->pedidos = $pedidos;
        return $this;
    }

    /**
     * @ORM\OneToMany(targetEntity="Pedido", mappedBy="cliente")
     * @var Pedido[]|Collection
     */
    private $pedidos;

    public function getRoles()
    {
        $roles = ['ROLE_USER'];

        return $roles;
    }

    public function getPassword()
    {
        return $this->codigo;
    }

    public function getSalt()
    {
        return null;
    }

    public function getUsername()
    {
        return $this->getId();
    }

    public function eraseCredentials()
    {
    }

}