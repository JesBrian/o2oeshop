<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:76:"E:\GitHub-Project\o2oeshop\public/../application/index\view\lists\index.html";i:1506432535;s:76:"E:\GitHub-Project\o2oeshop\public/../application/index\view\public\head.html";i:1506426092;s:75:"E:\GitHub-Project\o2oeshop\public/../application/index\view\public\nav.html";i:1506424104;}*/ ?>
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
    <link rel="stylesheet" href="__STATIC__/admin/css/common.css" />
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
                <a href="<?php echo url('lists/index'); ?>" class="item">全部分类</a>
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


    <div class="page-body">
        <div class="filter-bg">
            <div class="filter-wrap">
                <div class="w-filter-ab-test">
                    <div class="w-filter-top-nav clearfix" style="margin:12px">
                        
                        
                    </div>
                    
                    <div class="filter-wrapper">
                        <div class="normal-filter ">
                            <div class="w-filter-normal-ab  filter-list-ab">
                                <h5 class="filter-label-ab">分类</h5>
                                <span class="filter-all-ab">
                                    <a href="<?php echo url('lists/index'); ?>" class="w-filter-item-ab  item-all-auto-ab"><span class="item-content <?php if($fiCategoryId == 0): ?> filter-active-all-ab <?php endif; ?>">全部</span></a>
                                </span>
                                <div class="j-filter-items-wrap-ab filter-items-wrap-ab">
                                    <div class="j-filter-items-ab filter-items-ab filter-content-ab">
                                        <?php foreach($categorys as $vo): ?>
                                        <a href="<?php echo url('lists/index',['categoryId' => $vo['id']]); ?>" class="w-filter-item-ab"><span class="item-content <?php if($fiCategoryId == $vo['id']): ?> filter-active-all-ab <?php endif; ?>"><?php echo $vo['name']; ?></span></a>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <?php if($seCategorys): ?>
                    <div class="filter-wrapper">
                        <div class="normal-filter ">
                            <div class="w-filter-normal-ab  filter-list-ab">
                                <h5 class="filter-label-ab">子分类</h5>
                                <span class="filter-all-ab">
                                    
                                </span>
                                <div class="j-filter-items-wrap-ab filter-items-wrap-ab">
                                    <div class="j-filter-items-ab filter-items-ab filter-content-ab">
                                        <?php foreach($seCategorys as $vo): ?>
                                        <a href="<?php echo url('lists/index',['categoryId' => $vo['id']]); ?>" class="w-filter-item-ab"><span class="item-content <?php if($seCategoryId == $vo['id']): ?> filter-active-all-ab <?php endif; ?>"><?php echo $vo['name']; ?></span></a>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
                <div class="w-sort-bar">
                    <div class="bar-area" style="position: relative; left: 0px; margin-left: 0px; margin-right: 0px; margin-top: 0px; top: 0px;">
                        <span class="sort-area">
                            <a href="<?php echo url('lists/index',['categoryId'=>$nowCategoryId]); ?>" class="sort-default <?php if(!$orderData['buy_count'] && !$orderData['current_price'] && !$orderData['create_time']): ?> sort-default-active <?php endif; ?>">默认</a>
                            <a href="<?php echo url('lists/index',['categoryId'=>$nowCategoryId,'buy_count'=>'desc']); ?>" class="sort-item <?php if($orderData['buy_count']): ?> sort-default-active <?php endif; ?>" title="点击按销量降序排序">销量↓</a>
                            <a href="<?php echo url('lists/index',['categoryId'=>$nowCategoryId,'current_price'=>'desc']); ?>" class="sort-item <?php if($orderData['current_price']): ?> sort-default-active <?php endif; ?>" title="点击按价格降序排序">价格↓</a>
                            <a href="<?php echo url('lists/index',['categoryId'=>$nowCategoryId,'create_time'=>'desc']); ?>" class="sort-item <?php if($orderData['create_time']): ?> sort-default-active <?php endif; ?>" title="发布时间由近到远">最新发布↑</a>
                        </span>
                        
                    </div>
                </div>
                <ul class="itemlist eight-row-height">

                    <?php foreach($dealData as $vo): ?>
                    <li class="j-card">
                        <a href="<?php echo url('detail/index',['dealId'=>$vo['id']]); ?>" target="_blank">
                            <div class="imgbox">
                                <ul class="marketing-label-container">
                                    <li class="marketing-label marketing-free-appoint"></li>
                                </ul>
                                <div class="range-area">
                                    <div class="range-bg"></div>
                                    <div class="range-inner">
                                        <span class="white-locate"></span>
                                        <?php echo $nowCity["name"]; ?>&nbsp;&nbsp;&nbsp;<?php echo getSeCityName($vo["se_city_id"]); ?>
                                    </div>
                                </div>
                                <div class="borderbox">
                                    <img src="<?php echo $vo['image']; ?>" />
                                </div>
                            </div>
                        </a>
                        <div class="contentbox">
                            <a href="//www.nuomi.com/deal/ke0370si.html" target="_blank">
                                <div class="header">
                                    <h4 class="title "><?php echo $vo['name']; ?></h4>
                                </div>
                                <p>【<?php echo countLocation($vo['location_ids']); ?>间分店通用】</p>
                            </a>
                            <div class="pinfo">
                                <span class="price"><span class="moneyico">¥</span><?php echo $vo['current_price']; ?></span>
                                <span class="ori-price">价值<span class="price-line">¥<span><?php echo $vo['origin_price']; ?></span></span></span>
                            </div>
                            <div class="footer">
                                <span class="sold">已售<span style="color:#FF4883"><?php echo $vo['buy_count']; ?></span></span>
                                <div class="bottom-border"></div>
                            </div>
                        </div>
                    </li>
                    <?php endforeach; ?>

                </ul>
            </div>
        </div>
        <div class="content-wrap">共<span style="color: #ff4883">4321</span>条</div>
        <div style="width:100%; margin:8px auto; text-align:center;"><?php echo pagination($dealData); ?></div>
    </div>

    <div class="footer-content">
        <div class="copyright-info">
            
        </div>
    </div>
    <script>
        $(".tab-item-wrap").click(function(){
            var index = $(".tab-item-wrap").index(this);
            $(".tab-item-wrap").removeClass("selected");
            $(".district-cont-wrap").css({display: "none"});
            $(this).addClass("selected");
            $(".district-cont-wrap").eq(index).css({display: "block"});
        });

        $(".sort-area a").click(function(){
            $(".sort-area a").removeClass("sort-default-active").css({color: "#666"});
            $(this).addClass("sort-default-active").css({color: "#ff4883"});
        });
    </script>
</body>
</html>