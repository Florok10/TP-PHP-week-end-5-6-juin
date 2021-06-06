<?php
  require_once(__dir__ . '/Db.php');//requiert le dossier du fichier et Db.php une fois
  class LoginModel extends Db { //création de la classe LoginModel qui s'étend à la classe Db

    /**
      * @param string //définit les param comme étant des string
      * @return array //les param retournes des array
      * @desc 
    **/
    public function fetchEmail(string $email) :array //création d'une fonction publique fetchEmail avec pour param string $email
    {
      $this->query("SELECT * FROM `db_user` WHERE `email` = :email"); //la fonction query() de cette classe avec pour param selectionne tout depuis db_user vers email
                                                               //et l'envoie dans :email (dans la bdd)
      $this->bind('email', $email); //la fonction bind() de cette classe avec pour param 'email' et $email donc là on lie la fonction dans notre classe à l'email
      $this->execute(); // on utilise la fonction execute() de cette classe

      $Email = $this->fetch(); // on définit la variable $Email en lui attribuant la fonctino fetch() de cette classe
      if (empty($Email)) { //une condition qui vérifie que $Email est vide ou non ensuite execute le code en dessous ou non
        $Response = array( //définit $Response comme étant un array 
          'status' => true, //param de notre tableau faisant correspondre un string à true
          'data' => $Email //param de notre tableau faisant correspondre une variable à un string
        );

        return $Response; //retourne $Response
      }

      if (!empty($Email)) { //une condition qui vérifie que $Email est vide ou non ensuite execute le code en dessous ou non
        $Response = array(//définit $Response comme étant un array 
          'status' => false, //param de notre tableau faisant correspondre un string à false
          'data' => $Email //param de notre tableau faisant correspondre une variable à un string
        );

        return $Response;//retourne $Response
      }
    }
  }
 ?>
