<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Repository\ContactRepository;
use App\Service\ContactSessionManager;
use App\Service\IModelManager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class ContactsController extends Controller
{
    /**
     * @Route("/contacts", name="contacts")
     */
    public function index(ContactRepository $session)
    {
        $contacts = $session->getAll();
        return $this->render("contacts/listeContacts.html.twig",["contacts"=>$contacts]);

    }


    /**
     * @Route("/contacts/new", name="contacts/new")
     */
    public function newContact(ContactRepository $session)
    {
        //BDD
        $contact = new Contact();
        return $this->render("contacts/listeContacts.html.twig",["contacts"=>$contact]);

        /*
        // SESSION
        $contact = new Contact();
        return $this->render("contacts/newContact.html.twig",["contact" => $contact]);
        */
    }

    /**
     * @Route("/contacts/edit/{index}")
     */
    public function editContact($index=1,ContactRepository $session)
    {
        $contact = $session->get($index);
        return $this->render("contacts/editContacts.html.twig",["contact" => $contact,"index" => $index]);
    }

    /**
     * @Route("/contacts/display/{index}")
     */
    public function afficherContact($index=1,ContactRepository $session)
    {
        $contact = $session->get($index);
        return $this->render("contacts/afficherContacts.html.twig",["contact" => $contact,"index" => $index]);
    }

    /**
     * @Route("/contacts/search")
     */
    public function rechercherContacts(Request $request ,ContactRepository $session)
    {
        $selected = [];
        $recherche = $request->get("value");
        $n = -1;
        for ($i = 0; $i < $session->size();$i++){
            if($session->get($i)->getNom() == $recherche){
                $selected[$n++] = $session->get($i);
            }
        }
        return $this->render("contacts/listeContacts.html.twig",["contacts"=>$selected]);
    }

    /**
     * @Route("/contacts/update")
     */
    public function updateContact(Request $request ,ContactRepository $session)
    {

        $nom = $request->get("nom");
        $prenom = $request->get("prenom");
        $email = $request->get("email");
        $tel = $request->get("tel");
        $mobile = $request->get("mobile");
        $index = $request->get("index");
        if($index == "-1"){
            $contact = new Contact();
            $contact->setNom($nom);
            $contact->setPrenom($prenom);
            $contact->setEmail($email);
            $contact->setTel($tel);
            $contact->setMobile($mobile);
            $session->insert($contact);
            return $this->redirect("/contacts");
        }else{
            $contact = $session->get($index);
            $contact->setNom($nom);
            $contact->setPrenom($prenom);
            $contact->setEmail($email);
            $contact->setTel($tel);
            $contact->setMobile($mobile);
            return $this->redirect("/contacts");
        }
    }
}
