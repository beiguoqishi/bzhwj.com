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
        <!--<li><a class="<?php if ($_GET['app'] == 'store' && $_GET['act'] == 'credit'): ?>active<?php else: ?>normal<?php endif; ?>" href="<?php echo url('app=store&act=credit&id=' . $this->_var['store']['store_id']. ''); ?>"><span>会员社区</span></a></li>-->
        <a class="collection" href="javascript:collect_store(<?php echo $this->_var['store']['store_id']; ?>)">收藏该店铺</a>
    </ul>

    <div class="nav_bg"></div>
</div>