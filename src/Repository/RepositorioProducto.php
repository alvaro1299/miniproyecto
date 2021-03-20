<?php
// src/Repository/RepositorioProducto.php
namespace App\Repository;
use App\Entity\Producto;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class RepositorioProducto extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Producto::class);
    }
    public function guardar()
    {
        $this->getEntityManager()->flush();
    }

    public function nuevo() :   Producto
    {
        $producto = new Producto();
        $this->getEntityManager()->persist($producto);

        return $producto;
    }

    public function listarNombre(): array
    {
        return $this
            ->getEntityManager()
            ->createQuery("SELECT p FROM App\\Entity\\Producto p ORDER BY p.nombre ASC")
            ->getResult();
    }
}