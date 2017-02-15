+<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_form_management extends CI_Controller {
	/*
		Pour transmettre les valeurs récupérées des formulaires pour les donner à la page d'accueil du site mario => modification du action de chaque formulaire pour les rediriger sur la page du site du concours correspondante

	*/
		public function index() {

			//Récupération du formulaire Conditions générales d'utilisation et traitement
			if(isset($_POST['cgu'])){
				$cgu = $_POST['cgu'];
			}

			//Récupération du formulaire Règles du concours et traitement
			if(isset($_POST['rules'])){
				$rules = $_POST['rules'];
			}

			//Récupération du formulaire Personnalisation et traitement
			if(isset($_POST['valider'])) {
				$fontColor = $_POST['color-font'];
				$bgColor = $_POST['background'];
				$largeur = $_POST['largeur'];
				$hauteur = $_POST['hauteur'];

				

			}

			//traitement des données pour les mettre dans un fichier .json afin de pouvoir modifier l'apparence
			$tablePersonnalisation = array (
				'font' => $fontColor,
				'background' => $bgColor,
				'height' => $hauteur,
				'width' => $largeur,
				'cgu' => $cgu,
				'rules' => $rules);

			$data = json_encode($tablePersonnalisation);

			$fjson = fopen("data.json", "w+"); //création du fichier json
			fputs($fjson, $data); //on écrit les données dans le json
			fclose($fjson); //on ferme le data.json

			redirect(base_url('C_home/index/'), 'auto', NULL);
			
			
		}
	}
?>