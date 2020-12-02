<?php
require_once 'touche.class.php';
class launchPad{


    private $nom ; #string
    private $id ; #int


    public static function createFromId(int $id){
        $stmt = MyPDO::getInstance()->prepare(<<<SQL
        SELECT *
        FROM launchpad
        where id = {$id}
SQL
        );

        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS , 'launchpad');

        if (($ligne = $stmt->fetch()) != false){
            return $ligne;


        }
    }
    public static function enregistrer(){
        $stmt = MyPDO::getInstance()->prepare(<<<SQL
        insert into launchpad
        values {$this->id} , $this->nom}
SQL
        );

        $stmt->execute();
    }


}
