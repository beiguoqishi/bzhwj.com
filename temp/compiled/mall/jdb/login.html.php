<?php echo $this->fetch('width/top.html'); ?>

<script type="text/javascript">
$(function(){
    $('#login_form').validate({
        errorPlacement: function(error, element){
            $(element).parent().parent('td').append(error); 
			$(element).parent('.inputbg').addClass('bg1');
			$('.captchabg2').css('background-position','-224px -452px');
        },
        success       : function(label){
            label.addClass('validate_right').text('OK!');
			label.prev('.inputbg').removeClass('bg1');
			
        },
        onkeyup : false,
        rules : {
            user_name : {
                required : true
            },
            password : {
                required : true
            },
            captcha : {
                required : true,
                remote   : {
                    url : 'index.php?app=captcha&act=check_captcha',
                    type: 'get',
                    data:{
                        captcha : function(){
                            return $('#captcha1').val();
                        }
                    }
                }
            }
        },
        messages : {
            user_name : {
                required : '您必须提供一个用户名'
            },
            password  : {
                required : '您必须提供一个密码'
            },
            captcha : {
                required : '请输入右侧图片中的文字',
                remote   : '验证码错误'
            }
        }
    });
});
</script>

<div class="login">
    <div class="header">
        <div class="logo">
            <div class="benefit"><a href="index.php"><img alt="<?php echo $this->_var['site_title']; ?>" src="<?php echo $this->_var['site_logo']; ?>" /></a></div>
            <label>
            &nbsp;&nbsp;&nbsp;&nbsp; 您好，欢迎来<?php echo $this->_var['site_title']; ?>！
            </label>
        </div>
   </div>
   <div class="content clearfix">
   		<div class="loginbox">
   				<div class="login_left">
                	<br />
                        <p class="register">亲还不是<em>网站帮会员?</em><br>
                        点击此处，立即进行注册吧<br />
                        <a href="<?php echo url('app=member&act=register&ret_url=' . $this->_var['ret_url']. ''); ?>"></a></p>
         		</div>
        		<div class="login_right">
                        <form method="post" id="login_form">
                        <table>
                            <tr>
                                <td><span class="txt">用户名:</span> </td>
                                <td><div class="inputbg"><input type="text" name="user_name" class="input" /></div></td>
                            </tr>
                            <tr>
                                <td><span class="txt">密&nbsp;&nbsp;&nbsp;码:</span> </td>
                                <td><div class="inputbg"><input type="password" name="password" class="input" /></div></td>
                            </tr>
                            <?php if ($this->_var['captcha']): ?>
                            <tr>
                                <td><span class="txt">验证码:</span></td>
                                <td>
                                    <div class="inputbg captchabg"><input type="text" name="captcha" class="input captcha" id="captcha1" /></div><div class="captchabg2"></div>
                                    <span class="captchaimg"><a href="javascript:change_captcha($('#captcha'));" class="renewedly"><img id="captcha" src="index.php?app=captcha&amp;<?php echo $this->_var['random_number']; ?>" /></a></span>
                                </td>
                            </tr>
                            <?php endif; ?>
                            <tr class="distance">
                                <td></td>
                                <td>
                                  <input type="submit" name="Submit" value="" class="enter" />                                  
                                  <a href="<?php echo url('app=find_password'); ?>" class="clew">忘记密码？</a>
								</td>
                            </tr>
						</table>
						</br>
						<a href="index.php?app=third_login&amp;act=qq"><img src="/html/images/daqq.png"></a>
		<a href="index.php?app=third_login&act=sina"><img src="/html/images/dawb.png"></a>
		  <input type="hidden" name="ret_url" value="<?php echo $this->_var['ret_url']; ?>" />
                        </form>
         		</div>
         </div>
	</div>
</div>

<?php echo $this->fetch('footer.html'); ?>