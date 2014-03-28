<?php echo $this->fetch('width/header.html'); ?>
<div class="w1000">
    <div class="breadcrumb">
        <h1><a href="<?php echo url('app=channel&id=' . $this->_var['channel_id']. '&gcate=' . $this->_var['cate_id']. ''); ?>"><?php echo htmlspecialchars($this->_var['gcate']['cate_name']); ?></a></h1>
        <span>&nbsp;&nbsp;&nbsp;
        	<?php $_from = $this->_var['gcategories']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'cate');$this->_foreach['fe_cate'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['fe_cate']['total'] > 0):
    foreach ($_from AS $this->_var['cate']):
        $this->_foreach['fe_cate']['iteration']++;
?>
            	<?php if ($this->_foreach['fe_cate']['iteration'] <= 6): ?>
                    <?php if (($this->_foreach['fe_cate']['iteration'] <= 1)): ?>
                    <a href="<?php echo url('app=search&cate_id=' . $this->_var['cate']['cate_id']. ''); ?>"><?php echo $this->_var['cate']['cate_name']; ?></a>
                    <?php else: ?>
                    &nbsp;|&nbsp;<a href="<?php echo url('app=search&cate_id=' . $this->_var['cate']['cate_id']. ''); ?>"><?php echo $this->_var['cate']['cate_name']; ?></a>
                    <?php endif; ?>
            	<?php endif; ?>
            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        </span>
   </div>
</div>
<div class="channel clearfix w1000">
    <div class="cleft">
    	<div area="left" widget_type="area">
            <?php $this->display_widgets(array('page'=>'channel0','area'=>'left')); ?>
        </div>
    </div>

    <div class="cright">     
        <div class="main clearfix">
            <div class="middle" area="cycle_image" widget_type="area">
                <?php $this->display_widgets(array('page'=>'channel0','area'=>'cycle_image')); ?>
            </div>

            <div class="cside" area="sales" widget_type="area">
                <?php $this->display_widgets(array('page'=>'channel0','area'=>'sales')); ?>
            </div>
        </div>
        <div class="c_floor clearfix" area="cfloor" widget_type="area">
            <?php $this->display_widgets(array('page'=>'channel0','area'=>'cfloor')); ?>
        </div>
    </div>
</div>
<?php echo $this->fetch('footer.html'); ?>