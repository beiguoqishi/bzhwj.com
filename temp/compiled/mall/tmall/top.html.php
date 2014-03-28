<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<base href="<?php echo $this->_var['site_url']; ?>/" target="_blank"/>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $this->_var['charset']; ?>" />
<?php echo $this->_var['page_seo']; ?>

<meta name="author" content="Cengnlaeng" />
<meta name="generator" content="Bluefish 2.2.2" />
<meta name="copyright" content="ShopEx Inc. All Rights Reserved" />

<link type="text/css" href="<?php echo $this->res_base . "/" . 'css/header.css'; ?>" rel="stylesheet" />
<link type="text/css" href="<?php echo $this->res_base . "/" . 'css/footer.css'; ?>" rel="stylesheet" />
<link type="text/css" href="<?php echo $this->res_base . "/" . 'css/main.css'; ?>" rel="stylesheet" />
<link type="text/css" href="<?php echo $this->res_base . "/" . 'css/tmall.css'; ?>" rel="stylesheet" />

<script type="text/javascript" src="index.php?act=jslang"></script>
<script type="text/javascript" src="<?php echo $this->lib_base . "/" . 'jquery.js'; ?>" charset="utf-8"></script>
<script type="text/javascript" src="<?php echo $this->lib_base . "/" . 'ecmall.js'; ?>" charset="utf-8"></script>
<script type="text/javascript" src="<?php echo $this->lib_base . "/" . 'cart.js'; ?>" charset="utf-8"></script>
<script type="text/javascript" src="<?php echo $this->res_base . "/" . 'js/main.js'; ?>" charset="utf-8"></script> 
<script type="text/javascript" src="<?php echo $this->lib_base . "/" . 'kissy/build/kissy.js'; ?>"></script>
<script type="text/javascript" src="<?php echo $this->lib_base . "/" . 'kissy/build/switchable/switchable-pkg.js'; ?>"></script>
<!--[if lte IE 6]>
<script type="text/javascript" language="Javascript" src="<?php echo $this->res_base . "/" . 'js/hoverForIE6.js'; ?>"></script>
<![endif]-->

<script type="text/javascript">
//<!CDATA[
var SITE_URL = "<?php echo $this->_var['site_url']; ?>";
var REAL_SITE_URL = "<?php echo $this->_var['real_site_url']; ?>";
var PRICE_FORMAT = '<?php echo $this->_var['price_format']; ?>';
//]]>
</script>

<?php echo $this->_var['_head_tags']; ?>
<!--<editmode></editmode>-->
</head>
<body>
<div id="site-nav" class="w-full">
   <div class="shoptop w clearfix">
      <div class="login_info">
         
      </div>
      <ul class="quick-menu">
      
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
          <li class="service">
              <a href="/index.php?app=recommendgoods">项目推荐</a>
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
          <a href="<?php echo url('app=bzhwjcontact'); ?>">联系客服</a>
          </li>
     </ul>
   </div>
</div>
