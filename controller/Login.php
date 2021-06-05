<?php
require_once(__dir__ . '/Controller.php'); //requiert le dossier du fichier et controller.php une seule fois chacun
require_once('./Model/LoginModel.php');//requiert le fichier LoginModel.php en remontant jusqu'au dossier Model, une seule fois "once"

class Login extends Controller { //on crée la classe Login qui s'étend à la classe Controller

  public $active = 'login';  //on déclare la variable publique $active avec pour valeur le string 'login
    private $loginModel; //on déclare la variable privée $loginModel sans valeur pour l'instant

  /**
    * @param null|void //définit les paramètres comment étant null ou vide
    * @return null|void //retourne des valeurs soit null soit vide
    * @desc //pas trouvé..
  **/
  public function __construct() //création de la fonction publique constructeur
  {
    if (isset($_SESSION['auth_status'])) header("Location: dashboard.php"); /**une condition qui dit que si la session est définit sur auth_status on est
    redirigé vers dashboard.php */
    $this->loginModel = new LoginModel(); //la variable $loginModel de cet objet donc Login prend pour valeur un nouvel objet LoginModel
  }

  /**
    * @param array //définit les paramètres comme étant un array
    * @return array|boolean //la classe retourne soit un tableau soit un boolean (true/false)
    * @desc //pas trouvé
  **/
  public function login(array $data) //création de la fonction publique login qui prend pour paramètre un array de la variable $data
  {
    $email = stripcslashes(strip_tags($data['email'])); // on définit la variable email, elle a pour valeur une fonction de php qui supprime les antislash d'une fonction 
                                                        //qui tente de retourner un string après avoir supprimé les balises html et php d'un code, ici ce qui est à l'intérieur
                                          //du tableau contenue par la variable data, ici le mail
    $password = stripcslashes(strip_tags($data['password'])); // on définit la variable password,elle a pour valeur une fonction de php qui supprime les antislash d'une fonction 
                                          //qui tente de retourner un string après avoir supprimé les balises html et php d'un code, ici ce qui est à l'intérieur
                                          //du tableau contenue par la variable data, ici le password

    $EmailRecords = $this->loginModel->fetchEmail($email); //on définit la variable $EmailRecords qui prend pour valeur la variable loginModel de cet objet donc Login
                                                          //qui utilise la fonction fetchEmail qui prend pour paramètre la variable $emaill, je vais 
                                                          //arrêter de dire variable et fonction ça prend trop de temps, je vais écrire $varible et fonction()
                                                          //je sais que tu comprends de toute façon

    if (!$EmailRecords['status']) { //condition si  $EmailRecords a le bon statut alors on execute le code en dessous
      if (password_verify($password, $EmailRecords['data']['password'])) { //condition si le mdp et l'email correspond alors..
        
        $Response = array( //on définit $Response comme étant un array qui dit que le statut est true donc, si on a le bon mdp et mail on obtient le statut true 
          'status' => true
        );

        $_SESSION['data'] = $EmailRecords['data']; //là j'ai pas compris car pour moi ça répète ce qu'on fait au dessus d'une autre façon
        $_SESSION['auth_status'] = true;
        header("Location: dashboard.php");//on est après tout le code du dessus executé si bien sûr on a le bon mdp et email donc on est co, on est redirigé sur dashboard.php, je préfère JS de loin ehem
      } //on doit pas rajouter un else pour ce qui suit ?

      $Response = array( // on change la valeur de $Response comme étant un array qui prend 
        //et le définit comme false
        'status' => false, // si on a pas le mon login alors ça nous retourne le string de $Response quand on a pas le bon login par exemple "mdp ou email incorrect"
      );
      return $Response;
    }

    $Response = array(
      'status' => false, // la même chose qu'au dessus mais cette fois pour la classe
    );
    return $Response; //on retourne $Response avec le status false du tableau juste au dessus
  }
}
 ?>
