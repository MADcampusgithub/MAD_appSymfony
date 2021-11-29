<?php
namespace App\Entity;

class User 
{
    protected $nom;
    protected $email;
    protected $date;

    public function GetNom()
    {
        return $this->nom;
    }

    public function SetNom($nom)
    {
        $this->nom = $nom;
    }

    public function GetEmail()
    {
        return $this->email;
    }

    public function SetEmail($email)
    {
        $this->email = $email;
    }

    public function GetDate()
    {
        return $this->date;
    }

    public function SetDate($date)
    {
        $this->date = $date;
    }
}
?>