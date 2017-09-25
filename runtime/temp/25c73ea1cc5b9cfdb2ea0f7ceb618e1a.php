<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:76:"E:\GitHub-Project\o2oeshop\public/../application/index\view\index\index.html";i:1506311407;s:76:"E:\GitHub-Project\o2oeshop\public/../application/index\view\public\head.html";i:1506322491;s:75:"E:\GitHub-Project\o2oeshop\public/../application/index\view\public\nav.html";i:1506322779;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title><?php echo $title; ?></title>
    <link rel="shortcut icon" href="">
    <link rel="stylesheet" href="__STATIC__/index/css/base.css" />
    <link rel="stylesheet" href="__STATIC__/index/css/common.css" />
    <link rel="stylesheet" href="__STATIC__/index/css/<?php echo $controllerName; ?>.css" />
    <script type="text/javascript" src="__STATIC__/index/js/html5shiv.js"></script>
    <script type="text/javascript" src="__STATIC__/index/js/respond.min.js"></script>
    <script type="text/javascript" src="__STATIC__/index/js/jquery-1.11.3.min.js"></script>
</head>
<body>
<div class="header-bar">
    <div class="header-inner">
        <ul class="father">
            <li><a><?php echo $nowCity["name"]; ?></a></li>
            <li>|</li>
            <li class="city">
                <a>切换省份<span class="arrow-down-logo"></span></a>
                <div class="city-drop-down">
                    <h3>热门省份</h3>
                    <ul class="son">
                        <?php foreach($cityData as $vo): ?>
                        <li><a href="<?php echo url('index/index',['cityId'=>$vo['id']]); ?>"><?php echo $vo["name"]; ?></a></li>
                        <?php endforeach; ?>
                    </ul>

                </div>
            </li>

            <li class="welcome-text"><span class="welcome-tag" id="j-welcomeTag"></span></li>
            <?php if(\think\Session::get('user')): ?>
            <li>欢迎你：<a href=""><?php echo \think\Session::get('user')["username"]; ?></a><span class="sep-lines"></span></li>
            <li><a href="<?php echo url('user/logout'); ?>">退出</a><span class="sep-lines"></span></li>
            <?php else: ?>
            <li class="login"><a href="<?php echo url('/index/user/login'); ?>" id="j-barLoginBtn">登录</a><span class="sep-lines"></span></li>
            <li class="reg"><a href="<?php echo url('/index/user/register'); ?>" id="j-barRegBtn">注册</a><span class="sep-lines"></span></li>
            <?php endif; ?>
            <li class="login" style="margin-right:28px; float:right;"><b><a href="<?php echo url('/bis/login'); ?>" target="_blank">商户中心</a></b><span class="sep-lines"></span></li>

        </ul>
    </div>
</div>
<div class="search">
    <img src="__STATIC__/index/image/logo.png" />

</div>

<div class="nav-bar-header">
    <div class="nav-inner">
        <ul class="nav-list">
            <li class="nav-item">
                <span class="item">全部分类</span>
                <div class="left-menu">

                    <?php if(is_array($categoryData) || $categoryData instanceof \think\Collection || $categoryData instanceof \think\Paginator): if( count($categoryData)==0 ) : echo "" ;else: foreach($categoryData as $key=>$vo1): ?>
                    <div class="level-item">
                        <div class="first-level">
                            <dl>
                                <dt class="title"><a href="<?php echo url('lists/index',['categoryId'=>$vo1['id']]); ?>" target="_top"><?php echo $vo1['name']; ?></a></dt>
                                <?php if(is_array($vo1['seCategory']) || $vo1['seCategory'] instanceof \think\Collection || $vo1['seCategory'] instanceof \think\Paginator): $i = 0;$__LIST__ = is_array($vo1['seCategory']) ? array_slice($vo1['seCategory'],0,2, true) : $vo1['seCategory']->slice(0,2, true); if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo2): $mod = ($i % 2 );++$i;?>
                                <dd><a href="<?php echo url('lists/index',['categoryId'=>$vo2['id']]); ?>" target="_top" class=""><?php echo $vo2['name']; ?></a></dd>
                                <?php endforeach; endif; else: echo "" ;endif; ?>
                            </dl>
                        </div>
                        <div class="second-level">
                            <div class="section">
                                <div class="section-item clearfix">
                                    <h4>热门分类</h4>
                                    <ul>
                                        <?php if(is_array($vo1['seCategory']) || $vo1['seCategory'] instanceof \think\Collection || $vo1['seCategory'] instanceof \think\Paginator): if( count($vo1['seCategory'])==0 ) : echo "" ;else: foreach($vo1['seCategory'] as $key=>$vo2): ?>
                                        <li><a href="<?php echo url('lists/index',['categoryId'=>$vo2['id']]); ?>" target="_top" class="hot" mon="element=<?php echo $vo2['name']; ?>"><?php echo $vo2["name"]; ?></a></li>
                                        <?php endforeach; endif; else: echo "" ;endif; ?>
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>
                    <?php endforeach; endif; else: echo "" ;endif; ?>

                </div>
            </li>
            <li class="nav-item"><a href="<?php echo url('/'); ?>" class="item first active">首页</a></li>
            <li class="nav-item"><a class="item">个人中心</a></li>
            <li class="nav-item"><a class="item" href="<?php echo url('/bis/login'); ?>" target="_blank">商户中心</a></li>
        </ul>
    </div>
</div>


    <div class="container" style="position:relative">
        <div class="top-container">
            <div class="mid-area">
                <div class="slide-holder" id="slide-holder">
                    <a href="#" class="slide-prev"><i class="slide-arrow-left"></i></a>
                    <a href="#" class="slide-next"><i class="slide-arrow-right"></i></a>
                    <ul class="slideshow">
                        <?php foreach($featuredDataType0 as $vo): ?>
                        <li><a href="" class="item-large"><img class="ad-pic" src="<?php echo $vo['image']; ?>" /></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <div class="list-container" style="position:absolute; right:0; top:0;">
                    <ul>
                        <?php foreach($featuredDataType1 as $vo): ?>
                        <li><a><img src="<?php echo $vo['image']; ?>" /></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>

        <div class="content-container">
            <div class="no-recom-container">
                <div class="floor-content-start">
                    <?php if(is_array($categoryData) || $categoryData instanceof \think\Collection || $categoryData instanceof \think\Paginator): $i = 0;$__LIST__ = is_array($categoryData) ? array_slice($categoryData,0,4, true) : $categoryData->slice(0,4, true); if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo1): $mod = ($i % 2 );++$i;?>
                    <div class="floor-content">
                        <div class="floor-header">
                            <h3><?php echo $vo1['name']; ?></h3>
                            <ul class="reco-words">
                                <?php if(is_array($vo1['seCategory']) || $vo1['seCategory'] instanceof \think\Collection || $vo1['seCategory'] instanceof \think\Paginator): $i = 0;$__LIST__ = is_array($vo1['seCategory']) ? array_slice($vo1['seCategory'],0,4, true) : $vo1['seCategory']->slice(0,4, true); if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo2): $mod = ($i % 2 );++$i;?>
                                <li><a href="<?php echo url('lists/index',['categoryId'=>$vo2['id']]); ?>" target="_blank"><?php echo $vo2['name']; ?></a></li>
                                <?php endforeach; endif; else: echo "" ;endif; ?>
                                <li><a href="<?php echo url('lists/index',['categoryId'=>$vo1['id']]); ?>" class="no-right-border no-right-padding" target="_blank">全部<span class="all-cate-arrow"></span></a></li>
                            </ul>
                        </div>

                        <ul class="itemlist eight-row-height">
                            <?php if($vo1['dealData']): if(is_array($vo1['dealData']) || $vo1['dealData'] instanceof \think\Collection || $vo1['dealData'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vo1['dealData'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo3): $mod = ($i % 2 );++$i;?>
                                <li class="j-card">
                                    <a href="<?php echo url('detail/index',['dealId'=>$vo3['id']]); ?>">
                                        <div class="imgbox">
                                            <ul class="marketing-label-container">
                                                <li class="marketing-label marketing-free-appoint"></li>
                                            </ul>
                                            <div class="range-area">
                                                <div class="range-bg"></div>
                                                <div class="range-inner">
                                                    <span class="white-locate"></span>
                                                    <?php echo $nowCity["name"]; ?>&nbsp;&nbsp;&nbsp;<?php echo getSeCityName($vo3["se_city_id"]); ?>
                                                </div>
                                            </div>
                                            <div class="borderbox">
                                                <img src="<?php echo $vo3['image']; ?>" />
                                            </div>
                                        </div>
                                    </a>
                                    <div class="contentbox">
                                        <a href="//www.nuomi.com/deal/ke0370si.html" target="_blank">
                                            <div class="header">
                                                <h4 class="title "><?php echo $vo3['name']; ?></h4>
                                            </div>
                                            <p>【<?php echo countLocation($vo3['location_ids']); ?>间分店通用】</p>
                                        </a>
                                        <div class="pinfo">
                                            <span class="price"><span class="moneyico">¥</span><?php echo $vo3['current_price']; ?></span>
                                            <span class="ori-price">价值<span class="price-line">¥<span><?php echo $vo3['origin_price']; ?></span></span></span>
                                        </div>
                                        <div class="footer">
                                            <span class="sold">已售<span style="color:#FF4883"><?php echo $vo3['buy_count']; ?></span></span>
                                            <div class="bottom-border"></div>
                                        </div>
                                    </div>
                                </li>
                                <?php endforeach; endif; else: echo "" ;endif; else: ?>
                                <span style="margin:8px 38px 48px; display:inline-block; color:#ff4883; font-size:24px; font-weight:600">该城市下没有此分类数据</span>
                            <?php endif; ?>
                        </ul>
                    </div>
                    <?php endforeach; endif; else: echo "" ;endif; ?>

                </div>
            </div>
        </div>
    </div>

    <div class="footer-content">
        <div class="copyright-info">
            
        </div>
    </div>

    <script>
        var width = 800 * $("#slide-holder ul li").length;
        $("#slide-holder ul").css({width: width + "px"});

        //轮播图自动轮播
        var time = setInterval(moveleft,5000);

        //轮播图左移
        function moveleft(){
            $("#slide-holder ul").animate({marginLeft: "-737px"},600, function () {
                $("#slide-holder ul li").eq(0).appendTo($("#slide-holder ul"));
                $("#slide-holder ul").css("marginLeft","0px");
            });
        }

        //轮播图右移
        function moveright(){
            $("#slide-holder ul").css({marginLeft: "-737px"});
            $("#slide-holder ul li").eq(($("#slide-holder ul li").length)-1).prependTo($("#slide-holder ul"));
            $("#slide-holder ul").animate({marginLeft: "0px"},600);
        }

        //右滑箭头点击事件
        $(".slide-next").click(function () {
            clearInterval(time);
            moveright();
            time = setInterval(moveleft,5000);
        });

        //左滑箭头点击事件
        $(".slide-prev").click(function () {
            clearInterval(time);
            moveleft();
            time = setInterval(moveleft,5000);
        });
    </script>
</body>
</html>