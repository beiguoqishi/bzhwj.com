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
        padding: 4px 12px;
        margin-left: -10px;
        margin-bottom: 10px;
        margin-top: 10px;
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
        padding-left: 10px;
        margin-left: 20px;
    }
    .service-list li{
        height: 25px;
        line-height: 25px;
    }
    .nav li{
        float: left;
        padding: 0px 10px;
    }
    .important{
        font-style: normal;
        color: red;
    }
    .aside p{
        line-height: 25px;
    }
    .aside .name{
        float: left;
        margin-top: 80px;
        margin-right: 10px;
    }
    .aside .qq{
        float: left;
    }
    .aside .qqbox{
        padding-bottom: 10px;
    }
</style>
<div class="content" style="width: 1200px;margin: 0 auto;overflow: hidden;border-top: 1px solid #666;padding-top: 30px">
    <?php echo $this->fetch('bzhwj_member.menu.html'); ?>
    <div class="right">
        <div class="leftbox">
            <div class="text-container">
                <h2 class="title">在线帮助</h2>
                <div class="aside">
                    <p>客服电话: <i class="important">123456</i></p>
                    <p>公司邮箱: <i class="important">wenwen@123.com</i></p>
                    <div class="clearfix qqbox"><label class="name">在线咨询:</label><a target="_blank" class="qq" href="http://wpa.qq.com/msgrd?v=3&amp;uin=1095468411&amp;site=qq&amp;menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:1095468411:53" alt="点击这里给我发消息" title="点击这里给我发消息"></a></div>
                </div>
            </div>
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