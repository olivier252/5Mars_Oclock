<?php
require_once 'Modele/Modele.php';
class Commentaires extends Modele
{
	public function getCommentaires($idBillet) {

		 $sql = 'select COMM_ID as id, COMM_DATE as date,
       COMM_AUTEUR as auteur, COMM_CONTENU as contenu from T_COMMENTAIRE
       where BIL_ID=?';

		$commentaires = $this->executerRequete($sql, array($idBillet));

		return $commentaires;
	}

	public function ajouterCommentaire($auteur, $contenu, $idBillet) {
    $sql = 'insert into T_COMMENTAIRE(COMM_DATE, COMM_AUTEUR, COMM_CONTENU, BIL_ID)'
      . ' values(?, ?, ?, ?)';
    $date = date('Y-m-d H:i:s');  // Récupère la date courante
    $this->executerRequete($sql, array($date, $auteur, $contenu, $idBillet));


	}
	
}
