<?php echo $this->fetch('bzhwj_top.html'); ?>
<style type="text/css">
    #right {
        border: 1px solid #ffe3a4;
    }
    .btn {
        display: inline-block;
        padding: 6px 12px;
        margin-bottom: 0;
        font-size: 14px;
        font-weight: normal;
        line-height: 1.428571429;
        text-align: center;
        white-space: nowrap;
        vertical-align: middle;
        cursor: pointer;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        -o-user-select: none;
        user-select: none;
        background-image: none;
        border: 1px solid transparent;
        border-radius: 4px;
    }
    .btn-warning {
        color: #fff;
        background-color: #f0ad4e;
        border-color: #eea236;
    }
    #comment_cnt {
        display: block;
        width: 700px;
        margin: 0 auto;
        height: 100px;
        padding: 1em;
    }
    .comment_area {
        text-align: center;
        border-top: 1px solid #ffe3a4;
        padding-top: 15px;
    }
    #publish_comment {
        margin: 20px 0;
    }
    .comment-list {
        padding: 10px;
        color: #333;
        font-size: 14px;
    }
    .comment-list .l1-list .seg {
        overflow: hidden;
        margin-top: 5px;
    }
    .comment-list .l1-list .l1-seg * {
        font-size: 14px;
    }
    .comment-list .l1-list .l1-item {
        margin: 10px 0;
    }
    .comment-list .l2-list .l2-item {
        margin: 8px 0;
    }
    .comment-list .l1-list .user-name {
        color: #5d7895;
        float: left;
        margin-right: 8px;
    }
    .comment-list .l2-list {
        font-size: 12px;
        overflow: hidden;
        padding-left: 32px;
        background-color: #fafafa;
        margin-top: 5px;
    }
    .pager {
        margin: 15px auto;
        text-align: center;
    }

    .pager a {
        padding: 5px 8px;
        margin: 0 3px;
    }
    .pager a.slibing {
        border: 1px solid #ffe34a;
        background-color: #ff8e00;
        color: white;
    }
    .pager a.page-item.cur {
        border: 1px solid #ffe34a;
        background-color: #f1c40f;
    }
</style>
<div id="content">
    <div id="left">
        <?php echo $this->fetch('left.html'); ?>
    </div>

    <div id="right">
        <div class="comment-list">
            <?php if ($this->_var['comments']): ?>
            <ul class="l1-list">
            <?php $_from = $this->_var['comments']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'comment');if (count($_from)):
    foreach ($_from AS $this->_var['comment']):
?>
            <li class="l1-item">
                <div class="l1-seg seg">
                    <em class="member-name user-name"><?php echo htmlspecialchars($this->_var['comment']['user_name']); ?>:</em>
                    <p class="c-cnt"><?php echo htmlspecialchars($this->_var['comment']['cnt']); ?></p>
                </div>
                <?php if ($this->_var['comment']['sub_comments']): ?>
                <ul class="l2-list">
                    <?php $_from = $this->_var['comment']['sub_comments']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'sub');if (count($_from)):
    foreach ($_from AS $this->_var['sub']):
?>
                    <li class="l2-item">
                       <div class="l2-seg seg">
                           <em class="store-name user-name">院长回复:</em>
                           <p class="c-cnt"><?php echo htmlspecialchars($this->_var['sub']['cnt']); ?></p>
                       </div>
                    </li>
                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                </ul>
                <?php endif; ?>
            </li>
            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
            </ul>
            <?php endif; ?>
            <?php if ($this->_var['total']): ?>
            <div class="pager">
                <a href="/index.php?app=store&act=member&store_id=14&page=<?php echo $this->_var['prev_page']; ?>" class="prev slibing" target="_self">上一页</a>
                <?php $_from = $this->_var['total_array']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'i');if (count($_from)):
    foreach ($_from AS $this->_var['i']):
?>
                <a href="/index.php?app=store&act=member&store_id=14&page=<?php echo $this->_var['i']; ?>" target="_self" class="page-item <?php if ($this->_var['i'] == $this->_var['page']): ?>cur<?php endif; ?>"><?php echo $this->_var['i']; ?></a>
                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                <a href="/index.php?app=store&act=member&store_id=14&page=<?php echo $this->_var['next_page']; ?>" class="next slibing" target="_self">下一页</a>
            </div>
            <?php endif; ?>
        </div>
        <div class="comment_area">
            <textarea id="comment_cnt" placeholder="输入内容..."></textarea>
            <button type="button" class="btn btn-warning" id="publish_comment">发表</button>
        </div>
    </div>

    <div class="clear"></div>
</div>
<script>
    var store_id = <?php echo $this->_var['store']['store_id']; ?>;
    $('#publish_comment').on('click',function(e) {
        var cnt = $.trim($('#comment_cnt').val());
        if (cnt) {
            $.post('/index.php',{
                app:'store',
                act:'member_publish_comment',
                store_id:store_id,
                cnt:cnt
            },function(d) {
                if (d >= 0) {
                    alert('发表成功！');
                    location.reload();
                } else if (d == -1) {
                    alert('您还未登录，不能发表评论，请登录！');
                } else if (d == -2) {
                    alert('无法发表社区评论，\n请联系美容院确定您是该店会员！');
                } else {
                    alert('发表失败，请联系网站管理员！');
                }
            });
        } else {
            alert('请输入评论内容！');
        }
    });
</script>
<?php echo $this->fetch('footer.html'); ?>
