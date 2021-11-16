<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;

class SymfonyController
{
    public function Main()
    {
        return new Response("Bonjour");
    }
}

