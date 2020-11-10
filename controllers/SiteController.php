<?php


namespace Controllers;


use Core\Application;
use Core\BaseController;
use Core\Request;

class SiteController extends BaseController
{
    public function home(){
        $params = [
            'name' => 'TheMySite'
        ];
        return $this->render('home', $params);
    }
    public function contact(){
        return $this->render('contact');
    }
    public function handleContact(Request $request){
        $body = $request->getBody();
        vd($body);
        return 'post data handle';
    }
}