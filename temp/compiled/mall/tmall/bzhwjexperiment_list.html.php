<?php echo $this->fetch('custom_header.html'); ?>
<link href="/themes/resource/js/bootstrap/css/bootstrap.min.css" type="text/css" rel="stylesheet">
<style type="text/css">
    img {
        max-width: 100%;
        width: 100%;
    }
    table,td {
        border-collapse: collapse;
    }
    td {
        border: 1px solid #333333;
        line-height: 2em;
    }
    td.col1,td.col3 {
        padding-left: 1em;
        font-weight: bold;
        width: 10%;
    }
    td.col2,td.col4 {
        width: 40%;
    }
    td input {
        width: 95%;
        line-height: 2em;
        height: 2em;
        padding-left: 1em;
    }
    td input,td textarea {
        border: none;
    }
    td input,td textarea,td select{
        color: #f30;
    }
    td textarea {
        padding: 1em;
        width: 95%;
        height: 100px;
    }
    .nav-bar {
        padding: 10px;
        overflow: hidden;
    }
    .nav-bar a {
        line-height: 24px;
    }
    .nav-bar a.cur {
        background: #fff!important;
        color: #b00!important;
    }
    .goods-list {
        float: left;
        overflow: hidden;
        margin-top: 20px;
        width: 100%;
    }
    .goods-list .goods-item {
        float: left;
        margin: 0 20px 30px;
        width: 200px;
    }
    .goods-list .goods-item a.pic {
        display: block;
        width: 100%;
        overflow: hidden;
    }
    .goods-list .goods-item a.pic img {
        width: 200px;
        height: 200px;
    }
    .goods-list .goods-item p {
        padding: 3px 5px;
    }
    .goods-list .goods-item p span {
        color: #999;
    }
    .nav-bar {
        overflow: hidden;
    }
    .nav-bar .sort {
        float: left;
    }
    .nav-bar .search {
        float: right;
    }
    .hd {
        border: 1px #ddd solid;
    }
    .ctgs {
        padding: 12px;
        overflow: hidden;
    }
    .ctgs .ctg {
        float: left;
        margin-bottom: 10px;
        clear: both;
    }
    .ctgs .ctg .b-ctg {
        float: left;
    }
    .ctgs .ctg .sub-ctgs {
        float: left;
        margin-left: 10px;
        margin-top: 8px;
        font-size: 12px;
    }
    .ctgs .ctg a,.area-list a {
        padding: 5px 8px;
    }
    .ctgs .ctg a.cur,.ctgs .ctg a:hover,.area-list a.cur,.area-list a:hover {
        color: #b00000;
        background-color: #ccc;
    }
    h1, .h1, h2, .h2, h3, .h3 {
        margin: 0!important;
    }
    a.zone-item {
        font-size: 12px;
    }
    a.zone-item.city-caption {
        font-size: 14px;
    }
    .area-list {
        margin-left: 20px;
    }
</style>
<div style="width: 1200px;margin: 0 auto;overflow: hidden;">
    <div class="hd">
        <div class="ctgs">
            <?php if ($this->_var['ctgs']): ?>
            <?php $_from = $this->_var['ctgs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'ctg');if (count($_from)):
    foreach ($_from AS $this->_var['ctg']):
?>
            <div class="ctg">
                <a class="b-ctg <?php if ($this->_var['ctg']['cate_id'] == $this->_var['b_ctg_id']): ?>cur<?php endif; ?>" href="/index.php?app=experiment&b_ctg=<?php echo $this->_var['ctg']['cate_id']; ?>&c_pid=<?php echo $this->_var['c_pid']; ?>&c_cid=<?php echo $this->_var['c_cid']; ?>" target="_self"><?php echo htmlspecialchars($this->_var['ctg']['cate_name']); ?></a>
                <?php if ($this->_var['ctg']['sub_ctgs']): ?>
                <div class="sub-ctgs">
                    <?php $_from = $this->_var['ctg']['sub_ctgs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'sub_ctg');if (count($_from)):
    foreach ($_from AS $this->_var['sub_ctg']):
?>
                    <a target="_self" class="<?php if ($this->_var['sub_ctg']['cate_id'] == $this->_var['s_ctg_id']): ?>cur<?php endif; ?> " href="/index.php?app=experiment&s_ctg=<?php echo $this->_var['sub_ctg']['cate_id']; ?>&c_pid=<?php echo $this->_var['c_pid']; ?>&c_cid=<?php echo $this->_var['c_cid']; ?>"><?php echo htmlspecialchars($this->_var['sub_ctg']['cate_name']); ?></a>
                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                </div>
                <?php endif; ?>
            </div>
            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
            <?php endif; ?>
        </div>
        <div class="area-list">
            <span class="tle">区域：</span>
            <span class="zone-list">
                <a class="zone-item <?php if ('all' == $this->_var['loc']): ?>cur<?php endif; ?>" href="/index.php?app=experiment&s_ctg=<?php echo $this->_var['s_ctg_id']; ?>&b_ctg=<?php echo $this->_var['b_ctg_id']; ?>&sort_type=renqi<?php if ($this->_var['sort_type'] == 'renqi'): ?>&sort_order=<?php echo $this->_var['sort_order']; ?><?php endif; ?>&loc=all&c_pid=<?php echo $this->_var['c_pid']; ?>&c_cid=<?php echo $this->_var['c_cid']; ?>" target="_self">全部</a>
                <?php if ($this->_var['city_zones']): ?>
                    <?php $_from = $this->_var['city_zones']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'zone');if (count($_from)):
    foreach ($_from AS $this->_var['zone']):
?>
                    <a class="zone-item <?php if ($this->_var['zone']['id'] == '01'): ?>city-caption<?php endif; ?> <?php if ($this->_var['zone']['name'] == $this->_var['loc'] || ! $this->_var['loc'] && $this->_var['zone']['id'] == '01' || $this->_var['cur_city'] == $this->_var['zone']['name']): ?>cur<?php endif; ?>" href="/index.php?app=experiment&s_ctg=<?php echo $this->_var['s_ctg_id']; ?>&b_ctg=<?php echo $this->_var['b_ctg_id']; ?>&sort_type=renqi<?php if ($this->_var['sort_type'] == 'renqi'): ?>&sort_order=<?php echo $this->_var['sort_order']; ?><?php endif; ?>&loc=<?php echo htmlspecialchars($this->_var['zone']['name']); ?>&c_pid=<?php echo $this->_var['c_pid']; ?>&c_cid=<?php echo $this->_var['c_cid']; ?>" target="_self"><?php echo htmlspecialchars($this->_var['zone']['name']); ?></a>
                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                <?php endif; ?>
            </span>
        </div>
        <div class="nav-bar">
            <div class="sort">
                <a target="_self" class="glyphicon glyphicon-sort <?php if ($this->_var['sort_type'] == 'newest'): ?>cur<?php endif; ?> default-sort btn-order-click" href="/index.php?app=experiment&s_ctg=<?php echo $this->_var['s_ctg_id']; ?>&b_ctg=<?php echo $this->_var['b_ctg_id']; ?>&sort_type=newest<?php if ($this->_var['sort_type'] == 'newest'): ?>&sort_order=<?php echo $this->_var['sort_order']; ?><?php endif; ?>&c_pid=<?php echo $this->_var['c_pid']; ?>&c_cid=<?php echo $this->_var['c_cid']; ?>">最新</a>
                <a target="_self" class="glyphicon glyphicon-sort <?php if ($this->_var['sort_type'] == 'renqi'): ?>cur<?php endif; ?> btn-order-click" href="/index.php?app=experiment&s_ctg=<?php echo $this->_var['s_ctg_id']; ?>&b_ctg=<?php echo $this->_var['b_ctg_id']; ?>&sort_type=renqi<?php if ($this->_var['sort_type'] == 'renqi'): ?>&sort_order=<?php echo $this->_var['sort_order']; ?><?php endif; ?>&c_pid=<?php echo $this->_var['c_pid']; ?>&c_cid=<?php echo $this->_var['c_cid']; ?>">人气</a>
                <a target="_self" class="glyphicon glyphicon-sort <?php if ($this->_var['sort_type'] == 'credit'): ?>cur<?php endif; ?> btn-order-click" href="/index.php?app=experiment&s_ctg=<?php echo $this->_var['s_ctg_id']; ?>&b_ctg=<?php echo $this->_var['b_ctg_id']; ?>&sort_type=credit<?php if ($this->_var['sort_type'] == 'credit'): ?>&sort_order=<?php echo $this->_var['sort_order']; ?><?php endif; ?>&c_pid=<?php echo $this->_var['c_pid']; ?>&c_cid=<?php echo $this->_var['c_cid']; ?>">信用</a>
                <a target="_self" class="glyphicon glyphicon-sort <?php if ($this->_var['sort_type'] == 'price'): ?>cur<?php endif; ?> btn-order-click" href="/index.php?app=experiment&s_ctg=<?php echo $this->_var['s_ctg_id']; ?>&b_ctg=<?php echo $this->_var['b_ctg_id']; ?>&sort_type=price<?php if ($this->_var['sort_type'] == 'price'): ?>&sort_order=<?php echo $this->_var['sort_order']; ?><?php endif; ?>&c_pid=<?php echo $this->_var['c_pid']; ?>&c_cid=<?php echo $this->_var['c_cid']; ?>">价格</a>
            </div>
            <div class="search">
                <form action="/index.php" method="get" target="_self">
                    <input type="hidden" name="sort_type" value="<?php echo $this->_var['sort_type']; ?>"/>
                    <input type="hidden" name="sort_order" value="<?php echo $this->_var['exact_sort_order']; ?>"/>
                    <input type="hidden" name="app" value="experiment"/>
                    <input type="hidden" name="s_ctg" value="<?php echo $this->_var['s_ctg_id']; ?>"/>
                    <input type="hidden" name="b_ctg" value="<?php echo $this->_var['b_ctg_id']; ?>"/>
                    <input type="hidden" name="loc" value="<?php echo htmlspecialchars($this->_var['loc']); ?>"/>
                    <input type="text" name="q" value="<?php echo htmlspecialchars($this->_var['keyword']); ?>"/>
                    <input type="hidden" name="c_pid" value="<?php echo $this->_var['c_pid']; ?>">
                    <input type="hidden" name="c_cid" value="<?php echo $this->_var['c_cid']; ?>">
                    <button type="submit">搜索</button>
                </form>
            </div>
        </div>
    </div>
    <?php if ($this->_var['data']): ?>
    <ul class="goods-list">
        <?php $_from = $this->_var['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');if (count($_from)):
    foreach ($_from AS $this->_var['goods']):
?>
        <li class="goods-item">
            <a class="pic" href="/index.php?app=goods&id=<?php echo $this->_var['goods']['goods_id']; ?>" target="_blank">
                <img src="<?php echo htmlspecialchars($this->_var['goods']['default_image']); ?>" alt=""/>
            </a>
            <p>
                <span>名称：</span><a class="txt" href="/index.php?app=goods&id=<?php echo $this->_var['goods']['goods_id']; ?>" target="_blank"><em><?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?></em></a>
            </p>
            <p>
                <span>价格：</span>
                <?php if ($this->_var['goods']['off_price'] && $this->_var['goods']['off_price'] < $this->_var['goods']['price']): ?>
                <em style="text-decoration: line-through"><?php echo $this->_var['goods']['price']; ?></em>
                <em style="margin-left: 5px;color: #f30;"><?php echo $this->_var['goods']['off_price']; ?></em>
                <?php else: ?>
                <em><?php echo $this->_var['goods']['price']; ?></em>
                <?php endif; ?>
            </p>
            <p>
                <span>标签：</span><em><?php echo htmlspecialchars($this->_var['goods']['tags']); ?></em>
            </p>
            <p>
                <span>地址：</span><em><?php echo htmlspecialchars($this->_var['goods']['address']); ?></em>
            </p>
        </li>
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
    </ul>
    <?php endif; ?>
    <div class="pager">
        <form action="/index.php" method="get" target="_self">
            <input type="hidden" name="app" value="experiment">
            <input type="hidden" name="sort_order" value="<?php echo $this->_var['exact_sort_order']; ?>"/>
            <input type="hidden" name="sort_type"  value="<?php echo $this->_var['sort_type']; ?>"/>
            <input type="hidden" name="s_ctg" value="<?php echo $this->_var['s_ctg_id']; ?>"/>
            <input type="hidden" name="b_ctg" value="<?php echo $this->_var['b_ctg_id']; ?>"/>
            <input type="hidden" name="q" value="<?php echo htmlspecialchars($this->_var['keyword']); ?>"/>
            <input type="hidden" name="loc" value="<?php echo htmlspecialchars($this->_var['loc']); ?>">
            <input type="hidden" name="c_pid" value="<?php echo $this->_var['c_pid']; ?>">
            <input type="hidden" name="c_cid" value="<?php echo $this->_var['c_cid']; ?>">
            <button type="submit" style="margin: 0 15px;" id="prev_page">上一页</button>
            <span>当前是第<input id="cur_page" style="margin: 0 15px;padding-left: 5px" value="<?php echo $this->_var['page']; ?>" name="page">页，共&nbsp;&nbsp;<?php echo $this->_var['total']; ?>&nbsp;&nbsp;页</span><button type="submit" style="margin-left: 15px">确定</button>
            <button type="submit" style="margin: 0 15px;" id="next_page">下一页</button>
        </form>
    </div>
</div>
<?php echo $this->fetch('helper_footer.html'); ?>
<div id="footer_index">
    浙ICP备14013284号 百真无假网 Inc.,All rights reserved.<br />
    Powered by 百真无假网 1.0
    <br />
</div>
<script src="/themes/resource/js/require.js"></script>
<script src="/themes/resource/js/app/appointment.js"></script>
<script>
    var total = <?php echo $this->_var['total']; ?>;
    $('#prev_page').on('mousedown',function(e) {
        var curPage = $('#cur_page'),
                page = parseInt(curPage.val());

        page = page < 2 ? 1 : page - 1;
        curPage.val(page);
    });
    $('#next_page').on('mousedown',function(e) {
        var curPage = $('#cur_page'),
                page = parseInt(curPage.val());

        page = page >= total ? total : page + 1;
        curPage.val(page);
    });
</script>
</body>
</html>