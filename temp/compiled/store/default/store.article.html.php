<?php echo $this->fetch('header.html'); ?>

<?php echo $this->fetch('top.html'); ?>
<style type="text/css">
    a:hover{
        color: #f30!important;
        text-decoration: underline!important;
    }
</style>
<div id="content">
    <div id="left">
        <?php echo $this->fetch('left.html'); ?>
    </div>
    
    <div id="right">
        <div class="die6"></div>

        <div class="module_special">
            <h2 class="common_title veins2">
                <div class="ornament1"></div>
                <div class="ornament2"></div>
                <span class="ico1"><span class="ico2">美容院概況</span></span>
            </h2>
            <div class="wrap" style="padding: 15px">
                <div class="wrap_child">
                    <div class="major">
                        <?php if ($this->_var['archive']): ?>
                        <?php echo $this->_var['archive']['intro']; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="module_special">
            <h2 class="common_title veins2">
                <div class="ornament1"></div>
                <div class="ornament2"></div>
                <span class="ico1"><span class="ico2">工商注册信息</span></span>
            </h2>
            <div class="wrap" style="padding: 15px">
                <div class="wrap_child">
                    <div class="major">
                        <?php if ($this->_var['archive']): ?>
                        <?php echo $this->_var['archive']['business_info']; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="module_special">
            <h2 class="common_title veins2">
                <div class="ornament1"></div>
                <div class="ornament2"></div>
                <span class="ico1"><span class="ico2">美容院图片</span></span>
            </h2>
            <div class="wrap">
                <div class="wrap_child">
                    <?php if ($this->_var['archive']): ?>
                    <div>
                        <ul class="list">
                            <?php $_from = $this->_var['archive']['pics']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'ngoods');if (count($_from)):
    foreach ($_from AS $this->_var['ngoods']):
?>
                            <li style="margin: 20px;text-align: center">
                                <div class="pic"><img src="<?php echo htmlspecialchars($this->_var['ngoods']['pic']); ?>" style="max-width: 100%;text-align: center"/></div>
                                <h3 style="margin-top: 10px;"><?php echo htmlspecialchars($this->_var['ngoods']['title']); ?></h3>
                            </li>
                            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                        </ul>
                    </div>
                    <?php else: ?>
                    <div class="nothing"><p>很抱歉! 没有找到相关商品</p></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    
    <div class="clear"></div>
</div>

<?php echo $this->fetch('footer.html'); ?>