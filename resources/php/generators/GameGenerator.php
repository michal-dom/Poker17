<?php
/**
 * Created by PhpStorm.
 * User: Michał Domagała
 * Date: 2017-11-28
 * Time: 22:57
 */

require_once ("./data.base/GameBaseHandler.php");
require_once ("./data.base/SetBaseHandler.php");
require_once ("./data.base/TableBaseHandler.php");

class GameGenerator{

    private $game_handler;
    private $game;
    private $games;
    private $room;

    /**
     * GameGenerator constructor.
     */
    public function __construct()
    {
        $this->game_handler = new GameBaseHandler();
    }

    public function createGame(int $id_table): Game{
//        $this->game = new Game();
//        $this->game -> setTimeStart(time());
        $h = new TableBaseHandler();
        $r = $h->getEntity($id_table);
//        gmdate('Y-m-d h:i:s \G\M\T', time())
        $g = new Game(null, null, null, null, null);
        $this->game_handler->setEntity($g);

        return $g;
    }

    public function getGame(int $id_table) : Game{
//        $gameHandler = new GameBaseHandler();

        $game = $this->game_handler->getEntity($id_table);

        if ($game) {
            $id_game = $game->getID();
            $players_set_handler = new SetBaseHandler();
            $players_set = $players_set_handler->getEntity($id_game);


//            echo $players_set;
            if ($players_set->getFreeSpot() < 9) {

                session_start();
                $_SESSION['last_active'] = time();
                $_SESSION['active_game'] = $id_game;
                error_log("active_game: ".$id_game, 0);
                return $game;
            } else {
//                echo json_encode(array('active' => false));
                return null;
            }
        } else {
            $game = $this->createGame($id_table);
            return $game;
        }

    }

}