<?php

class LoginController extends ControllerBase {

    public function initialize() {
        $this->tag->setTitle("Login");
    }

    public function indexAction() {
        $this->tag->prependTitle("pmod - ");
    }

    public function prosesloginAction() {
        if ($this->request->isPost()) {
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');
            
            $tbluser = TblUser::findFirst("username='$username'");
            
            if ($tbluser) {
                if ($password == $tbluser->password) {
                    $this->_registerSession($tbluser);
                    $this->response->redirect('index');
                }
            }
            $this->flash->error("Login Failed: You don't have access to this Application");
            return $this->dispatcher->forward(array("action" => "index"));
        }
    }

    private function _registerSession(TblUser $user) {
        $this->session->set('auth', array(
            'isLog' => 'Y',
            'id' => $user->id,
            'username' => $user->username
        ));
    }

    public function logoutAction() {
        $this->session->destroy();
        $this->flash->success("Session sudah di destroy");
        return $this->dispatcher->forward(array("action" => "index"));
    }

}
