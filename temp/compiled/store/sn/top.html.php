<div class="sn_banner clearfix">
	<div class="w1000 clearfix" style="position:relative; z-index:1">
		<div class="share">
        </div>
        <script language="javascript">
			$(function(){
				$(".share").hover(function(){
					$(".sharelist").show();
				},function(){
					$(".sharelist").hide();
				});
				$(".sharelist").hover(function(){
					$(this).show();
				},function(){
					$(this).hide();
				});
			});
		</script>
        <div class="sharelist" style="position: absolute; z-index: 99; display:none; left:30px; top: 78px;">
        
            <div id="ckepop">
                <a class="jiathis_button_qzone"></a>
                <a class="jiathis_button_tsina"></a>
                <a class="jiathis_button_tqq"></a>
                <a class="jiathis_button_renren"></a>
                <a class="jiathis_button_kaixin001"></a>
                <a class="jiathis_button_taobao"></a>
                <a class="jiathis_button_xiaoyou"></a>
                <a class="jiathis_button_douban"></a>
                <a href="http://www.jiathis.com/share" class="jiathis jiathis_txt jtico jtico_jiathis" target="_blank"></a>
            </div>
            <script type="text/javascript" src="http://v3.jiathis.com/code/jia.js?uid=1340804611789901" charset="utf-8"></script>
            
        </div>
		<div class="shop-name">
			<h2><?php echo htmlspecialchars($this->_var['store']['store_name']); ?></h2>
            <h3 style="font-size:18px;font-family:微软雅黑,黑体,arial;"><?php echo htmlspecialchars($this->_var['store']['store_desc']); ?></h3>
		</div>
		<div class="favorite">
			<a href="javascript:collect_store(<?php echo $this->_var['store']['store_id']; ?>)"></a>
		</div>
	</div>
</div>
<div id="nav1">
    <ul>
        <li><a class="<?php if ($_GET['app'] == 'store' && $_GET['act'] == 'index'): ?>home<?php else: ?>normal<?php endif; ?>" href="<?php echo url('app=store&id=' . $this->_var['store']['store_id']. ''); ?>"><span>店铺首页</span></a></li>
        <?php if ($this->_var['store']['functions']['groupbuy']): ?>
        <li><a class="<?php if ($_GET['app'] == 'groupbuy' || $_GET['act'] == 'groupbuy'): ?>active<?php else: ?>normal<?php endif; ?>" href="<?php echo url('app=store&act=groupbuy&id=' . $this->_var['store']['store_id']. ''); ?>"><span>团购活动</span></a></li>
        <?php endif; ?>
        <?php $_from = $this->_var['store']['store_navs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'store_nav');if (count($_from)):
    foreach ($_from AS $this->_var['store_nav']):
?>
        <li><a class="<?php if ($_GET['app'] == 'store' && $_GET['act'] == 'article' && $_GET['id'] == $this->_var['store_nav']['article_id']): ?>active<?php else: ?>normal<?php endif; ?>" href="<?php echo url('app=store&act=article&id=' . $this->_var['store_nav']['article_id']. ''); ?>"><span><?php echo htmlspecialchars($this->_var['store_nav']['title']); ?></span></a></li>
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        <li><a class="<?php if ($_GET['app'] == 'store' && $_GET['act'] == 'credit'): ?>active<?php else: ?>normal<?php endif; ?>" href="<?php echo url('app=store&act=credit&id=' . $this->_var['store']['store_id']. ''); ?>"><span>信用评价</span></a></li>
        <?php if ($_GET['app'] == 'goods'): ?>
        <li><a class="active" href="javascript:;"><span>商品详情</span></a></li>
        <?php endif; ?>
    </ul>
</div>