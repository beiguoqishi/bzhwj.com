<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="utf-8">
</head>
<body>
<a href="/index.php?app=storeinterpose&act=store_goods_edit" target="_blank">增加商品</a>
<div style="margin-top: 20px">
    <h1>商品列表</h1>
    <?php if ($this->_var['goods_list']): ?>
    <ul>
        <?php $_from = $this->_var['goods_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');if (count($_from)):
    foreach ($_from AS $this->_var['goods']):
?>
        <li>
            <a href="/index.php?app=storeinterpose&act=store_goods_edit&id=<?php echo $this->_var['goods']['goods_id']; ?>" target="_blank"><?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?></a>
            <a style="margin-left: 20px" href="/index.php?app=storeinterpose&act=store_goods_do_delete&id=<?php echo $this->_var['goods']['goods_id']; ?>">删除</a>
        </li>
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
    </ul>
    <?php endif; ?>
</div>
</body>
</html>