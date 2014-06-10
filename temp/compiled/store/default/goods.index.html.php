<?php echo $this->fetch('bzhwj_top.html'); ?>
        <style type="text/css">
            #goods_appointment {
                display: none;
            }
            #goods_appointment {
                padding-top: 30px;
            }
            table,td {
                border-collapse: collapse;
            }
            #goods_appointment td {
                padding: 8px;
            }
            #goods_appointment table {
                border: 2px solid #333333;
                width: 90%;
                margin: 0 auto;
            }
            #goods_appointment table thead td {
                border-bottom: 1px solid #666;
                font-size: 14px;
                font-weight: bold;
            }
            #goods_appointment table thead tr {
                background-color: #999;
            }
            #goods_appointment table tbody tr:nth-child(2n) {
                background-color: #EEEEEE;
            }
            #goods_appointment table tbody td {
                font-size: 12px;
                font-weight: normal;
            }
            .user_menu li a {
                display: block;
                font-size: 12px;
                color: #3d3f3e;
                text-decoration: none;
            }

            .user_menu li a span {
                display: block;
                padding: 8px 20px 8px 22px;
            }
        </style>
<div id="content">
    <div id="left">
        <?php echo $this->fetch('left.html'); ?>
    </div>

    <div id="right">
        <?php echo $this->fetch('goodsinfo.html'); ?>

        <a name="module"></a>
        <ul class="user_menu">
            <div class="ornament1"></div>
            <div class="ornament2"></div>
            <li><a for="goods_detail" class="active" href="<?php echo url('app=goods&id=' . $this->_var['goods']['goods_id']. ''); ?>#module"><span>商品详情</span></a></li>
            <li><a for="goods_appointment" href="<?php echo url('app=goods&id=' . $this->_var['goods']['goods_id']. ''); ?>#appointment"><span>查看预约体验</span></a></li>
        </ul>

        <div class="option_box">
            <div id="goods_detail" class="default"><?php echo html_filter($this->_var['goods']['description']); ?></div>
            <div id="goods_appointment">
                <?php if ($this->_var['appoint_list']): ?>
                <table>
                    <thead>
                    <tr>
                        <td cellspacing="0">昵称</td><td cellspacing="0">预约时间</td>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $_from = $this->_var['appoint_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'el');if (count($_from)):
    foreach ($_from AS $this->_var['el']):
?>
                    <tr>
                        <td><?php echo htmlspecialchars($this->_var['el']['name']); ?></td>
                        <td><?php echo $this->_var['el']['update_at']; ?></td>
                    </tr>
                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                    </tbody>
                </table>
                <?php else: ?>
                <h2 style="text-align: center;font-size: 20px">没有预约信息</h2>
                <?php endif; ?>
            </div>
        </div>
        <?php if ($this->_var['goods']['related_info']['count'] > 0): ?>
        <div class="module_currency">
            <h2 class="common_title veins1">
                <div class="ornament1"></div>
                <div class="ornament2"></div>
                <span class="ico1"><span class="ico2">相关信息(TAG相关)</span></span>
            </h2>
            <dl class="related_list">
                <?php $_from = $this->_var['goods']['related_info']['list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'app_data');if (count($_from)):
    foreach ($_from AS $this->_var['app_data']):
?>
                <?php if ($this->_var['app_data']['data'] && $this->_var['app_data']['app_type'] != 'ECMALL'): ?>
                <dt><a href="<?php echo $this->_var['app_data']['app_url']; ?>"><?php echo $this->_var['app_data']['app_name']; ?></a></dt>
                <?php $_from = $this->_var['app_data']['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['item']):
?>
                <dd><?php echo $this->_var['item']; ?></dd>
                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                <?php endif; ?>
                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
            </dl>
        </div>
        <?php endif; ?>
        <div class="clear"></div>
    </div>

    <div class="clear"></div>
</div>
<script>
    $('body').on('click','a[for]',function(e) {
        $('a[for]').each(function(idx,el) {
            $('#' + $(this).removeClass('active').attr('for')).hide();
        });
        $('#' + $(this).addClass('active').attr('for')).show();
        e.preventDefault();
    });
</script>
<?php echo $this->fetch('footer.html'); ?>
