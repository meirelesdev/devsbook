<?php

namespace src\controllers;

use core\Controller;
use src\handlers\LoginHandler;

class PhotoController extends Controller
{

    private $loggedUser;

    public function __construct()
    {
        $this->loggedUser = LoginHandler::checkLogin();
        if (!$this->loggedUser) {
            $this->redirect('/login');
        }
    }

    public function index()
    {
        // echo "Estamos em photos";
        $this->render('photo');
    }
}
