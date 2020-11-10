<?php


namespace Models;


use Core\BaseModel;

class RegisterModel extends BaseModel
{
    public string $login;
    public string $email;
    public string $password;
    public string $confirmPassword;

    public function register(){
        echo 'Create new user';
    }
}