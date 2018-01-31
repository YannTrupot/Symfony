<?php
/**
 * Created by PhpStorm.
 * User: Yann
 * Date: 31/01/2018
 * Time: 09:15
 */

namespace App\Model;


class Contact
{
    private $nom;
    private $prenom;
    private $email;
    private $tel;
    private $mobile;

    public function __construct()
    {
        $this->nom="SMITH";
    }

    public function getNom(){
        return $this->nom;
    }

}