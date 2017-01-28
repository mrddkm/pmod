<?php

class IndexController extends ControllerBase {
    
    public function initialize() {
        $this->tag->setTitle("Phalcon PHP Framework");
    }

    public function indexAction() {
        $this->tag->prependTitle("pmod - ");
        
        if ($this->session->has("auth")) {
            $auth = $this->session->get("auth");
            $username = $auth['username'];
            echo "Hallo selamat datang $username ";

            echo $this->tag->linkTo("login/logout", "Logout");
        } else {
//            echo $this->tag->linkTo("login", "Please Login");
            return $this->response->redirect('login/index');
        }
    }

}

