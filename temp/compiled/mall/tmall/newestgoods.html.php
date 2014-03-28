<?php echo $this->fetch('custom_header.html'); ?>
        <h1 style="width:1180px;padding-left:20px;margin:0 auto;height: 36px;line-height: 36px;font-size: 16px;font-weight: normal;border-top: 1px solid #333;">最新项目</h1>
<div class="content clearfix" style="width: 1200px;margin: 0 auto;border-top: 2px solid #333;">
    <?php $_from = $this->_var['goods_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');if (count($_from)):
    foreach ($_from AS $this->_var['goods']):
?>
    <a  target="_blank" class="floorCon-banner j_floorBanner" href="<?php echo url('app=goods&id=' . $this->_var['goods']['goods_id']. ''); ?>" target="_blank"><img width="200" height="300"  src="<?php echo $this->_var['goods']['default_image']; ?>"></a>
    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
</div>
<?php echo $this->fetch('helper_footer.html'); ?>
<div id="footer_index">
    Copyright 2014-2020 百真无假网 Inc.,All rights reserved.<br />
    Powered by 百真无假网 1.0
    <br />
</div>
        </body>
        </html>