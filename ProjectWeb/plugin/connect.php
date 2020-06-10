<?php
class connect
{
    private $_user;
    private $_pwd;
    private $_dbName;
    private $_dbType;
    private $_dbAdress;
    private $_bdd;

    /**
     *Constructeur de la connexion avec la base de données
     *@$user -> permet d'indiquer l'utilisateur PhpMyAdmin
     *@$pwd ->  permet d'indiquer le mot de passe d'accès PhpMyAdmin
     *@dbName ->  nom de la bdd
     *@dbType -> type de bdd
     *@dbAdress ->  adresse de la bdd
     */

    public function __construct($user, $pwd, $dbName, $dbType, $dbAdress)
    {
        $this->_user = $user;
        $this->_pwd = $pwd;
        $this->_dbName = $dbName;
        $this->_dbType = $dbType;
        $this->_dbAdress = $dbAdress;
        $this->connectDB();

    }
    /**
     * fonction permettant de se connecter à la base de données
     * il prends les valeurs du constructeur, donc les id pour se connecter
     */

    private function connectDB()
    {
        try
        {
            if ($this->_bdd === null)
            {
                $dsn = $this->_dbType . ':dbname=' . $this->_dbName . ';host=' . $this->_dbAdress;
                $this->_bdd = new PDO($dsn, $this->_user, $this->_pwd);
                // echo 'work';

            }

        }
        catch(PDOException $e)
        {
            echo 'Connexion échouée : ' . $e->getMessage();
            die();
        }

    }
     /**
     * Permet de réaliser une requête Select
     * et d'afficher chaque enregistrement à l'utilisateur
     */
    public function getAllRows($table, $columns)
    {
        $req = "SELECT " . $columns . " FROM " . $table;
        $tab = $this
            ->_bdd
            ->query($req);

        foreach ($tab as $row)
        {
            print_r($row['name']);
            echo "</br>";
        }

    }
       /**
     * Permet d'insérer des données dans une table de notre choix
     * Attend 2 paramètres
     * @table -> le nom de la table
     * @list -> les éléments à insérer
     *
     */
    public function getInsert($table, $list)
    {
        try
        {

            $count = 0;
            $value = '';
            foreach ($list as $element)
            {
                $value = $value . $element;
                if ($count < count($list) - 1)
                {
                    $value = $value . ",";
                }
                $count++;
            }
            $sql = "INSERT INTO ".$table." VALUES ( ".$value." )";
            $tab = $this
                ->_bdd
                ->query($sql);
            echo "user has been added";
        }
        catch(PDOException $e)
        {
            echo 'Connexion échouée : ' . $e->getMessage();

        }
    }

    public function getImage($character){

    echo "<img src='img/Characters/100px-Icon-" . $character . ".png'>";

    }

}
?>
