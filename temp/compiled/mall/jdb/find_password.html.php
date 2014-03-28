<?php echo $this->fetch('width/header.html'); ?>
<script type="text/javascript">
$(function(){
    $('#find_password_form').validate({
        errorPlacement: function(error, element){
          $(element).parent('td').append(error);
        },
        success       : function(label){
            label.addClass('validate_right').text('OK!');
        },
        rules : {
            username : {
                required : true
            },
            email : {
                required : true,
                email : true
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
            username : {
                required : '用户名不能为空'
            },
            email  : {
                required : '电子邮箱不能为空',
                email : '电子邮箱填写错误'
            },
            captcha : {
                required : '验证码不能为空',
                remote   : '验证码错误'
            }
        }
    });
});
</script>     
<div id="find-password">
   <div id="fp-main">
      <div class="title"><span class="left"></span>请输入你的登录帐号和电子邮箱, 系统检查之后会发邮件到你的邮箱, 请按照邮件的提示操作<span class="right"></span></div>
	  <div class="content">

                      <form action="" method="POST" id="find_password_form">
                           <table> 
                                <tr>
                                     <td align="right">您的登录账号：</td><td align="left"><input type="text" class="text width5" name="username"/></td>
                                </tr>
                                <tr>
                                     <td align="right">您的电子邮箱：</td><td align="left"><input type="text" class="text width5" name="email"/></td>
                                </tr>
                                <tr>
                                     <td align="right" valign="top">验证码：</td>
                                     <td align="left"><input type="text" class="text width5" name="captcha" id="captcha1"><span><a class="renewedly" href="javascript:change_captcha($('#captcha'));"><br /><img id="captcha" src="index.php?app=captcha" style="margin-top:10px;"></a></span></td>
                                </tr>
                                <tr class="distance">
                                     <td height="22"></td>
                                     <td align="left" height="40"><input type="submit" value="提交" name="Submit" class="btn" id="captcha1"></td>
                                </tr>
                           </table>
                  </form>
          </div>
       </div>
</div>
<?php echo $this->fetch('footer.html'); ?>