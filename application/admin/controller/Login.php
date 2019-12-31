<?php
namespace app\admin\controller;

use think\Controller;
use app\admin\model\Admin as Adminas;

class Login extends Controller
{
    public function login()
    {

        if(request()->isPost()){
            $admin = new Adminas();
           // dump(input('post.'));die;
            $num = $admin->login(input("post."));           
            if($num==1){
                $this->error('用户不存在！');
            }
            if($num==2){
                $this->success('登录成功',url('index/index'));
            }
            if($num==3){
                $this->error('密码错误');
            }
            return;


        }
        return view();
    }
}
