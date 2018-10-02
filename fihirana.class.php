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
        $query = "SELECT id, laharana, andininy, CASE WHEN texte IS NULL THEN '' ELSE texte END AS texte, 0 AS type FROM `fand_hira` WHERE id>=1 AND laharana IN(1,2)
UNION SELECT id, laharana, andininy, CASE  WHEN texte_francais IS NULL THEN '' ELSE texte_francais END AS texte, 1 AS type FROM `fand_hira` WHERE id>=1 AND laharana IN(1,2)";

        $stmt = $this->connection->prepare($query);

        $stmt->execute();

        return $stmt;
    }
    //U
    public function update(){}
    //D
    public function delete(){}
}