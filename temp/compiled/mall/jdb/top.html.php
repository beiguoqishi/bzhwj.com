<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<base href="<?php echo $this->_var['site_url']; ?>/" />

<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7 charset=<?php echo $this->_var['charset']; ?>" />
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $this->_var['charset']; ?>" />
<style type="text/css">
<!--
.STYLE1 {color: #FF0000}
-->
</style>
<?php echo $this->_var['page_seo']; ?>
<link type="text/css" href="<?php echo $this->res_base . "/" . 'css/main.css'; ?>" rel="stylesheet"  />
<link type="text/css" href="<?php echo $this->res_base . "/" . 'css/footer.css'; ?>" rel="stylesheet" />
<link type="text/css" href="<?php echo $this->res_base . "/" . 'css/top.css'; ?>" rel="stylesheet" />
<script type="text/javascript" src="index.php?act=jslang"></script>
<script type="text/javascript" src="<?php echo $this->lib_base . "/" . 'jquery.js'; ?>" charset="utf-8"></script>
<script type="text/javascript" src="<?php echo $this->lib_base . "/" . 'ecmall.js'; ?>" charset="utf-8"></script>
<script type="text/javascript" src="<?php echo $this->res_base . "/" . 'js/main.js'; ?>" charset="utf-8"></script>
<script type="text/javascript" src="<?php echo $this->lib_base . "/" . 'select.js'; ?>" charset="utf-8"></script>
<script type="text/javascript" src="<?php echo $this->lib_base . "/" . 'cart.js'; ?>" charset="utf-8"></script>
<script type="text/javascript" src="<?php echo $this->lib_base . "/" . 'kissy/build/kissy.js'; ?>"></script>
<script type="text/javascript" src="<?php echo $this->lib_base . "/" . 'kissy/build/switchable/switchable-pkg.js'; ?>"></script>
<!--[if lte IE 6]>
<script type="text/javascript" language="Javascript" src="<?php echo $this->lib_base . "/" . 'hoverForIE6.js'; ?>"></script>
<![endif]-->
<script type="text/javascript">
if (screen.width<=1200){document.write("<link type='text/css' href='http://ecmall.ah01.com/themes/mall/jdb/styles/default/css/1024.css' rel='stylesheet'  />");}
//<!CDATA[
var SITE_URL = "<?php echo $this->_var['site_url']; ?>";
var PRICE_FORMAT = '<?php echo $this->_var['price_format']; ?>';
var REAL_SITE_URL = "<?php echo $this->_var['real_site_url']; ?>";
//]]>

$(function(){
	$(this).scroll(function(){
	   var scrolltop=$(this).scrollTop();     
	   if(scrolltop>=10){              
	       $("#goTop").show();
	   }
	   else{
	       $("#goTop").hide();
	   }
	 }); 
	 
	 $(".search-input").keydown(function(){
		$(".sec_cue").hide();
	});
	 
	$(".mallSearch-input").click(function(event){
		$(".search-input").focus();
		event=event||window.event;  
		event.stopPropagation();  
	});
	
	//点击层外，隐藏这个层。由于层内的事件停止了冒泡，所以不会触发这个事件
	$(document).click(function(e){
		$(".mallSearch-input").blur();
	}); 
	$(".search-input").focus(function(){
		$(".sec_cue").css("color", "#ccc");
	});
	$(".mallSearch-input").blur(function(){
		$(".sec_cue").css("color", "#666");
		var stxt = $(".search-input").val();
		if("" == stxt){
			$(".sec_cue").show();
		}
	});
	$(".item").hover(function(){
		$(this).addClass("hover");
	},function(){
		$(this).removeClass("hover");
	});
	
});

</script>

<?php echo $this->_var['_head_tags']; ?>
<!--<editmode></editmode>-->
</head>
<body>
<div id="site-nav" class="w-full">
   <div class="shoptop w1200 clearfix">
      <div class="login_info">
         <p>亲,
           <?php if (! $this->_var['visitor']['user_id']): ?>
         <?php echo htmlspecialchars($this->_var['visitor']['user_name']); ?>
         <a href="<?php echo url('app=member&act=login&ret_url=' . $this->_var['ret_url']. ''); ?>" class="STYLE1">立即登录</a>
        <a href="<?php echo url('app=member&act=register&ret_url=' . $this->_var['ret_url']. ''); ?>" class="STYLE1">免费注册</a>
		<a href="index.php?app=third_login&amp;act=qq"><img src="/html/images/qq.png">QQ登录</a>
		<a href="index.php?app=third_login&act=sina"><img src="/html/images/wb.png">微博登录</a>
           <?php else: ?>
           <a href="<?php echo url('app=member'); ?>"><span><?php echo htmlspecialchars($this->_var['visitor']['user_name']); ?></span></a>
           <a href="<?php echo url('app=member&act=logout'); ?>">退出</a>
           <a href="<?php echo url('app=message&act=newpm'); ?>">站内消息
           <?php if ($this->_var['new_message']): ?>
           (<span><?php echo $this->_var['new_message']; ?></span>)
           <?php endif; ?>
           </a>
           <?php endif; ?>
        </p>
      </div>
      <ul class="quick-menu">
        <li class="item">
           <div class="menu iwantbuy">
              <a class="menu-hd" href="<?php echo url('app=category'); ?>">我要买<b></b></a>
              <div class="menu-bd">
                 <div class="menu-bd-panel">
                    <div>
                       <p><a href="<?php echo url('app=category'); ?>">商品分类</a></p>
                       <p><a href="#">大家正在买</a></p>
					</div>
                 </div>
              </div>
           </div>
        </li>
         <li class="item">
            <div class="menu mytb">
               <a class="menu-hd" href="<?php echo url('app=member'); ?>">买家中心<b></b></a>
               <div class="menu-bd">
                  <div class="menu-bd-panel">
                     <div>
                        <p><a href="<?php echo url('app=buyer_order'); ?>">已淘到的宝贝</a></p>
                        <p><a href="<?php echo url('app=friend'); ?>">我的淘友</a></p>
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
                  <dl class="mini-cart-bd clearfix">
                     <?php if ($this->_var['cart_goods_kinds']): ?>
                     <dt class="mini-cart-hd">最近加入的宝贝：</dt>
                     <?php $_from = $this->_var['carts_top']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'cart');$this->_foreach['fe_cart'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['fe_cart']['total'] > 0):
    foreach ($_from AS $this->_var['cart']):
        $this->_foreach['fe_cart']['iteration']++;
?>
                     <dd class="mini-cart-each clearfix" id="cart_goods<?php echo $this->_var['cart']['rec_id']; ?>" <?php if (($this->_foreach['fe_cart']['iteration'] == $this->_foreach['fe_cart']['total'])): ?> style="border-bottom:1px solid #F2F2F2; padding-bottom:8px; "<?php endif; ?> >
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
                     <dt class="mini-cart-empty">您购物车里还没有任何宝贝</dt>
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