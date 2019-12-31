<?php 
namespace app\admin\controller;

use \app\admin\model\Conf as ConfModel;
use think\View;
use think\Db;
use think\Loader;
use app\admin\controller\Common; 

class Conf extends Common
{	
	public function lst()
	{
		$lst = ConfModel::paginate('10');
		$this->assign('lst',$lst);
		return view();
	}

	public function add()
	{
		if(request()->isPost()){
			$add = input('post.');
			if($add['values']){
				$add['values'] = str_replace('，',',',$add['values']);
			}
			$conf = new ConfModel();
			if($conf->save($add)){
				$this->success('添加成功',url('conf/lst'));
			}else{
				$this->error('添加失败');
			}
		}
		return view();
	}

	public function del()
	{
		$delid = $this->request->param();
		$res = ConfModel::destroy($delid);
		if ($res){
			$this->success('删除成功',url('conf/lst'));
		}else{
			$this->error('删除失败');
		}
	}

	public function edit()
	{
		if(request()->isPost()){
			$edit = input('post.');
			if($edit['values']){
				$edit['values'] = str_replace('，',',',$edit['values']);
			}
			$modify = ConfModel::where('id',$edit['id'])->update($edit);
			if($modify){
				$this->success('修改成功',url('conf/lst'));
			}else{
				$this->error('修改失败');
			}
		}
		$id = $this->request->param();
		$res = ConfModel::find($id);
		$this->assign('edit',$res);
		return $this->fetch();
	}
	
	public function conf()
	{
		if(request()->request()){
			$conf = $this->request->param();
			ConfModel::update($conf);
		}
		$conf = ConfModel::select();

		$this->assign('conf',$conf);
		return $this->fetch();
	}

}