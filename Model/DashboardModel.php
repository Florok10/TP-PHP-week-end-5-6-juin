<?php
    require_once(__dir__ . '/Db.php'); //requiert le dossier du fichier et Db.php
    class DashboardModel extends Db { //création de la classe DashboardModel qui s'étend à la classe Db

      /**
        * @param null //définit les paramètres comment étant null
        * @return array //return retournera un array
        * @desc 
      **/
      public function fetchNews() :array //création de la fonction publique fetchNew() sous forme d'array
      {
        $this->query("SELECT * FROM `db_news` ORDER BY `id` DESC"); //la query de cette classe selectionne tout depuis db_news en commençant par l'id
        $this->execute(); //la fonction execute() de cette classe
        $News = $this->fetchAll(); // $News est défini comme étant la fonction fetchAll() de cette classe

        if (count($News) > 0) { // condition qui vérifie si la fonction count() qui a pour param $News est supérieur à 0
          $Response = array( //définit $Response comme étant un tableau
            'status' => true, //définit 'status' comme étant true
            'data' => $News //définit 'data' comme étant $News
          );
          return $Response; //retourne $Response
        }

        $Response = array( //définit $Response comme étant un tableau
          'status' => false, //définit 'status' comme étant false
          'data' => [] //définit 'data' comme étant un tableau vide
        );
        return $Response; //retourne $Response
      }
      
    }
 ?>
