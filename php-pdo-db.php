<?php
try{
    $pdo = new PDO("mysql:host=127.0.0.1;dbname=DBNAME","USER","PASSWORD");
    
    } catch(PDOException $e) {
      echo "Verbindung mit der DB fehlgeschlagen";
      die();
}

$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//giving $param2 a default value if not provided by function-call
function select_data($param1, $param2="foo")
{
    global $pdo;
    $statement = $pdo->prepare("SELECT * FROM table WHERE x = :param1 AND y = :param2 ORDER BY x DESC");
    $statement->execute(array('param1' => $param1, 'param2' => $param2));
    $result= $statement->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

//giving $param2 a default value if not provided by function-call
function insert_data($param1, $param2="foo")
{
    global $pdo;
    $statement = $pdo->prepare("INSERT IGNOTE INTO `1`(`x`, `y`, `timestamp`) VALUES (:param1, :param2, NOW())");
    $result = $statement->execute(array('param1' => $param1, 'param2' => $param2));
    return $result;
}