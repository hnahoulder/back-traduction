<?php
/**
 * Created by PhpStorm.
 * User: hambalaye
 * Date: 19/09/2018
 * Time: 23:25
 */

class Fihirana{

    // Connection instance
    private $connection;

    // table name
    private $table_name = "fand_hira";

    // table columns
//    public $id;
//    public $laharana;
//    public $andininy;
//    public $texte;
//    public $created;


    public function __construct($connection){
        $this->connection = $connection;
    }

    //C
    public function create(){
    }
    //R
    public function read(){
        $query = "SELECT id, laharana, andininy, texte FROM `fand_hira` WHERE id>=1 ";

        $stmt = $this->connection->prepare($query);

        $stmt->execute();

        return $stmt;
    }
    //U
    public function update(){}
    //D
    public function delete(){}
}