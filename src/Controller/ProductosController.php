<?php
// src/Controller/ProductosController.php
namespace App\Controller;

use App\Entity\Producto;
use App\Form\ProductoModificarType;
use App\Form\ProductoNuevoType;
use App\Repository\RepositorioProducto;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductosController extends AbstractController
{
    /**
     * @Route("/productos/eliminar/{id}", name="producto_eliminar")
     */
    public function eliminar(Request $request, Producto $producto) : Response {
        if ($request->request->has('confirmar')) {
            $this->getDoctrine()->getManager()->remove($producto);
            $this->getDoctrine()->getManager()->flush();
            return $this->redirectToRoute('productos_listar');
        }

        return $this->render('Productos/eliminar_productos.html.twig', [
            'producto' => $producto
        ]);
    }


    /**
     * @Route("/producto/nuevo", name="producto_nuevo")
     **/
    public function nuevoProducto(Request $request, RepositorioProducto $repositorioProducto) : Response
    {
        $producto = $repositorioProducto->nuevo();
        $form = $this->createForm(ProductoNuevoType::class, $producto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            try{
                $repositorioProducto->guardar();
                $this->addFlash('exito', 'Producto creado con éxito');
                return $this->redirectToRoute('productos_listar');
            } catch (\Exception $e) {
                $this->addFlash('error', '¡Ocurrió un error al crear el producto!');
            }
        }
        return $this->render('Productos/nuevo_producto.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/producto/{id}", name="producto_modificar")
     */
    public function modificarProducto(Request $request, Producto $producto, RepositorioProducto $repositorioProducto) : Response
    {
        $form = $this->createForm(ProductoModificarType::class, $producto);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            try{
                $repositorioProducto->guardar();
                $this->addFlash('exito', 'Cambios guardados con éxito');
                return $this->redirectToRoute('productos_listar');
            } catch (\Exception $e) {
                $this->addFlash('error', '¡Ocurrió un error al guardar los cambios!');
            }
        }
        return $this->render('Productos/modificar_productos.html.twig',
            ['form' => $form->createView()
            ]);
    }


    /**
     * @Route("/productos/listado", name="productos_listar")
     */
    public function listadoProductos(RepositorioProducto $RepositorioProductos): Response
    {
        $producto = $RepositorioProductos->findBy([], ['nombre' => 'ASC']);
        return $this->render('Productos/listado_productos.html.twig', [
            'productos' => $producto]);
    }
}