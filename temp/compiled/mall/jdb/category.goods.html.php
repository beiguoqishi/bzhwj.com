<?php echo $this->fetch('header.html'); ?>
<?php echo $this->fetch('curlocal.html'); ?>
<div class="content w1200 clearfix">
	<div class="left">
    	<div class="hot_sale mt10">
                    <div class="title">热销排行 </div>
                    <ul class="clearfix">
                        <?php $_from = $this->_var['hot_sales']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');$this->_foreach['fe_goods'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['fe_goods']['total'] > 0):
    foreach ($_from AS $this->_var['goods']):
        $this->_foreach['fe_goods']['iteration']++;
?>
                        <li class="clearfix">
                            <i class="foc"><?php echo $this->_foreach['fe_goods']['iteration']; ?></i>
                            <a target="_blank" href="<?php echo url('app=goods&id=' . $this->_var['goods']['goods_id']. ''); ?>" title="<?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?>">
                            <img width="60" height="60" alt="<?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?>" src="<?php echo $this->_var['goods']['default_image']; ?>">
                            </a>
                            <div>
                                <p class="name"><a name="rcmd_trd_c1" target="_blank" href="<?php echo url('app=goods&id=' . $this->_var['goods']['goods_id']. ''); ?>" title="<?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?>"><?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?></a></p>
                                <p class="price"><b>￥</b><?php echo $this->_var['goods']['price']; ?></p>
                            </div>
                        </li>  
                        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>              
                    </ul>
         </div>
    </div>
    <div class="right">
		<div id="all-catalog">
           <?php $_from = $this->_var['gcategorys']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'gcategory');if (count($_from)):
    foreach ($_from AS $this->_var['gcategory']):
?>
           <div class="box">
              <span class="tp"><span></span></span>
              <div class="title"><h3><a href="<?php echo url('app=search&cate_id=' . $this->_var['gcategory']['id']. ''); ?>"><?php echo htmlspecialchars($this->_var['gcategory']['value']); ?></a></h3></div>
              <div class="content">
              <?php $_from = $this->_var['gcategory']['children']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'child');$this->_foreach['fe_child'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['fe_child']['total'] > 0):
    foreach ($_from AS $this->_var['child']):
        $this->_foreach['fe_child']['iteration']++;
?>
                <div class="each <?php if ($this->_foreach['fe_child']['iteration'] % 2 == 0): ?>write<?php endif; ?>">
                 <h2><a href="<?php echo url('app=search&cate_id=' . $this->_var['child']['id']. ''); ?>"><?php echo htmlspecialchars($this->_var['child']['value']); ?></a></h2>
                 <ul>
                 <?php $_from = $this->_var['child']['children']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'child2');if (count($_from)):
    foreach ($_from AS $this->_var['child2']):
?>
                   <li> <a href="<?php echo url('app=search&cate_id=' . $this->_var['child']['id']. ''); ?>"><?php echo htmlspecialchars($this->_var['child2']['value']); ?></a></li>
                 <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                 </ul>
                 <div class="clr"></div>
                </div>
              <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
              </div>
              <span class="bt"><span></span></span>
           </div>
           <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        </div>
	</div>
</div>
<?php echo $this->fetch('footer.html'); ?>