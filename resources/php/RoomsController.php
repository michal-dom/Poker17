<?php
/**
 * Created by PhpStorm.
 * User: Michał Domagała
 * Date: 2017-12-05
 * Time: 10:16
 */

require_once ('data.base/TableBaseHandler.php');
//require_once ('data.base/GameBaseHandler.php');
require_once ('generators/GameGenerator.php');
require_once ('entities/Table.php');
//
$handler = new TableBaseHandler();
$gameHandler = new GameBaseHandler();
$generator = new GameGenerator();

$tables = $handler -> getAllEntities();

if(isset($_POST['opt'])) {

    if ($_POST['opt'] == 0) {
        echo json_encode($tables ->getAllJSON());
    }

    if ($_POST['opt'] == 1) {
        $game = $generator->getGame($_POST['room']);
        if($game){
            echo $game->getJSON();
        }else{
            echo json_encode(array('active' => false));
        }
    }

}