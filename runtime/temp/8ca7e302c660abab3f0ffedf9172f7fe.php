<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:75:"E:\GitHub-Project\o2oeshop\public/../application/admin\view\deal\index.html";i:1486386900;s:78:"E:\GitHub-Project\o2oeshop\public/../application/admin\view\public\header.html";i:1484376710;s:78:"E:\GitHub-Project\o2oeshop\public/../application/admin\view\public\footer.html";i:1484376736;}*/ ?>
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
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 团购商品列表 </nav>
<div class="page-container">
<div class="cl pd-5 bg-1 bk-gray mt-20"> 
	<div class="text-c">
		 <span class="select-box inline">
			<select name="category_id" class="select">
				<option value="0">全部分类</option>
				
			</select>
		</span>
		<span class="select-box inline">
			<select name="city_id" class="select">
				<option value="0">全部城市</option>
				
			</select>
		</span> 日期范围：
		<input type="text" name="start_time" class="input-text" id="countTimestart" onfocus="selecttime(1)" value="" style="width:120px;" >
			-
		<input type="text" name="end_time" class="input-text" id="countTimestart" onfocus="selecttime(1)" value=""  style="width:120px;">
		<input type="text" name="name" id="" placeholder=" 商品名称" style="width:250px" class="input-text">
		<button name="" id="" class="btn btn-success" type="submit"><i class="Hui-iconfont">&#xe665;</i> 搜索
		</button>
	</div>
</div>
	<div class="mt-20">
		<table class="table table-border table-bordered table-bg table-hover table-sort">
			<thead>
				<tr class="text-c">
					<th width="20">ID</th>
					<th width="100">商品名称</th>
					<th width="40">栏目分类</th>
					<th width="40">城市</th>
					<th width="40">购买件数</th>
					<th width="80">开始结束时间</th>
					<th width="80">创建时间</th>
					<th width="60">状态</th>
					<th width="40">操作</th>
				</tr>
			</thead>
			<tbody>
				
				<tr class="text-c">
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td class="td-manage"><a style="text-decoration:none" class="ml-5" onClick="" href="javascript:;" title="查看"><i class="Hui-iconfont">&#xe6df;</i></a> <a style="text-decoration:none" class="ml-5" onClick="" href="javascript:;" title="下架"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
				</tr>
				
			</tbody>
		</table>
	</div>
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

<script src="__STATIC__/admin/hui/lib/My97DatePicker/WdatePicker.js"></script>
