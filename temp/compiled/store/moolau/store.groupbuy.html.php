<?php echo $this->fetch('header.html'); ?>

<?php echo $this->fetch('top.html'); ?>

<div id="mystore" class="w auto clearfix">
   <div class="col-sub w190">
      <?php echo $this->fetch('left.html'); ?>
   </div>
   <div class="col-main w750"> 
   		<?php echo $this->fetch('store.slides.html'); ?>
        <div class="module_special">
            <h2 class="common_title veins2" style="position:relative;">
                <div class="ornament1"></div>
                <div class="ornament2"></div>
                <span class="ico1"><span class="ico2">
                <?php $_from = $this->_var['search_name']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['item']):
?>
                <?php if ($this->_var['item']['url']): ?>
                <p class="message_link"><a href="<?php echo $this->_var['item']['url']; ?>" style="margin-right:10px;"><?php echo $this->_var['item']['text']; ?></a></p>
                <?php else: ?>
                <?php echo $this->_var['item']['text']; ?>
                <?php endif; ?>
                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                </span></span>
            </h2>
            <div class="wrap">
                <div class="wrap_child">
                    <?php if ($this->_var['groupbuy_list']): ?>
                    <div class="major">
                        <ul class="list groupbuy">
                        <?php $_from = $this->_var['groupbuy_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'groupbuy');if (count($_from)):
    foreach ($_from AS $this->_var['groupbuy']):
?>
                        <li>
                            <div class="pic"><a href="<?php echo url('app=groupbuy&id=' . $this->_var['groupbuy']['group_id']. ''); ?>"><img width="160" height="160" src="<?php echo $this->_var['groupbuy']['default_image']; ?>" /></a></div>
                            <h3><a href="<?php echo url('app=groupbuy&id=' . $this->_var['groupbuy']['group_id']. ''); ?>" target="_blank"><?php echo htmlspecialchars($this->_var['groupbuy']['group_name']); ?></a></h3>
                            <p><em></em><?php echo price_format($this->_var['groupbuy']['price']); ?></p>
                            <div class="time center auto">
                                <?php if ($this->_var['groupbuy']['group_state']): ?>
                                <span><?php echo $this->_var['groupbuy']['group_state']; ?>
                                <?php else: ?>
                                <span>剩余：</span><?php echo $this->_var['groupbuy']['lefttime']; ?>
                                <?php endif; ?>
                            </div>
                        </li>
                        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                        </ul>
                    </div>
                    <?php echo $this->fetch('page.bottom.html'); ?>
                    <?php else: ?>
                    <div class="nothing"><p>很抱歉! 没有找到相关团购</p></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php echo $this->fetch('footer.html'); ?>
