<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AuthGuard implements FilterInterface {

    public function before(RequestInterface $request, $arguments = null) {
        if (!session()->get('isLoggedIn')) {
            echo view('template_start');
            echo view('login');
            echo view('template_end');
            die();
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null) {
        
    }

}
