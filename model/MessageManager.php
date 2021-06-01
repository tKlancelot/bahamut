<?php


class MessageManager extends Database
{

    // retenir : dans le manager on extends de la base de données
    // et reprend le constructor du parent avec le mot clef parent::
    public function __construct()
    {
        parent::__construct();
    }

    public function insertMessage(Message $message)
    {
        $pseudo = $message->getPseudo();
        $content = $message->getContent();
        $req = $this->bdd->prepare('INSERT INTO `messages` (pseudo, content, date_post) VALUES (?,?,NOW())');
        $req->bindParam(1,$pseudo);
        $req->bindParam(2,$content);
        $req->execute();
        $message->setId($this->bdd->lastInsertId());
    }


}

?>