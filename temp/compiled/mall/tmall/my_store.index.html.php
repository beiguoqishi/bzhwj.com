<?php echo $this->fetch('member.header.html'); ?>
<style>
.information .info table{width :auto;}
</style>
<script type="text/javascript">
//<!CDATA[
$(function(){
        $('input[ectype="change_store_logo"]').change(function(){
            var src = getFullPath($(this)[0]);
            $('img[ectype="store_logo"]').attr('src', src);
            $('input[ectype="change_store_logo"]').removeAttr('name');
            $(this).attr('name', 'store_logo');
        });
        $('input[ectype="change_store_banner"]').change(function(){
            var src = getFullPath($(this)[0]);
            $('img[ectype="store_banner"]').attr('src', src);
            $('input[ectype="change_store_banner"]').removeAttr('name');
            $(this).attr('name', 'store_banner');
        });

        $('#my_store_form').validate({
            errorPlacement: function(error, element){
                $(element).next('.field_notice').hide();
                if($(element).parent().parent().is('b'))
                {
                    $(element).parent().parent('b').next('.explain').hide();
                    $(element).parent().parent('b').after(error);
                }
                else
                {
                    $(element).after(error);
                }
            },
            success       : function(label){
                if($(label).attr('for') != 'store_logo' && $(label).attr('for') != 'store_banner'  ){
                    label.addClass('validate_right').text('OK!');
                    }
            },
            rules : {
                store_name : {
                    required   : true,
                    remote : {
                        url  : 'index.php?app=apply&act=check_name&ajax=1',
                        type : 'get',
                        data : {
                            store_name : function(){
                                return $('#store_name').val();
                            },
                            store_id : <?php echo $this->_var['store']['store_id']; ?>
                        }
                    },
                    maxlength: 20
                },
                tel      : {
                    required     : true,
                    checkTel     : true
                },
                store_banner : {
                    accept   : 'png|jpe?g|gif'
                },
                store_logo   : {
                    accept   : 'png|jpe?g|gif'
                }
            },
            messages : {
                store_name  : {
                    required   : '此项不允许为空',
                    remote: '店铺名称已经存在，请换一个',
                    maxlength: '请控制在20个字以内'
                },
                tel      : {
                    required   : '此项不允许为空',
                    checkTel   : '电话号码由数字、加号、减号、空格、括号组成,并不能少于6位'
                },
                store_banner : {
                    accept  : '请上传格式为 jpg,jpeg,png,gif 的文件'
                },
                store_logo  : {
                    accept : '请上传格式为 jpg,jpeg,png,gif 的文件'
                }
            }
    });
   regionInit("region");
        $(".right").mouseover(function(){
            $(this).next("div").show();
        });
        $(".right").mouseout(function(){
            $(this).next("div").hide();
        });
});
function add_uploadedfile(file_data)
{
        $('#desc_images').append('<li file_name="'+ file_data.file_name +'" file_path="'+ file_data.file_path +'" ectype="handle_pic" file_id="'+ file_data.file_id +'"><input type="hidden" name="desc_file_id[]" value="'+ file_data.file_id +'"><div class="pic" style="z-index: 2;"><img src="<?php echo $this->_var['site_url']; ?>/'+ file_data.file_path +'" width="50" height="50" alt="'+ file_data.file_name +'" /></div><div ectype="handler" class="bg" style="z-index: 3;display:none"><img src="<?php echo $this->_var['site_url']; ?>/'+ file_data.file_path +'" width="50" height="50" alt="'+ file_data.file_name +'" /><p class="operation"><a href="javascript:void(0);" class="cut_in" ectype="insert_editor" ecm_title="插入编辑器"></a><span class="delete" ectype="drop_image" ecm_title="删除"></span></p><p class="name">'+ file_data.file_name +'</p></div></li>');
        trigger_uploader();
        if(EDITOR_SWFU.getStats().files_queued == 0){
                window.setTimeout(function(){
                        $('#editor_uploader').hide();
                },5000);
        }
}
function drop_image(file_id)
{
    if (confirm(lang.uploadedfile_drop_confirm))
        {
            var url = SITE_URL + '/index.php?app=my_store&act=drop_uploadedfile';
            $.getJSON(url, {'file_id':file_id}, function(data){
                if (data.done)
                {
                    $('*[file_id="' + file_id + '"]').remove();
                }
                else
                {
                    alert(data.msg);
                }
            });
        }
}

//]]>

</script>
<?php echo $this->_var['editor_upload']; ?>
<?php echo $this->_var['build_editor']; ?>
<div class="content">
  <div class="totline"></div>
  <div class="botline"></div>
  <div id="right">
    <div class="wrap">
        <div class="public">
            <div class="information">
            <form method="post" enctype="multipart/form-data" id="my_store_form">
                    <div class="setup">
                        <div class="photo relative1">
                            <p><img src="<?php if ($this->_var['store']['store_logo'] != ''): ?><?php echo $this->_var['store']['store_logo']; ?><?php else: ?>data/system/default_store_logo.gif<?php endif; ?>" width="120" height="120" ectype="store_logo" /></p>
                            <b>
                            	<input ectype="change_store_logo" type="file" name="file" size="1" hidefocus="true"  style="display:block;z-index:10; position:absolute;width: 120px; *width:0px; height: 28px; cursor: hand; cursor: pointer;  opacity:0; filter: alpha(opacity=0);">
                                <div class="txt" style="position:absolute;z-index:9">更换店标</div>
                            </b>
                            <span class="explain">此处为您的店铺标志，将显示在店铺信息栏里建议尺寸100*100像素</span>
                        </div>        
                        
                        <div class="photo relative2">
                            <p><img src="<?php if ($this->_var['store']['store_banner'] != ''): ?><?php echo $this->_var['store']['store_banner']; ?><?php else: ?><?php echo $this->res_base . "/" . 'images/member/banner.gif'; ?><?php endif; ?>" width="607" height="120" ectype="store_banner" /></p>
                            <b>
                                <input ectype="change_store_banner" type="file" name="file" size="1" hidefocus="true"  style="display:block;z-index:10; position:absolute;width: 120px; *width:0px; height: 28px; cursor: hand; cursor: pointer;  opacity:0; filter: alpha(opacity=0);">
                                <span class="txt">更换店铺条幅</span>
                            </b>
                            <span class="explain">此处为您的店铺条幅，将显示在店铺导航上方的banner位置，建议尺寸1000*120像素</span>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="setup info shop">

                        <table style="width: 100%">
                            <?php if ($this->_var['subdomain_enable']): ?>
                            <tr>
                              <th>二级域名:</th>
                              <td><input type="text" name="domain" value="<?php echo htmlspecialchars($this->_var['store']['domain']); ?>"<?php if ($this->_var['store']['domain']): ?> disabled<?php endif; ?> class="text width11" />&nbsp;<?php if (! $this->_var['store']['domain']): ?>可留空,注意！设置后将不能修改，域名长度应为:<?php echo $this->_var['domain_length']; ?><?php else: ?><?php endif; ?></td>
                            </tr>
                            <?php endif; ?>
                            <tr>
                                <th class="width2">店铺名称:</th>
                                <td>
                                    <p class="td_block"><input id="store_name" type="text" class="text width_normal" name="store_name" value="<?php echo htmlspecialchars($this->_var['store']['store_name']); ?>"/><label class="field_notice">店铺名称</label></p>
                                    <b class="padding1">*</b><a href="<?php echo url('app=store&id=' . $this->_var['store']['store_id']. ''); ?>" target="_blank" class="btn1">我的店铺首页</a>
                                </td>
                            </tr>
                            <tr>
                                <th>所在地区:</th>
                                <td><div id="region">
                                    <input type="hidden" name="region_id" value="<?php echo $this->_var['store']['region_id']; ?>" class="mls_id" />
                                    <input type="hidden" name="region_name" value="<?php echo htmlspecialchars($this->_var['store']['region_name']); ?>" class="mls_names" />
                                    <?php if ($this->_var['store']['store_id']): ?>
                                    <span><?php echo htmlspecialchars($this->_var['store']['region_name']); ?></span>
                                    <input type="button" value="编辑" class="edit_region" />
                                    <select style="display:none">
                                      <option>请选择...</option>
                                      <?php echo $this->html_options(array('options'=>$this->_var['regions'])); ?>
                                    </select>
                                    <?php else: ?>
                                    <select class="select">
                                      <option>请选择...</option>
                                      <?php echo $this->html_options(array('options'=>$this->_var['regions'])); ?>
                                    </select>
                                    <?php endif; ?></div>
                                </td>
                            </tr>
                            <tr>
                                <th>详细地址:</th>
                                <td>
                                    <p class="td_block"><input type="text" name="address" class="text width_normal" id="address" value="<?php echo htmlspecialchars($this->_var['store']['address']); ?>" /><span class="field_notice">不必重复填写所在地区</span></p>
                                </td>
                            </tr>
                            <tr>
                                <th>联系电话:</th>
                                <td><input name="tel" type="text" class="text width_normal" id="tel" value="<?php echo htmlspecialchars($this->_var['store']['tel']); ?>" /></td>
                            </tr>
                            <tr>
                                  <th>联系QQ:</th>
                                  <td><input name="im_qq" type="text" class="text width_normal" id="im_qq" value="<?php echo htmlspecialchars($this->_var['store']['im_qq']); ?>" /></td>
                            </tr>
                            <!--<tr>-->
                                  <!--<th>阿里旺旺:</th>-->
                                  <!--<td><input name="im_ww" type="text" class="text width_normal" id="im_ww" value="<?php echo htmlspecialchars($this->_var['store']['im_ww']); ?>" /></td>-->
                            <!--</tr>-->
                            <!--<tr>-->
                                  <!--<th>MSN在线通:</th>-->
                                  <!--<td><?php if ($this->_var['store']['im_msn']): ?><?php echo htmlspecialchars($this->_var['store']['im_msn']); ?> <a target="_blank" href="<?php echo url('app=my_store&act=drop_im_msn'); ?>">注销</a><?php else: ?><a target="_blank" href="<?php echo $this->_var['msn_active_url']; ?>">激活我的msn账号</a><span class="padding1">激活后将显示在店铺信息栏里</span><?php endif; ?></td>-->
                             <!--</tr>-->
							 
                             <!--<tr>-->
                                  <!--<th>热门搜索：</th>-->
                                  <!--<td><input type="text" name="hot_search" class="text width_normal" style="width:350px;" value="<?php echo $this->_var['store']['hot_search']; ?>" /> <span class="padding1">店铺的热门搜索关键词，多个关键词用空格隔开。</span></td>-->
                             <!--</tr>-->
                              <!--<tr>-->
                                  <!--<th>在线客服：</th>-->
                                  <!--<td><input type="text" name="online_service" class="text width_normal" style="width:350px;" value="<?php echo $this->_var['store']['online_service']; ?>" /> <span class="padding1">展示在前台悬浮的在线客服，可以有多个，输写格式如：qq客服一;qq客服二|旺旺客服一;旺旺客服二;旺旺客服三 等等，以此类推，仅支持qq和旺旺，"|" 隔开的为qq和旺旺，前面是qq客服，竖线后是旺旺客服，多个账号用分号隔开。</span></td>-->
                             <!--</tr>-->
                             <!--<tr>-->
                                  <!--<th>服务热线：</th>-->
                                  <!--<td><input type="text" name="hotline" class="text width_normal"  value="<?php echo $this->_var['store']['hotline']; ?>" /> <span class="padding1">展示在前台悬浮的服务热线。</span></td>-->
                            <!--</tr>-->
                            
                            
                            <?php if ($this->_var['store']['functions']['groupbuy']): ?>
							 <!--<tr>-->
                                  <!--<th>开启团购:</th>-->
                                  <!--<td>-->
								      <?php if (! $this->_var['store']['enable_groupbuy']): ?>checked<?php endif; ?>
                                      <!--<label for="enable_groupbuy_0">否</label>-->
                                      <?php if ($this->_var['store']['enable_groupbuy']): ?>checked<?php endif; ?>
                                      <!--<label for="enable_groupbuy_1">是</label>-->
                                  <!--</td>-->
                             <!--</tr>-->
                             <?php endif; ?>
                             <?php if ($this->_var['store']['functions']['enable_radar']): ?>
                             
                             <!--<tr>-->
                                  <!--<th>启用商品雷达:</th>-->
                                  <!--<td><label>-->
					                 <?php if ($this->_var['store']['enable_radar']): ?>checked="checked"<?php endif; ?>
					                <!--是</label>-->
					                <!--<label>-->
					                <?php if (! $this->_var['store']['enable_radar']): ?>checked="checked"<?php endif; ?>
					                <!--否</label></td>-->
                             <!--</tr>-->
                             
                             <?php endif; ?>
                             
                             
                             <!--<tr>-->
                                  <!--<th>主营业务：</th>-->
                                  <!--<td><input type="text" name="business_scope" class="text width_normal"  value="<?php echo $this->_var['store']['business_scope']; ?>" style="width:350px;" /> <span class="padding1">如：女装上衣 t恤 衬衫 长袖 纯色 打底裤 短外套 蕾丝衫 连衣裙</span></td>-->
                            <!--</tr>-->
                            
                             
                             <tr>
                                <!--<th class="align3">店铺简介:</th>-->
                                <td>
                                    <div class="issuance"><input type="submit" class="btn" value="提交" /></div>
                                 </td>
                             </tr>
                         </table>
                    	</div>
          			</form>
                </div>

            </div>
            <div class="wrap_bottom"></div>
        </div>

        <div class="clear"></div>
        <div class="adorn_right1"></div>
        <div class="adorn_right2"></div>
        <div class="adorn_right3"></div>
        <div class="adorn_right4"></div>
    </div>
    <div class="clear"></div>
</div>
