<?php 
namespace app\admin\controller;

use think\Controller;


class Common extends Controller
{
    public function _initialize(){
        if(!session('id') || !session('name')){
            $this->error('非法访问',url('login/login'));
        }
    }



}