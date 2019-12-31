<?php 
namespace app\admin\model;

use think\Model;


class Article extends Model
{
  protected static function init()
  {
      Article::event('before_insert', function ($adddata) {
        if($_FILES['thumb']['tmp_name']){
          $img = request()->file('thumb');
          $info = $img->move(ROOT_PATH . 'public' . DS . 'uploads');
          if($info){
            $val = DS . 'uploads' . DS . $info->getSaveName();
            $adddata['thumb'] = $val;
          }else{
            echo $img->getError();
          }
        }
      });

      Article::event('before_update', function ($adddata) {
        if($_FILES['thumb']['tmp_name']){
          $art = Article::find($adddata->id);
          $respash = $_SERVER['DOCUMENT_ROOT'].$art['thumb'];
          if(file_exists($respash)){
            @unlink($respash);
          }
          $img = request()->file('thumb');
          $info = $img->move(ROOT_PATH . 'public' . DS . 'uploads');
          if($info){
            $val = DS . 'uploads' . DS . $info->getSaveName();
            $adddata['thumb'] = $val;
          }
        }
      });

      Article::event('before_delete', function ($edit_data) {
          $art = Article::find($edit_data->id);
          $respash = $_SERVER['DOCUMENT_ROOT'].$art['thumb'];
          if(file_exists($respash)){
            @unlink($respash);
          }
      });

  }


    
}