<?php
/**
 * Created by PhpStorm.
 * User: Michał Domagała
 * Date: 2018-01-08
 * Time: 19:41
 */


$stmt;
   try
   {
       $pdo = new PDO('mysql:host=localhost;dbname=poker', 'root', '');
       $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//       $stmt = $pdo->query('CREATE VIEW deck_00 AS * FROM cards');
//       $stmt = $pdo->query('CREATE VIEW deck_00 AS * FROM cards');
       $stmt = $pdo->prepare("CREATE VIEW deck_00 AS * FROM cards");
       $stmt = $pdo->query('SELECT * FROM deck_00');
   }
   catch(PDOException $e)
   {
       echo 'Połączenie nie mogło zostać utworzone: ' . $e->getMessage();
   }


?>