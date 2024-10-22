<?php
defined('BASEPATH') OR exit('nope');

class Dashboard extends Authenticated {
    function __construct($conn, $params=array()){
        parent::__construct($conn, $params);
    }

    function index() {
        $this->render('dashboard'); // Load the dashboard view
    }
}
?>
