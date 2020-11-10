<?php


namespace Controllers;


use Core\Application;
use Core\BaseController;
use Core\Request;
use Models\RegisterModel;

class AuthController extends BaseController
{
    public function login(){

        return $this->render('login');
    }
    public function register(Request $request){

        $registerModel = new RegisterModel();

        if($request->isPost()){
            $registerModel->loadData($request->getBody());

            if($registerModel->validate() && $registerModel->register()){
                return 'Success';
            }
            vd($registerModel);

            return $this->render('register', [
                'model' => $registerModel
            ]);
        }
        $this->setLayout('auth');
        return $this->render('register', [
            'model' => $registerModel
        ]);
    }
}