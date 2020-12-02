<?php
class son
{


    private $lien; #string

    private $titre ;#string


    private $durée; #int


    private $idSon;


    public static function createFromId(int $id){
        $stmt = MyPDO::getInstance()->prepare(<<<SQL
        SELECT *
        FROM Son
        where idSon = {$id}
SQL
        );

        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS , 'son');

        if (($ligne = $stmt->fetch()) != false){
            return $ligne;

        }
    }


    public static function enregistrer(int $idMusique){
        $stmt = MyPDO::getInstance()->prepare(<<<SQL
        insert into Son
        values {$idSon} , {$this->lien} , {$this->nom} {$this->durée}
SQL
        );

        $stmt->execute();
    }



}