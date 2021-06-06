 <?php
  require_once(__dir__ . '/Db.php');//requiert le dossier du fichier et Db.php une fois
  class RegisterModel extends Db { //crée une classe RegisterModel qui s'étend à Db

    /**
      * @param array //définit les params comme étant un array
      * @return array //retourne un array
      * @desc 
    **/
    public function createUser(array $user) :array //créatoin d'une fonction publique createUser() avec pour param un array $user
    {
      $this->query("INSERT INTO `db_user` (name, email, phone_no, password) VALUES (:name, :email, :phone_no, :password)"); //séléctionne query() de cette classe
                                                                             //qui insère dans db_user name email phone_no password, en leur donnant les valeurs de 
                                                                             //:name :email :phone_no :password
      $this->bind('name', $user['name']); //on utilise la fonction bind() pour les nos valeurs à une variable $user
      $this->bind('email', $user['email']); //on utilise la fonction bind() pour les nos valeurs à une variable $user
      $this->bind('phone_no', $user['phone']); //on utilise la fonction bind() pour les nos valeurs à une variable $user
      $this->bind('password', $user['password']); //on utilise la fonction bind() pour les nos valeurs à une variable $user

      if ($this->execute()) { //condition qui vérifie que la fonction execute() de notre classe a été utilisé ensuite execute ou non le code en dessous
        $Response = array( //on attribue à la variable $Response un array
          'status' => true, //dans notre array on a un string 'status' qui correspond à true
        );
        return $Response; //retourne $Response
      } else { //sinon
        $Response = array( //on attribue à la variable $Response un array
          'status' => false //dans notre array on a un string 'status' qui correspond à false
        );
        return $Response; //retourne $Response
      }
    }

    /**
      * @param string //ond éfinit les param comme étant un string
      * @return array // on retourne un array
      * @desc 
    **/
    public function fetchUser(string $email) :array // on crée une fonction publique fetchUser() avec pour param string $email sous forme de tableau
    {
      $this->query("SELECT * FROM `db_user` WHERE `email` = :email"); //on sélectionne la fonction query() de cette classe avec pour param
                                                                  //sélection tout de db_user vers email qui correspond à notre colonne email
      $this->bind('email', $email); //on sélectionne la fonction bind() de cette classe avec pour param string 'email' et variable $email
      $this->execute(); //on sélectionne la fonction execute() de cette classe

      $User = $this->fetch(); // on définit la variable $user en lui attribuant la fonction fetch() de cette classe
      if (!empty($User)) { //une condition on vérifie si oui ou non $User est vide
        $Response = array( //on définit $Response comme étant un tableau
          'status' => true, //'status' est donc true
          'data' => $User //et 'data' correspond à $User
        );
        return $Response; //on retourne $Response
      }
      return array( //on retourne un tableau
        'status' => false, //'status' est ici false
        'data' => [] //et 'data' correspond à un tableau vide
      );
    }
  }
 ?>
