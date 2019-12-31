<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:66:"D:\wamp\www\yanglei\public/../application/admin\view\conf\conf.htm";i:1577515822;s:58:"D:\wamp\www\yanglei\application\admin\view\common\head.htm";i:1559011754;s:58:"D:\wamp\www\yanglei\application\admin\view\common\left.htm";i:1576568110;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>我的后台</title>

    <meta name="description" content="Dashboard">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!--Basic Styles-->
    <link href="/static/admin/style/bootstrap.css" rel="stylesheet">
    <link href="/static/admin/style/font-awesome.css" rel="stylesheet">
    <link href="/static/admin/style/weather-icons.css" rel="stylesheet">

    <!--Beyond styles-->
    <link id="beyond-link" href="/static/admin/style/beyond.css" rel="stylesheet" type="text/css">
    <link href="/static/admin/style/demo.css" rel="stylesheet">
    <link href="/static/admin/style/typicons.css" rel="stylesheet">
    <link href="/static/admin/style/animate.css" rel="stylesheet">

</head>

<body>
    <!-- 头部 -->
    <div class="navbar">
    <div class="navbar-inner">
        <div class="navbar-container">
            <!-- Navbar Barnd -->
            <div class="navbar-header pull-left">
                <a href="#" class="navbar-brand">
                    <small>
                            <img src="/static/admin/images/logo.png" alt="">
                    </small>
                </a>
            </div>
            <!-- /Navbar Barnd -->
            <!-- Sidebar Collapse -->
            <div class="sidebar-collapse" id="sidebar-collapse">
                <i class="collapse-icon fa fa-bars"></i>
            </div>
            <!-- /Sidebar Collapse -->
            <!-- Account Area and Settings -->
            <div class="navbar-header pull-right">
                <div class="navbar-account">
                    <ul class="account-area">
                        <li>
                            <a class="login-area dropdown-toggle" data-toggle="dropdown">
                                <div class="avatar" title="View your public profile">
                                    <img src="/static/admin/images/adam-jansen.jpg">
                                </div>
                                <section>
                                    <h2><span class="profile"><span><?php echo \think\Request::instance()->session('name'); ?></span></span></h2>
                                </section>
                            </a>
                            <!--Login Area Dropdown-->
                            <ul class="pull-right dropdown-menu dropdown-arrow dropdown-login-area">
                                <li class="username"><a>David Stevenson</a></li>
                                <li class="dropdown-footer">
                                    <a href="<?php echo url('admin/loginout'); ?>">
                                            退出登录
                                        </a>
                                </li>
                                <li class="dropdown-footer">
                                    <a href="<?php echo url('admin/password',array('id'=>\think\Request::instance()->session('id'))); ?>">
                                            修改密码
                                        </a>
                                </li>
                            </ul>
                            <!--/Login Area Dropdown-->
                        </li>
                        <!-- /Account Area -->
                        <!--Note: notice that setting div must start right after account area list.
                            no space must be between these elements-->
                        <!-- Settings -->
                    </ul>
                </div>
            </div>
            <!-- /Account Area and Settings -->
        </div>
    </div>
</div>
    <!-- /头部 -->

    <div class="main-container container-fluid">
        <div class="page-container">
            <!-- Page Sidebar -->
            <div class="page-sidebar" id="sidebar">
    <!-- Page Sidebar Header-->
    <div class="sidebar-header-wrapper">
        <input class="searchinput" type="text">
        <i class="searchicon fa fa-search"></i>
        <div class="searchhelper">Search Reports, Charts, Emails or Notifications</div>
    </div>
    <!-- /Page Sidebar Header -->
    <!-- Sidebar Menu -->
    <ul class="nav sidebar-menu">
        <!--Dashboard-->

        <li>
            <a href="#" class="menu-dropdown">
                <i class="menu-icon fa fa-user"></i>
                <span class="menu-text">管理员</span>
                <i class="menu-expand"></i>
            </a>
            <ul class="submenu">
                <li>
                    <a href="<?php echo url('admin/lst'); ?>">
                        <span class="menu-text">
                            管理员列表 </span>
                        <i class="menu-expand"></i>
                    </a>
                </li>
            </ul>
        </li>

        <li>
            <a href="#" class="menu-dropdown">
                <i class="menu-icon fa  fa-tasks"></i>
                <span class="menu-text">栏目管理</span>
                <i class="menu-expand"></i>
            </a>
            <ul class="submenu">
                <li>
                    <a href="<?php echo url('cate/lst'); ?>">
                        <span class="menu-text">
                            栏目列表 </span>
                        <i class="menu-expand"></i>
                    </a>
                </li>
            </ul>
        </li>

        <li>
            <a href="#" class="menu-dropdown">
                <i class="menu-icon fa fa-file-text"></i>
                <span class="menu-text">文章管理</span>
                <i class="menu-expand"></i>
            </a>
            <ul class="submenu">
                <li>
                    <a href="<?php echo url('article/lst'); ?>">
                        <span class="menu-text">
                            文章列表 </span>
                        <i class="menu-expand"></i>
                    </a>
                </li>
            </ul>
        </li>

        <li>
            <a href="#" class="menu-dropdown">
                <i class="menu-icon fa fa-chain"></i>
                <span class="menu-text">链接管理</span>
                <i class="menu-expand"></i>
            </a>
            <ul class="submenu">
                <li>
                    <a href="<?php echo url('link/lst'); ?>">
                        <span class="menu-text">
                            链接列表 </span>
                        <i class="menu-expand"></i>
                    </a>
                </li>
            </ul>
        </li>

        <li>
            <a href="#" class="menu-dropdown">
                <i class="menu-icon fa fa-gear"></i>
                <span class="menu-text">系统</span>
                <i class="menu-expand"></i>
            </a>
            <ul class="submenu">
                <li>
                    <a href="<?php echo url('conf/conf'); ?>">
                        <span class="menu-text">
                            配置 </span>
                        <i class="menu-expand"></i>
                    </a>
                </li>
                <li>
                    <a href="<?php echo url('conf/lst'); ?>">
                        <span class="menu-text">
                            配置列表 </span>
                        <i class="menu-expand"></i>
                    </a>
                </li>
            </ul>
        </li>



    </ul>
    <!-- /Sidebar Menu -->
</div>
            <!-- /Page Sidebar -->
            <!-- Page Content -->
            <div class="page-content">
                <!-- Page Breadcrumb -->
                <div class="page-breadcrumbs">
                    <ul class="breadcrumb">
                        <li>
                            <a href="<?php echo url('/admin/index'); ?>">主页</a>
                        </li>
                        <li class="active">配置</li>
                    </ul>
                </div>
                <!-- /Page Breadcrumb -->

                <!-- Page Body -->
                <div class="page-body">

                    <button type="button" tooltip="添加配置" class="btn btn-sm btn-azure btn-addon">
                    配置预览
                    </button>
                    <div class="row">
                        <div class="col-lg-12 col-sm-12 col-xs-12">
                            <form action="<?php echo url('Conf/conf'); ?>" method="POST">
                            <div class="widget">
                                <div class="widget-body">
                                    <div class="flip-scroll">
                                        <table class="table table-bordered table-hover">
                                            <thead class="">
                                                <tr>
                                                    <th class="text-center">配置名称</th>
                                                    <th class="text-left">配置值</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php if(is_array($conf) || $conf instanceof \think\Collection || $conf instanceof \think\Paginator): if( count($conf)==0 ) : echo "" ;else: foreach($conf as $key=>$fo): ?>
                                                <tr>
                                                    <td align="center" name="<?php echo $fo['enname']; ?>" ><?php echo $fo['cnname']; ?></td>
                                                    <td align="left">
                                                        <?php if($fo['type'] == 1): ?>
                                                            <input type="text" name="<?php echo $fo['enname']; ?>" class="form-control" value="<?php echo $fo['value']; ?>">
                                                        <?php elseif($fo['type'] == 2): ?>
                                                            <textarea name="<?php echo $fo['enname']; ?>"><?php echo $fo['value']; ?></textarea>
                                                        <?php elseif($fo['type'] == 3): if($fo['values']): $arr = explode(',',$fo['values']); endif; foreach($arr as $v):?>
                                                            <label>
                                                                <input type="radio" name="<?php echo $fo['enname']; ?>" value="<?php echo $v;?>">
                                                                <span class="text"><?php echo $v;?></span><br>
                                                            </label>
                                                            <?php endforeach;elseif($fo['type'] == 4): if($fo['values']): $arr = explode(',',$fo['values']); endif; foreach($arr as $v):?>
                                                            <label>
                                                                <input type="checkbox" class="col-name-" name="<?php echo $fo['enname']; ?>" value="<?php echo $v;?>">
                                                                <span class="text"><?php echo $v;?></span><br>
                                                            </label>
                                                            <?php endforeach;else: if($fo['values']): $arr = explode(',',$fo['values']);endif; ?>                                                           
                                                            <select name="<?php echo $fo['enname']; ?>">
                                                            <?php foreach($arr as $v):?>
                                                            <option value="0"><?php echo $v; ?></option>
                                                            <?php endforeach;?>
                                                            </select>                                                           
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                                <?php endforeach; endif; else: echo "" ;endif; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div style="margin-top:5px;margin-left:600px">
                                        <button type="submit">提交</button>
                                    </div>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>

                </div>
                <!-- /Page Body -->
            </div>
            <!-- /Page Content -->
        </div>
    </div>

    <!--Basic Scripts-->
    <script src="/static/admin/style/jquery_002.js"></script>
    <script src="/static/admin/style/bootstrap.js"></script>
    <script src="/static/admin/style/jquery.js"></script>
    <!--Beyond Scripts-->
    <script src="/static/admin/style/beyond.js"></script>



</body>

</html>