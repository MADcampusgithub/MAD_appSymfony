<?php
namespace App\Controller;

use App\Entity\NouvUtilisateur;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\UserType;

class UserController extends AbstractController
{
    /**
     * @Route("utilisateur")
     */
    function CreateUserForm(Request $request) : Response
    {
        $user = new NouvUtilisateur();

        /* createFormBuilder de AbstractController avec une paramètre = une instance d'une classe de données */
        $form = $this->createForm(UserType::class, $user);

        /* $form inspecte la requête */
        $form->handleRequest($request);

        if ($form->IsSubmitted() && $form->IsValid())
        {
            /* Récupération d'un objet contenant les valeurs saisies dans le formulaire */
            $userInfos = $form->getData();
            /* Création d'un objet $entityManager qui va s'occuper de toutes nos entités et permet les intéractions entre entités et bases de données */
            $entityManager = $this->getDoctrine()->getManager();
            /* Demande à l'entityManager de faire persister l'objet que l'on vient de créer, $userInfos : La méthode persist prépare l'opération */
            $entityManager->persist($userInfos);
            /* Demande d'exécution de l'opération par la méthode flush */
            $entityManager->flush();
            return new Response("Le formaulaire est valide");
        }

        /* renvoie une vue grace a un twig */
        return $this->render("twigform.html.twig", ["userForm" => $form->createView()]);
    }
}
?>