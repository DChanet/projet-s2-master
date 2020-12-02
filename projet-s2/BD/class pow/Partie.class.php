<?php
require_once 'musique.class.php';
class partie
{


    private $Nomjoueur; #string

    private $score; #int

    private $musique; #musique

    private $idPartie; #int



    public static function createFromId(int $id){
        $stmt = MyPDO::getInstance()->prepare(<<<SQL
        SELECT idPartie ,  NomJoueur , score
        FROM Partie
        where idPartie = {$id}
SQL
        );

        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS , 'note');

        $atmt = MyPDO::getInstance()->prepare(<<<SQL
        SELECT idSon
        FROM Son
        where idSon = (SELECT idMusique
                            FROM Partie
                            where idPartie = {$id})
SQL
        );

        $atmt->execute();
        $m = $atmt->fetch;
        $musique = musique::createFromId($m['idSon']);


        if (($ligne = $stmt->fetch()) != false){
            $ligne->setMusique($musique);
            return $ligne;

        }
    }

    public static function enregistrer(){
        $stmt = MyPDO::getInstance()->prepare(<<<SQL
        insert into Note
        values {$this->idPartie} , {$this->Musique->getId()} , {$this->joueur} , {$this->score}
SQL
        );

        $stmt->execute();
    }

}
