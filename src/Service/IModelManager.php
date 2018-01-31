<?php
/**
 * Created by PhpStorm.
 * User: Yann
 * Date: 31/01/2018
 * Time: 09:17
 */

namespace App\Service;


interface IModelManager
{

    public function getAll();

    public function insert($object);

    public function update($object,$value);

    public function delete($indexes);

    public function get($index);

    public function filterBy($keyAndValues);

    public function count();

    public function select($indexes);

}