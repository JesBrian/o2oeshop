<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:77:"E:\GitHub-Project\o2oeshop\public/../application/index\view\detail\index.html";i:1506341383;s:76:"E:\GitHub-Project\o2oeshop\public/../application/index\view\public\head.html";i:1506426092;s:75:"E:\GitHub-Project\o2oeshop\public/../application/index\view\public\nav.html";i:1506424104;}*/ ?>
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


    <div class="p-detail">
        <div class="p-bread-crumb">
            <div class="w-bread-crumb">
                <ul class="crumb-list">
                    <li class="crumb"><a>团购</a><span class="ico-gt">&gt;</span></li>
                    <?php foreach($categoryData as $vo): if($vo['id'] == $dealData['category_id']): ?>
                            <li class="crumb"><a href="<?php echo url('lists/index',['categoryId'=>$vo['id']]); ?>"><?php echo $vo['name']; ?></a><span class="ico-gt">&gt;</span></li>
                        <?php endif; endforeach; ?>
                    <li class="crumb crumb-last"><a><?php echo $bisData['name']; ?></a></li>
                </ul>
            </div>
        </div>
        <div class="static-hook-real static-hook-id-5"></div>
        <div class="p-item-info">
            <div class="w-item-info">
                <h2><?php echo $nowCity["name"]; ?>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $bisData['name']; ?></h2>
                <div class="item-title">
                    <span class="text-main"><?php echo $dealData['name']; ?></span>
                </div>
                <div class="ii-images static-hook-real static-hook-id-6">
                    <div class="w-item-images">
                        <div class="images-board">
                            <div class="item-status ">
                                <span class="ico-status ico-jingxuan"></span>
                            </div>
                            <img src="<?php echo $dealData['image']; ?>" class="item-img-large" style="border:1px solid #777;" />
                        </div>
                        <ul class="images-list clearfix">
                            <li class="images images-last">
                                <img src="<?php echo $dealData['image']; ?>" style="border:1px solid #777;" />
                            </li>
                        </ul>
                        <div class="erweima-share-collect">
                            <ul class="item-option clearfix">
                                <li class=" ">

                                    <div class="collect-success">

                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="ii-intro">
                    <div class="w-item-intro">
                        <div class="price-area-wrap static-hook-real static-hook-id-8">
                            <div class="price-area has-promotion-icon">
                                <div class="pic-price-area">
                                    <span class="unit">¥</span>
                                    <span class="priceNum"><?php echo $dealData['current_price']; ?></span>
                                </div>

                                <div class="market-price-area">
                                    <div class="price">¥<?php echo $dealData['origin_price']; ?></div>
                                    <div class="name">价值</div>
                                </div>


                            </div>
                        </div>
                        <div class="static-hook-real static-hook-id-9">
                            <a class="link jingxuan-box" alt="更多精选品牌特惠">
                                <div class="box">

                                    <div class="jx-update" id="j-jxUpdateTime">
                                        <span>距离开始时间还有</span>
                                        <span class="jx-timerbox"><?php echo countDown($dealData['start_time']); ?></span>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <ul class="ugc-strategy-area static-hook-real static-hook-id-10">
                            <li class="item-bought">
                                <div class="sl-wrap">
                                    <div class="sl-wrap-cnt">
                                        <div class="item-bought-num"><span class="intro-strong"><?php echo $dealData['buy_count']; ?></span>人已团购</div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <div class="buy-panel-wrap">
                            <div class="buy-panel">
                                <div class="validdate-buycount-area static-hook-real static-hook-id-11">
                                    <div class="item-countdown-row">
                                        <span class="name">有效期</span>
                                        <span class="value"><?php echo date("Y-m-d",$dealData['coupons_end_time']); ?></span>
                                    </div>
                                    <div class="item-buycount-row j-item-buycount-row">
                                        <div class="name">数&nbsp;&nbsp;&nbsp;量</div>
                                        <div class="buycount-ctrl">
                                            <a href="javascript:;" class="j-ctrl ctrl minus disabled"><span class="horizontal"></span></a>
                                            <input type="text" value="1" maxlength="10" autocomplete="off">
                                            <a href="javascript:;" class="ctrl j-ctrl plus "><span class="horizontal"></span><span class="vertical"></span></a>
                                        </div>
                                        <div class="text-wrap">
                                            <span class="left-budget">优惠价剩余<?php echo $dealData['total_count'] - $dealData['buy_count']; ?>份</span>
                                            <span class="err-wrap j-err-wrap"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="item-buy-area">
                                    <div style="float:left" class="static-hook-real static-hook-id-12">
                                        <a href="" class="btn-buy btn-buy-qrnew j-btn-buy btn-hit">立即抢购</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="p-item-info-more">
            <div class="iim-wrapper">
                <div class="spec-nav ">
                    <div class="nav-bar"></div>
                    <div class="w-spec-nav" style="position: static; top: auto; z-index: auto;">
                        <ul class="sn-list">
                            <li class="spec-nav-current">
                                <i></i><a><span>本单详情</span></a>
                            </li>
                            <li class="">
                                <i></i><a><span>消费提示</span></a>
                            </li>
                            <li class="">
                                <i></i><a><span>商家介绍</span></a>
                            </li>
                        </ul>

                    </div>
                </div>
                <ul class="j-info-all" style="font-size:15px; line-height:1.3em; letter-spacing:1px;">
                    <li class="tab">
                        <div class="ia-shop-branch">
                            <div class="w-shop-branch">
                                <h3 class="w-section-header">总店信息</h3>
                                <div class="branch-content">
                                    <div class="shop-map">
                                        <div class="w-map">
                                            <div class="map-container" style="overflow: hidden; position: relative; z-index: 0; color: rgb(0, 0, 0); text-align: left; background-color: rgb(243, 241, 236);">
                                                <div style="overflow: visible; position: absolute; z-index: 0; left: 0px; top: 0px; cursor: url('https://api.map.baidu.com/images/openhand.cur') 8 8, default;">
                                                    <div class="BMap_mask" style="position: absolute; left: 0px; top: 0px; z-index: 9; overflow: hidden; -webkit-user-select: none; width: 325px; height: 325px;"></div>
                                                    <div style="position: absolute; height: 0px; width: 0px; left: 0px; top: 0px; z-index: 200;">
                                                        <div style="position: absolute; height: 0px; width: 0px; left: 0px; top: 0px; z-index: 800;"></div>
                                                        <div style="position: absolute; height: 0px; width: 0px; left: 0px; top: 0px; z-index: 700;">
                                                            <span class="BMap_Marker BMap_noprint" style="position: absolute; padding: 0px; margin: 0px; border: 0px; cursor: pointer; width: 19px; height: 25px; left: 96px; top: 152px; z-index: -7994158; background: url(&quot;https://api.map.baidu.com/images/blank.gif&quot;);" title=""></span>
                                                            <span class="BMap_Marker BMap_noprint" unselectable="on" style="position: absolute; padding: 0px; margin: 0px; border: 0px; cursor: pointer; width: 19px; height: 25px; left: 65px; top: 147px; z-index: -7998040; background: url(&quot;https://api.map.baidu.com/images/blank.gif&quot;);" title=""></span>
                                                            <span class="BMap_Marker BMap_noprint" unselectable="on" style="position: absolute; padding: 0px; margin: 0px; border: 0px; cursor: pointer; width: 19px; height: 25px; left: 240px; top: 101px; z-index: -8030418; background: url(&quot;https://api.map.baidu.com/images/blank.gif&quot;);" title=""></span>
                                                            <span class="BMap_Marker BMap_noprint" unselectable="on" style="position: absolute; padding: 0px; margin: 0px; border: 0px; cursor: pointer; width: 19px; height: 25px; left: 143px; top: 174px; z-index: -7979020; background: url(&quot;https://api.map.baidu.com/images/blank.gif&quot;);" title=""></span>
                                                        </div>
                                                        <div style="position: absolute; height: 0px; width: 0px; left: 0px; top: 0px; z-index: 600;"></div>
                                                        <div style="position: absolute; height: 0px; width: 0px; left: 0px; top: 0px; z-index: 500;"><label class="BMapLabel" unselectable="on" style="position: absolute; display: none; cursor: inherit; border: 1px solid rgb(190, 190, 190); padding: 1px; white-space: nowrap; font-style: normal; font-variant: normal; font-weight: normal; font-stretch: normal; font-size: 12px; line-height: normal; font-family: arial, sans-serif; z-index: -20000; color: rgb(190, 190, 190); background-color: rgb(190, 190, 190);">shadow</label></div>

                                                        <div style="position: absolute; height: 0px; width: 0px; left: 0px; top: 0px; z-index: 201;"></div>
                                                        <div style="position: absolute; height: 0px; width: 0px; left: 0px; top: 0px; z-index: 200;"></div>
                                                    </div>
                                                    <div style="position: absolute; overflow: visible; top: 0px; left: 0px; z-index: 1;">
                                                        <div style="position: absolute; overflow: visible; z-index: -100; left: 0px; top: 0px; display: block; transform: translate3d(0px, 0px, 0px);">
                                                            <img src="<?php echo url('map/getMapImage',['data'=>$locationData[0]['xpoint'] . ',' . $locationData[0]['ypoint']]); ?>" style="width:425px; height:408px;">

                                                        </div>
                                                    </div>

                                                </div>

                                            </div>
                                            <a class="map-zoom">
                                                <span>查看完整地图</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="branch-detail">
                                        <div>
                                            <div class="branch-list-content">
                                                <div class="w-branch-list">
                                                    <ul class="branch-list-content">
                                                        <?php foreach($locationData as $vo): ?>
                                                            <li class="branch branch-open">
                                                                <a href="//www.nuomi.com/shop/133957" target="_blank" class="branch-name"><?php echo $vo['name']; ?></a>
                                                                <p class="branch-address"><?php echo $vo['address']; ?></p>
                                                                <p class="branch-tel"><?php echo $vo['tel']; ?></p>
                                                                <p class="map-travel">
                                                                    <a href="javascript:;" class="map">
                                                                        <span class="icon"></span>
                                                                        <span class="text">查询地图</span>
                                                                    </a>
                                                                    <a href="javascript:;" class="travel">
                                                                        <span class="icon"></span>
                                                                        <span class="text">公交/驾车去这里</span>
                                                                    </a>
                                                                </p>
                                                            </li>
                                                        <?php endforeach; ?>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ifram"><?php echo $dealData['description']; ?></div>
                    </li>
                    <li class="tab"><div class="ifram"><?php echo $dealData['notes']; ?></div></li>
                    <li class="tab">
                        <div class="ifram">
                            <h3 style="font-size:20px; font-weight:600; color: #ff4883"><?php echo $bisData['name']; ?></h3>
                            <img src="<?php echo $bisData['logo']; ?>" style="width:180px; height:180px; border:1px solid #777;"/>
                            <?php echo $bisData['description']; ?>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="footer-content">
        <div class="copyright-info">
            <div class="site-info">

            </div>
            <div class="icons">

            </div>
            <div style="width:200px;margin:0 auto; padding:20px 0;">

            </div>
        </div>
    </div>

    <script>
        //校验正整数
        function isNaN(number){
            var reg = /^[1-9]\d*$/;
            return reg.test(number);
        }

        function inputChange(num){
            if(!isNaN(num)){
                $(".buycount-ctrl input").val("1");
            }
            else{
                $(".buycount-ctrl input").val(num);
                if(num == 1){
                    $(".buycount-ctrl a").eq(0).addClass("disabled");
                }
                else{
                    $(".buycount-ctrl a").eq(0).removeClass("disabled");
                }
            }
        }

        $(".buycount-ctrl input").keyup(function(){
            var num = $(".buycount-ctrl input").val();
            inputChange(num);
        });
        $(".minus").click(function(){
            var num = $(".buycount-ctrl input").val();
            num--;
            inputChange(num);
        });
        $(".plus").click(function(){
            var num = $(".buycount-ctrl input").val();
            num++;
            inputChange(num);
        });



        $(".sn-list li").click(function(){
            var index = $(".sn-list li").index(this)
            $(".sn-list li").removeClass("spec-nav-current");
            $(".j-info-all .tab").css({display: "none"});
            $(this).addClass("spec-nav-current");
            $(".j-info-all .tab").eq(index).css({display: "block"});
        });

        $(".branch").mouseenter(function(){
            $(".branch").removeClass("branch-open").addClass("branch-close");
            $(this).removeClass("branch-close").addClass("branch-open");
        });
    </script>
</body>
</html>