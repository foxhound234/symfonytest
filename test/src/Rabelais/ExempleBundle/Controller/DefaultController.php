<?php

namespace Rabelais\ExempleBundle\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;



use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('RabelaisExempleBundle:Default:index.html.twig', array('name' => $name));
    }
    
    

    public function contactAction(Request $request)

    {

        // creation du formulaire

        $defaultData = array('message' => 'Entrez votre message ici');

        $form = $this->createFormBuilder($defaultData)

            ->add('name', 'text')

            ->add('email', 'email')

            ->add('message', 'textarea')

            ->add('Envoyer', 'submit')

            ->getForm();

        // FIN creation du formulaire

        // Traitement du formulaire

        if ($request->isMethod('POST')) {

            $form->bind($request);

            // données récupérées dans $data, tableau associatif

            // avec les entrées "name", "email", et "message"

            $data = $form->getData();

           // injection des données récupérées depuis le formulaire, $data, dans la vue contactsaisi,

            // et chargement de cette vue
            return $this->render('RabelaisExempleBundle:Default:contactsaisi.html.twig', array('data' => $data)); 

        }
        // Injection, chargement de la vue pour affichage du formulaire
        return $this->render('RabelaisExempleBundle:Default:saisiecontact.html.twig', array('form' => $form->createView()));
    } // FIN contactAction

}
