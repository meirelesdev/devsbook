<?php

namespace src\handlers;

use \src\models\User;

class LoginHandler
{

    public static function checkLogin()
    {
        if (!empty($_SESSION['token'])) {
            $token = $_SESSION['token'];

            $data = User::select()
                ->where('token', $token)
                ->one();
            if (count($data) > 0) {

                $loggedUser = new User();
                
                $loggedUser->id = $data['id'];
                $loggedUser->email = $data['email'];
                $loggedUser->name = $data['name'];
                $loggedUser->birthdate = $data['birthdate'];
                $loggedUser->avatar = $data['avatar'];
                
                return $loggedUser;
            }
        }
        return false;
    }

    public static function verifyLogin($email, $pass)
    {
        $user = User::select()->where('email', $email)->one();

        if ($user) {
            if (password_verify($pass, $user['password'])) {
                $token = md5(time() . rand(0, 9999) . time());
                User::update()
                    ->set('token', $token)
                    ->where('email', $email)
                    ->execute();

                return $token;
            }
        }
        return false;
    }

    public static function emailExists($email)
    {
        $user = User::select()->where('email', $email)->one();
        return $user ? true : false;
    }

    public static function addUser($name, $email, $pass, $birthdate)
    {
        $hash = password_hash($pass, PASSWORD_DEFAULT);
        $token = md5( time().rand(0,9999).time() );

        User::insert([
            'email' => $email,
            'password' => $hash,
            'name' => $name,
            'birthdate' => $birthdate,
            'avatar' => 'default.jpg',
            'cover' => 'cover.jpg',
            'token' => $token
        ])->execute();

        return $token;
    }
}
