<?php

require_once 'Modele/Billet.php';
require_once 'Modele/Commentaire.php';
require_once 'Vue/Vue.php';

class controleurBillet {
	private $billet;
	private $commentaire;

	
	public function __construct() {
		$this->billet = new Billet();
		$this->commentaire = new Commentaires();
	}

	public function billet($idBillet) {
		$billet = $this->billet->getBillet($idBillet);//contient $resultat classe Billet ligne 23
		$commentaires = $this->commentaire->getCommentaires($idBillet);
		$vue = new Vue('Billet');
		$vue->generer(array('billet' => $billet, 'commentaires' => $commentaires));//sollicite class Vue
	}

	public function commenter($auteur, $contenu, $idBillet) {
    // Sauvegarde du commentaire
    $this->commentaire->ajouterCommentaire($auteur, $contenu, $idBillet); 
    // Actualisation de l'affichage du billet
    $this->billet($idBillet);
   echo var_dump($this->commentaire->ajouterCommentaire($auteur, $contenu, $idBillet));
  }

}