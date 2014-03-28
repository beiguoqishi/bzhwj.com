<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<base href="<?php echo $this->_var['site_url']; ?>/" />

<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7 charset=<?php echo $this->_var['charset']; ?>" />
<meta http-equiv="Content-Type" content="text/html;charset=<?php echo $this->_var['charset']; ?>" />
<?php echo $this->_var['page_seo']; ?>

<meta name="author" content="ecmall.shopex.cn" />
<meta name="copyright" content="ShopEx Inc. All Rights Reserved" />
<link href="<?php echo $this->res_base . "/" . 'main.css'; ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo $this->res_base . "/" . 'shop.css'; ?>" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="index.php?act=jslang"></script>
<script type="text/javascript" src="<?php echo $this->lib_base . "/" . 'jquery.js'; ?>" charset="utf-8"></script>
<script type="text/javascript" src="<?php echo $this->lib_base . "/" . 'ecmall.js'; ?>" charset="utf-8"></script>
<script type="text/javascript" src="<?php echo $this->res_base . "/" . 'taobao.js'; ?>" charset="utf-8"></script>
<script type="text/javascript" src="<?php echo $this->lib_base . "/" . 'kissy/build/kissy.js'; ?>"></script>
<script type="text/javascript" src="<?php echo $this->lib_base . "/" . 'kissy/build/switchable/switchable-pkg.js'; ?>"></script>
<script type="text/javascript">
//<!CDATA[
var SITE_URL = "<?php echo $this->_var['site_url']; ?>";
var PRICE_FORMAT = '<?php echo $this->_var['price_format']; ?>';
//]]>
</script>
<?php echo $this->_var['_head_tags']; ?>
</head>

<body>
<div id="menu_1hao5">
                 <div id="site-nav" class="clearfix">
                <p class="left_menu">
				<?php if (! $this->_var['visitor']['user_id']): ?>
			您好,<?php echo htmlspecialchars($this->_var['visitor']['user_name']); ?>
			<a  href="<?php echo url('app=member&act=login&ret_url=' . $this->_var['ret_url']. ''); ?>">[登录]</a>
			<a href="<?php echo url('app=member&act=register&ret_url=' . $this->_var['ret_url']. ''); ?>">[注册]</a>
			<?php else: ?>
			wellcome, <a href="<?php echo url('app=member'); ?>" class="meber_link" title="用户中心"><?php echo htmlspecialchars($this->_var['visitor']['user_name']); ?></a> |
			<a class="note" href="<?php echo url('app=message&act=newpm'); ?>">站内消息<?php if ($this->_var['new_message']): ?>(<font color="red"><?php echo $this->_var['new_message']; ?></font>)<?php endif; ?></a> |
			<a href="<?php echo url('app=member&act=logout'); ?>">[退出]</a>
			<?php endif; ?>
			</p>
   <ul class="quick-menu">
   <li><a href="index.php">返回首页</a></li>
 <li class="mywantbuy menu-item">
    <div class="menu">
   <a class="menu-hd"  href="#">我要逛<b></b></a>
    <div class="menu-bd">
     <div class="menu-bd-panel">
     <div>
      <a href="<?php echo url('app=category'); ?>">商品分类</a>
      <a href="<?php echo url('app=brand'); ?>">品牌分类</a>
      <a href="<?php echo url('act=store&app=search'); ?>">商家店铺</a>
    </div>
    </div>
    </div>
    </div>
    </li>
   <li class="my1hao5 menu-item">
    <div class="menu">
   <a class="menu-hd"  href="<?php echo url('app=member'); ?>">个人中心<b></b></a>
    <div class="menu-bd">
     <div class="menu-bd-panel">
     <div>
      <a href="<?php echo url('app=buyer_order'); ?>">已买到的商品</a>
      <a href="<?php echo url('app=buyer_groupbuy'); ?>">我的团购</a>
      <a href="<?php echo url('app=my_question'); ?>">我的咨询</a>
    </div>
    </div>
    </div>
    </div>
    </li>
     <li class="cart">
<a href="<?php echo url('app=cart'); ?>" class="buy"><s></s>购物车有<strong id="cart_goods_kinds"><?php echo $this->_var['cart_goods_kinds']; ?></strong>种商品</a>
    </li>
   <li class="my_favourite menu-item">
    <div class="menu">
    <a class="menu-hd" href="<?php echo url('app=my_favorite'); ?>">收藏夹<b></b></a>
    <div class="menu-bd">
     <div class="menu-bd-panel">
     <div>
     <a  href="<?php echo url('app=my_favorite'); ?>">收藏的商品</a>
     <a  href="<?php echo url('app=my_favorite&type=store'); ?>">收藏的店铺</a>
    </div>
  </div>
  </div>
  </div>
   </li>
   <li class="search menu-item">
  <div class="menu">
  <span class="menu-hd"><s></s>搜索<b></b>
</span>
<div class="menu-bd">
<div class="menu-bd-panel">
<form action="index.php?app=search" method="GET">
<input value="想找什么商品？" name="keyword" maxlength="60" onblur="if(!value){value=defaultValue;}" onfocus="this.value=''">
<button type="submit" >搜 索</button>
<input type="hidden" name="app" value="search">
</form>
</div>
</div>
</div>
</li>
<li><a href="<?php echo url('app=article&code=' . $this->_var['acc_help']. ''); ?>">帮助中心</a></li>
</ul>
</div>
</div>
<script type="text/javascript">
TB.Header.init();
</script>