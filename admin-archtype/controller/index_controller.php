<?php
defined('BASEPATH') OR exit('nope');

class Index extends Main{
    function __construct($conn, $params=array()){
        parent::__construct($conn, $params);
    }
    function index(){               
        $this->nonLayout('login');
    }

    function login(){               
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = md5(validate($_POST["user_name"]));
            $password = md5(validate($_POST["user_password"]));
           
            $query = "SELECT * FROM auth WHERE username='$username' AND password='$password';";
            $result = $this->conn->query($query);

            if ($result->num_rows > 0) {
                session_start();
                $user = $result->fetch_assoc();
                $_SESSION['isUserLog'] = true;
                echo json_encode(array("success" => true));
            } else {
                echo json_encode(array("success" => false, "message" => "Invalid username or password."));
            }

            $this->conn->close();
        } else {
            echo json_encode(array("success" => false, "message" => "Invalid request method."));
        }
    }

    function logout() {
        session_start();
        session_unset();
        session_destroy();
        header("Location: ".LINK); // Redirect to login page
        exit();
    }
}
?>