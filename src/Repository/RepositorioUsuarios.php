<?php
// src/Repository/RepositorioUsuarios.php
namespace App\Repository;
use App\Entity\Usuario;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class RepositorioUsuarios extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Usuario::class);
    }

    public function listarUsuario(): array
    {
        return $this
            ->getEntityManager()
            ->createQuery("SELECT u FROM App\\Entity\\Usuario u")
            ->getResult();
    }
}