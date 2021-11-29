<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class SymfonyController extends AbstractController
{
    /**
     * @Route("bonjour/{request}", requirements = {"parametre"="\d+"}, methods={"GET"})
     */
    public function BonjourNombre($request)
    {
        $message = "Bonjour " . $request;
        // Declaration et initialisation de $titre
        $titre = "Liste des utilisateurs - Accès via un nombre";
        // Déclaration et initialisation du tableau stockant une liste d'utilisateur
        $listeUtilisateur = ["Jean", "Pierre", "Louis", "Olivier"];
        // Appel de la méthode render avec deux parametre le titre et le array
        return $this->render("bonjour.html.twig", ["message" => $message, "titre" => $titre, "array" => $listeUtilisateur]);
    }

    /**
     * @Route("bonjour/{request}")
     */
    public function BonjourDefault($request)
    {
        $message = "Bonjour " . $request;
        // Declaration et initialisation de $titre
        $titre = "Liste des utilisateurs - Accès via une chaine de caractères";
        // Déclaration et initialisation du tableau stockant une liste d'utilisateur
        $listeUtilisateur = ["Jean", "Pierre", "Louis", "Olivier"];
        // Appel de la méthode render avec deux parametre le titre et le array
        return $this->render("bonjour.html.twig", ["message" => $message, "titre" => $titre, "array" => $listeUtilisateur]);
    }

    /**
     * @Route("bienvenue")
     */
    public function Bienvenue()
    {
        return $this->render("bienvenue.html.twig");
    }

    /**
     * @Route("bienvenue/{nom}", name="bienvenueAvecNom")
     */
    public function BienvenueAvecNom($nom) : Response
    {
        return new Response("Bienvenue " . $nom);
    }
}
?>

