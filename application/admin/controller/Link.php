<?php 
namespace app\admin\controller;

//use app\cate\Common;
use \app\admin\model\Link as LInkModel;
use think\View;
use think\Db;
use think\Loader;
use app\admin\controller\Common; 

class Link extends Common
{	
	public function lst(LinkModel $linkmodel)
	{
			$res = $linkmodel->select();
			$this->assign('linkres',$res);
			return $this->fetch();
	}

	public function add(LInkModel $linkmodel)
	{
		if(request()->isPost()){
			$link = input('post.');
			$Loader = new Loader();
			$validate = $Loader::validate('Link');
			if(!$validate->check($link)){
				$this->error($validate->getError());
			}
			$val = $linkmodel->save($link);
			if($val){
				$this->success('添加链接成功',url('link/lst'));
			}else{
				$this->error('添加链接失败');
			}
		}
		return $this->fetch();
	}

	public function del(LinkModel $linkmodel)
	{
		$res = $this->request->param();
		$delres = $linkmodel->where('id',$res['id'])->delete();
		if($delres){
			$this->success('删除链接成功',url('link/lst'));
		}else{
			$this->error('删除链接失败');
		}
	}

	public function edit(LinkModel $linkmodel)
	{
		if(request()->isPost()){
			$editid = input('post.');
			$Loader = new Loader();
			$validate = $Loader::validate('Link');
			if(!$validate->check($editid)){
				$this->error($validate->getError());
			}
			$res = Db::name('link')->where('id',$editid['id'])->update($editid);
			if($res !== false){
				$this->success('修改成功',url('link/lst'));
			}else{
				$this->error('修改失败');
			}
		}
		$editid = $this->request->param();
		$editres = Db::name('link')->where('id',$editid['id'])->find();
		$this->assign('editres',$editres);
		return $this->fetch();
	}

}