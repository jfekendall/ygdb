<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Status;
use Psr\Log\LoggerInterface;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
class BaseController extends Controller {

    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;

    /**
     * Instance of the main Session object.
     *
     * @var \Config\Services::session
     */
    protected $session;

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var array
     */
    protected $helpers = [];

    /**
     * An array of data to be included with extended controllers
     *
     * @var array
     */
    protected $data = [];

    /**
     * An array of data to be included with extended controllers
     *
     * @var array
     */
    protected $sideBar = [];

    /**
     * UUID of user
     * TODO: Figure out why Systems and AssembleCollection don't have access
     * @var string
     */
    protected $uid = '';

    /**
     * Constructor.
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger) {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        //Pre-loading common data for all controllers
        $this->session = \Config\Services::session();
        if ($this->session->get('isLoggedIn')) {

            $this->data['username'] = $this->sideBar['username'] = $this->session->get('name');
            $this->uid = $this->session->get('id');

            $y = new Systems();
            $this->sideBar['yourSystems'] = $y->yourSystems();

            $u = new User();
            $this->data['profile'] = $this->sideBar['profile'] = $u->getUserProfile($this->uid);
        } else {
            $this->data['profile'] = $this->sideBar['profile'] = [];
        }
        $statuses = new Status();
        $this->data['statuses'] = $statuses->orderBy('id')->findAll();
    }

}
