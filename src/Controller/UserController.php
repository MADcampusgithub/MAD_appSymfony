<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use App\Form\UserType;

class UserController extends AbstractController
{
    /**
     * @Route("form")
     */
    function CreateUserForm(Request $request) : Response
    {
        $user = new User();

        /* createFormBuilder de AbstractController avec une paramètre = une instance d'une classe de données */
        $form = $this->createForm(UserType::class, $user);

        /* $form inspecte la requête */
        $form->handleRequest($request);

        if ($form->IsSubmitted() && $form->IsValid())
        {
            return new Response("Le formaulaire est valide");
        }

        /* renvoie une vue grace a un twig */
        return $this->render("twigform.html.twig", ["userForm" => $form->createView()]);
    }
}
?>