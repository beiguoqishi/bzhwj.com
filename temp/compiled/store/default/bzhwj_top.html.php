<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <base href="/" />

    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7 charset=utf-8" />
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
    <title>3D基因 - 百真无假官方店-美业美容信息平台</title>
    <meta name="description" content="生物活..." />
    <meta name="keywords" content="生化美容,3D基因,,抗衰功能" />

    <meta name="author" content="ecmall.shopex.cn" />
    <meta name="copyright" content="ShopEx Inc. All Rights Reserved" />
    <link href="/themes/store/default/styles/default/shop.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="/themes/store/default/styles/default/jqzoom.css"  />
    <link type="text/css" href="/themes/mall/tmall/styles/default/css/header.css" rel="stylesheet" />
    <link type="text/css" href="/themes/mall/tmall/styles/default/css/footer.css" rel="stylesheet" />
    <link type="text/css" href="/themes/mall/tmall/styles/default/css/main.css" rel="stylesheet" />
    <link type="text/css" href="/themes/mall/tmall/styles/default/css/tmall.css" rel="stylesheet" />
    <script type="text/javascript" src="index.php?act=jslang"></script>
    <script type="text/javascript" src="http://www.bzhwj.com/includes/libraries/javascript/jquery.js" charset="utf-8"></script>
    <script type="text/javascript" src="http://www.bzhwj.com/includes/libraries/javascript/ecmall.js" charset="utf-8"></script>
    <script type="text/javascript" src="http://www.bzhwj.com/includes/libraries/javascript/cart.js" charset="utf-8"></script>
    <script type="text/javascript" src="/themes/mall/tmall/styles/default/js/main.js" charset="utf-8"></script>
    <script type="text/javascript" src="http://www.bzhwj.com/includes/libraries/javascript/kissy/build/kissy.js"></script>
    <script type="text/javascript" src="http://www.bzhwj.com/includes/libraries/javascript/kissy/build/switchable/switchable-pkg.js"></script>
    <!--[if lte IE 6]>
    <script type="text/javascript" language="Javascript" src="/themes/mall/tmall/styles/default/js/hoverForIE6.js"></script>
    <![endif]-->

    <script type="text/javascript">
        //<!CDATA[
        var SITE_URL = "";
        var REAL_SITE_URL = "http://www.bzhwj.com";
        var PRICE_FORMAT = '&yen;%s';
        //]]>
    </script>

    <script type="text/javascript">
        //<!CDATA[
        var SITE_URL = "";
        var REAL_SITE_URL = "http://www.bzhwj.com";
        var PRICE_FORMAT = '&yen;%s';

        $(function(){
            var span = $("#child_nav");
            span.hover(function(){
                $("#float_layer:not(:animated)").show();
            }, function(){
                $("#float_layer").hide();
            });
        });
        //]]>
    </script>
    <script charset="utf-8" type="text/javascript" src="http://www.bzhwj.com/includes/libraries/javascript/jquery.jqzoom.js" ></script>
    <style type="text/css">
        .user-area {
            float: left;
            margin-right: 450px;
            margin-left: 15px;
        }
        .user-area .cur-city {
            color: #f30;
            font-weight: bold;
        }
        .user-area .switch-city {
            font-weight: bold;
            margin-left: 10px;
        }
        #site-nav .quick-menu li.login_area {
            margin-right: auto!important;
        }
        .zone-switch * ,.city-zones{
            color: #333!important;
            line-height: 1em;
        }
    </style>
</head>
<body>
<div id="site-nav" class="w-full">
    <div class="shoptop w clearfix">
        <div class="login_info">

        </div>
        <ul class="quick-menu" style="float: left">

            <li style="line-height:23px;" class="login_area">您好,
                <?php if (! $this->_var['visitor']['user_id']): ?>
                <?php echo htmlspecialchars($this->_var['visitor']['user_name']); ?></li>
            <li class="login_area">[<a class="ml5 mr5" href="<?php echo url('app=member&act=login&ret_url=' . $this->_var['ret_url']. ''); ?>">登录</a>]</li>
            <li style="margin-right: 738px" class="login_area">[<a class="ml5 mr5" href="<?php echo url('app=member&act=register&ret_url=' . $this->_var['ret_url']. ''); ?>">注册</a>]</li>
            <?php else: ?>
            <a href="<?php echo url('app=member'); ?>"><span><?php echo htmlspecialchars($this->_var['visitor']['user_name']); ?></span></a></li>
            <li class="login_area"><a href="<?php echo url('app=member&act=logout'); ?>">退出</a></li>
            <li style="margin-right: 730px" class="login_area"></li>
            <?php endif; ?>
            <?php if ($this->_var['cur_loc']): ?>
            <li class="user-area">
                <span class="cur-city" data-zid="<?php echo $this->_var['cur_loc']['zid']; ?>" data-pid="<?php echo $this->_var['cur_loc']['pid']; ?>" data-cid="<?php echo $this->_var['cur_loc']['cid']; ?>"><?php echo htmlspecialchars($this->_var['cur_city']); ?></span>
                <a href="javascript:void(0)" class="switch-city">切换城市</a>
              <span class="zone-switch" style="display: none">
                  <?php if ($this->_var['provinces']): ?>
              <select class="all-provinces">
                  <?php $_from = $this->_var['provinces']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'prov');if (count($_from)):
    foreach ($_from AS $this->_var['prov']):
?>
                  <option value="<?php echo $this->_var['prov']['id']; ?>" <?php if ($this->_var['l_cur_pid'] == $this->_var['prov']['id']): ?>selected=""<?php endif; ?>><?php echo htmlspecialchars($this->_var['prov']['name']); ?></option>
                  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
              </select>

              <?php endif; ?>
              <?php if ($this->_var['cities']): ?>
              <select class="all-cities">
                  <?php $_from = $this->_var['cities']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'city');if (count($_from)):
    foreach ($_from AS $this->_var['city']):
?>
                  <option value="<?php echo $this->_var['city']['id']; ?>" <?php if ($this->_var['l_cur_cid'] == $this->_var['city']['id']): ?>selected=""<?php endif; ?>><?php echo htmlspecialchars($this->_var['city']['name']); ?></option>
                  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
              </select>
              <?php endif; ?>
                  <button type="button" class="do-switch-city">确定</button>
              </span>
                <?php if ($this->_var['city_zones']): ?>
                <select class="city-zones">
                    <?php $_from = $this->_var['city_zones']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'zone');if (count($_from)):
    foreach ($_from AS $this->_var['zone']):
?>
                    <option value="<?php echo $this->_var['zone']['id']; ?>" <?php if ($this->_var['l_cur_zid'] == $this->_var['zone']['id']): ?>selected=""<?php endif; ?>><?php echo htmlspecialchars($this->_var['zone']['name']); ?></option>
                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                </select>
                <?php endif; ?>
            </li>
            <?php endif; ?>
        </ul>
        <ul class="quick-menu" style="float: right">
            <li class="service">
                <a href="/index.php?app=bzhwjbuilding">项目推荐</a>
            </li>
            <li class="service">
                <a href="/index.php?app=newestgoods">最新项目</a>
            </li>
            <li class="item">
                <div class="menu favorite">
                    <a class="menu-hd" href="<?php echo url('app=my_favorite'); ?>">收藏夹<b></b></a>
                    <div class="menu-bd">
                        <div class="menu-bd-panel">
                            <div>
                                <p><a href="<?php echo url('app=my_favorite'); ?>">收藏的宝贝</a></p>
                                <p><a href="<?php echo url('app=my_favorite&type=store'); ?>">收藏的店铺</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="service">
                <a href="/index.php?app=bzhwj_kefu">联系客服</a>
            </li>
        </ul>
    </div>
</div>

<script type="text/javascript">
    $('.switch-city').on('click',function(e) {
        var $this = $(this);
        $this.hide();
        $('.zone-switch').show();
    });
    $('body').on('click','.zone-switch .do-switch-city',function(e) {
        $('.switch-city,.cur-city')
                .data('pid',$('.all-provinces').val())
                .data('cid',$('.all-cities').val())
                .data('zid',$('.city-zones').val())
                .show();

        $('.cur-city').text($('.all-cities').find('option:selected').text());
        $('.zone-switch').hide();
        var query = location.search || '',
                params = {};
        var arr = query.split("&"),item;
        $.each(arr,function(idx,el) {
            item = el.split('=');
            params[item[0]] = item[1];
        });
        params['c_pid'] = $('.all-provinces').val();
        params['c_cid'] = $('.all-cities').val();
        var search = '';
        $.each(params,function(k,v) {
            if (k) {
                search += k + '=' + v + '&';
            }
        });
        location.href = 'http://' + location.host + location.pathname + search + '#' + location.hash;
    }).on('change','.all-provinces',function(e) {
        var pid = $(this).val();
        $.post("/index.php?app=lbs&act=lbs_get_cities_by_pid",{
            pid:pid
        },function(d) {
            var allCities = $('.all-cities');
            allCities.empty();
            $.each(d,function(idx,el) {
                allCities.append(
                        $("<option>").val(el.id).text(el.name)
                );
                if (idx == 0) {
                    changeZone(pid,el.id);
                }
            });
        });
    }).on('change','.all-cities',function(e) {
        var cid = $(this).val(),
                pid = $('.all-provinces').val();
        changeZone(pid,cid);
    });
    function changeZone(pid,cid) {
        $.post("/index.php?app=lbs&act=lbs_get_dist_by_pid_cid",{
            pid:pid,
            cid:cid
        },function(d) {
            var cityZones = $('.city-zones');
            cityZones.empty();
            $.each(d,function(idx,el) {
                cityZones.append(
                        $("<option>").val(el.id).text(el.name)
                )
            })
        })
    }

    $(function(){
        //首页左侧分类菜单
        var arr=$('li.each');
        $(".menu ul").find("li.each").each(
                function() {
                    $(this).hover(
                            function() {
                                menu = $("#" + this.id + "_menu");
                                li_top = $(this).position().top;
                                var i = li_top/2;
                                menu.css("top", -i);

                                menu.children('div.subView').removeClass('hidden');
                                $(this).addClass("selected");
                                menu.css('width','755px').css('display','block');
                            },
                            function() {
                                $("#" + this.id + "_menu").css('width', '0');
                                $("#" + this.id + "_menu").children('div.subView').addClass('hidden');
                                $(this).removeClass("selected");
                            }
                    );
                }
        );
        $('.category').hover(
                function(){
                    $(this).children('.header_menu').show();
                },
                function(){
                    $(this).children('.header_menu').hide();
                }
        );
    });
    <?php if ($this->_var['index']): ?>
    $(function(){
        $('.mallLeft .category h2.title b').click(function (){
            $(this).addClass('selected').siblings('b').removeClass('selected');
            if($(this).hasClass('expandCat')){
                $('.menu ul li.each p.each-col').css({'height':'21px','line-height':'21px'});
                $('.menu ul li.each p.eachCol1').css('padding-top','6px');
            }
            else{
                $('.menu ul li.each p.each-col').css({'height':'0','line-height':'0'});
                $('.menu ul li.each p.eachCol1').css('padding-top','0');
            }
        })
    });
    //左侧仿天猫分类
    window.onscroll=function cate()
    {
        var a=$(document).scrollTop();
        if(a>93){
            $('.category').css('position','fixed');
        }
        else{
            $('#category').css('position','relative');
        }
        if($('.mallLeft .category h2.title b.simpleCat').hasClass('selected'))
        {
            $('.menu ul li.each p.each-col').css({'height':'0','line-height':'0'});
            $('.menu ul li.each p.eachCol1').css('padding-top','0');
        }
        else {
            var arr=$('.menu li.each').length;
            for(var i=1;i<=arr;i++){
                if(a>(70+i*80)){
                    $('.menu ul li.each'+i+' p.each-col').css({'height':'0','line-height':'0'});
                    $('.menu ul li.each'+i+' p.eachCol1').css('padding-top','0');
                }
                else{
                    $('.menu ul li.each'+i+' p.each-col').css({'height':'21px','line-height':'21px'});
                    $('.menu ul li.each'+i+' p.eachCol1').css('padding-top','6px');
                }
                if(a>(70+arr*80))
                {
                    $('.mallLeft .category h2.title b').hide();
                }
                else{
                    $('.mallLeft .category h2.title b').show();
                }
            }
            $('#J_BrandAd .brandRight').prev('.brandAd').addClass('none1');

        }

    }
    <?php endif; ?>
    $('body').click(mouseLocation);
    function mouseLocation(e)
    {
        var l=(document.body.clientWidth-1200)/2+575;
        if (e.pageX < l ||
                e.pageX > (l + $('.form-fields').outerWidth()-75) ||
                e.pageY < 53 ||
                e.pageY > (53+93 + $('.form-fields').outerHeight()))
        {
            $('.type_of_search').hide();
        }
    }
    $(function(){
        $('.type_of_search li').click(function(){
            var act=$(this).attr('entype');
            var v=$('[name=keyword]').val();
            window.location.href=REAL_SITE_URL+"/index.php?app=search&act="+act+"&keyword="+v
        });
        $('.heyword').focus(function(){
            $('.type_of_search').show();
        });
    })
    //针对中文输入法用鼠标选择时无法获取中文的情况
    function getInputValue(val){
        $(function(){
            $('.type_of_search li b').html(val);
            if(val == '' || val == '搜索其实很容易')
            {
                $('.type_of_search').hide();
            }else{
                $('.type_of_search').show();
            }
        })
    }
</script>
<div id="header" class="w-full">
    <div class="shop-t w clearfix pb10 mb5 pt5">
        <div class="logo mt10">
            <a href="<?php echo $this->_var['site_url']; ?>" title="<?php echo $this->_var['site_title']; ?>"><img alt="<?php echo $this->_var['site_title']; ?>" src="<?php echo $this->_var['site_logo']; ?>" /></a>
        </div>
        <div class="top-search">
            <div class="top-search-box clearfix">
                <div class="top-hot-re search-hot-re">
                    <?php if ($this->_var['recommend_search']): ?>
                    <?php $_from = $this->_var['recommend_search']['0']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 're');if (count($_from)):
    foreach ($_from AS $this->_var['re']):
?>
                    <a href="<?php echo htmlspecialchars($this->_var['re']['link']); ?>"><?php echo htmlspecialchars($this->_var['re']['title']); ?></a>
                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                    <?php endif; ?>
                </div>
                <div class="form-fields float-right search-hot-re">
                    <form method="GET" action="<?php echo url('app=search'); ?>">
                        <input type="hidden" name="app" value="search" />
                        <input type="hidden" name="act" value="index" />
                        <input type="text"  autocomplete="off" name="keyword" value="<?php if ($_GET['keyword']): ?><?php echo $_GET['keyword']; ?><?php else: ?>搜索其实很容易<?php endif; ?>" onfocus="if (this.value=='搜索其实很容易') this.value = '';"  class="keyword" style="color:#999;" oninput="getInputValue($(this).val());" onpropertychange="getInputValue($(this).val());"/>
                        <input type="submit" value="搜索" class="submit" hidefocus="true" />
                    </form>
                    <ul class="type_of_search">
                        <li entype="index"><span>搜索“<b></b>”<strong>商品</strong></span></li>
                        <li entype="store"><span>搜索“<b></b>”<strong>店铺</strong></span></li>
                        <!--<li entype="groupbuy"><span>搜索“<b></b>”<strong>团购</strong></span></li>   -->
                    </ul>
                </div>
                <div class="btm-hot-re search-hot-re">
                    <?php if ($this->_var['recommend_search']): ?>
                    <?php $_from = $this->_var['recommend_search']['1']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 're');if (count($_from)):
    foreach ($_from AS $this->_var['re']):
?>
                    <a href="<?php echo htmlspecialchars($this->_var['re']['link']); ?>"><?php echo htmlspecialchars($this->_var['re']['title']); ?></a>
                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <div style="background-color: #8E0000;height: 30px" class="w-full mall-nav">
        <ul class="w clearfix">
            <li style="width:240px;height:30px;display:block;" class="float-left"></li>
            <li class="each float-left inline-block"><a class="" href="/">首页</a></li>
            <li class="each float-left inline-block"><a class="" href="/index.php?app=experiment">体验店</a></li>
        </ul>
    </div>
    <?php if (! $this->_var['index']): ?>
    <div class="w"  style="height:0px;">
        <div class="category" id="category" style="position: relative; top:-30px;">
            <h2 class="title">
                <a href="index.php?app=category">所有商品分类</a>
            </h2>
            <div  style="background:#fff;display:none;" class="menu header_menu">
                <ul>
                    <?php $_from = $this->_var['g_categories']['gcategories']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'category');$this->_foreach['fe_cate'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['fe_cate']['total'] > 0):
    foreach ($_from AS $this->_var['category']):
        $this->_foreach['fe_cate']['iteration']++;
?>
                    <li style="border-right: 1px solid #e6e6e6;" class="each each<?php echo $this->_foreach['fe_cate']['iteration']; ?> <?php if ($this->_foreach['fe_cate']['iteration'] % 2 == 0): ?>background<?php endif; ?>" id="cat_<?php echo $this->_foreach['fe_cate']['iteration']; ?>">
                        <h3 class="each-hd each-hd<?php echo $this->_foreach['fe_cate']['iteration']; ?>"><s></s><a class="first_cate" href="<?php echo url('app=search&cate_id=' . $this->_var['category']['id']. ''); ?>"><?php echo $this->_var['category']['value']; ?></a></h3>
                        <p class="each-col eachCol1">
                            <?php $_from = $this->_var['category']['children']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'child');$this->_foreach['fe_child'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['fe_child']['total'] > 0):
    foreach ($_from AS $this->_var['child']):
        $this->_foreach['fe_child']['iteration']++;
?>
                            <?php if ($this->_foreach['fe_child']['iteration'] <= 5): ?>
                            <a href="index.php?app=search&cate_id=<?php echo $this->_var['child']['id']; ?>" title="<?php echo $this->_var['child']['value']; ?>" ><?php echo $this->_var['child']['value']; ?></a>
                            <?php endif; ?>
                            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                            <b class="overlay odd" style="opacity: 0; visibility: hidden; box-shadow: 0px 2px 2px rgb(170, 170, 170);"></b>
                        </p>
                        <p class="each-col">
                            <?php $_from = $this->_var['category']['children']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'child');$this->_foreach['fe_child'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['fe_child']['total'] > 0):
    foreach ($_from AS $this->_var['child']):
        $this->_foreach['fe_child']['iteration']++;
?>
                            <?php if ($this->_foreach['fe_child']['iteration'] > 5 && $this->_foreach['fe_child']['iteration'] <= 10): ?>
                            <a href="index.php?app=search&cate_id=<?php echo $this->_var['child']['id']; ?>" title="<?php echo $this->_var['child']['value']; ?>" ><?php echo $this->_var['child']['value']; ?></a>
                            <?php endif; ?>
                            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                            <b class="overlay even" style="opacity: 0; visibility: hidden; box-shadow: 0px -2px 2px rgb(170, 170, 170);"></b>
                        </p>
                        <s class="menuIcon"></s>
                    </li>
                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                </ul>
            </div>
        </div>
    </div>
    <?php endif; ?>
</div>
<div id="nav">
    <div class="banner"><a href="<?php echo url('app=store&id=' . $this->_var['store']['store_id']. ''); ?>">
        <img src="<?php echo $this->_var['store']['store_banner']; ?>" width="1000" height="120" />
    </a></div>

    <ul>
        <li><a class="<?php if ($_GET['app'] == 'store' && $_GET['act'] == 'index'): ?>active<?php else: ?>normal<?php endif; ?>" href="<?php echo url('app=store&id=' . $this->_var['store']['store_id']. ''); ?>"><span>店铺首页</span></a></li>
        <?php if ($this->_var['store']['functions']['groupbuy'] && $this->_var['store']['enable_groupbuy']): ?>
        <li><a class="<?php if ($_GET['app'] == 'groupbuy' || $_GET['act'] == 'groupbuy'): ?>active<?php else: ?>normal<?php endif; ?>" href="<?php echo url('app=store&act=groupbuy&id=' . $this->_var['store']['store_id']. ''); ?>"><span>团购活动</span></a></li>
        <?php endif; ?>
        <li><a class="<?php if ($_GET['app'] == 'store' && $_GET['act'] == 'article'): ?>active<?php else: ?>normal<?php endif; ?>" href="<?php echo url('app=store&act=article&id=6&store_id=' . $this->_var['store']['store_id']. ''); ?>"><span>美容院档案</span></a></li>
        <li><a class="<?php if ($_GET['app'] == 'store' && $_GET['act'] == 'member'): ?>active<?php else: ?>normal<?php endif; ?>" href="<?php echo url('app=store&act=member&store_id=' . $this->_var['store']['store_id']. ''); ?>"><span>会员社区</span></a></li>
        <a class="collection" href="javascript:collect_store(<?php echo $this->_var['store']['store_id']; ?>)">收藏该店铺</a>
    </ul>

    <div class="nav_bg"></div>
</div>
