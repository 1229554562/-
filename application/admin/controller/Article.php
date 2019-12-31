<?php 
namespace app\admin\controller;

//use app\admin\Common;

use app\admin\model\Article as ArticleModel;
use app\admin\model\Cate;
use think\View;
use think\Db;
use think\Validate;

class Article extends Common
{
	/***
	 * 定义验证的名称
	 */
	protected $rule = [
											'title'  		=> 	'require|max:15',
											'keyword'   => 	'require|max:10',
											'des' 			=> 	'require',
											'author'		=>	'require',
											'content'		=>	'require'
										];
	/**
	 * 定义不成立的方法
	 */
	protected $msg = [
											'title.require' 			=> '标题不能为空',
											'title.max'     			=> '标题不能太长',
											'keyword.require'   	=> '作者不能为空',
											'keyword.max'					=> '作者名称太长',
											'des.require'  				=> '描述不能为空',
											'author.require'      => '栏目不能为空',
											'content.require'			=> '内容不能为空'
										];

	public function lst()
	{
		$lst = Db::name('article')->alias('ar')
			->field('ar.*,ca.catename')
			->join('__CATE__ ca','ca.id = ar.cateid','left')
			->paginate(8);
		$this->assign('lst',$lst);
		return $this->fetch();
	}

	public function add()
	{
		$Article = new ArticleModel();
		
	
		if(request()->isPost()){
			$adddata = input('post.');
			$adddata['time'] = time();
			$rule = $this->rule;
			$msg	= $this->msg;
			$validate = new Validate($rule, $msg);		 
			if(!$validate->check($adddata)){
					$this->error($validate->getError());
			}
			if($Article->save($adddata)){
				$this->success('添加成功',url('article/lst'));
			}else{
				$this->error('添加失败');
			}
		
			return;
		}
		$cate = new Cate();
		$polling = $cate->catetree();
		$this->assign('polling' , $polling);
		return $this->fetch();
	}
	
	public function del()
	{
		$delid = $this->request->param();
		$article = new ArticleModel();
		if($article::destroy($delid)){
			$this->success('删除成功');
		}else{
			$this->error('删除失败');
		}
	}

	public function edit()
	{
		if(request()->isPost()){
			$edit_data = input('post.');
			$edit = new ArticleModel();
			$rule = $this->rule;
			$msg  = $this->msg;
			$validate = new Validate($rule,$msg);
			if(!$validate->check($edit_data)){
					$this->error($validate->getError());
			}
			$val = $edit->update($edit_data);
			if($val){
				$this->success('修改成功',url('article/lst'));
			}else{
				$this->error('修改失败');
			}
		}
		$editid = $this->request->param();
		$edit =	Db::name('article')->where('id',$editid['id'])->find();
		$cate = new Cate();
		$polling = $cate->catetree();
		$this->assign([
				'edit'		=>	$edit,
				'polling' => $polling
			]);
		return $this->fetch();
	}
}