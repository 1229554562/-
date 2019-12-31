<?php 
namespace app\admin\validate;

use think\Validate;

class Link extends Validate
{	
	protected $rule = [
		'title' =>  'require|max:15',
		'desc'	=>	'require',
		'url'		=>	'require|url|unique:link'

	];
	protected $message = [
		'title.require'		=>	'标题不能为空',
		'title.max'				=>	'标题太长',
		'desc.require' 		=>	'链接描述不能为空',
		'url.require'			=>	'链接不能为空',
		'url.url'					=>	'必须是链接',
		'url.unique'			=>	'此链接已存在'
	];
	protected $scene = [
		'add'   =>  ['url','desc','title'],
		'edit'  =>  ['title','url'],
];  

}