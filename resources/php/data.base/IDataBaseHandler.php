<?php
/**
 * Created by PhpStorm.
 * User: Michał Domagała
 * Date: 2017-11-17
 * Time: 17:00
 */

interface IDataBaseHandler{


    public function getAllEntities();
    public function getEntity($what);

    public function setEntity(Entity $entity);

    public function modifyEntity(Entity $entity);
}