<?php echo $this->fetch('header.html'); ?>
<?php echo $this->fetch('curlocal.html'); ?>

<div class="flow_chart">
    <div class="pos_x1 bg_a2" title="选购商品"></div>
    <div class="pos_x2 bg_b2" title="完成订单信息并下单"></div>
    <div class="pos_x3 bg_c1" title="下单完成并支付"></div>
</div>

<div class="content">
    <form action="index.php?app=cashier&act=goto_pay&order_id=<?php echo $this->_var['order']['order_id']; ?>" method="POST" id="goto_pay">
    <div class="module_common">
        <div class="step_main">
            <div class="clue_on"><h4>订单提交成功！</h4><p>您的订单已成功生成，选择您想用的支付方式进行支付</p></div>
            <div class="order_information">
                <h3>
                    <b>订单号&nbsp;:&nbsp;<span><?php echo $this->_var['order']['order_sn']; ?></span></b>
                    <b>订单总价&nbsp;:&nbsp;<span><?php echo price_format($this->_var['order']['order_amount']); ?></span></b>
                </h3>
                <p><a href="<?php echo url('app=buyer_order'); ?>" target="_blank">您可以在用户中心中的我的订单查看该订单</a></p>
            </div>

            <div class="buy">
                <h3><b class="ico">选择支付方式并付款</b></h3>
                
                <dl class="defray">
                    <dt>epay_name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>payment_money<span style=" color:#FF4D0F"> <?php echo $this->_var['money']['money']; ?>&nbsp;</span>元</b></dt>
                    <dd>
                        <p class="radio"><input id="payment_epay" type="radio" name="payment_id" checked="checked" value="0" /></p>
                        <p class="logo"><label for="payment_epay"><img src="" alt="epay_name" title="epay_name" width="125" height="47" /></label></p>
                        <p class="explain">epay_desc</p>
                    </dd>
                </dl>
                
                <?php if ($this->_var['payments']['online']): ?>
                <dl class="defray">
                    <dt>在线支付</dt>
                    <?php $_from = $this->_var['payments']['online']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'payment');if (count($_from)):
    foreach ($_from AS $this->_var['payment']):
?>
                    <dd>
                        <p class="radio"><input id="payment_<?php echo $this->_var['payment']['payment_code']; ?>" type="radio" name="payment_id" value="<?php echo $this->_var['payment']['payment_id']; ?>" /></p>
                        <p class="logo"><label for="payment_<?php echo $this->_var['payment']['payment_code']; ?>"><img src="<?php echo $this->_var['site_url']; ?>/includes/payments/<?php echo $this->_var['payment']['payment_code']; ?>/logo.gif" alt="<?php echo htmlspecialchars($this->_var['payment']['payment_name']); ?>-<?php echo htmlspecialchars($this->_var['payment']['payment_desc']); ?>" title="<?php echo htmlspecialchars($this->_var['payment']['payment_name']); ?>-<?php echo htmlspecialchars($this->_var['payment']['payment_desc']); ?>" width="125" height="47" /></label></p>
                        <p class="explain"><?php echo htmlspecialchars($this->_var['payment']['payment_desc']); ?></p>
                    </dd>
                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                </dl>
                <?php endif; ?>
                <?php if ($this->_var['payments']['offline']): ?>
                <dl class="defray">
                    <dt>线下支付</dt>
                    <?php $_from = $this->_var['payments']['offline']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'payment');if (count($_from)):
    foreach ($_from AS $this->_var['payment']):
?>
                    <dd>
                        <p class="radio"><input type="radio" id="payment_<?php echo $this->_var['payment']['payment_code']; ?>" name="payment_id" value="<?php echo $this->_var['payment']['payment_id']; ?>" /></p>
                        <p class="logo"><label for="payment_<?php echo $this->_var['payment']['payment_code']; ?>"><img alt="<?php echo htmlspecialchars($this->_var['payment']['payment_name']); ?>-<?php echo htmlspecialchars($this->_var['payment']['payment_desc']); ?>" title="<?php echo htmlspecialchars($this->_var['payment']['payment_name']); ?>-<?php echo htmlspecialchars($this->_var['payment']['payment_desc']); ?>" src="<?php echo $this->_var['site_url']; ?>/includes/payments/<?php echo $this->_var['payment']['payment_code']; ?>/logo.gif" width="125" height="47" /></label></p>
                        <p class="explain"><?php echo htmlspecialchars($this->_var['payment']['payment_desc']); ?></p>
                    </dd>
                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                </dl>
                <?php endif; ?>

            </div>
            <div class="make_sure">
                <p>
                    <a href="javascript:$('#goto_pay').submit();" class="btn">确认支付</a>
                </p>
            </div>
            <div class="clear"></div>
        </div>
    </div>
    </form>
</div>

<?php echo $this->fetch('footer.html'); ?>