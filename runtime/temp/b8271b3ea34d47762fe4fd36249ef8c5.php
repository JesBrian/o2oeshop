<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:78:"E:\GitHub-Project\o2oeshop\public/../application/bis\view\location\detail.html";i:1505995466;s:76:"E:\GitHub-Project\o2oeshop\public/../application/bis\view\public\header.html";i:1505568789;s:76:"E:\GitHub-Project\o2oeshop\public/../application/bis\view\public\footer.html";i:1505568844;}*/ ?>
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
  <link rel="stylesheet" type="text/css" href="__STATIC__/admin/uploadify/uploadify.css" />
<!--[if IE 6]>
<script type="text/javascript" src="http://lib.h-ui.net/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title>o2o平台</title>
<meta name="keywords" content="tp5打造o2o平台系统">
<meta name="description" content="o2o平台">
</head>
<div class="cl pd-5 bg-1 bk-gray mt-20"> <h1> 添加分店信息</h1></div>
<article class="page-container">
	<form class="form form-horizontal"  method="post" action="<?php echo url('location/add'); ?>">

		基本信息：
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>分店名称：</label>
			<div class="formControls col-xs-8 col-sm-3">
				<input type="text" class="input-text" value="<?php echo $bisLocationData['name']; ?>" placeholder="" id="" name="name">
			</div>
		</div>

		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>所属城市：</label>
			<div class="formControls col-xs-8 col-sm-2">
				<span class="select-box">
				<select name="city_id" class="select cityId">
					<option value="0"><?php echo $fiCityData['name']; ?></option>
				</select>
				</span>
			</div>
			<div class="formControls col-xs-8 col-sm-2">
				<span class="select-box">
				<select name="se_city_id" class="select se_city_id">
					<option value="0"><?php echo $seCityData['name']; ?></option>
				</select>
				</span>
			</div>
		</div>

		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">缩略图：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<img id="upload_org_code_img" src="<?php echo $bisLocationData['logo']; ?>" width="150" height="150">
			</div>
		</div>
		<div class="row cl">
			<label class="form-label col-xs-4 col-sm-2">门店介绍：</label>
			<div class="formControls col-xs-8 col-sm-9">
				<script id="editor"  type="text/plain" name="content" style="width:80%;height:300px;"><?php echo $bisLocationData['content']; ?></script>
                </div>
                </div>

                <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-2"><span class="c-red">*</span>所属分类：</label>
                <div class="formControls col-xs-8 col-sm-3"> <span class="select-box">
                    <select name="category_id" class="select categoryId">
                    	<option value="0"><?php echo $fiCategoryData['name']; ?></option>
                	</select>
                </span>
                </div>
                </div>
                <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-2">所属子类：</label>
                <div class="formControls col-xs-8 col-sm-3 skin-minimal">
                    <div class="check-box se_category_id">
                    <?php foreach($seCategoryData as $vo): ?>
						<?php echo $vo['name']; ?><label for="checkbox-moban">&nbsp;&nbsp;</label>
					<?php endforeach; ?>
                    </div>
                    </div>
                    </div>
                    <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-2">地址：</label>
                <div class="formControls col-xs-8 col-sm-3">
                    <input type="text" class="input-text" value="<?php echo $bisLocationData['address']; ?>" placeholder="" id="" name="address">
                    </div>
                    </div>
                    <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-2">电话:</label>
                <div class="formControls col-xs-8 col-sm-3">
                    <input type="text" class="input-text" value="<?php echo $bisLocationData['tel']; ?>" placeholder="" id="" name="tel">
                    </div>
                    </div>
                    <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-2">联系人:</label>
                <div class="formControls col-xs-8 col-sm-3">
                    <input type="text" class="input-text" value="<?php echo $bisLocationData['contact']; ?>" placeholder="" id="" name="contact">
                    </div>
                    </div>
                    <div class="row cl">
                    <label class="form-label col-xs-4 col-sm-2">营业时间:</label>
                <div class="formControls col-xs-8 col-sm-3">
                    <input type="text" class="input-text" value="<?php echo $bisLocationData['open_time']; ?>" placeholder="" id="" name="open_time">
                    </div>
                    </div>

                    <div class="row cl">
                    <div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-2">
                    <button onClick="article_save_submit();" class="btn btn-primary radius" type="submit"><i class="Hui-iconfont">&#xe632;</i> 申请</button>
                </div>
                </div>
                </form>
                </article>


<!--包含尾部文件-->
<script type="text/javascript" src="__STATIC__/admin/hui/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="__STATIC__/admin/hui/lib/layer/2.1/layer.js"></script> 
<script type="text/javascript" src="__STATIC__/admin/hui/lib/My97DatePicker/WdatePicker.js"></script> 
<script type="text/javascript" src="__STATIC__/admin/hui/lib/jquery.validation/1.14.0/jquery.validate.min.js"></script> 
<script type="text/javascript" src="__STATIC__/admin/hui/lib/jquery.validation/1.14.0/validate-methods.js"></script>
<script type="text/javascript" src="__STATIC__/admin/hui/lib/jquery.validation/1.14.0/messages_zh.min.js"></script>  
<script type="text/javascript" src="__STATIC__/admin/hui/static/h-ui/js/H-ui.js"></script> 
<script type="text/javascript" src="__STATIC__/admin/hui/static/h-ui.admin/js/H-ui.admin.js"></script>
<script type="text/javascript" src="__STATIC__/admin/js/common.js"></script>
<script type="text/javascript" src="__STATIC__/admin/uploadify/jquery.uploadify.min.js"></script>
<script type="text/javascript" src="__STATIC__/admin/js/image.js"></script>


<script type="text/javascript" src="__STATIC__/admin/hui/lib/ueditor/1.4.3/ueditor.config.js"></script>
<script type="text/javascript" src="__STATIC__/admin/hui/lib/ueditor/1.4.3/ueditor.all.min.js"> </script>
<script type="text/javascript" src="__STATIC__/admin/hui/lib/ueditor/1.4.3/lang/zh-cn/zh-cn.js"></script>


<!--分配编辑器-->
<script>
$(function(){
	var ue = UE.getEditor('editor');
	var ue1 = UE.getEditor('editor1');
});
</script>
</body>
</html>