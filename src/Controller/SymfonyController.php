<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController; 

class SymfonyController extends AbstractController
{
    public function Main(Request $request)
    {
        // Declaration et initialisation de $titre
        $titre = "Les parametres passé par l'url sont :";
        // Déclaration et initialisation du tableau stockant une liste d'utilisateur
        $listeUtilisateur = $request->query->All();
        
        // Appel de la méthode render avec deux parametre le titre et le array
        return $this->render("bonjour.html.twig", ["titre" => $titre, "array" => $listeUtilisateur]);
    }
}

