<?php 
namespace app\admin\model;

use app\admin\model\Admin as AdminModel;
use think\Model;


class Admin extends Model
{

    public function addadmin($data)
    {
        $pass = "yl";
        if (empty($data) || !is_array($data)) {
            return false;
        }
        if ($data['password']) {
            $insert['password'] = md5(md5($data['password']).$pass);
        }
        $insert['name']     = $data['name'];
        $insert['type']     = $data['ifsuper'];
        $insert['nickname'] = $data['nickname'];
        if ($this->save($insert)) {//save插入的意思
            return true;
        } else {
            return false;
        }
    }

    public function getadmin($where)//分页
    {
        return $this::where($where)->order('id asc')->paginate(5);
    }

    public function getadd($data,$admins)
    {
        $pass = "yl";
        if(!$data['nickname']){
           return 2;
        }
        if(!$data['password']){
            $data['password'] = $data['password'];
        }else{
            $data['password'] = md5(md5($data['password']).$pass);
        }
        //$res = db('admin')->update(input("post."));//update有返回值，返回值为1
        //$admins = new AdminModel();
        return $this::update(['nickname'=>$data['nickname'],'password'=>$data['password'],'id'=>$data['id']]);
    }

    public function  getdelete($id){
        $judge = $this->where('id',$id)->find();
        if(!$judge){
            return  false;
         }
        if($this::destroy($id)){
            return true;
        }else{
            return false;
        }
    }

    public function login($data){
       $admin = Admin::getByName($data['name']);
       if($admin){
           $pass = 'yl';
           if(md5(md5($data['password']).$pass) == $admin['password']){
                session('id',$admin['id']);
                session('name',$admin['nickname']);
                return 2;
           }else{
                return 3;
           }

       }else{
           return 1;
       }

    }

    public function getpassword($data,$admins)
    {
        if(!$data['password']){
            $data['password'] = $data['password'];
        }else{
            $pass = "yl";
            $data['password'] = md5(md5($data['password']).$pass);

        }
        return $this::update(['password'=>$data['password'],'id'=>$admins['id']]);

    }

    
}