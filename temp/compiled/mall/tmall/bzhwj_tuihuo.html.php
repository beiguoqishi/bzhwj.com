<?php echo $this->fetch('custom_header.html'); ?>
<style type="text/css">
    .content{
        width: 1180px;
        margin: 0 auto;
        border: 1px solid #ccc;
        padding-left: 20px;
        padding-bottom: 10px;
    }
    .content .title{
        font-size: 16px;
        background-color: #f9fafc;
        padding: 4px 12px;
        border-bottom: 1px solid #c4d5e0;
        margin-bottom: 20px;
        margin-top: 10px;
        border-top: 1px solid #c4d5e0;
        margin-left: -20px;
        text-align: center;
    }
</style>
<div class="main">
    <div class="content">
        <h2 class="title">退货流程</h2>
        <div><?php echo $this->_var['baozhang']['tui_flow']; ?></div>
    </div>
</div>
<?php echo $this->fetch('helper_footer.html'); ?>
<div id="footer_index">
    浙ICP备14013284号 百真无假网 Inc.,All rights reserved.<br />
    Powered by 百真无假网 1.0
    <br />
</div>
<script src="/themes/resource/js/require.js"></script>
<script src="/themes/resource/js/app/user_appointment.js"></script>
</body>
</html>