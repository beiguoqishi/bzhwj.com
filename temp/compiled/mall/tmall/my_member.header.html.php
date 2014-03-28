<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<base href="<?php echo $this->_var['site_url']; ?>/" />

<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7 charset=<?php echo $this->_var['charset']; ?>" />
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $this->_var['charset']; ?>" />
<?php echo $this->_var['page_seo']; ?>

<meta name="author" content="ecmall.shopex.cn" />
<meta name="copyright" content="ShopEx Inc. All Rights Reserved" />
<link href="<?php echo $this->_var['site_url']; ?>/themes/mall/tmall/styles/default/css/header.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $this->res_base . "/" . 'css/user.css'; ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo $this->_var['site_url']; ?>/themes/mall/tmall/styles/default/css/footer.css" rel="stylesheet" type="text/css" />

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
<script type="text/javascript" src="<?php echo $this->res_base . "/" . 'js/main.js'; ?>" charset="utf-8"></script>
<script type="text/javascript" src="<?php echo $this->lib_base . "/" . 'cart.js'; ?>" charset="utf-8"></script>

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
<style type="text/css">
.w{width:1000px;margin:auto;}
#header {width: 100%;height:auto;overflow:hidden;}
#site-nav{color:#fff;}
.content{margin:10px auto;overflow:hidden;}
</style>
</head>
<body>
<div id="site-nav" class="w-full">
   <div class="shoptop w clearfix">
      <div class="login_info">
         您好,
         <?php if (! $this->_var['visitor']['user_id']): ?>
         <?php echo htmlspecialchars($this->_var['visitor']['user_name']); ?>
         <a href="<?php echo url('app=member&act=login&ret_url=' . $this->_var['ret_url']. ''); ?>">登录</a>
         <a href="<?php echo url('app=member&act=register&ret_url=' . $this->_var['ret_url']. ''); ?>">注册</a>
         <?php else: ?>
         <a href="<?php echo url('app=member'); ?>"><span><?php echo htmlspecialchars($this->_var['visitor']['user_name']); ?></span></a>
         <a style="margin:0px 5px;" href="<?php echo url('app=member&act=logout'); ?>">退出</a>
         <a href="<?php echo url('app=message&act=newpm'); ?>">站内消息<?php if ($this->_var['new_message']): ?>(<span><?php echo $this->_var['new_message']; ?></span>)<?php endif; ?></a>
         <?php endif; ?>
      </div>
       <ul class="quick-menu">
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
               <a href="<?php echo url('app=article&code=help'); ?>">联系客服</a>
           </li>
       </ul>
   </div>
</div>
<div id="header" class="w-full" style="z-index:0;">
	<div class="shop-t w clearfix pb10 mb5 pt5">
      <div class="logo mt10">
         <a href="<?php echo $this->_var['site_url']; ?>" title="<?php echo $this->_var['site_title']; ?>"><img alt="<?php echo $this->_var['site_title']; ?>" src="<?php echo $this->_var['site_logo']; ?>" /></a>
      </div>
      <div style="margin-left:0px;margin-right:0px;" class="top-search">
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
         	<div class="form-fields float-right">
           		<form method="GET" action="<?php echo url('app=search'); ?>">
               		<input type="hidden" name="app" value="search" />
               		<input type="hidden" name="act" value="index" />
               		<input type="text"   name="keyword" value="<?php if ($_GET['keyword']): ?><?php echo $_GET['keyword']; ?><?php else: ?>搜索其实很容易<?php endif; ?>" onfocus="if (this.value=='搜索其实很容易') this.value = '';"  class="keyword"  style="color:#999;"/>
               		<input type="submit" value="搜索" class="submit" hidefocus="true" />
            	</form>
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
    <div style="top:0px;left:0px;" class="w-full mall-nav">
    	<ul class="w clearfix">
            <li class="<?php if ($this->_var['index']): ?>ml240px<?php endif; ?> each float-left inline-block"><a class="<?php if ($this->_var['index']): ?>current<?php endif; ?>" href="<?php echo $this->_var['site_url']; ?>">首页</a></li>
            <?php $_from = $this->_var['navs']['middle']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'nav');if (count($_from)):
    foreach ($_from AS $this->_var['nav']):
?>
            <li class="each float-left inline-block"><a class="<?php if (! $this->_var['index'] && $this->_var['nav']['link'] == $this->_var['current_url']): ?>current<?php endif; ?>" href="<?php echo $this->_var['nav']['link']; ?>"<?php if ($this->_var['nav']['open_new']): ?> target="_blank"<?php endif; ?>><?php echo htmlspecialchars($this->_var['nav']['title']); ?></a></li>
            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
    	</ul>
    </div>
</div>
