<?php

namespace App\Controllers;

use App\Models\UserModel;

class Login extends BaseController {

    public function index() {
        echo view('template_start');
        echo view('login');
        echo view('template_end');
    }

    public function loginAuth() {
        $userModel = new UserModel();

        $username = $this->request->getVar('login-username');
        $password = $this->request->getVar('login-password');

        $data = $userModel->where('ygdb_username', $username)->first();

        if ($data) {
            $pass = $data['ygdb_password'];
            $authenticatePassword = password_verify($password, $pass);
            if ($authenticatePassword) {
                $ses_data = [
                    'id' => $data['user_uuid'],
                    'name' => $data['ygdb_username'],
                    'isLoggedIn' => true
                ];

                $this->session->set($ses_data);
                return redirect()->to('/');
            } else {
                $this->session->setFlashdata('msg', 'Well butts. Nothing much going on with what you gave for credentials.');
                return redirect()->to('/');
            }
        } else {
            $this->session->setFlashdata('msg', 'Well butts. Nothing much going on with what you gave for credentials.');
            return redirect()->to('/');
        }
    }

    public function logoff() {
        $this->session->destroy();
        return redirect()->to('/');
    }

}
