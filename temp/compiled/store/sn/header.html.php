<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<base href="<?php echo $this->_var['site_url']; ?>/" />

<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7 charset=<?php echo $this->_var['charset']; ?>" />
<meta http-equiv="Content-Type" content="text/html;charset=<?php echo $this->_var['charset']; ?>" />
<?php echo $this->_var['page_seo']; ?>

<meta name="author" content="ecmall.shopex.cn" />
<meta name="copyright" content="ShopEx Inc. All Rights Reserved" />
<link href="<?php echo $this->res_base . "/" . 'shop.css'; ?>" rel="stylesheet" type="text/css" />
<link href="themes/mall/jdb/styles/default/css/top.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="index.php?act=jslang"></script>
<script type="text/javascript" src="<?php echo $this->lib_base . "/" . 'jquery.js'; ?>" charset="utf-8"></script>
<script type="text/javascript" src="<?php echo $this->lib_base . "/" . 'ecmall.js'; ?>" charset="utf-8"></script>
<script type="text/javascript" src="<?php echo $this->lib_base . "/" . 'select.js'; ?>" charset="utf-8"></script>
<script type="text/javascript" src="<?php echo $this->lib_base . "/" . 'cart.js'; ?>" charset="utf-8"></script>
<script type="text/javascript" src="<?php echo $this->lib_base . "/" . 'kissy/build/kissy.js'; ?>"></script>
<script type="text/javascript" src="<?php echo $this->lib_base . "/" . 'kissy/build/switchable/switchable-pkg.js'; ?>"></script>
<!--[if lte IE 6]>
<script type="text/javascript" language="Javascript" src="<?php echo $this->lib_base . "/" . 'hoverForIE6.js'; ?>"></script>
<![endif]-->

<script type="text/javascript">
//<!CDATA[
var SITE_URL = "<?php echo $this->_var['site_url']; ?>";
var PRICE_FORMAT = '<?php echo $this->_var['price_format']; ?>';

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
<?php echo $this->_var['_head_tags']; ?>
</head>

<body>
<style type="text/css">

</style>
<div class="kefu fixed-top fixed-right">
      <div class="show">
            <div class="title">
                <h3></h3>
                <div class="um-text">客服中心</div>
            </div>
            <div class="content">
            	<div class="um-group">
                    <div class="um-title">QQ交谈</div>
                    <ul>
                            <?php $_from = $this->_var['store']['qq']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'qq');if (count($_from)):
    foreach ($_from AS $this->_var['qq']):
?>
                            <li>
                                <a href="http://wpa.qq.com/msgrd?V=1&amp;Uin=<?php echo htmlspecialchars($this->_var['qq']['num']); ?>&amp;Site=<?php echo htmlspecialchars($this->_var['store']['store_name']); ?>&amp;Menu=yes" target="_blank"><img src="http://wpa.qq.com/pa?p=1:<?php echo htmlspecialchars($this->_var['qq']['num']); ?>:4" alt="QQ"></a><?php echo htmlspecialchars($this->_var['qq']['name']); ?>
                            </li>
                            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                    </ul>
                 </div>
                 <div class="um-group">
                     <div class="um-title">旺旺联系</div>
                     	<ul>
                             <?php $_from = $this->_var['store']['ww']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'ww');if (count($_from)):
    foreach ($_from AS $this->_var['ww']):
?>  
                             <li>            
                                <a target="_blank" href="http://amos.im.alisoft.com/msg.aw?v=2&uid=<?php echo urlencode($this->_var['store']['im_ww']); ?>&site=cntaobao&s=2&charset=<?php echo $this->_var['charset']; ?>" ><img border="0" src="http://amos.im.alisoft.com/online.aw?v=2&uid=<?php echo urlencode($this->_var['store']['im_ww']); ?>&site=cntaobao&s=2&charset=<?php echo $this->_var['charset']; ?>" alt="Wang Wang" /></a>
                                <?php echo htmlspecialchars($this->_var['ww']['name']); ?>
                              </li>
                            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                       </ul>
                 </div>  
                 <div class="um-group"><div class="um-title">工作时间</div><div class="um-worktime"><?php echo htmlspecialchars($this->_var['store']['work_time']); ?></div></div> 
                 <div class="um-group"><div class="um-title">联系方式</div><div class="um-contact">TEL:<?php echo htmlspecialchars($this->_var['store']['tel']); ?></div></div>  
                 <div class="um-group"><div class="um-title">分享店铺</div>
                 	<div class="um-share">
                    	
                        <div id="ckepop">
                            <a class="jiathis_button_qzone"></a>
                            <a class="jiathis_button_tsina"></a>
                            <a class="jiathis_button_tqq"></a>
                            <a class="jiathis_button_renren"></a>
                            <a class="jiathis_button_douban"></a>
                        </div>
                        <script type="text/javascript" src="http://v3.jiathis.com/code_mini/jia.js?uid=1340804611789901" charset="utf-8"></script>
                        
                 	</div>
                </div>    
            </div>
            <div class="bottom">
                <h3><a href="javascript:collect_store(<?php echo $this->_var['store']['store_id']; ?>)"></a></h3>
                <div class="back"><a onclick="javascript:scroll(0,0)">返回顶部&uarr;</a></div>
            </div>
        </div>
      <div class="hide" style=" display:none;">
      	 <div class="um-open"><div class="um-sign um-bg"><b>+</b></div><span class="um-text um-bg">展开客服</span></div>
      </div>
      <script>
   		$(function(){
			$('.kefu .show .title h3').click(function(){
				$('.kefu .show').hide();
				$('.kefu .hide').show();
			});
			$('.kefu .hide').click(function(){
				$(this).hide();
				$('.kefu .show').show();
			});
		});
  </script>
</div>
<div id="site-nav" class="w-full">
   <div class="shoptop w1000 clearfix">
      <div class="login_info">
         您好,
         <?php if (! $this->_var['visitor']['user_id']): ?>
         <?php echo htmlspecialchars($this->_var['visitor']['user_name']); ?>
         <a href="<?php echo url('app=member&act=login&ret_url=' . $this->_var['ret_url']. ''); ?>">登录</a>
         <a href="<?php echo url('app=member&act=register&ret_url=' . $this->_var['ret_url']. ''); ?>">注册</a>
         <?php else: ?>
         <a href="<?php echo url('app=member'); ?>"><span><?php echo htmlspecialchars($this->_var['visitor']['user_name']); ?></span></a>
         <a href="<?php echo url('app=member&act=logout'); ?>">退出</a>
         <a href="<?php echo url('app=message&act=newpm'); ?>">站内消息<?php if ($this->_var['new_message']): ?>(<span><?php echo $this->_var['new_message']; ?></span>)<?php endif; ?></a>
         <?php endif; ?>
      </div>
      <ul class="quick-menu">
      	<?php if (! $this->_var['index']): ?><li class="home"><a href="<?php echo $this->_var['site_url']; ?>">回到首页</a></li><?php endif; ?>
        <li class="item">
           <div class="menu iwantbuy">
              <a class="menu-hd" href="<?php echo url('app=category'); ?>">我要买<b></b></a>
              <div class="menu-bd">
                 <div class="menu-bd-panel">
                    <div>
                       <p><a href="<?php echo url('app=category'); ?>">商品分类</a></p>
                       <p><a href="#">大家正在买</a></p>
					   <p><a href="#">品味连连看</a></p>
                    </div>
                 </div>
              </div>
           </div>
         </li>
         <li class="item">
            <div class="menu mytb">
               <a class="menu-hd" href="<?php echo url('app=member'); ?>">我是买家<b></b></a>
               <div class="menu-bd">
                  <div class="menu-bd-panel">
                     <div>
                        <p><a href="<?php echo url('app=buyer_order'); ?>">已买到的宝贝</a></p>
                        <p><a href="<?php echo url('app=friend'); ?>">我的好友</a></p>
                        <p><a href="<?php echo url('app=my_question'); ?>">我的咨询</a></p>
                     </div>
                  </div>
               </div>
            </div>
         </li>
         <li class="item">
            <div class="menu seller-center">
               <a class="menu-hd" href="<?php echo url('app=member'); ?>">卖家中心<b></b></a>
               <div class="menu-bd">
                  <div class="menu-bd-panel">
                     <div>
                        <p><a href="<?php echo url('app=seller_order'); ?>">已卖出的宝贝</a></p>
                        <p><a href="<?php echo url('app=my_goods'); ?>">出售中的宝贝</a></p>
                     </div>
                  </div>
               </div>
            </div>
         </li>
         <li class="service">
            <a href="<?php echo url('app=article&code=help'); ?>">帮助中心</a>
         </li>
         <li class="item">
            <div class="menu mini-cart">
               <a class="ac" href="<?php echo url('app=cart'); ?>">
                  <s></s>购物车<strong><?php echo $this->_var['cart_goods_kinds']; ?></strong>件<b></b>
               </a>
               <div class="mini-cart-content menu-bd">
                  <dl class="mini-cart-bd">
                     <?php if ($this->_var['cart_goods_kinds']): ?>
                     <dt class="mini-cart-hd">最近加入的宝贝：</dt>
                     <?php $_from = $this->_var['carts_top']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'cart');if (count($_from)):
    foreach ($_from AS $this->_var['cart']):
?>
                     <dd class="mini-cart-each clearfix" id="cart_goods<?php echo $this->_var['cart']['rec_id']; ?>">
                        <div class="mini-cart-img">
                           <a href="<?php echo url('app=goods&id=' . $this->_var['cart']['goods_id']. ''); ?>" target="_top">
                              <img alt="<?php echo $this->_var['cart']['goods_name']; ?>" src="<?php echo $this->_var['cart']['goods_image']; ?>" width="40" height="40">
                           </a>
                        </div>
                        <div class="mini-cart-title">
                           <a title="<?php echo $this->_var['cart']['goods_name']; ?>" href="<?php echo url('app=goods&id=' . $this->_var['cart']['goods_id']. ''); ?>" target="_top"><?php echo $this->_var['cart']['goods_name']; ?></a>
                        </div>
                        <div class="price-admin">
                           <div class="mini-cart-count"><strong class="mini-cart-price"><?php echo price_format($this->_var['cart']['price']); ?></strong></div>
                           <div class="mini-cart-del"><a href="javascript:;" onclick="drop_cart_item(<?php echo $this->_var['cart']['store_id']; ?>, <?php echo $this->_var['cart']['rec_id']; ?>);">删除</a></div>
                        </div>
                     </dd>
                     <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                     <?php else: ?>
                     <dt class="mt10 fleft mini-cart-empty">您购物车里还没有任何宝贝</dt>
                     <?php endif; ?>
                     <dd class="mini-cart-bt">
                        <a href="<?php echo url('app=cart'); ?>">查看我的购物车</a>
                     </dd>                          
                  </dl>
               </div>
            </div>
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
         <li class="item" style="background:none">
            <div class="menu sites">
               <a class="menu-hd" href="javascript:;">网站导航<b></b></a>
               <div class="menu-bd padding10">
                  <?php $_from = $this->_var['navs']['header']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'nav');if (count($_from)):
    foreach ($_from AS $this->_var['nav']):
?>
                  <a href="<?php echo $this->_var['nav']['link']; ?>"<?php if ($this->_var['nav']['open_new']): ?> target="_blank"<?php endif; ?>><?php echo htmlspecialchars($this->_var['nav']['title']); ?></a>
                  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
               </div>
            </div>
        </li>
     </ul>
   </div>
</div>