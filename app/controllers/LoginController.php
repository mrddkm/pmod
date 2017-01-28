<?php

class LoginController extends Phalcon\Mvc\Controller {

    public function indexAction() {
        
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
            echo "Username atau password salah";
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
        echo "Session sudah di destroy";
        return $this->dispatcher->forward(array("action" => "index"));
    }

}
