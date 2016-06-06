<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Product;
use AppBundle\Form\ProductType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends Controller
{
    /**
     * @param Request $request
     *
     * @return Response
     *
     * @Route("/ProductAdd", name="productadd")
     */

    public function addProductAction(Request $request)
    {
    // Creation d'un product
    $product = new Product();
        //on récupère le formulaire
        $form = $this->createForm(ProductType::class,$product);

        //lien entre le contenu du formulaire et la requête passé lors de la soumission du formulaire
        $form->handleRequest($request);

        //verification de la soumission du formulaire et de sa validation
        if ($form->isSubmitted() && $form->isValid()) {

            //recuperation de l'entity manager de doctrine
            $em = $this->getDoctrine()->getManager();
            $em->persist($product);
            $em->flush();

            //on retourne une réponse simple
            return new response ('Product Added');

        }

        //generation du Html
        $formView = $form->createView();

        //on rend la vue
        return $this->render('default/productAdd.html.twig',array('form'=>$formView));
    }
}