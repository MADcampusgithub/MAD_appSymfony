<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController; 

class TwigController extends AbstractController
{
    public function If(Request $request)
    {
        return $this->render("twigif.html.twig", ["var1" => "VaRiAbLe1", "var2" => "SeCoNdEVaRiAbLe"]);
    }

    public function For(Request $request)
    {
        return $this->render("twigfor.html.twig", ["listDevoirs" => ["DM Maths", "Synthèse Ang"]]);
    }

    public function Set(Request $request)
    {
        return $this->render("twigset.html.twig");
    }
}
?>