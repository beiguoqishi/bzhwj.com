<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="UTF-8">
    <style type="text/css">
        .item input:not([type]) {
            width: 550px;
        }
    </style>
</head>
<body>
<div style="margin-top: 20px">
    <h1>编辑商品信息</h1>
    <div id="goods_item">
        <input name="goods_id" type="hidden" value="<?php echo $this->_var['goods_id']; ?>">
        <p class="item">
            <span>商品名称：</span><input name="goods[goods_name]" value="<?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?>">
        </p>
        <p class="item">
            <span>商品描述：</span>
            <textarea style="width: 300px;height: 400px;" editor="description" name="goods[description]"><?php echo htmlspecialchars($this->_var['goods']['description']); ?></textarea>
        </p>
        <p class="item">
            <span>大分类：</span>
            <select name="goods[cate_id_1]" id="cate_id_1">
                <?php $_from = $this->_var['ctg_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'ctg');if (count($_from)):
    foreach ($_from AS $this->_var['ctg']):
?>
                <option value="<?php echo $this->_var['ctg']['parent']['cate_id']; ?>" <?php if ($this->_var['ctg']['parent']['cate_id'] == $this->_var['goods']['cate_id_1']): ?>selected="selected"<?php endif; ?>><?php echo htmlspecialchars($this->_var['ctg']['parent']['cate_name']); ?></option>
                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
            </select>
        </p>
        <p class="item">
            <span>小分类：</span>
            <script>
                var sub_ctgs = {},cate_id_2 = <?php echo ($this->_var['goods']['cate_id_2'] == '') ? '0' : $this->_var['goods']['cate_id_2']; ?>;
            </script>
            <select name="goods[cate_id_2]" id="cate_id_2">
            </select>
            <?php $_from = $this->_var['ctg_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'ctg');if (count($_from)):
    foreach ($_from AS $this->_var['ctg']):
?>
            <script>
                sub_ctgs[<?php echo $this->_var['ctg']['parent']['cate_id']; ?>] = <?php echo $this->_var['ctg']['children']; ?>;
            </script>
            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        </p>
        <div class="item">
            <span>图片：</span>
            <input name="goods[default_image]" value="<?php echo htmlspecialchars($this->_var['goods']['default_image']); ?>">
            <form class="upload-file-form" enctype="multipart/form-data" method="post" target="bridge_win" action="http://admin.bzhwj.com/generaldata/upload">
                <input type="file" name="fileinfo">
                <input type="submit" value="上传">
                <iframe name="bridge_win" src="http://admin.bzhwj.com/generaldata/bridge" style="display: none"></iframe>
           </form>
        </div>
        <p class="item">
            <span>价格：</span>
            <input name="goods[price]" value="<?php echo $this->_var['goods']['price']; ?>">
        </p>
        <p class="item">
            <span>品牌：</span>
            <input name="goods[brand]" value="<?php echo htmlspecialchars($this->_var['goods']['brand']); ?>">
        </p>
        <p class="item">
            <span>标签：</span>
            <input name="goods[tags]" value="<?php echo htmlspecialchars($this->_var['goods']['tags']); ?>">
        </p>
        <p class="item">
            <span>功效：</span>
            <input name="goods[effect]" value="<?php echo htmlspecialchars($this->_var['goods']['effect']); ?>">
        </p>
        <p class="item">
            <span>适用人群：</span>
            <input name="goods[suit_people]" value="<?php echo htmlspecialchars($this->_var['goods']['suit_people']); ?>">
        </p>
        <?php if ($this->_var['username'] == 'admin'): ?>
        <p class="item">
            <span>百真联保：</span>
            <input name="goods[lianbao]" id="lianbao" type="checkbox" <?php if ($this->_var['goods']['lianbao'] > 0): ?>checked=""<?php endif; ?> value="<?php echo ($this->_var['goods']['lianbao'] == '') ? '0' : $this->_var['goods']['lianbao']; ?>">
        </p>
        <?php endif; ?>
        <div id="pic_area" class="item" style="margin-top: 30px">
            <div>
                <span>展示图片</span>
                <a style="margin-left: 30px" href="javascript:void(0)" id="add_pic">增加</a>
            </div>
            <div id="pic_item_tpl" style="padding-left: 20px;margin-top: 15px;display: none">
                <!--<div class="pic-desc">-->
                    <!--<span>标题:</span><input style="margin-left: 20px" class="pic-tle"><a href="javascript:void(0)" class="remove_pic-item" style="margin-left: 20px">删除</a>-->
                <!--</div>-->
                <div class="pic-upload">
                    <span>图片：</span>
                    <input style="margin-left: 4px" class="pic-val" value="">

                    <form style="margin-left: 50px" class="upload-file-form" enctype="multipart/form-data" method="post" target="bridge_win" action="http://admin.bzhwj.com/generaldata/upload">
                        <input type="file" name="fileinfo">
                        <input type="submit" value="上传">
                        <iframe name="bridge_win" src="http://admin.bzhwj.com/generaldata/bridge" style="display: none"></iframe>
                    </form>
                </div>
            </div>
            <?php if ($this->_var['goods']['pics']): ?>
            <?php $_from = $this->_var['goods']['pics']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'pic');if (count($_from)):
    foreach ($_from AS $this->_var['pic']):
?>
            <div class="pic-item" style="padding-left: 20px;margin-top: 15px">
                <!--<div class="pic-desc">-->
                    <!--<span>标题:</span><input value="<?php echo htmlspecialchars($this->_var['pic']['title']); ?>" style="margin-left: 20px" class="pic-tle"><a href="javascript:void(0)" class="remove_pic-item" style="margin-left: 20px">删除</a>-->
                <!--</div>-->
                <div class="pic-upload">
                    <span>图片：</span>
                    <input style="margin-left: 4px" value="<?php echo htmlspecialchars($this->_var['pic']['pic']); ?>" class="pic-val" value="">

                    <form style="margin-left: 50px" class="upload-file-form" enctype="multipart/form-data" method="post" target="bridge_win" action="http://admin.bzhwj.com/generaldata/upload">
                        <input type="file" name="fileinfo">
                        <input type="submit" value="上传">
                        <iframe name="bridge_win" src="http://admin.bzhwj.com/generaldata/bridge" style="display: none"></iframe>
                    </form>
                </div>
            </div>
            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
            <?php else: ?>
            <div class="pic-item" style="padding-left: 20px;margin-top: 15px">
                <!--<div class="pic-desc">-->
                    <!--<span>标题:</span><input style="margin-left: 20px" class="pic-tle"><a href="javascript:void(0)" class="remove_pic-item" style="margin-left: 20px">删除</a>-->
                <!--</div>-->
                <div class="pic-upload">
                    <span>图片：</span>
                    <input style="margin-left: 4px" class="pic-val" value="">

                    <form style="margin-left: 50px" class="upload-file-form" enctype="multipart/form-data" method="post" target="bridge_win" action="http://admin.bzhwj.com/generaldata/upload">
                        <input type="file" name="fileinfo">
                        <input type="submit" value="上传">
                        <iframe name="bridge_win" src="http://admin.bzhwj.com/generaldata/bridge" style="display: none"></iframe>
                    </form>
                </div>
            </div>
            <?php endif; ?>
        </div>
        <p class="item">
            <span>推荐：</span>
            <input name="goods[recommended]" <?php if ($this->_var['goods']['recommended'] == 1): ?>checked="checked"<?php endif; ?> type="checkbox" >
        </p>
        <button type="button" id="save">保存</button>
    </div>
</div>
<script src="http://admin.bzhwj.com/static/js/common/jquery-1.8.0.js"></script>
<script src="http://admin.bzhwj.com/static/js/common/jquery.json.js"></script>
<script src="http://www.bzhwj.com/static/kindeditor/kindeditor-min.js"></script>
<script src="http://www.bzhwj.com/static/kindeditor/lang/zh_CN.js"></script>
<script>
    var entitiesMap = {
        '<': '&lt;',
        '>': '&gt;',
        '"': '&quot;',
        '&': '&amp;'
    };

    function htmlEscape(str) {
        return str.replace(/(<|>|"|&)/g, function (m, m1) {
            return entitiesMap[m1];
        });
    }

    var global = window;
    global.callback = function (data) {
        var attachmentInput = global.attachmentInput,preImg;
        attachmentInput.val(htmlEscape(data.imgurl));
        if ((preImg = attachmentInput.parents('.m-form-control-image:eq(0)').find('.preview-image img')).length > 0) {
            preImg.attr('src',data.imgurl);
        }
    };
    global.addEventListener('message',function(e) {
        console.log(e);
        var data = e.data,attachmentInput = global.attachmentInput,preImg;
        attachmentInput.val(htmlEscape(data.imgurl));
        if ((preImg = attachmentInput.parents('.m-form-control-image:eq(0)').find('.preview-image img')).length > 0) {
            preImg.attr('src',data.imgurl);
        }
    },false);
    $('body').on('mousedown', '.upload-file-form input[type="submit"]', function (e) {
        global.attachmentInput = $(this).parents('.upload-file-form:eq(0)').prev();
    });
    $('#save').on('click',function(e) {
        var args = {},
                goods_id = $('#goods_item [name="goods_id"]').val(),
                act = goods_id > 0 ? 'store_goods_do_edit' : 'store_goods_do_add';
        $('[editor]').each(function(idx,el) {
            el = $(el);
            if (el.data('editor')) {
                el.val(el.data('editor').html());
            }
        });
        $('#goods_item [name^="goods["],#goods_item [name="goods_id"]').each(function(idx,el) {
            el = $(el);
            args[el.attr('name')] = el.val();
            if (el.attr('name') == 'goods[recommended]') {
                args[el.attr('name')] = el.prop('checked') ? 1 : 0;
            }
        });
        var pics = [];
        $('.pic-item').each(function(idx,el) {
            var obj = {};
            el = $(el);
            obj['pic']   = $.trim(el.find('.pic-val').val());
            pics.push(obj);
        });
        args['goods[pics]'] = $.toJSON(pics);
        $('#lianbao').prop('checked') ? args['goods[lianbao]'] = 1 : args['goods[lianbao]'] = 0;
        $.post('/index.php?app=storeinterpose&act=' + act,args,function(d) {
            if (d >= 0) {
                cate_id_2 = $('#cate_id_2').val();
                alert('保存成功');
            } else {
                alert('系统错误，请联系管理员！');
            }
        });
    });
    function ctg_change($this) {
        var cate_id = $this.val(),
                cateId2 = $('#cate_id_2');
        cateId2.empty();
        $.each(sub_ctgs[cate_id],function(idx,el) {
            var op = $('<option></option>').attr('value',el['cate_id']).text(el['cate_name']);
            if (cate_id_2 == el['cate_id']) {
                op.prop('selected',true);
            }
            cateId2.append(
                    op
            );
        });
    }
    $('#cate_id_1').on('change',function(e) {
        ctg_change($(this));
    });
    ctg_change($('#cate_id_1'));
    $('body').on('click','.remove_pic-item',function(e) {
        if (confirm('您确定要删除当前的图片吗？')) {
            $(this).parents('.pic-item').remove();
        }
        e.preventDefault();
        e.stopPropagation();
    });
    $('#add_pic').on('click',function(e) {
        $('#pic_area').append(
                $('#pic_item_tpl').clone().addClass('pic-item').show()
        );
        e.preventDefault();
        e.stopPropagation();
    });
    $('textarea[editor]').each(function(idx,el) {
        el = $(el);
        var name = el.attr('editor'),
                editor = KindEditor.create('textarea[editor="' + name + '"]');
        editor.html(el.val());
        el.data('editor',editor);
    });
</script>
</body>
</html>
