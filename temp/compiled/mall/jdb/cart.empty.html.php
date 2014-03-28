<?php echo $this->fetch('width/top.html'); ?>
<!--<script type="text/javascript" src="<?php echo $this->lib_base . "/" . 'cart.js'; ?>" charset="utf-8"></script>-->
<div class="car_nav w1000">
    <div class="logoimg"><a href="index.php"><img src="<?php echo $this->_var['site_logo']; ?>"></a></div>
    <div class="shopCarnav">
    <span></span>
    </div>
    <div class="carmsg">正品行货，全国联保，尽享购物乐趣 ！</div>
</div>

<div class="car_content w1000">
        <div class="step_main">
            <div class="null_shopping">
                <h4>您的购物车是空的，您可以</h4>
                <p>
                    <a href="index.php">选购商品>></a>
                    <a href="<?php echo url('app=buyer_order'); ?>">查看订单>></a>
                </p>
            </div>

            <?php if ($this->_var['best_items']): ?>
            <h2><b class="best_item" title="精品推荐"></b></h2>
            <div class="wrap">
                <div class="wrap_child">
                    <ul class="list_pic">
                        <?php $_from = $this->_var['best_items']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');if (count($_from)):
    foreach ($_from AS $this->_var['goods']):
?>
                        <li>
                            <p><a href="<?php echo url('app=goods&goods_id=' . $this->_var['goods']['goods_id']. ''); ?>"><img alt="" src="<?php echo $this->_var['goods']['default_image']; ?>" width="100" height="100" /></a></p>
                            <h3><a href="<?php echo url('app=goods&goods_id=' . $this->_var['goods']['goods_id']. ''); ?>"><?php echo htmlspecialchars($this->_var['goods']['description']); ?></a><span><?php echo price_format($this->_var['goods']['price']); ?></span></h3>
                        </li>
                        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                    </ul>

                </div>
            </div>
            <?php endif; ?>

            <div class="clear"></div>

        </div>
</div>
<?php echo $this->fetch('footer.html'); ?>