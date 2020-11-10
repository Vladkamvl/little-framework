<?php


namespace Controllers;


use Core\Application;
use Core\BaseController;
use Core\Request;

class AuthController extends BaseController
{
    public function login(){
        $this->setLayout('auth');
        return $this->render('login');
    }
    public function register(Request $request){
        if($request->isPost()){
            return Application::$app->renderer->renderContent('Handle submited data');
        }
        return $this->render('register');
    }
}