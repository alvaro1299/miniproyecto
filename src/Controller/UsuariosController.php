<?php
// src/Controller/UsuariosController.php
namespace App\Controller;

use App\Entity\Usuario;
use App\Repository\RepositorioUsuarios;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UsuariosController extends AbstractController
{
    /**
     * @Route("/clientes/listado", name="clientes_listar")
     */
    public function listadoProductos(RepositorioUsuarios $RepositorioUsuarios): Response
    {
        $usuario = $RepositorioUsuarios->findBy([], ['nombre' => 'ASC']);
        return $this->render('Cliente/listado_usuarios.html.twig', [
            'usuarios' => $usuario]);
    }


    /**
     * @Route("/pedidos/listado/{id}", name="pedidos_con_id")
     */
    public function listadoPedidosEnlace(Usuario $usuario) : Response {
        $pedidos = $usuario->getPedidos();

        return $this->render('Pedidos/listado_pedidos.html.twig', [
            'usuario' => $usuario,
            'pedidos' => $pedidos
        ]);
    }
}