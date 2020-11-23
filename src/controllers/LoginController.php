<?php

namespace src\controllers;

use core\Controller;
use src\handlers\LoginHandler;

class LoginController extends Controller
{

    public function signin(){
        $flash = '';

        if ( !empty($_SESSION['flash']) ) {
            $flash = $_SESSION['flash'];
            $_SESSION['flash'] = '';
        }
        $this->render('signin', [
            'flash' => $flash ?? false
        ]);
    }

    public function signinAction(){
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $pass = filter_input(INPUT_POST, 'password');

        if ($email && $pass) {
     
            $token = LoginHandler::verifyLogin($email, $pass );
     
            if($token){
                $_SESSION['token'] = $token;
                $this->redirect('/');
            }
        }
        $_SESSION['flash'] = 'E-mail e/ou senha não conferem.';
        $this->redirect('/login');
    }
    
    public function signup(){
        $flash = '';
        if ( !empty($_SESSION['flash']) ) {
            $flash = $_SESSION['flash'];
            $_SESSION['flash'] = '';
        }
        $this->render('signup', [
            'flash' => $flash ?? false
        ]);
    }

    public function signupAction(){
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $pass = filter_input(INPUT_POST, 'password');
        $birthdate = filter_input(INPUT_POST, 'birthdate');

        if ( $name && $email && $pass && $birthdate ) {
            
            $birthdate = explode('/', $birthdate);
            
            if(count($birthdate) !== 3 ){
                $_SESSION['flash'] = "Data de Nascimento Inválida.";
                $this->redirect('/signup');
            }
            $birthdate = $birthdate[2].'-'.$birthdate[1].'-'.$birthdate[0];

            if( !strtotime($birthdate) ) {
                $_SESSION['flash'] = "Data de Nascimento Inválida.";
                $this->redirect('/signup');
            }

            if ( !LoginHandler::emailExists($email)) {
                $token = LoginHandler::addUser( $name, $email, $pass, $birthdate);

                $_SESSION['token'] = $token;
                $this->redirect('/');
            }else{
                $_SESSION['flash'] = 'E-mail ja Cadastrada.';
            }
    
        } else {
            $_SESSION['flash'] = 'Erro nos dados.';
            $this->redirect('/signup');
        }
    }
    public function logout(){
        $_SESSION['token'] = null;

        $this->redirect('/login');
    }

}
