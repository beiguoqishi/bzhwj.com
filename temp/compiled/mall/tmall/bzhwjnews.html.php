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
                height: 24px;
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
           <span>热点新闻</span><span>&nbsp;&nbsp;&gt;&gt;&nbsp;&nbsp;</span>
           <span><?php echo htmlspecialchars($this->_var['news']['title']); ?></span>
       </div>
       <p class="tle">
           <span><?php echo htmlspecialchars($this->_var['news']['title']); ?></span>
       </p>
       <div class="pub-date">
           <a href="/" target="_blank">www.bzhwj.com</a><span style="margin:0 10px;font-size: 16px">/</span>
           <span class="p-d"><?php echo $this->_var['news']['update_at']; ?></span>
           <span class="read-time">阅读数：<em style="font-weight: bold;color: #f30"><?php echo $this->_var['news']['read_time']; ?></em></span>
       </div>
       <div class="news-cnt">
           <?php echo $this->_var['news']['content']; ?>
       </div>
       <p class="editor">
           <span>编辑：</span><em style="font-weight: bold;margin-left: 5px"><?php echo htmlspecialchars($this->_var['news']['author']); ?></em>
       </p>
       <div class="relation">
           <p>
               <span>上一篇：</span><a target="_self" href="/index.php?app=bzhwjnews&id=<?php echo $this->_var['last']['id']; ?>"><?php echo htmlspecialchars($this->_var['last']['title']); ?></a>
           </p>
           <p>
               <span>下一篇：</span><a target="_self" href="/index.php?app=bzhwjnews&id=<?php echo $this->_var['next']['id']; ?>"><?php echo htmlspecialchars($this->_var['next']['title']); ?></a>
           </p>
       </div>
   </div>
    <div class="right">
        <h2 class="newest-tle">最新项目</h2>
        <?php if ($this->_var['newest_list']): ?>
        <ul class="newest-list">
            <?php $_from = $this->_var['newest_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'el');if (count($_from)):
    foreach ($_from AS $this->_var['el']):
?>
            <li>
                <a href="/index.php?app=goods&id=<?php echo $this->_var['el']['goods_id']; ?>" target="_blank">
                    <img src="<?php echo htmlspecialchars($this->_var['el']['default_image']); ?>"><span><?php echo htmlspecialchars($this->_var['el']['goods_name']); ?></span>
                </a>
            </li>
            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        </ul>
        <?php endif; ?>
    </div>
</div>
<?php echo $this->fetch('helper_footer.html'); ?>
<div id="footer_index">
    <!-- 			 <p>
                     <a href="http://www.tcwmall.com">首页</a>
                    | <a  href="http://www.tcwmall.com">招聘英才</a>
                    | <a  href="http://www.tcwmall.com">广告合作</a>
                    | <a  href="http://www.tcwmall.com">联系我们</a>
                    | <a  href="http://www.tcwmall.com">关于天诚网</a>
                 </p>-->
    Copyright 2014-2020 百真无假网 Inc.,All rights reserved.<br />
    Powered by 百真无假网 1.0
    <br />
</div>
<script src="http://admin.bzhwj.com/static/js/common/jquery-1.8.0.js"></script>
<script>
    $.post('/index.php?app=bzhwjnews&act=incr_read_time&id=<?php echo $this->_var['id']; ?>');
</script>
        </body>
        </html>
