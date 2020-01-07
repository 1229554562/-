<?php 
namespace app\admin\validate;

use think\Validate;

class Conf extends Validate
{	
	protected $rule = [
		'cnname'  =>  'require|unique:conf|max:15',
		'enname'	=>	'require|unique:conf',
		'type'		=>	'require'

	];
	protected $message = [
		'cnname.require'		=>	'中文名字不能为空',
		'cnname.max'				=>	'中文名字太长',
		'cnname.unique'			=>	'中文名字不能重复',
		'enname.require' 		=>	'英文名字不能为空',
		'enname.unique'			=>	'英文名字不能重复',
		'type.require'		  =>	'链接不能为空',
	];
	protected $scene = [
		'edit'  =>  ['cnname','enname'],
];  

}