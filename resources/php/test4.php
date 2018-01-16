<?php
/**
 * Created by PhpStorm.
 * User: Michał Domagała
 * Date: 2017-12-03
 * Time: 13:17
 */

//require ('data.base/DeckGenerator.php');

//$handler = new TableBaseHandler();
//
//$tables = $handler -> getAllEntities();

//error_log("test!", 0);
//
//require_once ('data.base/SetBaseHandler.php');
//require_once ('generators/GameGenerator.php');
//
//$generator = new GameGenerator();
//
//echo $generator -> getGame(2);

//$handler = new SetBaseHandler();

//$pl_set = $handler -> getEntity(0);
//
//echo $pl_set;
//echo '<br>';
//echo $pl_set -> getFreeSpot();

session_start();
echo $_SESSION['last_active'];
echo '<br>';
echo $_SESSION['active_game'];
echo '<br>';




//
//$deck = new DeckGenerator();
//
//$deck-> createView(0);
//
//$deck->getCards();

