<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:74:"E:\GitHub-Project\o2oeshop\public/../application/admin\view\bis\index.html";i:1505709637;s:78:"E:\GitHub-Project\o2oeshop\public/../application/admin\view\public\header.html";i:1505395700;s:78:"E:\GitHub-Project\o2oeshop\public/../application/admin\view\public\footer.html";i:1484376736;}*/ ?>
<!--包含头部文件-->
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<LINK rel="Bookmark" href="/favicon.ico" >
<LINK rel="Shortcut Icon" href="/favicon.ico" />
<!--[if lt IE 9]>
<script type="text/javascript" src="lib/html5.js"></script>
<script type="text/javascript" src="lib/respond.min.js"></script>
<script type="text/javascript" src="lib/PIE_IE678.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="__STATIC__/admin/hui/static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="__STATIC__/admin/hui/static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="__STATIC__/admin/hui/lib/Hui-iconfont/1.0.7/iconfont.css" />
<link rel="stylesheet" type="text/css" href="__STATIC__/admin/hui/lib/icheck/icheck.css" />
<link rel="stylesheet" type="text/css" href="__STATIC__/admin/hui/static/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="__STATIC__/admin/hui/static/h-ui.admin/css/style.css" />
  <link rel="stylesheet" type="text/css" href="__STATIC__/admin/css/common.css" />
<!--[if IE 6]>
<script type="text/javascript" src="http://lib.h-ui.net/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title>o2o平台</title>
<meta name="keywords" content="tp5打造o2o平台系统">
<meta name="description" content="o2o平台">
</head>


<link rel="stylesheet" type="text/css" href="__STATIC__/admin/css/common.css" />
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 商户入驻列表 </nav>
<div class="page-container">


	<div class="mt-20">
		<table class="table table-border table-bordered table-bg table-hover table-sort">
			<thead>
			<tr class="text-c">
				<th width="80">ID</th>
				<th width="100">商户名称</th>
				<th width="30">法人</th>
				<th width="150">联系电话</th>
				<th width="60">申请时间</th>
				<th width="60">状态</th>
				<th width="100">操作</th>
			</tr>
			</thead>
			<tbody>
			<?php foreach($bisData as $vo): ?>
			<tr class="text-c">
				<td><?php echo $vo['id']; ?></td>
				<td><?php echo $vo['name']; ?></td>
				<td class="text-c"><?php echo $vo['faren']; ?></td>
				<td class="text-c"><?php echo $vo['faren_tel']; ?></td>
				<td><?php echo $vo['create_time']; ?></td>
				<td class="td-status"><a href="<?php echo url('bis/status',['bisId' => $vo['id'], 'status' => $vo['status']==1?0:1]); ?>" title="点击修改状态"><?php echo status($vo['status']); ?></a></td>
				<td class="td-manage">
					<a style="text-decoration:none" class="ml-5" onClick="o2o_s_edit('查看','<?php echo url('bis/detail',['bisId' => $vo['id']]); ?>','1008',388)" href="javascript:;" title="查看"><i class="Hui-iconfont">&#xe6df;</i></a>
					<a style="text-decoration:none" class="ml-5" onClick="" href="<?php echo url('bis/status',['bisId' => $vo['id'], 'status' => -1]); ?>" title="删除"><i class="Hui-iconfont">&#xe6e2;</i></a>
				</td>
			</tr>
			<?php endforeach; ?>
			</tbody>
		</table>
	</div>
	<?php echo pagination($bisData); ?>
</div>
<!--包含头部文件-->
<script type="text/javascript" src="__STATIC__/admin/hui/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="__STATIC__/admin/hui/lib/layer/2.1/layer.js"></script> 
<script type="text/javascript" src="__STATIC__/admin/hui/lib/My97DatePicker/WdatePicker.js"></script> 
<script type="text/javascript" src="__STATIC__/admin/hui/lib/jquery.validation/1.14.0/jquery.validate.min.js"></script> 
<script type="text/javascript" src="__STATIC__/admin/hui/lib/jquery.validation/1.14.0/validate-methods.js"></script>
<script type="text/javascript" src="__STATIC__/admin/hui/lib/jquery.validation/1.14.0/messages_zh.min.js"></script>  
<script type="text/javascript" src="__STATIC__/admin/hui/static/h-ui/js/H-ui.js"></script> 
<script type="text/javascript" src="__STATIC__/admin/hui/static/h-ui.admin/js/H-ui.admin.js"></script>
<script type="text/javascript" src="__STATIC__/admin/js/common.js"></script>

