<?php
  require_once(__dir__ . '/Controller.php');//requiert le dossier du fichier et controller.php une seule fois chacun
  require_once('./Model/RegisterModel.php');//requiert le fichier RegisterModel.php dans le dossier Model
  class Register extends Controller { //crée une classe Register qui s'étend dans la classe Controller

    public $active = 'Register'; //crée en publique $active avec pour valeur le string 'Register'
    private $registerModel; //crée en privée $registerModel

    /**
      * @param null|void //définit les paramètres comment étant null ou vide
      * @return null|void //retourne des valeurs soit null soit vide
      * @desc 
    **/
    public function __construct() //création du constructeur pour la classe Register
    {
      if (isset($_SESSION['auth_status'])) header("Location: dashboard.php");/**une condition qui dit que si la session est définit sur auth_status on est
      redirigé vers dashboard.php */
      $this->registerModel = new RegisterModel();//la variable registerModel de cette classe est un nouvel objet RegisterModel
    }

    /**
      * @param array //définit les paramètres comme étant un array
      * @return array|boolean //la classe retourne soit un tableau soit un boolean (true/false)
      * @desc .
    **/
    public function register(array $data) //création de la fonction publique register qui prend pour param un tableau de $data
    {
      $name = stripcslashes(strip_tags($data['name'])); //on définit une variable qui est égal à une fonctin qui enlève les antislash qui a pour param une fonction qui enlève les balises html et php qui attribue à data un array 
      $email = stripcslashes(strip_tags($data['email'])); //on définit une variable qui est égal à une fonctin qui enlève les antislash qui a pour param une fonction qui enlève les balises html et php qui attribue à data un array 
      $phone = stripcslashes(strip_tags($data['phone'])); //on définit une variable qui est égal à une fonctin qui enlève les antislash qui a pour param une fonction qui enlève les balises html et php qui attribue à data un array 
      $password = stripcslashes(strip_tags($data['password'])); //on définit une variable qui est égal à une fonctin qui enlève les antislash qui a pour param une fonction qui enlève les balises html et php qui attribue à data un array 

      $EmailStatus = $this->registerModel->fetchUser($email)['status']; //on définit qui prend la variable RegisterModel de cette classe 

      $Error = array( //crée une variable Error qui est égale à un tableau
        'name' => '',  //param de notre tableau ici key => string vide
        'email' => '', //param de notre tableau ici key => string vide
        'phone' => '', //param de notre tableau ici key => string vide
        'password' => '', //param de notre tableau ici key => string vide
        'status' => false //param de notre tableau ici key => boolean false
      );

      if (preg_match('/[^A-Za-z\s]/', $name)) { // condition qui utilise la fonction php preg_match qui vérifie si les caractères dans $name sont entre
                                                             //A et Z puis a et z puis \s
        $Error['name'] = 'Only Alphabets are allowed.'; // l'erreur qui est définit si on a pas entré un name adéquat
        return $Error; //retourne $Error
      }

      if (!empty($EmailStatus)) { //condition qui vérifie si $EmailStatus est vide alors on execute le code en dessous qui définit le message d'erreur dans ce cas
        $Error['email'] = 'Sorry. This Email Address has been taken.';
        return $Error; //retourne $Error
      }

      if (preg_match('/[^0-9_]/', $phone)) {//condition qui vérifie si $phone contient juste des numéros entre 0 et 9 
        $Error['phone'] = 'Please, use a valid phone number.'; //définit le message d'erreur dans le cas ou le numéro n'est pas valide
        return $Error; //retourne $Error
      }

      if (strlen($password) < 7) { //condition qui vérifie si le mdp est inférieur ou non à 7 caractères
        $Error['password'] = 'Please, use a stronger password.'; //définit le message d'erreur dans le cas ou le mdp n'est pas valide
        return $Error; //retourne $Error
      }

      $Payload = array( //définit $Payload comme étant un array
        'name' => $name, //param de notre tableau faisant correspondre un string à une variable
        'email' => $email, //param de notre tableau faisant correspondre un string à une variable
        'phone' => $phone, //param de notre tableau faisant correspondre un string à une variable
        'password' => password_hash($password, PASSWORD_BCRYPT) //fonction qui va hasher notre mdp avec la méthode BCRYPT et pas default car default est amené à changer
                                                               //dans des mises à jours de php donc c'est pour éviter tout problème qui peuvent survenir
      );

      $Response = $this->registerModel->createUser($Payload); //définit $Response = variable registerModel de cette classe qui utilise une fonction createUser qui prend
                                                              //pour param $Payload

      $Data = $this->registerModel->fetchUser($email)['data']; // définit $Data = variable registerModel de cette classe qui utilise la fonction fetchUser pour récupérer
                                                                   //l'email sous forme de string
      unset($Data['password']); //détruit password dans la variable $Data

      if (!$Response['status']) {// condition qui vérifie si $Response est différent de Status 
        $Response['status'] = 'Sorry, An unexpected error occurred and your request could not be completed.'; //définit la variable $Response qui prendra
        // dans un tableau sous la forme de status le string 'Sorry,..'
        return $Response; //retourne $Response
      }

      $_SESSION['data'] = $Data; // définit le tableau de $_SESSION 'data' comme étant $Data
      $_SESSION['auth_status'] = true; // définit le tableau de $_SESSION 'auth_status' comme étant true
      header("Location: dashboard.php"); //redirige vers dashboard.php
      return true; //retourne true
    } //fin de la fonction
  }//fin de la classe
 ?>
