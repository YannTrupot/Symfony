<?php
/**
 * Created by PhpStorm.
 * User: Yann
 * Date: 31/01/2018
 * Time: 09:16
 */

namespace App\Service;


use Symfony\Component\HttpFoundation\Session\SessionInterface;

class ContactSessionManager implements IModelManager
{

    const KEY = 'contacts';

    private $session;

    public function __construct(SessionInterface $session)
    {
        $this->session = $session;
    }

    public function updateSession($values){
        $this->session->set(self::KEY,$values);
    }

    public function getAll()
    {
        return $this->session->get(self::KEY,[]);
    }

    public function insert($object)
    {
        $contacts = $this->getAll();
        $contacts[]=$object;
        $this->updateSession($contacts);

    }

    public function update($object, $value)
    {
        // TODO: Implement update() method.
    }

    public function delete($indexes)
    {
        // TODO: Implement delete() method.
    }

    public function get($index)
    {
        // TODO: Implement get() method.
    }

    public function filterBy($keyAndValues)
    {
        // TODO: Implement filterBy() method.
    }

    public function count()
    {
        // TODO: Implement count() method.
    }

    public function select($indexes)
    {
        // TODO: Implement select() method.
    }

}