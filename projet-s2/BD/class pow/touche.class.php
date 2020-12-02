<?php
require_once 'Son.class.php';
class touche
{


    private $son; #int

    private $Touche; #int

    private $launchpad; #int



    public function createFromId(int $idLaunchpad , int $Touche)
    {
        $stmt = MyPDO::getInstance()->prepare(<<<SQL
        SELECT *
        FROM Construire
        where id = {$idLaunchpad} and N°Touche = {$Touche}
SQL
        );

        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'touche');

        if (($ligne = $stmt->fetch()) != false) {
            return $ligne;


        }
    }

        public function enregistrer(){
            $stmt = MyPDO::getInstance()->prepare(<<<SQL
            insert into construire
            values {$this->launchpad} , {$this->son} {$this->Touche}
SQL
            );

            $stmt->execute();
    }
}
