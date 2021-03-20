<?php
// src/Repository/RepositorioPedidos.php
namespace App\Repository;
use App\Entity\Pedido;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class RepositorioPedidos extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Pedido::class);
    }

    public function listarPedido(): array
    {
        return $this
            ->getEntityManager()
            ->createQuery("SELECT p FROM App\\Entity\\Pedidos p")
            ->getResult();
    }
}