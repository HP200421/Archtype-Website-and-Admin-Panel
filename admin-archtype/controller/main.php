<?php
defined('BASEPATH') OR exit('nope');
class Main{
    protected $conn, $params;
    protected function __construct($conn, $params=array()){
        $this->conn = $conn;
        $this->params = $params;
    }
    public function setParam($params){
        $this->params = $params;
    }
    protected function render($fileName, $other=array()){
        $conn = $this->conn;
        $params = $this->params;
		if(!isset($other['meta'])){
			$other['meta'] = array(
				"title" => "VIT College",
				"description" => "VIT College",
				"keywords" => "VIT College",
				"image" => "VIT College",
			);
		}
        else{
            if(!isset($other['meta']['title'])){
                $other['meta']['title'] = "VIT College";
            }
            if(!isset($other['meta']['description'])){
                $other['meta']['description'] = "VIT College";
            }
            if(!isset($other['meta']['keywords'])){
                $other['meta']['keywords'] = "VIT College";
            }
            if(!isset($other['meta']['image'])){
                $other['meta']['image'] = "VIT College";
            }
        }
		$headData = array(
			"meta" => $other['meta'],
			"css" => isset($other['css']) ? $other['css'] : array()
		);
        if(isset($other['data'])){
            extract($other['data']);
        }
        require_once 'view/includes/header.php';
        require_once 'view/includes/sideBar.php';
        require_once 'view/includes/navbar.php';
        require_once 'view/'.$fileName.'.php';

		$footData = array(
			"js" => isset($other['js']) ? $other['js'] : array()
		);
        require_once 'view/includes/footer.php';
    }
    protected function nonLayout($fileName, $other=array()){
        $conn = $this->conn;
        $params = $this->params;
		if(!isset($other['meta'])){
			$other['meta'] = array(
				"title" => "VIT College",
				"description" => "VIT College",
				"keywords" => "VIT College",
				"image" => "VIT College",
			);
		}
        else{
            if(!isset($other['meta']['title'])){
                $other['meta']['title'] = "VIT College";
            }
            if(!isset($other['meta']['description'])){
                $other['meta']['description'] = "VIT College";
            }
            if(!isset($other['meta']['keywords'])){
                $other['meta']['keywords'] = "VIT College";
            }
            if(!isset($other['meta']['image'])){
                $other['meta']['image'] = "VIT College";
            }
        }
		$headData = array(
			"meta" => $other['meta'],
			"css" => isset($other['css']) ? $other['css'] : array()
		);
        if(isset($other['data'])){
            extract($other['data']);
        }
        require_once 'view/'.$fileName.'.php';

    }
}
class Authenticated extends Main{
    protected function __construct($conn, $params=array()){
        // check session here
        session_start();
        $this->conn = $conn;
        $this->params = $params;
        if (!isset($_SESSION['isUserLog']) || $_SESSION['isUserLog'] !== true) {
            header("location:".LINK);
            exit();
        }
        parent::__construct($conn, $params);
        
    }
}
?>