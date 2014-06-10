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
    .list i{
        font-size: 14px;
        padding-left: 6px;
        color: orangered;
    }
    .list li{
        height: 30px;
        line-height: 30px;
    }
    .list i{
        font-style: normal;
    }
</style>
<div class="content" style="width: 1200px;margin: 0 auto;overflow: hidden;border-top: 1px solid #666;padding-top: 30px">
    <?php echo $this->fetch('bzhwj_member.menu.html'); ?>
    <div class="right">
        <h2 class="title">联系我们</h2>
        <ul class="list">
            <li>招商引资电话:<i class="icon">123456</i></li>
            <li>会员客服电话:<i class="icon">123456</i></li>
            <li>公司地址:<i class="icon">123456</i></li>
            <li>公司邮箱:<i class="icon">123456</i></li>
            <li>公司传真:<i class="icon">123456</i></li>
        </ul>
        <h2 class="title border-top">人才招聘中心 <label>电话:123456</label></h2>
        <ul class="list">
            <li>客服</li>
            <li>客户经理</li>
        </ul>
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