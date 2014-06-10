<?php echo $this->fetch('header.html'); ?>
<script type="text/javascript" src="<?php echo $this->lib_base . "/" . 'search_store.js'; ?>" charset="utf-8"></script>
<script type="text/javascript">
//<!CDATA[
$(function (){
	
    var order = '<?php echo $_GET['order']; ?>';
	var css = '';
	
	<?php if ($_GET['order']): ?>
	order_arr = order.split(' ');
	switch (order_arr[1]){
		case 'desc' : 
			css = 'order-down btn-order-cur';
		break;
		case 'asc' :
			css = 'order-up btn-order-cur';
		break;
		default : 
			css = 'order-down-gray';
	}
	$('.btn-order a[ectype='+order_arr[0]+']').attr('class','btn-order-click '+css);
	<?php endif; ?>
	
	$(".btn-order a").click(function(){
		if(this.id==''){
			dropParam('order');// default order
			return false;
		}
		else
		{
			dd = " desc";
			if(order != '') {
				order_arr = order.split(' ');
				if(order_arr[0]==this.id && order_arr[1]=="desc")
					dd = " asc";
				else dd = " desc";
			}
			replaceParam('order', this.id+dd);
			return false;
		}
	});
	
	$('.list-fields li .row_3 a').click(function(){
		var cl=$(this).attr('class');
		if(cl=='expand'){
			$(this).attr('class','fold');	
			$(this).html('收起相关宝贝');
		}else{
			$(this).attr('class','expand');	
			$(this).html('展开相关宝贝');
		}
		$(this).parent().parent().parent('.store-info').next('.store-goods').toggle();
	});
	
	$('.search-by .show-more').click(function(){
		$(this).parent().children().find('.toggle').toggle();
		if($(this).find('span').html()=='展开'){
			$(this).find('span').html('收起');
			$(this).children().children('i').css('background-position','0 -1488px');
		} else {
			$(this).find('span').html('展开');
			$(this).children().children('i').css('background-position','0 -1497px');
		}
	});
	
});

//]]>
</script>
<div id="main" class="w-full">
<div id="page-search-store" class="w mt10 mb10">  
	<?php echo $this->fetch('curlocal.html'); ?>
    <div class="w mb10 border">
        <!--<div class="search-by by-category relative">-->
			<?php $_from = $this->_var['scategorys']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'scategory');$this->_foreach['fe_scategory'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['fe_scategory']['total'] > 0):
    foreach ($_from AS $this->_var['scategory']):
        $this->_foreach['fe_scategory']['iteration']++;
?>
			<!--<dl class="relative clearfix">-->
				<!--<dt class="float-left"><a href="<?php echo url('app=search&act=store&cate_id=' . $this->_var['scategory']['id']. ''); ?>"><?php echo htmlspecialchars($this->_var['scategory']['value']); ?></a></dt>-->
				<!--<dd class="float-left">-->
					<?php $_from = $this->_var['scategory']['children']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'child');$this->_foreach['fe_child'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['fe_child']['total'] > 0):
    foreach ($_from AS $this->_var['child']):
        $this->_foreach['fe_child']['iteration']++;
?>
					<!--<a href="<?php echo url('app=search&act=store&cate_id=' . $this->_var['child']['id']. ''); ?>" class="<?php if ($this->_foreach['fe_child']['iteration'] > 7): ?>toggle hidden<?php endif; ?>"><?php echo htmlspecialchars($this->_var['child']['value']); ?></a>-->
					<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
				<!--</dd>-->
                <!--<dd class="float-left show-more"><h3 class="pointer clearfix"><i></i><span>展开</span>分类</span></h3></dd>-->
			<!--</dl>-->
			<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
		<!--</div>-->
		<div class="search-by by-region relative clearfix">
			<dl class="clearfix" style="border-bottom:0">
				<dt class="float-left"><a ectype="region" id="" href="javascript:;">所在地</a></dt>
				<dd class="float-left">
					<?php $_from = $this->_var['regions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('key', 'region');$this->_foreach['fe_region'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['fe_region']['total'] > 0):
    foreach ($_from AS $this->_var['key'] => $this->_var['region']):
        $this->_foreach['fe_region']['iteration']++;
?>
					<a href="javascript:;" ectype="region" id="<?php echo $this->_var['key']; ?>" class="<?php if ($this->_foreach['fe_region']['iteration'] >= 9): ?>toggle hidden<?php endif; ?>"><?php echo htmlspecialchars($this->_var['region']); ?></a>
					<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
				</dd>
                <dd class="float-left show-more"><h3 class="pointer clearfix"><i></i><span>展开</span>地区</h3></dd>
			</dl>
			
        </div>  
    </div>
    <div class="shops-list w clearfix">
			<div class="search-type clearfix">
				<div class="float-left btn-type">
					<a href="<?php echo url('app=search'); ?>">搜索商品</a>
					<a href="<?php echo url('app=search&act=store'); ?>" class="current" style="border-right:0px;">搜索店铺</a>
					<!--<a href="<?php echo url('app=search&act=groupbuy'); ?>">搜索团购</a>-->
				</div>
				<?php echo $this->fetch('page.top.html'); ?>                              
			</div>
            <div class="list-fields w mb10">
				<ul>
					<?php $_from = $this->_var['stores']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'store');if (count($_from)):
    foreach ($_from AS $this->_var['store']):
?>
            		<li class="pb5 pt5">
						<div class="store-info clearfix">
							<div class="row_1 float-left"><a href="<?php echo url('app=store&id=' . $this->_var['store']['store_id']. ''); ?>"><img src="<?php echo $this->_var['store']['store_logo']; ?>" width="80" height="80" /></a></div>
                            <div class="row_2 float-left">
                                <h2><a href="<?php echo url('app=store&id=' . $this->_var['store']['store_id']. ''); ?>"><?php echo htmlspecialchars($this->_var['store']['store_name']); ?></a></h2>
                                <div class="owner_info">
                                    <span>掌柜：</span>
                                    <a href="<?php echo url('app=store&id=' . $this->_var['store']['store_id']. ''); ?>"><?php echo htmlspecialchars($this->_var['store']['user_name']); ?></a>
                                    <?php if ($this->_var['store']['im_qq']): ?>
                                    <a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $this->_var['store']['im_qq']; ?>&site=qq&menu=yes"><img width="65" border="0" src="http://wpa.qq.com/pa?p=2:<?php echo $this->_var['store']['im_qq']; ?>:1" align="absMiddle"></a>				
                                    <?php endif; ?>
                                    <?php if ($this->_var['store']['im_ww']): ?>
                                    <a target="_blank" href="http://www.taobao.com/webww/ww.php?ver=3&touid=<?php echo $this->_var['store']['im_ww']; ?>&siteid=cntaobao&status=1&charset=utf-8"><img border="0" src="http://amos.alicdn.com/realonline.aw?v=2&uid=<?php echo $this->_var['store']['im_ww']; ?>&site=cntaobao&s=1&charset=utf-8" align="absMiddle"/></a>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="row_4 float-left"><?php echo htmlspecialchars($this->_var['store']['region_name']); ?></div>
                        </div>
					</li>	
                    <?php endforeach; else: ?>
             		<div class="store-empty padding10 mb10">很抱歉！没有找到相关店铺</div>
                    <?php endif; unset($_from); ?><?php $this->pop_vars();; ?>
            	</ul>
            </div>
         
        <?php echo $this->fetch('page.bottom.html'); ?>
    </div>
</div>
</div>						
<?php echo $this->fetch('footer.html'); ?>