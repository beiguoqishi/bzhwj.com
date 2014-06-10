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
    }
    .news .left .pub-date {
        height: 24px;
        line-height: 24px;
        color: #999;
        text-align: center;
    }
    .news .left .pub-date a {
        color: #999;
    }
    .news .left .news-cnt {
        padding: 20px;
    }
    .news .left .editor {
        line-height: 24px;
        height: 24px;
        padding-left: 20px;
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
<div class="news" style="color: #333333;width: 1200px;margin: 0 auto">
    <div class="left">
        <div class="pos-tip" style="height: 40px;line-height: 40px;">
            <span>当前位置：</span>
            <a href="/" title="百真无假网">百真无假网</a><span>&nbsp;&nbsp;&gt;&gt;&nbsp;&nbsp;</span>
            <span>风云人物</span><span>&nbsp;&nbsp;&gt;&gt;&nbsp;&nbsp;</span>
            <span><?php echo htmlspecialchars($this->_var['person']['title']); ?></span>
        </div>
        <p class="tle">
            <span><?php echo htmlspecialchars($this->_var['person']['title']); ?></span>
        </p>
        <div class="pub-date">
            <a href="/" target="_blank">www.bzhwj.com</a><span style="margin:0 10px;font-size: 16px">/</span>
            <span class="p-d"><?php echo $this->_var['person']['update_at']; ?></span>
            <span class="read-time">阅读数：<em style="font-weight: bold;color: #f30"><?php echo $this->_var['person']['read_time']; ?></em></span>
        </div>
        <div class="news-cnt">
            <?php echo $this->_var['person']['content']; ?>
        </div>
        <p class="editor">
            <span>编辑：</span><em style="font-weight: bold;margin-left: 5px"><?php echo htmlspecialchars($this->_var['person']['editor']); ?></em>
        </p>
        <div class="relation">
            <p>
                <span>上一篇：</span><a target="_self" href="/index.php?app=bzhwjpeople&id=<?php echo $this->_var['last']['id']; ?>"><?php echo htmlspecialchars($this->_var['last']['title']); ?></a>
            </p>
            <p>
                <span>下一篇：</span><a target="_self" href="/index.php?app=bzhwjpeople&id=<?php echo $this->_var['next']['id']; ?>"><?php echo htmlspecialchars($this->_var['next']['title']); ?></a>
            </p>
        </div>
    </div>
    <div class="right">
        <h2 class="newest-tle">专家人物</h2>
        <?php if ($this->_var['other_people_list']): ?>
        <ul class="newest-list">
            <?php $_from = $this->_var['other_people_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'el');if (count($_from)):
    foreach ($_from AS $this->_var['el']):
?>
            <li>
                <a href="/index.php?app=bzhwjpeople&id=<?php echo $this->_var['el']['id']; ?>" target="_self">
                    <img style="width: 200px;" src="<?php echo htmlspecialchars($this->_var['el']['logo']); ?>"><span><?php echo htmlspecialchars($this->_var['el']['title']); ?></span>
                </a>
            </li>
            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        </ul>
        <?php endif; ?>
    </div>
</div>
<?php echo $this->fetch('helper_footer.html'); ?>
<div id="footer_index">
    浙ICP备14013284号 百真无假网 Inc.,All rights reserved.<br />
    Powered by 百真无假网 1.0
    <br />
</div>
<script src="http://admin.bzhwj.com/static/js/common/jquery-1.8.0.js"></script>
<script>
    $.post('/index.php?app=bzhwjpeople&act=incr_read_time&id=<?php echo $this->_var['id']; ?>');
</script>
</body>
</html>
