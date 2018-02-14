<?php

namespace App\Repository;

use App\Entity\Contact;
use App\Service\IModelManager;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\NonUniqueResultException;
use Symfony\Bridge\Doctrine\RegistryInterface;

class ContactRepository extends ServiceEntityRepository implements IModelManager
{

    /*
    public function findBySomething($value)
    {
        return $this->createQueryBuilder('c')
            ->where('c.something = :value')->setParameter('value', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Contact::class);
    }

    public function getAll()
    {
        return $this->createQueryBuilder('c')
            ->orderBy('c.id', 'ASC')
            ->getQuery()
            ->getResult();
    }

    public function insert($object)
    {

    }

    public function update($object, $value)
    {
        return $this->createQueryBuilder('c')
            ->set('nom', $object->getNom())
            ->set('prenom', $object->getPrenom())
            ->set('tel', $object->getTel())
            ->set('email', $object->getEmail())
            ->set('mobile', $object->getMobile())
            ->where('c.id = :value')->setParameter('value', $object->id)
            ->getQuery()
            ->update();
    }

    public function delete($indexes)
    {
        $keys = array_map(function ($index){return 'id='.$index;},$indexes);
        $keys=implode(" or ",$indexes);
        $contacts = $this->findBy($keys);
        foreach ($contacts as $contact){
            $this->_em->remove($contact);
        }
    }

    public function get($index)
    {
        return $this->createQueryBuilder('c')
            ->where('c.something = :value')->setParameter('value', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
            ;
    }

    public function size(){
        return $this->count();
        /*try {
            return $this->createQueryBuilder('c')
                ->select('COUNT(c)')
                ->getQuery()
                ->getSingleScalarResult();
        }catch (NonUniqueResultException $e){
            return 0;
        }*/
    }

    public function filterBy($keyAndValues)
    {
        // TODO: Implement filterBy() method.
    }

    public function select($indexes)
    {
        // TODO: Implement select() method.
    }

}
