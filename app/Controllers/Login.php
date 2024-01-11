<?php

namespace App\Controllers;

use App\Models\UserModel;

class Login extends BaseController {

    /**
     * Method index
     * 
     * @return void
     */
    public function index(): void {
        echo view('template_start');
        echo view('login');
        echo view('template_end');
    }

    /**
     * Method loginAuth
     * 
     * Checks credentials for login
     * 
     * @return \CodeIgniter\HTTP\RedirectResponse
     */
    public function loginAuth(): \CodeIgniter\HTTP\RedirectResponse {
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

    /**
     * Method logoff
     * 
     * Logs user out
     * 
     * @return \CodeIgniter\HTTP\RedirectResponse
     */
    public function logoff(): \CodeIgniter\HTTP\RedirectResponse {
        $this->session->destroy();
        return redirect()->to('/');
    }

}
