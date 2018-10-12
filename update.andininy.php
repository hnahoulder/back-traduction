<?php
/**
 * Created by PhpStorm.
 * User: hambalaye
 * Date: 19/09/2018
 * Time: 23:30
 */
header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json; charset=UTF-8");
header('Access-Control-Allow-Headers: X-Requested-With, content-type, access-control-allow-origin, access-control-allow-methods, access-control-allow-headers');

include_once 'config/dbclass.php';
include_once 'fihirana.class.php';
$postdata = file_get_contents("php://input");
$request = json_decode($postdata, true);
//echo json_encode($request);

$dbclass = new DBClass();
$connection = $dbclass->getConnection();

$fihirana = new Fihirana($connection);
$stmt = $fihirana->update($request);

?>