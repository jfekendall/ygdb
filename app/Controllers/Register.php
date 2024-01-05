<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;
use App\Models\UserProfile;

class Register extends Controller {

    public function store() {
        helper(['form']);
        $rules = [
            'register-username' => 'required|min_length[2]|max_length[50]|is_unique[ygdb_users.ygdb_username]',
            'register-email' => 'required|min_length[4]|max_length[100]|valid_email|is_unique[ygdb_users.ygdb_user_email]',
            'register-password' => 'required|min_length[4]|max_length[50]',
            'register-password2' => 'matches[register-password]',
            'register-terms' => 'required'
        ];
        if ($this->validate($rules)) {
            $userModel = new UserModel();
            $uuid = new UUID();
            $data = [
                'ygdb_username' => $this->request->getVar('register-username'),
                'ygdb_user_email' => $this->request->getVar('register-email'),
                'ygdb_password' => password_hash($this->request->getVar('register-password'), PASSWORD_DEFAULT),
                'user_uuid' => $uuid->generate()
            ];

            $userModel->save($data);
		$profileModel = new UserProfile();
		$data = [
			'ygdb_user_uuid' => $data['user_uuid'],
			'profile_tagline' => "Member since ". date('F Y')
		];
		$profileModel->save($data);
            $session = session();
            $session->setFlashdata('success', 'Welcome aboard! Just log in and see what all this site has to offer!');
            return redirect()->to('/');
        } else {
            $session = session();
            $session->setFlashdata('msg', "Something happened. Don't know where. Don't know what.");
            $data['validation'] = $this->validator;
            return redirect()->to('/');
        }
    }

}
