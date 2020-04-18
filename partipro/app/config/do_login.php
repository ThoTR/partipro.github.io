<?php session_start(); ?>
<?php
    require_once 'db_connect.php';

    if (isset($_POST['login-btn'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        //Authentification d'un utilisateur à l'aide de PDO et de password_verify ()
        $stmt = $pdo->prepare("SELECT * FROM projet_participation.users WHERE users.login = ?");
        $stmt->execute([$_POST['username']]);
        $user = $stmt->fetch();
        if ($user && password_verify($_POST['password'], $user['mdp']))
        {
            echo "Connexion réussie!<br/>";
            if ($user['role']=='admin'){
                $_SESSION['username'] = $username;
                header('Location: http://localhost:8080/PWP/Project/admin/index.html');
                echo "Bonjour " .$_SESSION['username'];
            } elseif ($user['role']=='user') {
                $_SESSION['username'] = $username;
                header('Location: http://localhost:8080/PWP/Project/index.php/');
                echo "Bonjour " .$_SESSION['username'];
            } else {
                echo "invalid";
            }
        } 
    }


    
    /*
    class dologin {
        private $pdo;
        
        function __construct($pdo) {
            $this->pdo = $pdo;
        }
        
        public function __destruct(){
            
        }

        function check_Username($username) {
            if(!$username) {
                throw new Exception('Veuillez entrer votre identifier.');
            }
            return true;
        }

        function check_Password($password) {
            if(!$password) {
                throw new Exception('Veuillez entrer votre mot de passe.');
            }
            if (!preg_match('/^(?=.*[A-Z])(?=.*[0-9])[0-9a-zA-Z]{6,}$/', $password)) {
                throw new Exception('Enter valid pass.');
            }
            return true;
        }

        function login() {
            try {
                $username = isset($_POST['username']) ? trim($_POST['username']) : null;
                $password = isset($_POST['password']) ? trim($_POST['password']) : null;
                $this->check_Username($username);
                $this->check_Password($password);
                if ($this->check_Username($username) && $this->check_Password($password)) {
                    $stmt = $this->pdo->prepare("SELECT * FROM projet_participation.users WHERE login = :username AND mdp = :password");
                    $stmt->execute(array(':username' => $username, ':mdp' => md5($password)));
                    $stmt->fetch();
                    if ($stmt->rowcount()>0) {
                        $_SESSION['logged'] = TRUE;
                        $_SESSION['user'] = ['username' => $username, 'password' => $password];
                        return true;
                    } else {
                        return false;
                    }
                }
                $message = "Logged successfully";
            } catch (Exception $e) {
                $message = $e->getMessage();           
            }
        }

        function logout() {
            session_destroy();
            header("Location: localhost:8080/PWP/Project/configs/login.php");
        }
    
        public function is_logged() {
            if (isset($_SESSION['logged'])) {
                return true;
            }
            return FALSE;
        }
    
        public function redirect($url) {
            header('Location:' . $url);
        }  
    }

    $obj = new dologin($pdo);
    
    */