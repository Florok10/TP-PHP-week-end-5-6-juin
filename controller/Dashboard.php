<?php
  require_once(__dir__ . '/Controller.php'); //requiert le dossier du fichier et controller.php une seule fois chacun
  require_once('./Model/DashboardModel.php'); //requiert le fichier DashboardModel.php en remontant jusqu'au dossier Model, une seule fois "once"
  class Dashboard extends Controller { //crée la classe Dashbord qui s'expend jusqu'à la classe Controller donc les deux possède les mêmes params j'imagine

    public $active = 'dashboard'; //crée une variable publique qui contient le string dashbord
    private $dashboardModel;//crée une variable privée pour l'instant sans valeur

    /**
      * @param null|void //définit les paramètres comment étant null ou vide
      * @return null|void //retourne des valeurs soit null soit vide
      * @desc //pas trouvé..
    **/
    public function __construct() //création d'une fonction constructrice publique
    {
      if (!isset($_SESSION['auth_status'])) header("Location: index.php");         /**une condition qui dit que si la session est définit sur auth_status on est
      redirigé vers index.php */
      $this->dashboardModel = new DashboardModel();//on déclare que la variable $dashboardModel dans l'objet Dashboard et Controller est un nouveal objet DashboardModel
                                                   //mais je pensais qu'on pouvait pas instancier dans l'objet du coup je suis perdu là
    }

    /**
      * @param null|void  //définit les paramètres comment étant null ou vide
      * @return array //retourn retournera un array
      * @desc //pas trouvé..
    **/
    public function getNews() :array //on crée une fonction publique getNews qui retournera donc un array (tableau)
    {
      return $this->dashboardModel->fetchNews(); //la fonction retournera la variable qui contient un objet définit  plus haut 
    }
  }
 ?>
