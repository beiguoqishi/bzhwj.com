<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="UTF-8">
    <style type="text/css">
        input:not([type]) {
            width: 550px;
        }
        .item {
            margin-top: 30px;
        }
        .item .tle {
            float: left;
            margin-right: 60px;
        }
        textarea[editor] {
            width: 550px;
            height: 400px;
            margin-top: 10px;
        }
    </style>
</head>
<body>
<div style="margin-top: 20px">
    <h1>编辑档案</h1>

    <div id="info_list">
        <input type="hidden" name="act" id="act" value="<?php echo $this->_var['act']; ?>">

        <div class="item">
            <span class="tle">美容院概况</span>
            <textarea editor="intro" id="entity_intro" name="entity[intro]"><?php echo htmlspecialchars($this->_var['archive']['intro']); ?></textarea>
        </div>
        <div class="item">
            <span class="tle">工商注册信息</span>
            <textarea editor="business_info" id="entity_business_info" name="entity[business_info]"><?php echo htmlspecialchars($this->_var['archive']['business_info']); ?></textarea>
        </div>
        <div id="pic_area" class="item" style="margin-top: 30px">
            <div>
                <span>美容院图片</span>
                <a style="margin-left: 30px" href="javascript:void(0)" id="add_pic">增加</a>
            </div>
            <div id="pic_item_tpl" style="padding-left: 20px;margin-top: 15px;display: none">
                <div class="pic-desc">
                    <span>标题:</span><input style="margin-left: 20px" class="pic-tle"><a href="javascript:void(0)" class="remove_pic-item" style="margin-left: 20px">删除</a>
                </div>
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
            <?php if ($this->_var['archive']['pics']): ?>
            <?php $_from = $this->_var['archive']['pics']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'pic');if (count($_from)):
    foreach ($_from AS $this->_var['pic']):
?>
            <div class="pic-item" style="padding-left: 20px;margin-top: 15px">
                <div class="pic-desc">
                    <span>标题:</span><input value="<?php echo htmlspecialchars($this->_var['pic']['title']); ?>" style="margin-left: 20px" class="pic-tle"><a href="javascript:void(0)" class="remove_pic-item" style="margin-left: 20px">删除</a>
                </div>
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
                <div class="pic-desc">
                    <span>标题:</span><input style="margin-left: 20px" class="pic-tle"><a href="javascript:void(0)" class="remove_pic-item" style="margin-left: 20px">删除</a>
                </div>
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
        <div id="op_area">
            <button type="button" id="save" style="margin-top: 30px;width: 60px;height: 60px;display: inline-block;cursor: pointer">保存</button>
        </div>
    </div>
</div>
<script src="http://admin.bzhwj.com/static/js/common/jquery-1.8.0.js"></script>
<script src="http://admin.bzhwj.com/static/js/common/jquery.json.js"></script>
<script src="http://www.bzhwj.com/static/kindeditor/kindeditor-min.js"></script>
<script src="http://admin.bzhwj.com/static/kindeditor/lang/zh_CN.js"></script>
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
    }).on('click','.remove_pic-item',function(e) {
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
    $('#save').on('click',function(e) {
        $('[editor]').each(function(idx,el) {
            el = $(el);
            if (el.data('editor')) {
                el.val(el.data('editor').html());
            }
        });
        var args = {},intro = $('#entity_intro'),business_info = $('#entity_business_info');
        args[intro.attr('name')] = intro.val();
        args[business_info.attr('name')] = business_info.val();
        var pics = [];
        $('.pic-item').each(function(idx,el) {
            var obj = {};
            el = $(el);
            obj['title'] = $.trim(el.find('.pic-tle').val());
            obj['pic']   = $.trim(el.find('.pic-val').val());
            pics.push(obj);
        });
        args['entity[pics]'] = $.toJSON(pics);
        $.post('/index.php?app=storeinterpose&act=store_archive_do_edit&type=' + $('#act').val(),args,function(d) {
            if (d >= 0) {
                alert('保存成功');
            } else {
                alert('系统错误，请联系管理员！');
            }
            if (d > 0) {
                $('#act').val('edit');
            }
        });
    });
</script>
</body>
</html>