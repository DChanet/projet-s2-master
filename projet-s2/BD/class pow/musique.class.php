<?php
require_once 'note.class.php';
require_once 'Son.class.php';
class Musique extends son
{


    private $Notes; #array


    public static function createFromId(int $id){
       $ligne = parent::createFromId($id);

        $atmt = MyPDO::getInstance()->prepare(<<<SQL
        SELECT idNote
        FROM Note
        where idSon = {$id}
SQL
        );

        $atmt->execute();
        $Notes = $atmt->fetch();




        if ($ligne != false){
            foreach($Notes as $key) {
                $note = Note::createFromId($key['idNote']);
               $ligne->ajouterNote($note);
            }
            return $ligne;

        }
    }



}
