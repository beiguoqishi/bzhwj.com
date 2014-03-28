<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<base href="<?php echo $this->_var['site_url']; ?>/" />

<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7 charset=<?php echo $this->_var['charset']; ?>" />
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $this->_var['charset']; ?>" />
<?php echo $this->_var['page_seo']; ?>

<meta name="author" content="ecmall.shopex.cn" />
<meta name="copyright" content="ShopEx Inc. All Rights Reserved" />
<link href="<?php echo $this->res_base . "/" . 'css/user.css'; ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo $this->res_base . "/" . 'css/epay.css'; ?>" rel="stylesheet" type="text/css" />
<link type="text/css" href="<?php echo $this->res_base . "/" . 'css/top.css'; ?>" rel="stylesheet" />
<link type="text/css" href="<?php echo $this->res_base . "/" . 'css/footer.css'; ?>" rel="stylesheet" />
<link type="text/css" href="<?php echo $this->res_base . "/" . 'css/usertop.css'; ?>" rel="stylesheet"  />
<script type="text/javascript">
//<!CDATA[
var SITE_URL = "<?php echo $this->_var['site_url']; ?>";
var REAL_SITE_URL = "<?php echo $this->_var['real_site_url']; ?>";
var PRICE_FORMAT = '<?php echo $this->_var['price_format']; ?>';
//]]>
</script>
<script type="text/javascript" src="index.php?act=jslang"></script>
<script type="text/javascript" src="<?php echo $this->lib_base . "/" . 'jquery.js'; ?>" charset="utf-8"></script>
<script type="text/javascript" src="<?php echo $this->lib_base . "/" . 'ecmall.js'; ?>" charset="utf-8"></script>
<script type="text/javascript" src="<?php echo $this->lib_base . "/" . 'member.js'; ?>" charset="utf-8"></script>
<script type="text/javascript" src="<?php echo $this->lib_base . "/" . 'select.js'; ?>" charset="utf-8"></script>
<!--[if lte IE 6]>
<script type="text/javascript" language="Javascript" src="<?php echo $this->lib_base . "/" . 'hoverForIE6.js'; ?>"></script>
<![endif]-->
<script type="text/javascript">
$(function(){
    $('#left h1 span,h2.title a.fold').click(function(){
        if($(this).hasClass('span_close')){
            $(this).removeClass('span_close');
            $(this).addClass('span_open');
            this.title = 'open';
            closeSubmenu($(this).parent());
        }
        else{
            $(this).removeClass('span_open');
            $(this).addClass('span_close');
            this.title = 'close';
            openSubmenu($(this).parent());
        }
    });

    var span = $("#child_nav");
    span.hover(function(){
        $("#float_layer:not(:animated)").show();
    }, function(){
        $("#float_layer").hide();
    });
});
function closeSubmenu(h1){
    h1.next('ul').css('display', 'none');
}
function openSubmenu(h1){
    h1.next('ul').css('display', '');
}
</script>
<?php echo $this->_var['_head_tags']; ?>
</head>
<body>
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
<div id="header" class="w1000 clearfix">
	<div title="<?php echo $this->_var['site_title']; ?>" class="logo"><a href="index.php"><img src="<?php echo $this->_var['site_logo']; ?>"></a></div>
    <div class="search">
        <div class="search-box">
            <form method="GET" action="<?php echo url('app=search'); ?>">
                <div class="border">
                    <div class="select_js">
                        <p>搜索商品</p>
                        <div class="ico"></div>
                        <ul>
                            <li ectype="index">搜索商品</li>
                            <li ectype="store">搜索店铺</li>
                            <li ectype="groupbuy">搜索团购</li>
                        </ul>
                        <input type="hidden" name="act" value="index" />
                    </div>
                    <input type="text" name="keyword" class="search-input" />
                </div>
                <input type="hidden" name="app" value="search" />
                <input type="submit" name="Submit" value="搜索" class="search-btn"/>
            </form>
        </div>
        <div class="hot-word">
			热门搜索:
            <?php $_from = $this->_var['hot_keywords']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'keyword');if (count($_from)):
    foreach ($_from AS $this->_var['keyword']):
?>
            <a href="<?php echo url('app=search&keyword=' . $this->_var['keyword']. ''); ?>"><?php echo $this->_var['keyword']; ?></a>
            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        </div>
    </div>
</div>
<div id="nav">
	<div class="w1000 nav">
    	 <?php if (! $this->_var['index']): ?>
         <script type="text/javascript">
		 	$(function(){
				$("#allsort").hover(function(){
					$("#allsort i").addClass("ihover");
					$("#allsort-list").css("display","block");
				},function(){
					$("#allsort i").removeClass("ihover");
					$("#allsort-list").css("display","none");
				});
			});
		 </script>
         	<div id="allsort">
            	<h3>
                	<a target="_blank" href="<?php echo url('app=category'); ?>">all_cate</a>
					<i></i>
                </h3>
                <div class="category" id="allsort-list">
               <div class="content">
                  <?php $_from = $this->_var['gcates']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'category');$this->_foreach['fe_gcate'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['fe_gcate']['total'] > 0):
    foreach ($_from AS $this->_var['category']):
        $this->_foreach['fe_gcate']['iteration']++;
?>
                  <div class="item">
                      <h2><a target="_blank" href="<?php echo url('app=search&cate_id=' . $this->_var['category']['id']. ''); ?>"><i></i><?php echo htmlspecialchars($this->_var['category']['value']); ?></a><div class="up"></div></h2>
                      <div class="out">
                          <div class="subcategory">
                                <?php $_from = $this->_var['category']['children']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'child');$this->_foreach['fe_children'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['fe_children']['total'] > 0):
    foreach ($_from AS $this->_var['child']):
        $this->_foreach['fe_children']['iteration']++;
?>
                                <dl class="clearfix" <?php if (($this->_foreach['fe_children']['iteration'] <= 1)): ?> style=" border:none;"<?php endif; ?>>
                                    <dt><a style="border:none;" title="<?php echo htmlspecialchars($this->_var['child']['value']); ?>" target="_blank" href="<?php echo url('app=search&cate_id=' . $this->_var['child']['id']. ''); ?>"><strong><?php echo htmlspecialchars($this->_var['child']['value']); ?></strong></a></dt>
                                    <dd>
                                   <?php $_from = $this->_var['child']['children']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'child2');$this->_foreach['fe_child2'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['fe_child2']['total'] > 0):
    foreach ($_from AS $this->_var['child2']):
        $this->_foreach['fe_child2']['iteration']++;
?>
                                   <a target="_blank" <?php if (($this->_foreach['fe_child2']['iteration'] == $this->_foreach['fe_child2']['total'])): ?> class="nbd" <?php endif; ?> title="<?php echo $this->_var['child2']['value']; ?>" href="<?php echo url('app=search&cate_id=' . $this->_var['child2']['id']. ''); ?>"><?php echo htmlspecialchars($this->_var['child2']['value']); ?></a>
                                   <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                                       &nbsp;
                                    </dd>
                                </dl>
                                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                          </div>
                      </div>
                  </div>
                  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                </div>
            </div>
            </div>
          <?php else: ?>
          <div id="allsort">
            	<h3>
                	<a target="_blank" href="<?php echo url('app=category'); ?>">所有商品分类</a>
                </h3>
          </div>
         <?php endif; ?>
         <ul>
            <li><a class="<?php if ($this->_var['index']): ?>on<?php else: ?><?php endif; ?>" href="index.php" >首页</a></li>
            <?php $_from = $this->_var['navs']['middle']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'nav');if (count($_from)):
    foreach ($_from AS $this->_var['nav']):
?>
            	<li><a class="<?php if (! $this->_var['index'] && $this->_var['nav']['link'] == $this->_var['current_url']): ?>on<?php else: ?><?php endif; ?>" href="<?php echo $this->_var['nav']['link']; ?>"<?php if ($this->_var['nav']['open_new']): ?> target="_blank"<?php endif; ?>><?php echo htmlspecialchars($this->_var['nav']['title']); ?></a></li>
    		<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        </ul>
        <div class="myCart">
            <div class="goodsNum">
            	<span class="tTitle">购物车: <strong><?php echo $this->_var['cart_goods_kinds']; ?></strong>jian</span>
            </div>
            <p class="navPay"><a href="<?php echo url('app=cart'); ?>">go_to_pay</a></p>
        </div>
	</div>
</div>
