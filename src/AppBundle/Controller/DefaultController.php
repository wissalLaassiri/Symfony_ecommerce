<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {


        $em = $this->getDoctrine()->getManager();

        $produits = $em->getRepository('AppBundle:Produit')->findBy(array('publier'=>1));


        // replace this example code with whatever you need
        return $this->render('default/index.html.twig',array('list_produits'=>$produits));
    } 
     /**
     * @Route("/shop/{id}", name="shop")
     */
    public function shopAction(Request $request,$id=0)
    {


        $em = $this->getDoctrine()->getManager();

        $produit = $em->getRepository('AppBundle:Produit')->findOneBy(array('publier'=>1,'id'=>$id));
        if($produit){ 
            // replace this example code with whatever you need
            return $this->render('default/shop.html.twig',array('produit_selected'=>$produit));

        }

        throw $this->createNotFoundException('The product does not exist');

    }
    /**
     * @Route("/bed", name="bed")
     */
    public function bedAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/bed.html.twig');
    }
    /**
     * @Route("/acc", name="acc")
     */
    public function accAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/acc.html.twig');
    }
       /**
     * @Route("/tab", name="tab")
     */
    public function tabAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/tab.html.twig');
    }
   /**
     * @Route("/cart", name="cart")
     */
    public function cartAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/cart.html.twig');
    }
    /**
     * @Route("/prod", name="prod")
     */
    public function prodAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/prod.html.twig');
    }
/**
     * @Route("/pop", name="pop")
     */
    public function popAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/pop.html.twig');
    }

    /**
     * @Route("/chek", name="chek")
     */
    public function chekAction(Request $request)
    {   
        $Firstname = $LastName = $Email = $Contry = $Address = NULL;
        $form = $this->createFormBuilder()
        ->add('Firstname')
        ->add('LastName')
        ->add('Email')
         ->add('Address')
         ->add('Contry',ChoiceType::class,array('choices'=>array(
                                                ''=>null,
                                                'United States'=>"United States",
                                                'United Kingdom'=>"United Kingdom",
                                                'Germany'=>"Germany",
                                                'France'=>"France",
                                                'India'=>"India",
                                                'Australia'=>"Australia")))
        ->add('send',SubmitType::class ,array('label'=>'Checkout'))
        ->getForm();

        $form->handleRequest($request);
        if ($form->isValid()){
            $Firstname= $form["Firstname"]->getData();
            $LastName = $form["LastName"]->getData();
            $Email = $form["Email"]->getData();
            $Contry = $form["Contry"]->getData();
            $Address = $form["Address"]->getData();
        }

        // replace this example code with whatever you need
        return $this->render('default/chek.html.twig',array(
                                        'form' => $form->createView(),
                                        'Firstname'=>$Firstname,
                                        'LastName'=>$LastName,
                                        'Email'=>$Email,
                                        'Contry'=>$Contry,
                                        'Address'=>$Address));
    }





}
