<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:74:"E:\GitHub-Project\o2oeshop\public/../application/index\view\pay\index.html";i:1506515073;s:76:"E:\GitHub-Project\o2oeshop\public/../application/index\view\public\head.html";i:1506426092;}*/ ?>
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


    <!--支付第一步-->
    <div class="firstly" style="margin-top:30px;">
        <div class="bindmobile-wrap">
            采用<span style="color:red">XXXX支付方式</span>，购买成功后，团购券将发到您的注册邮箱：<span class="mobile">tracywxh0830@126.com</span><a class="link"></a>
        </div>

        <table class="table table-goods" cellpadding="0" cellspacing="0">
            <tbody>
                <tr>
                    <th class="first">商品</th>
                    <th width="120">单价</th>
                    <th width="190">数量</th>
                    <th width="140">优惠</th>
                    <th width="140" class="last">小计</th>
                </tr>
                <tr class="j-row">
                    <td class="vtop">
                        <div class="title-area" title="<?php echo $dealData['name']; ?>">
                            <div class="img-wrap">
                                <a href="<?php echo url('detail/index',['dealId'=>$dealData['id']]); ?>" target="_blank"><img src="<?php echo $dealData['image']; ?>" width="130" height="79"></a>
                            </div>
                            <div class="title-wrap">
                                <div class="title">
                                    <a href="" class="link"><?php echo $dealData['name']; ?></a>
                                </div>
                                <div class="attrs"></div>
                            </div>
                        </div>
                    </td>
                    <td>￥<span class="font14"><?php echo $dealData['origin_price']; ?></span></td>
                    <td class="j-cell">
                        <div class="buycount-ctrl">
                            <a class="j-ctrl ctrl minus disabled"><span class="horizontal"></span></a>
                            <input id="buyCount" type="text" value="<?php echo $buyCount; ?>" maxlength="10">
                            <a class="ctrl j-ctrl plus"><span class="horizontal"></span><span class="vertical"></span></a>
                        </div>
                        <span class="err-wrap j-err-wrap"></span>
                    </td>
                    <td class="j-cellActivity">-￥<span><?php echo round($dealData['origin_price'] - $dealData['current_price'],2); ?></span><br></td>
                    <td class="price font14">¥<span class="j-sumPrice" id="totalPrice"><?php echo $dealData['current_price'] * $buyCount; ?></span></td>
                </tr>
            </tbody>
        </table>

        

        <div class="final-price-area">应付总额：<span class="sum">￥<span class="price"><?php echo $dealData['current_price'] * $buyCount; ?></span></span></div>

        <div class="page-button-wrap">
            <a class="btn btn-primary" id="confirmOrder">确认</a>
        </div>

        <div style="width: 100%;min-width: 1200px;height: 5px;background: #dbdbdb;margin: 50px 0 20px;"></div>
    </div>

    <!--支付第二步-->
    <div class="secondly">
        <div class="search">
            <img src="https://passport.baidu.com/export/reg/logo-nuomi.png" />
            <div class="w-order-nav-new">
                <ul class="nav-wrap">
                    <li>
                        <div class="no"><span>1</span></div>
                        <span class="text">确认订单</span>
                    </li>
                    <li class="to-line "></li>
                    <li class="current">
                        <div class="no"><span>2</span></div>
                        <span class="text">填写支付信息</span>
                    </li>
                    <li class="to-line "></li>
                    <li class="">
                        <div class="no"><span>3</span></div>
                        <span class="text">购买成功</span>
                    </li>
                </ul>
            </div>
        </div>

        <div class="order_infor_module">
            <div class="order_details">
                <table width="100%">
                    <tbody>
                    <tr>
                        <td class="fl_left ">
                            <ul class="order-list">
                                <li>
                                    <span class="order-list-no">订单:</span>
                                    <span class="order-list-name"></span><span class="order-list-number"></span>份
                                </li>
                            </ul>
                        </td>
                        <td class="fl_right">
                            <dl>
                                <dt>应付金额：</dt>
                                <dd class="money"><span></span>元</dd>
                            </dl>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <h1 class="title">填写订单信息</h1>

        <div class="paychoose"  style="height:300px;">
            您的真实姓名：&nbsp;&nbsp;&nbsp;<input id="name" type="text" name="name" placeholder="真实姓名" style="width:280px; padding:8px;"><br/>
            您的电话号码：&nbsp;&nbsp;&nbsp;<input id="tel" type="text" name="tel" placeholder="电话号码" style="width:280px; padding:8px;"><br/>
            您的收货地址：&nbsp;&nbsp;&nbsp;<input id="address" type="text" name="address" placeholder="收货地址" style="width:280px; padding:8px;"><br/>
            您的银行卡账号：<input type="text" id="bankNumber" name="bank_number" placeholder="银行卡账号" style="width:280px; padding:8px;">
        </div>
        <button id="surePay">立即支付</button>

    </div>

    <!--支付第三步-->
    <div class="third">
        <div class="search">
            <img src="https://passport.baidu.com/export/reg/logo-nuomi.png" />
            <div class="w-order-nav-new">
                <ul class="nav-wrap">
                    <li>
                        <div class="no"><span>1</span></div>
                        <span class="text">确认订单</span>
                    </li>
                    <li class="to-line "></li>
                    <li>
                        <div class="no"><span>2</span></div>
                        <span class="text">选择支付方式</span>
                    </li>
                    <li class="to-line "></li>
                    <li class="current">
                        <div class="no"><span>3</span></div>
                        <span class="text">购买成功</span>
                    </li>
                </ul>
            </div>
        </div>

        <div id="operation" style="width: 980px;height: 300px;margin: 0 auto;text-align: center;line-height: 300px;font-size: 36px;"></div>
    </div>

    <div class="footer">
        <ul class="first">
           
        </ul>
        <ul class="second">
            
        </ul>
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
                $(".j-sumPrice").text($("td .font14").text() * num - $(".j-cellActivity span").text());
                $(".sum .price").text($("td .font14").text() * num - $(".j-cellActivity span").text());
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



        $("#confirmOrder").click(function () {
            $(".firstly").fadeOut();
            $(".secondly").fadeIn();
            $(".order-list-name").html("<?php echo $dealData['name']; ?>");
            $(".order-list-number").html($("#buyCount").val());
            $(".money>span").html($("#totalPrice").text());
        });




        $("#surePay").click(function () {
            var data = {
                "deal_id"       : "<?php echo $dealData['id']; ?>",
                "deal_count"    : $(".order-list-number").text(),
                "total_price"   : $(".money>span").text(),
                "name"          : $("#name").val(),
                "tel"           : $("#tel").val(),
                "address"       : $("#address").val(),
                "bank_number"   : $("#bankNumber").val()

            };
            var url = "<?php echo url('pay/surePay'); ?>";

            $.post(url,data,function (result) {
                $("#operation").html(result.message);
                $(".secondly").fadeOut();
                $(".third").fadeIn();
            },"JSON");
        });


    </script>
</body>
</html>