<?php echo $this->fetch('width/top.html'); ?>
<div class="car_nav w1000">
    <div class="logoimg"><a href="index.php"><img src="<?php echo $this->_var['site_logo']; ?>"></a></div>
    <div class="shopCarnav">
    <span class="nav2"><a title="我的购物车" href="<?php echo url('app=cart'); ?>">1.我的购物车</a></span>
    </div>
    <div class="carmsg">正品行货，全国联保，尽享购物乐趣 ！</div>
</div>

<form method="post" id="order_form">
<div class="content w1000 clearfix">
        <div class="step_main">
            <div class="main_add">
                <?php echo $this->fetch('order.shipping.html'); ?>
                <?php echo $this->fetch('order.postscript.html'); ?>
                <?php echo $this->fetch('order.amount.html'); ?>
            </div>
            <div class="sidelist">
                <?php echo $this->fetch('order.goods.html'); ?>
            </div>
            <div class="clr"></div>
        </div>
</div>
</form>
<?php echo $this->fetch('footer.html'); ?>