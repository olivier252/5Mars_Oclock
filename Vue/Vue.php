<?php
class Vue
{
	private $titre;
	private $fichier;

	public function __construct($action) {
		$this->fichier = 'Vue/vue'.$action.'.php';
	}

	public function generer($donnees) {
		   // G�n�ration de la partie sp�cifique de la vue
		$contenu = $this->genererFichier($this->fichier, $donnees);
		    // G�n�ration du gabarit commun utilisant la partie sp�cifique
		$vue = $this->genererFichier('Vue/gabarit.php',
		array('titre' => $this->titre, 'contenu' => $contenu));
		echo $vue;
	}

	public function genererFichier($fichier, $donnees) {
		if(file_exists($fichier)) {
			extract($donnees);
			ob_start();
			require $fichier;
			return ob_get_clean();
		}
		else {
      		throw new Exception('Fichier'.$fichier. 'introuvable');
   		}
	}
}