<?php

namespace App\Controller;

use App\Model\Contact;
use App\Service\ContactSessionManager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class ContactsController extends Controller
{
    /**
     * @Route("/contacts", name="contacts")
     */
    public function index(ContactSessionManager $session)
    {
        $session->insert(new Contact());
        return $this->render("index.html.twig");
    }

    /**
     * @Route("/contacts/new", name="contacts/new")
     */
    public function newContact(ContactSessionManager $session)
    {
        return $this->render("contacts/newContact.html.twig");
    }

    /**
     * @Route("/contacts/edit/{index}")
     */
    public function editContact($index=1,ContactSessionManager $session)
    {
        return $this->render("contacts/editContacts.html.twig",["index" => $index]);
    }
}
