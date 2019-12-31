<?php 
namespace app\admin\model;

use think\Model;

class Cate extends Model
{
    public function catetree(){
        $cateres = $this->select();
        return $this->sort($cateres);
    } 

    public function sort($cateres,$pid=0,$level=0){
        static $arr = [];
        foreach($cateres as $k => $v){
            if($v['pid'] == $pid){
                $v['level'] = $level;
                $arr[] = $v;
                $this->sort($cateres,$v['id'],$level+1);
            }    
        }
 
        return $arr;
    }

    public function getchiledid($cateid){
        $allid = $this->select();
        return $this->_getchiledid($allid,$cateid);
    }

    public function _getchiledid($allid,$pid){
        static $cateidarr = [];
        foreach($allid as $k => $v){
            if($v['pid'] == $pid){
                $cateidarr[] = $v['id'];
                $this->_getchiledid($allid,$v['id']);
            }
        }
         return $cateidarr;
    }

    
}