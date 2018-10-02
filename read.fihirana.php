<?php
/**
 * Created by PhpStorm.
 * User: hambalaye
 * Date: 19/09/2018
 * Time: 23:30
 */
header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json; charset=UTF-8");

include_once 'config/dbclass.php';
include_once 'fihirana.class.php';

$dbclass = new DBClass();
$connection = $dbclass->getConnection();

$fihirana = new Fihirana($connection);

$stmt = $fihirana->read();
$count = $stmt->rowCount();


if ($count > 0) {


    $products = array();
    $products["body"] = array();
    $products["count"] = $count;

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $p = array(
            "id" => $id,
            "laharana" => $laharana,
            "andininy" => $andininy,
            "texte" => $texte,
            "type" => $type
        );

        array_push($products["body"], $p);
    }

    echo json_encode($products);
} else {

    echo json_encode(array("body" => array(), "count" => 0));

}
?>