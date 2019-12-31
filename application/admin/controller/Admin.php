<?php 
namespace app\admin\controller;

//use app\admin\Common;

use think\View;
use think\Db;
use app\admin\model\Admin as AdminModel;
use think\Validate;

class Admin extends Common
{
	protected $rule=[
		'name'      =>  'unique:admin' ,
		'password'  =>  'require',
		'nickname'	=>	'unique:admin|chs'
	];

	protected $msg = [
		'name.unique'       =>  '登录账号已存在',
		'password.require'  =>  '用户密码不能为空',
		'nickname.unique'		=>	'用户名称已存在',
		'nickname'					=>	'名称请填写中文'
	];

	protected $scene = [
			'add'		=>	['name','password','nickname'],
			'edit'	=>	['password','name=>unique']
	];
	public function index(){
		return view();
	}

	public function lst(AdminModel $admin)
	{
		$adminid = session('id');
		$type = $admin::where('id',$adminid)->field('type')->find();
		$where = [];
		if($type['type']==0){
			$where['type'] = ['eq',0];
		}
		$res = $admin->getadmin($where);//调用model类里的getadmin方法		
		// $this->assign('adminlst',$res);
		// $this->assign('page',$page);
		return view('lst',['adminlst'=>$res,'type'=>$type['type']]);
	}

	public function edit($id,AdminModel $admin)
	{
    $admins = $admin->field('id,name,nickname')->find($id);
		if(request()->isPost()){//判断是否是前面表单传来的数据
			$data =input('post.');
			$validate = new Validate($this->rule,$this->msg);
			if(!$validate->scene('edit')->check($data)) {
				$this->error($validate->getError());
			}
			if($data['password']!=$data['password2']){
				$this->error('两次密码不一致！');
			}
			if($admin->getadd($data,$admins) !== false){
				$this->success('修改成功！',url('lst'));
			}else{
				$this->error('修改失败');
			}
			return;
		}

		if(!$admins){
			$this->error('该管理员不存在');
		}
		$this->assign('admin',$admins);
		return $this->fetch();
	}

	public function delete($id , AdminModel $admin){
	    $a = $admin->getdelete($id);
        if($a==true){
            $this->success("删除成功",url('lst'));
        }else{
            $this->error('删除失败');
        }

    }

	public function add(){
		if(request()->isPost()){//判断是不是表单传来的数据
			$admin = new AdminModel();
			$pst = input('post.');
			$rule = $this->rule;
			$msg	= $this->msg;
			$validate = new Validate($rule,$msg);
			if(!$validate->scene('add')->check($pst)) {
				$this->error($validate->getError());
			}
			if($pst['password']!=$pst['password2']){
				$this->error('两次输入的密码不一致！');
			}
			$res = $admin->addadmin($pst);

			if($res){
				$this->success('添加管理员成功',url('lst'));
			}else{
				$this->error('添加管理员失败');
			}
			return ;
		}
		return view();
	}

	public function password($id){

	    $admins = db('admin')->field('id,name')->find($id);

        if(request()->isPost()){
            $admin = new AdminModel();
            $data= [];
						$data = input('post.');
						$data['id'] = $admins['id'];
						if($data['password']!=$data['password2']){
							$this->error('两次输入密码不一致！');
						}
            $result = $admin->getpassword($data,$admins);
            if($result !== false){
                $this->success('密码修改成功！',url('login/login'));
            }else{
                $this->error('密码修改失败！');
            }
            return;
        }
        return view();
    }

    public function loginout(){
         session(null);
         $this->success('退出系统成功',url('login/login'));

	}
	
	


}