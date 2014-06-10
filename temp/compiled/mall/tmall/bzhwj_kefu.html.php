<?php echo $this->fetch('custom_header.html'); ?>
<link href="/themes/mall/tmall/styles/default/css/user.css" type="text/css" rel="stylesheet">
<style type="text/css">
    .right{
        float: left;
        margin-left: 20px;
        width: 979px;
        border: 1px solid #ccc;
        padding-left: 10px;
    }
    .right .title{
        font-size: 16px;
        background-color: #f9fafc;
        padding: 4px 12px;
        border-bottom: 1px solid #c4d5e0;
        margin-left: -10px;
        margin-bottom: 10px;
    }
    .border-top{
        border-top: 1px solid #c4d5e0;
    }
    .list{
        padding-bottom: 10px;
    }
    .list li{
        height: 30px;
        line-height: 30px;
    }
    .leftbox,.rightbox{
        float: left;
    }
    .leftbox{
        width: 600px;
        border-right: 1px solid #ccc;
    }
    .questions li{
        width: 300px;
        float: left;
    }
    .questions a{
        display: block;
    }
    .questions{
        list-style-type: disc;
        list-style: inside;
    }
    .clearfix:after {
        content: "";
        height: 0;
        visibility: hidden;
        display: block;
        clear: both;
        font-size: 0;
        line-height: 0;
    }
    .clearfix{
        zoom: 1;
    }
    .rightbox{
        padding-left: 10px;
    }
    .service-tle{
        font-size: 16px;
        padding: 4px 12px;
        margin-bottom: 10px;
        margin-top: 6px;
    }
    .service-list{
        list-style-type: disc;
margin-left: 20px;
        padding-left: 10px;
    }
    .service-list li{
        height: 25px;
        line-height: 25px;
    }
</style>
<div class="content" style="width: 1200px;margin: 0 auto;overflow: hidden;border-top: 1px solid #666;padding-top: 30px">
    <?php echo $this->fetch('bzhwj_member.menu.html'); ?>
    <div class="right">
        <div class="leftbox">
            <h2 class="title">常见问题专栏</h2>
            <ul class="list questions clearfix">
                <?php $_from = $this->_var['common_question']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'el');if (count($_from)):
    foreach ($_from AS $this->_var['el']):
?>
                <li><a href="<?php echo $this->_var['el']['link']; ?>" target="_blank"><?php echo $this->_var['el']['title']; ?></a></li>
                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
            </ul>
            <h2 class="title border-top">最新公告</h2>
            <ul class="list">
                <?php $_from = $this->_var['newest_notice']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'el');if (count($_from)):
    foreach ($_from AS $this->_var['el']):
?>
                <li><a href="<?php echo $this->_var['el']['link']; ?>" target="_blank"><?php echo $this->_var['el']['title']; ?></a></li>
                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
            </ul>
        </div>
        <div class="rightbox">
            <h2 class="service-tle">常用服务</h2>
            <ul class="list service-list">
                <li><a target="_blank" href="/index.php?app=find_password">找回密码</a></li>
                <li><a target="_blank" href="/index.php?app=member&act=profile">修改信息</a></li>
                <li><a target="_blank" href="/index.php?app=bzhwj_weiquan">维权退款</a></li>
                <li><a target="_blank" href="/index.php?app=article&act=system&code=eula">百真无假规则</a></li>
            </ul>
        </div>
    </div>
    <iframe  width="0" height="0" style="display: none" name="pic"></iframe>
</div>
<?php echo $this->fetch('helper_footer.html'); ?>
<div id="footer_index">
    浙ICP备14013284号 百真无假网 Inc.,All rights reserved.<br />
    Powered by 百真无假网 1.0
    <br />
</div>
<script src="/themes/resource/js/require.js"></script>
<script>
</script>
</body>
</html>