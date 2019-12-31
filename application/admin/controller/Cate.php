<?php 
namespace app\admin\controller;

//use app\cate\Common;
use \app\admin\model\Cate as CateModel;
use think\View;
use think\Db;
use app\admin\controller\Common;
use think\Validate;

class cate extends Common
{	
	protected $beforeActionList = [
			'delsoncate'  =>  ['only'=>'del,data'],
	];
	
	protected $rule = [
			'catename'		=>	'unique:cate|require|max:8',
			'pid'					=>	'require'
	];

	protected $msg = [
		'catename.unique'		=>		'名称已经存在',
		'catename.require'	=>		'名称不能为空',
		'catename.max'			=>		'名称长度太长',
		'pid'								=>		'顶级栏目不能为空'
	];

	protected $scene = [
		'add'   =>  ['catename','pid'],
		'edit'  =>  ['catename'=>'unique|require'],
	];

	public function lst(){
		
		$catel = new CateModel();
		$catelst = $catel->catetree();
		$this->assign('catelst',$catelst);
		
		return view();
	}

	public function add(){

		$Cate = new CateModel();
		if(request()->isPost()){					
			 $res = input('post.');
			 $rule = $this->rule;
			 $msg = $this->msg;
			 $validate = new Validate($rule,$msg);
			 if(!$validate->scene('add')->check($res)){
					$this->error($validate->getError());
			 }
			 $result = $Cate->save($res);
			 if($result){
				 $this->success('添加成功',url('lst'));
			 }else{
				 $this->error('请重新添加！');
			 }						
		}
		$polling = $Cate->catetree();
		$this->assign('polling',$polling);
		return view();
	}

	public function del(){
		$delete = Db::name('cate')->delete(input('id'));
		if($delete){
			$this->success('删除栏目成功',url('cate/lst'));
		}else{
			$this->error('删除栏目失败');
		}
	}

	public function delsoncate(){
		$cateid = input('id');
		$cateidmodel = new CateModel();
		$delcheid = $cateidmodel->getchiledid($cateid);
		$alldelid = $delcheid;
		$alldelid[] = $cateid;
		foreach($alldelid as $k=>$v){
			Db::name('article')->where('cateid',$v)->delete();
		}
		if($delcheid){
			Db::name('cate')->delete($delcheid);
		}		
	}

	public function edit(){
		$cate = new CateModel();
		$cates = $cate->find(input('id'));
		$polling = $cate->catetree();
		$rule = $this->rule;
		$msg  = $this->msg;
	  $validate = new Validate($rule,$msg);
		if(!$validate->scene('edit')->check($cates)){
			$this->error($validate->getError());
		}
		if(request()->isPost()){
				$data = $this->request->param();
				$res = $cate->where('id',$data['id'])->update($data);
				if($res){
					$this->success('修改成功',url('cate/lst'));
				}else{
					$this->error('修改失败');
				}
		}

		$this->assign(
			array(
				'polling' => $polling,
				'cates' => $cates
			)
		);
		return view();
	}
	


}