<?php echo $this->fetch('custom_header.html'); ?>
<style type="text/css">
    #header {
        padding-bottom: 20px;
    }
    .news {
        overflow: hidden;
    }
    .news .left {
        float: left;
        width: 800px;
        border-right: 1px solid #333333;
    }
    .news .left .pos-tip {
        padding-left: 20px;
    }
    .news .left .tle {
        height: 50px;
        line-height: 50px;
        font-size: 16px;
        font-weight: bold;
        text-align: center;
        border-bottom: 1px solid #333333;
    }
    .news .left .pub-date {
        height: 24px;
        line-height: 24px;
        text-align: center;
        border-bottom: 1px solid #333333;
    }
    .news .left .news-cnt {
        padding: 20px;
        border-bottom: 1px solid #333333;
    }
    .news .left .editor {
        line-height: 24px;
        padding-left: 20px;
        border-bottom: 1px solid #333333;
    }
    .news .left .relation {
        padding: 20px;
        line-height: 30px;
    }
    .news .left .relation a {
        font-weight: bold;
    }
    .news .right {
        float: left;
        width: 380px;
        overflow: hidden;
    }
    .news .right .newest-tle {
        height: 40px;
        line-height: 40px;
        font-size: 16px;
        font-weight: bold;
        padding-left: 10px;
        border-bottom: 1px solid #333333;
    }
    .news .right .newest-list img {
        display: block;
        margin: 0 auto;
    }
    .news .right .newest-list li a {
        display: block;
    }
    .news .right .newest-list li a span {
        display: block;
        margin-top: 20px;
    }
    .news .right .newest-list li {
        text-align: center;
    }
    .news .right .newest-list li a{
        font-size: 14px;
        padding-top: 20px;
    }
    .news .left,.news .right {
        padding-bottom: 10000px;
        margin-bottom: -10000px;
    }

</style>
<div class="news" style="border-top: 1px solid #333333;color: #333333;width: 1200px;margin: 0 auto">
    <div class="left">
        <div class="pos-tip" style="height: 40px;line-height: 40px;border-bottom: 1px solid #333">
            <span>当前位置：</span>
            <a href="/" title="百真无假网">百真无假网</a><span>&nbsp;&nbsp;&gt;&gt;&nbsp;&nbsp;</span>
            <span>精品项目</span><span>&nbsp;&nbsp;&gt;&gt;&nbsp;&nbsp;</span>
            <span><?php echo htmlspecialchars($this->_var['goods']['title']); ?></span>
        </div>
        <p class="tle">
            <span><?php echo htmlspecialchars($this->_var['goods']['title']); ?></span>
        </p>
        <div class="news-cnt">
            <?php echo $this->_var['goods']['content']; ?>
        </div>
        <p class="editor">
            <span>编辑：</span><em style="font-weight: bold;margin-left: 5px"><?php echo htmlspecialchars($this->_var['goods']['editor']); ?></em>
        </p>
        <div class="editor">
            <p><span>公司名称：</span><em style="font-weight: bold;margin-left: 5px"><?php echo htmlspecialchars($this->_var['goods']['com_name']); ?></em></p>
            <p><span>公司地址：</span><em style="font-weight: bold;margin-left: 5px"><?php echo htmlspecialchars($this->_var['goods']['com_address']); ?></em></p>
        </div>
    </div>
    <div class="right">
        <h2 class="newest-tle">同品牌其它系列</h2>
        <?php if ($this->_var['same_brands']): ?>
        <ul class="newest-list">
            <?php $_from = $this->_var['same_brands']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'el');if (count($_from)):
    foreach ($_from AS $this->_var['el']):
?>
            <li>
                <a href="<?php echo htmlspecialchars($this->_var['el']['url']); ?>" target="_self">
                    <img style="width: 200px" src="<?php echo htmlspecialchars($this->_var['el']['img']); ?>"><span><?php echo htmlspecialchars($this->_var['el']['title']); ?></span>
                </a>
            </li>
            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        </ul>
        <?php endif; ?>

        <h2 class="newest-tle" style="border-top: 1px solid #333;margin-top: 30px">其它品牌</h2>
        <?php if ($this->_var['other_brands']): ?>
        <ul class="newest-list">
            <?php $_from = $this->_var['other_brands']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'el');if (count($_from)):
    foreach ($_from AS $this->_var['el']):
?>
            <li>
                <a href="<?php echo htmlspecialchars($this->_var['el']['url']); ?>" target="_self">
                    <img style="width: 200px" src="<?php echo htmlspecialchars($this->_var['el']['img']); ?>"><span><?php echo htmlspecialchars($this->_var['el']['title']); ?></span>
                </a>
            </li>
            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        </ul>
        <?php endif; ?>
    </div>
</div>
<?php echo $this->fetch('helper_footer.html'); ?>
<div id="footer_index">
    Copyright 2014-2020 百真无假网 Inc.,All rights reserved.<br />
    Powered by 百真无假网 1.0
    <br />
</div>
<script src="http://admin.bzhwj.com/static/js/common/jquery-1.8.0.js"></script>
</body>
</html>
