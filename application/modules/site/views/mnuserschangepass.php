<?php ?>
<section class="padd-0">
<div class="container">
    <div class="row">
        <div class="manager-col-left col-md-3 col-sm-12 width-250">
            <?php $this->load->view('left1'); ?>
        </div>
        <div class="manager-col-right col-md-9 col-sm-12 updatepass">
            <div class="content-right " style="min-height:300px;">
                <div class="fromdatime">
                    <div class="clr" style="height:0px"></div>
                    <!--<div class="form-control">
                        <input type="text" id="datepiker" name="datepiker" placeholder="Chọn khoảng thời gian" />
                        <i class="fa fa-datetime"></i> 
                    </div>-->
                    <!--<a class="btnhoanthienhoso"><i class="fa fa-uv-hths"></i> Hoàn thiện hồ sơ</a>-->
                </div>
                
                <div class="title"><span><i class="fa fa-pincode"></i>Đổi mật khẩu</span></div>
               
                <div class="fieldset">
                <div class="note"><span>(<b>*</b>) Thông tin bắt buộc</b></span>  </div>              
                <div class="group-control">
                    <label class="control-label required">Mật khẩu cũ</label>
                    <div class="form-control"><input type="password" id="oldpassword" name="oldpassword" placeholder=""/><i class="fa-showpass" data-val="oldpassword"></i></div>
                    
                </div>
                
                <div class="clr"></div>
                <div class="group-control">
                    <label class="control-label required">Mật khẩu mới</label>
                    <div class="form-control"><input type="password" id="newpassword" name="newpassword"/><i class="fa-showpass" data-val="newpassword"></i></div>
                    <div class="note-1">Mật khẩu tối thiểu 8 ký tự, trong đó ít nhất 1 ký tự chữ và 1 ký tự số</div>
                </div>
                <div class="clr"></div>
                <div class="group-control">
                    <label class="control-label required">Xác nhận mật khẩu</label>
                    <div class="form-control"><input type="password" id="confirmnewpass" name="confirmnewpass"/><i class="fa-showpass" data-val="confirmnewpass"></i></div>                    
                </div>
                    <div class="btngroup">
                        <a id="btncancel" class="btncancel"><i class="fa fa-cancel"></i> Hủy</a>
                        <a id="btnupdatepassntd" class="btnupdatepassntd">Đổi mật khẩu</a>
                    </div>
                </div>                 
            </div>
        </div>
    </div>
</div>
</section>
<script type="text/javascript">
	$(document).ready(function() {
    var configulr='<?php echo base_url(); ?>';
    var self = this;
      $('#btncancel').on('click',function(){
        $('#oldpassword').val('');
        $('#newpassword').val('');
        $('#confirmnewpass').val('');
      });
    $('.fa-showpass').on('click',function()
    {
    var tg=$(this).attr('data-val');
      if($("#"+tg).attr('type')=='password')
      {
        $("#"+tg).attr('type','text');
      }
      else if($("#"+tg).attr('type')=='text')
      {
      $("#"+tg).attr('type','password');
      };
    })
    $('#btnupdatepassntd').on('click',function(){
      if(self.validateteacherpass()){
        var oldpass=$('#oldpassword').val();
        var newpass=$('#newpassword').val();
        $.ajax(
        {                  
          url: configulr+"site/ajaxteacherchangepass",
          type: "POST",
          data: { oldpass:oldpass,newpass:newpass},
          dataType: 'json',
          beforeSend: function () {
            $("#boxLoading").show();
          },
          success: function (reponse) {
            if (reponse.kq == true) {
              alert(reponse.data);
              window.location.href = configulr+"phu-huynh-manager";
            }else{
              alert('Thay đổi mật khẩu thất bại');
            }                      
          },
          error: function (xhr) {
            alert("error");
          },
          complete: function () {
            $("#boxLoading").hide();
          }
        }); 
      }
    });


    self.validateteacherpass = function(){
        var flag=true;
        if($.trim($('#oldpassword').val())==''){
            $('#oldpassword').parent().attr('title', 'Vui lòng nhập mật khẩu').tooltip('show').addClass('errorClass');
            flag=false;
        }else{
          $('#oldpassword').parent().removeClass('errorClass').tooltip("destroy");
        };

        if($.trim($('#newpassword').val())=='')
        {
            $('#newpassword').parent().attr('title', 'Vui lòng nhập mật khẩu mới').tooltip('show').addClass('errorClass');
            flag=false;
        }
        else
        {
          if($('#newpassword').val().length < 8){
            $('#newpassword').parent().attr('title', 'Mật khẩu mới phải có 8 ký tự trở lên').tooltip('show').addClass('errorClass');
            flag=false;
          }
          else
          {
              $('#newpassword').parent().removeClass('errorClass').tooltip("destroy"); 
          };
        };

        if($.trim($('#confirmnewpass').val())==''){
            $('#confirmnewpass').parent().attr('title', 'Vui lòng nhập lại mật khẩu mới').tooltip('show').addClass('errorClass');
             flag=false;
        }
        else
        {
          if($.trim($('#newpassword').val()) !=$.trim($('#confirmnewpass').val()))
          {
            $('#confirmnewpass').parent().attr('title', 'Nhập lại mật khẩu không đúng').tooltip('show').addClass('errorClass');
             flag=false;
          }
          else
          {
               $('#confirmnewpass').parent().removeClass('errorClass').tooltip("destroy"); 
          };
        };
        return flag; 
      }

      $('#oldpassword').keyup(function(){
      //Nhap ban phim
          if($('#oldpassword').val().length == 0)
          {
              if($('#oldpassword').parent().hasClass('errorClass') == false)
              {
                  $('#oldpassword').parent().attr('title', 'Vui lòng nhập mật khẩu').tooltip('show').addClass('errorClass');
              }
              $('#oldpassword').focus();
          }
          else
          {
              $('#oldpassword').parent().removeClass("errorClass").tooltip("destroy");
          }
      });
      $('#oldpassword').blur(function(){
          if($('#oldpassword').val().length <6){
              if($('#oldpassword').parent().hasClass('errorClass') == false){
                  $('#oldpassword').parent().attr('title', 'Vui lòng nhập đầy đủ mật khẩu').tooltip('show').addClass('errorClass');
              }
              $('#oldpassword').focus();
          }
          else
          {
            $('#oldpassword').parent().removeClass("errorClass").tooltip("destroy");
          }
      });

      $('#newpassword').keyup(function(){
      //Nhap ban phim
          if($('#newpassword').val().length == 0)
          {
              if($('#newpassword').parent().hasClass('errorClass') == false)
              {
                  $('#newpassword').parent().attr('title', 'Vui lòng nhập mật khẩu mới').tooltip('show').addClass('errorClass');
              }
              $('#newpassword').focus();
          }
          else
          {
              $('#newpassword').parent().removeClass("errorClass").tooltip("destroy");
          }
      });
      $('#newpassword').blur(function(){
          if($('#newpassword').val().length <8){
              if($('#newpassword').parent().hasClass('errorClass') == false){
                  $('#newpassword').parent().attr('title', 'Mật khẩu mới phải có 8 ký tự trở lên').tooltip('show').addClass('errorClass');
              }
              $('#newpassword').focus();
          }
          else
          {
            $('#oldpassword').parent().removeClass("errorClass").tooltip("destroy");
          }
      });

      $('#confirmnewpass').keyup(function(){
      //Nhap ban phim
          if($('#confirmnewpass').val().length == 0)
          {
              if($('#confirmnewpass').parent().hasClass('errorClass') == false)
              {
                  $('#confirmnewpass').parent().attr('title', 'Vui lòng nhập lại mật khẩu mới').tooltip('show').addClass('errorClass');
              }
              $('#confirmnewpass').focus();
          }
          else
          {
              $('#confirmnewpass').parent().removeClass("errorClass").tooltip("destroy");
          }
      });
      $('#confirmnewpass').blur(function(){
          if($.trim($('#newpassword').val()) != $.trim($('#confirmnewpass').val()))
          {
              $('#confirmnewpass').parent().attr('title', 'Nhập lại mật khẩu không đúng').tooltip('show').addClass('errorClass');
          }
          else
          {
               $('#confirmnewpass').parent().removeClass('errorClass').tooltip("destroy"); 
          };
      });
  });
</script>