<?php
  class Db { //création de la classe db
    protected $dbName = 'learning_dollars_db'; /** Database Name */ //création de variable protégée et on leur assigne une valeur sous la forme de string
    protected $dbHost = 'localhost'; /** Database Host */ //création de variable protégée et on leur assigne une valeur sous la forme de string
    protected $dbUser = 'root'; /** Database Root */ //création de variable protégée et on leur assigne une valeur sous la forme de string
    protected $dbPass = ''; /** Databse Password */ //création de variable protégée et on leur assigne une valeur sous la forme de string
    protected $dbHandler, $dbStmt; //création de variables protégées

    /**
      * @param null|void  //définit les paramètres comme étant null ou vide
      * @return null|void //définit les paramètres qui  retourne null ou vide
      * @desc Creates or resume an existing database connection...
    **/
    public function __construct() //création du constructeur de la classe
    {
      // Create a DSN Resource...
      $Dsn = "mysql:host=" . $this->dbHost . ';dbname=' . $this->dbName; //création de la variable $Dsn pour se connecter à la bdd
      //create a pdo options array
      $Options = array( //définit $Options comme étant un tableau
        PDO::ATTR_PERSISTENT => true, //ouvre une nouvelle connexion PDO et la rend persistente
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION //PDO lance une exception et il y définit les propriétés afin de représenter le code d'erreur et les informations
                                                             //complémentaires
      );
      try { //on essaye une connexion à la bdd 
        $this->dbHandler = new PDO($Dsn, $this->dbUser, $this->dbPass, $Options); //en utilisant la variable dbHanlder de cette classe
      } catch (Exception $e) { //on définit ce qu'il se passe en cas d'erreur
        var_dump('Couldn\'t Establish A Database Connection. Due to the following reason: ' . $e->getMessage()); //on définit le message d'erreur et le var_dump pour
                                                                                                          //comprendre pourquoi il y a une erreur
      }
    }


    /**
      * @param string //définit les param comme étant un string
      * @return null|void //retourne les param null ou vide
      * @desc Creates a PDO statement object
    **/
    public function query($query) //création d'une fonction publique query() avec pour param $query
    {
      $this->dbStmt = $this->dbHandler->prepare($query); //la variable dbStmt de cette classe = la variable dbHandler de cette classe qui utilise la fonction prepare()
                                                                                                            //$query en param
    }


    /**
      * @param string|integer| //définit les param comme étant un string ou un entier
      * @return null|void //retourne des param null ou vide
      * @desc Matches the correct datatype to the PDO Statement Object.
    **/
    public function bind($param, $value, $type = null) //crée une fonction publique bind() param $param $value $type = null
    {
      if (is_null($type)) {//condition si is_null($type) alors on execute le code en dessous
        switch (true) {  //permet de vérifier plusieurs conditions
          case is_int($value): //premier cas qui vériie is_int($value)
            $type = PDO::PARAM_INT; //vérifie que $type correspond à PDO avec un nombre
          break;
          case is_bool($value):($value): //deuxième cas qui vériie is_int($value)
            $type = PDO::PARAM_BOOL;//vérifie que $type correspond à PDO avec un boolean
          break;
          case is_null($value):($value): //troisième cas qui vériie is_int($value)
            $type = PDO::PARAM_NULL;//vérifie que $type correspond à PDO avec null
          break; //termine switch
          default: //détermine une valeur par défaut
            $type = PDO::PARAM_STR; //donne à PDO dans $type une valeur string
          break;//termine default
        }
      }

      $this->dbStmt->bindValue($param, $value, $type);//attribue les valeurs $param, $value, $type à la variable $dbStmt de cette classe
    }


    /**
      * @param null|void //définit les param comme étant null ou vide
      * @return null|void //retourne les param null ou vide
      * @desc Executes a PDO Statement Object or a db query...
    **/
    public function execute() //création d'une fonction publique execute()
    {
      $this->dbStmt->execute(); // on définit que la variable $dbStmt de cette classe utilise execute()
      return true; //on retourune alors true
    }

    /**
      * @param null|void //définit les param comme étant null ou vide
      * @return null|void //retourne les param null ou vide
      * @desc Executes a PDO Statement Object an returns a single database record as an associative array...
    **/
    public function fetch() //création de la fonction publique fetch()
    {
      $this->execute(); //on cible la fonction de cette classe execute()
      return $this->dbStmt->fetch(PDO::FETCH_ASSOC); //on retourne la variable $dbStmt de cette classe qui utilise la fonction fetch() avec pour param 
      //                                             PDO::Fetch_ASSOC qui récupère une ligne de résultat sous forme de tableau associatif


    }

    /**
      * @param null|void //définit les param comme étant null ou vide
      * @return null|void //retourne les param null ou vide
      * @desc Executes a PDO Statement Object an returns nultiple database record as an associative array...
    **/
    public function fetchAll() // création de la fonction publique fetchAll()
    {
      $this->execute(); //on cible la fonction de cette classe execute()
      return $this->dbStmt->fetchAll(PDO::FETCH_ASSOC);  //on retourne la variable $dbStmt de cette classe qui utilise la fonction fetch() avec pour param
      //                                                      PDO::Fetch_ASSOC qui récupère une ligne de résultat sous forme de tableau associatif


    }
  }
 ?>
