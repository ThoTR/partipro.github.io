<?php

    class Db_config {
        private $hostname = DB_HOST;
        private $dbname = DB_NAME;
        private $username = DB_USER;
        private $password = DB_PASS;
        private $charset = 'utf8mb4';

        private $pdo;
        private $stmt;
        private $error;
    
        public function __construct()
        {
            $dsn = "mysql:host=$this->hostname;dbname=$this->dbname;charset=$this->charset";
            $options = array(
                PDO::ATTR_ERRMODE               => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE    => PDO::FETCH_ASSOC, //fetch_assoc par défaut
                PDO::ATTR_EMULATE_PREPARES      => false, 
            );

        //PDO instance
            try {
                $this->pdo = new PDO($dsn, $this->username, $this->password, $options);
            } catch (PDOException $e){
                //throw new \PDOException($e->getMessage(), (int)$e->getCode());
                $this->error = $e->getMessage();
                echo $this->error;
            }
        }

        //Prepare stmt with query
        public function query($sql){
            $this->stmt = $this->pdo->prepare($sql);
        }

        //Bind values
        public function bind($param, $value, $type = null){
            if(is_null($type)){
                switch(true){
                    case is_int($value):
                        $type = PDO::PARAM_INT;
                        break;

                    case is_bool($value):
                        $type = PDO::PARAM_BOOL;
                        break;

                    case is_null($value):
                        $type = PDO::PARAM_NULL;
                        break;

                    default:
                        $type = PDO::PARAM_STR;
                }
            }
            $this->stmt->bindValue($param, $value, $type);
        }

        //Execute prepare stmt
        public function execute(){
            return $this->stmt->execute();
        }

        //Resultat as arr obj
        public function result(){
            $this->execute();
            return $this->stmt->fetchAll(PDO::FETCH_OBJ);
        }
        
        //Get single record as obj
        public function single(){
            $this->execute();
            return $this->stmt->fetch(PDO::FETCH_OBJ);
        }

        //Get row count
        public function rowCount(){
            return $this->stmt->rowCount();
        }

    }   
    