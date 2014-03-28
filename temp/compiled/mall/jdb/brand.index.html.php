<?php echo $this->fetch('header.html'); ?>
<?php echo $this->fetch('curlocal.html'); ?>
<div id="all-brand" class="w1200">
   <div class="main-brand">
      <div class="title"><span>推荐品牌</span></div>
	  <div class="content">
	     <?php $_from = $this->_var['recommended_brands']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'brand');if (count($_from)):
    foreach ($_from AS $this->_var['brand']):
?>
	     <div class="each">
         		<a href="<?php echo url('app=search&brand=' . $this->_var['brand']['brand_name']. ''); ?>" target="_blank"><img src="<?php echo $this->_var['brand']['brand_logo']; ?>" width="86" height="48" alt="<?php echo $this->_var['brand']['brand_name']; ?>" title="<?php echo $this->_var['brand']['brand_name']; ?>" /></a>
                <span><?php echo $this->_var['brand']['brand_name']; ?></span>
	     </div>
	     <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
		 <div class="clr"></div>
	  </div>
   </div>
   <div class="main-brand">
      <div class="title"><span>全部品牌</span></div>
	  <div class="content">
	     <?php $_from = $this->_var['brands']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'brand');if (count($_from)):
    foreach ($_from AS $this->_var['brand']):
?>
         <!--<div><?php if ($this->_var['brand']['tag']): ?><?php echo $this->_var['brand']['tag']; ?><!--<?php else: ?>其它<!--<?php endif; ?> <!--(<?php echo $this->_var['brand']['count']; ?>)</div>-->
         <?php $_from = $this->_var['brand']['brands']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'b');if (count($_from)):
    foreach ($_from AS $this->_var['b']):
?>
         <div class="each"><a href="<?php echo url('app=search&brand=' . $this->_var['b']['brand_name']. ''); ?>" target="_blank"><img src="<?php echo $this->_var['b']['brand_logo']; ?>" width="86" height="48" alt="<?php echo $this->_var['brand']['brand_name']; ?>" title="<?php echo $this->_var['b']['brand_name']; ?>" /></a>
         		<span><?php echo $this->_var['b']['brand_name']; ?></span>
		 </div>
         <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
         <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
		 <div class="clr"></div>
	   </div>
   </div>
</div>
<?php echo $this->fetch('footer.html'); ?>
