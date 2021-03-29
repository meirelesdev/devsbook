<?php

namespace src\controllers;

use core\Controller;
use src\handlers\LoginHandler;
use src\handlers\PostHandler;

class PostController extends Controller
{

    private $loggedUser;

    public function __construct()
    {
        $this->loggedUser = LoginHandler::checkLogin();
        if (!$this->loggedUser) {
            $this->redirect('/login');
        }
    }

    public function store()
    {
        $content = filter_input(INPUT_POST, 'content');
        $content = trim($content);

        if( !empty($content) ){
            $id = $this->loggedUser->id;
            if($id){
                PostHandler::addPost($content, $id);
            }
        }
        $this->redirect('/');
    }
}
