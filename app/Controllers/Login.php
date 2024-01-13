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
        $data = $userModel->where('ygdb_username', $this->request->getVar('login-username'))->first();
        if ($data) {
            if (password_verify($this->request->getVar('login-password'), $data['ygdb_password'])) {
                $ses_data = [
                    'id' => $data['user_uuid'],
                    'name' => $data['ygdb_username'],
                    'isLoggedIn' => true,
                    'isAdmin' => (bool) $data['is_admin']
                ];
                $this->session->set($ses_data);
                return redirect()->to('/');
            } else {
                $this->session->setFlashdata('msg', lang('Security.bad_credentials_message'));
                return redirect()->to('/');
            }
        } else {
            $this->session->setFlashdata('msg', lang('Security.bad_credentials_message'));
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
