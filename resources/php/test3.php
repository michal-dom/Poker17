<?php
/**
 * Created by PhpStorm.
 * User: Michał Domagała
 * Date: 2017-11-25
 * Time: 17:04
 */


require_once ('data.base/TableBaseHandler.php');

require_once ('data.base/GameBaseHandler.php');

require_once ('generators/GameGenerator.php');

//$handler = new TableBaseHandler();
//
//$tables = $handler -> getAllEntities();
//
//echo $tables -> getByID(1);

$generator = new GameGenerator();

$handler = new GameBaseHandler();

$handler -> getEntity(1);

//echo sha1('zaq12wsx');