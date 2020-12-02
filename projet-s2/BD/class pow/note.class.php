<?php
require_once 'pastille.class.php';
class Note
{


    private $score; #int

    private $temps; #float

    private $Musique;#int

    private $idNote; #int




    public static function createFromId(int $id){
        $stmt = MyPDO::getInstance()->prepare(<<<SQL
        SELECT idNote , temps , score
        FROM Note
        where idNote = {$id}
SQL
        );



        if (($ligne = $stmt->fetch()) != false){
            return $ligne;

        }
    }

    public static function enregistrer(int $idMusique){
        $stmt = MyPDO::getInstance()->prepare(<<<SQL
        insert into Note 
        values {$this->idNote} ,{$this->Musique} , {$this->temps} , {$this->score}
SQL
            );

        $stmt->execute();
    }

}




