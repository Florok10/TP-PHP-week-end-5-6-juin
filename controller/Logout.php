<?php
  require_once(__dir__ . '/Controller.php'); //requiert le dossier du fichier et controller.php une seule fois chacun

  class Logout extends Controller { //on crée la classe Logout qui s'étend dans la classe Controller

    /**
      * @param null|void //définit les paramètres comment étant null ou vide
      * @return null|void //retourne des valeurs soit null soit vide
      * @desc 
    **/
    public function __construct() // on crée le constructeur de notre classe
    {
      session_destroy(); //on utilise la fonction php pour terminet une session
      header("Location: index.php"); //on est ensuite redirigé sur index.php
    }
  }
 ?>
