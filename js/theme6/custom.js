﻿/*************************************


All custom js files contents are below
**************************************
* 01. Company Brand Carousel
* 02. Client Story testimonial
* 03. Bootstrap wysihtml5 editor
* 04. Tab Js
* 05. Add field Script
**************************************/
// var configulr='https://timviec365.com.vn/gia-su/';
var configulr = 'http://localhost:8181/';
(function($){
"use strict";
// issearch chahnge
$('.uvactiventd input[name="uvduyetsearch"]').each(function () {
    $(this).change(function () {
        /*if($(this).prop('checked')==true){
            alert('đã bật search');
        }*/
        var cknhatuyendung=1;
        if(typeof ($('.uvactiventd input[name="uvduyetsearch"]:checked').val())=== "undefined"){
            cknhatuyendung=0;
        };
        $.ajax(
              {                  
                  url: configulr+"site/ajaxupdateissearch",
                  type: "POST",
                  data: { issearch:cknhatuyendung},
                  dataType: 'json',
                  beforeSend: function () {
                      $("#boxLoading").show();
                  },
                  success: function (reponse) {
                      if (reponse.kq == true) {
                          alert(reponse.data);
                      }else{
                        alert('Thay đổi trạng thái thất bại');
                      }
                      
                  },
                  error: function (xhr) {
                      alert("error");
                  },
                  complete: function () {
                      $("#boxLoading").hide();window.location.reload();
                  }
              }); 
        /*alert($('.uvactiventd input[name="uvduyetsearch"]:checked').val());*/
    });
    });
var um=new UserManager();
	//Loader
	$(".Loader").fakeLoader({
		timeToHide:200,
		bgColor:"#1c2733",
		spinner:"spinner2"
	});
	 
	 jQuery('#box-contact .more').click(function() {
		if($(this).hasClass('open')){
			$(this).removeClass('open');
			$("#box-contact .gt").css('height','72px');			
		}else{
			$(this).addClass('open');
			$("#box-contact .gt").css('height','auto');
		}
	});	
		
	/*---Bootstrap wysihtml5 editor --*/	
	$('.textarea').wysihtml5();
	
	/*------ Grid Slider ----*/
	$('.slick').slick({
	  slidesToShow:1,
	  arrows:true,
	  autoplay:false,
	  infinite: true,
      dots: true,
	  responsive: [
		{
		  breakpoint: 768,
		  settings: {
			arrows:true,
			centerMode: true,
			slidesToShow:1
		  }
		},
		{
		  breakpoint: 480,
		  settings: {
			arrows: false,
			centerPadding: '0px',
			slidesToShow: 1
		  }
		}
	  ]
	});
	
	/*------ Grid Slider ----*/
	$('.grid-slide-2').slick({
	  slidesToShow:2,
	  arrows:false,
	  autoplay:true,
	  infinite: true,
	  responsive: [
		{
		  breakpoint: 768,
		  settings: {
			arrows:false,
			centerMode: true,
			slidesToShow:1
		  }
		},
		{
		  breakpoint: 480,
		  settings: {
			arrows: false,
			centerPadding: '0px',
			slidesToShow: 1
		  }
		}
	  ]
	});
	
	// City Select
	$('#choose-city').select2();
	
	/*---Tab Js --*/
	$("#simple-design-tab a").on('click', function(e){
		e.preventDefault();
		$(this).tab('show');
	});
	
	/*-----Add field Script------*/
	$('.extra-field-box').each(function() {
    var $wrapp = $('.multi-box', this);
    $(".add-field", $(this)).on('click', function() {
        $('.dublicat-box:first-child', $wrapp).clone(true).appendTo($wrapp).find('input').val('').focus();
    });
    $('.dublicat-box .remove-field', $wrapp).on('click', function() {
        if ($('.dublicat-box', $wrapp).length > 1)
            $(this).parent('.dublicat-box').remove();
		});
	});
	
	//   Background image ------------------
		var a = $(".bg");
		a.each(function (a) {
			if ($(this).attr("data-bg")) $(this).css("background-image", "url(" + $(this).data("bg") + ")");
		});
		
		$('.slideshow-container').slick({
        slidesToShow: 1,
        autoplay: true,
        autoplaySpeed:2000,
        arrows: false,
        fade: true,
        cssEase: 'ease-in',
        infinite: true,
        speed:2000
    });
		
	// Styles ------------------
    function csselem() {
        $(".slideshow-container .slideshow-item").css({
            height: $(".slideshow-container").outerHeight(true)
        });
        $(".slider-container .slider-item").css({
            height: $(".slider-container").outerHeight(true)
        });
    }
    csselem();	
	 //JS HOVER SHOW BOXVIEW
    if($('.col-popover').size() && window.innerWidth >= 1000){ 
      //console.log("WIDTH",window.innerWidth );
    var timer,timer2;
    var check = 0;
    $('.col-popover .item_hd').each(function(index, element){
        $(this).popover({ 
            trigger: "manual" , 
            html: true, 
            animation:false,
            placement:function(tip,element){
            	var left = $(element).offset().left;
            	var windowWidth = $(window).width();
            	if(left < windowWidth/2){
            		return 'right';
            	}else{
            		return 'left';
            	}
            },
            content: function() {
              return "Loading...";
            }
          })
          .on("mouseenter", function () {
                clearTimeout(timer);
                var _this = this;
                 $('.col-popover .item_hd', $(this));
                var object_id=$(this).attr('data-object');
             	  $('.col-popover .item_hd', $(this));
                  var object_type =$(this).attr('data-type');
                	
                //$(this).attr("data-placement","left";
                //clearTimeout(timer2);
                // Close all other Popovers
                $('.col-md-4 .item_hd').not(_this).popover('hide');
                var left = $(this).offset().left;
                var windowWidth = $(window).width();
                var width = this.offsetWidth;
                var position = 0;
                var arrow = "";
                if(left < windowWidth/2){
                	position = -0;//-10
                	arrow = "left-arrow";
                }else{
                	position = -295;//215;
                	arrow = "right-arrow";
                }
                var height =0;// this.offsetHeight/2;
                timer2 = setTimeout(function(){

                  if($(_this).is(':hover'))
                  {		
                  	$.ajax({
	                  url: configulr+'/site/quickviewuser',
	                  type: "POST",
                      data: {objid: object_id },
                      dataType: 'json',
	                  success: function(data) {
	                  	$(".popover-content").empty();
	                  	$(".popover-content").append(data.data);
	                    //$(elem).
	                    $('#quick-view-box .tooltiptext').addClass(arrow);
	                    $('#quick-view-box').css('top', -height);
	                    $('#quick-view-box').css('left', position);
	                    // $('#quick-view-box').fadeIn("slow");
	                  }
	                });       
                      $(_this).popover("show");
                  }
                  $(".popover").on("mouseleave", function () {
                      $('.col-md-4 .item_hd').popover('hide');
                  });
                  }, 500);
                // $(".popover").on("mouseleave", function () {
                //     $(_this).popover('hide');
                // });
                  
            
          }).on("mouseleave", function () {
              clearTimeout(timer2);
              var _this = this;
              setTimeout(function () {
                  if (!$(".popover:hover").length) {
                      $(_this).popover("hide");
                  }
              }, 200);
      });
    }); 
  }
     //endif 
     var inputs = document.querySelectorAll( '.inputfile' );
	Array.prototype.forEach.call( inputs, function( input )
	{
		var label	 = input.nextElementSibling,
			labelVal = label.innerHTML;

		input.addEventListener( 'change', function( e )
		{
			var fileName = '';
			if( this.files && this.files.length > 1 )
				fileName = ( this.getAttribute( 'data-multiple-caption' ) || '' ).replace( '{count}', this.files.length );
			else
				fileName = e.target.value.split( '\\' ).pop();

			if( fileName )
				label.querySelector( 'span' ).innerHTML = fileName;
			else
				label.innerHTML = labelVal;
		});

		// Firefox bug fix
		input.addEventListener( 'focus', function(){ input.classList.add( 'has-focus' ); });
		input.addEventListener( 'blur', function(){ input.classList.remove( 'has-focus' ); });
	});		
	})(jQuery);
 function UserManager()
{
    $(".loginform").keypress(function (e) {
        if (e.which === 13) {
            e.preventDefault();
            if ($('#username').val() == '') {
                $('#username').focus();
            }
            else if ($('#password').val() == '' && $('#username').val() != '') {
                $('#password').focus();
            }
            else if ($('#password').val() != '' && $('#username').val() != '') {
                $('#btndangnhap').focus();
                $('#btndangnhap').trigger('click');
            }
        }
    });
    $(".login_user").keypress(function (e) {
        if (e.which === 13) {
            e.preventDefault();
            if ($('#useremail').val() == '') {
                $('#useremail').focus();
            }
            else if ($('#userpassword').val() == '' && $('#useremail').val() != '') {
                $('#userpassword').focus();
            }
            else if ($('#userpassword').val() != '' && $('#useremail').val() != '') {
                $('#dangnhapgiasu').focus();
                $('#dangnhapgiasu').trigger('click');
            }
        }
    });
    
    var self = this;
    $('#dangnhapgiasu').on('click',function(){
        var cknhatuyendung=1;
        if(typeof ($('input[name=rememberlogin]:checked').val())=== "undefined"){
            cknhatuyendung=0;
        }
       $.ajax(
              {
                  
                  url: configulr+"/site/loginteacher",
                  type: "POST",
                  data: { username: $('#useremail').val(), password: $('#userpassword').val(),typelogin:cknhatuyendung },
                  dataType: 'json',
                  beforeSend: function () {
                      $("#boxLoading").show();
                  },
                  success: function (reponse) {
                      if (reponse.kq == true) {
                        window.location.href=configulr;
                          
                      }
                      else {
                        //  alert(reponse.msg) ;
                      }
                  },
                  error: function (xhr) {
                      console.log(xhr);
                  },
                  complete: function () {
                      $("#boxLoading").hide();
                      
                  }
              }); 
    });
    $('#phuhuynhlogin').on('click',function(){
        var cknhatuyendung=1;
        if(typeof ($('input[name=rememberlogin]:checked').val())=== "undefined"){
            cknhatuyendung=0;
        }
       $.ajax(
              {
                  
                  url: configulr+"/site/loginusers",
                  type: "POST",
                  data: { username: $('#useremail').val(), password: $('#userpassword').val(),typelogin:cknhatuyendung },
                  dataType: 'json',
                  beforeSend: function () {
                      $("#boxLoading").show();
                  },
                  success: function (reponse) {
                      if (reponse.kq == true) {
                        window.location.href=configulr;
                          
                      }
                      else {
                         alert(reponse.msg) ;
                      }
                  },
                  error: function (xhr) {
                      console.log(xhr);
                  },
                  complete: function () {
                      $("#boxLoading").hide();
                      
                  }
              }); 
    });
    $('#btnusersforgot').on('click',function(){
        if($('#emailuser').val()!=''){
            $.ajax(
              {
                  
                  url: configulr+"/site/ajaxgetforgotpassword",
                  type: "POST",
                  data: { username: $('#emailuser').val() },
                  dataType: 'json',
                  beforeSend: function () {
                      $("#boxLoading").show();
                  },
                  success: function (reponse) {
                      if (reponse.kq == true) {
                        alert(reponse.data);
                        window.location.href=configulr;
                          
                      }
                      else {
                         alert('tài khoản không tồn tại') ;
                      }
                  },
                  error: function (xhr) {
                      console.log(xhr);
                  },
                  complete: function () {
                      $("#boxLoading").hide();
                      
                  }
              }); 
        }
    });
    $('#btn_teacherforgot').on('click',function(){
        if($('#emailuser').val()!=''){
            $.ajax(
              {
                  
                  url: configulr+"/site/ajaxgetforgotpassword",
                  type: "POST",
                  data: { username: $('#emailuser').val() },
                  dataType: 'json',
                  beforeSend: function () {
                      $("#boxLoading").show();
                  },
                  success: function (reponse) {
                      if (reponse.kq == true) {
                        alert(reponse.data);
                        window.location.href=configulr;
                          
                      }
                      else {
                         alert('tài khoản không tồn tại') ;
                      }
                  },
                  error: function (xhr) {
                      console.log(xhr);
                  },
                  complete: function () {
                      $("#boxLoading").hide();
                      
                  }
              }); 
        }
    });
    $('#btnconfirmpass').on('click',function(){
        if($('#emailuser').val()!=''){
             $.ajax(
              {
                  
                  url: configulr+"/site/ajaxconfirmpass",
                  type: "POST",
                  data: { code: $('#emailuser').val(),usp:$('#usp').val() },
                  dataType: 'json',
                  beforeSend: function () {
                      $("#boxLoading").show();
                  },
                  success: function (reponse) {
                      if (reponse.kq == true) {
                        alert('mật khẩu mới của quý khách là: '+reponse.mk);
                        window.location.href=configulr;
                          
                      }
                      else {
                         alert('Đổi mật khẩu thất bại') ;
                      }
                  },
                  error: function (xhr) {
                      console.log(xhr);
                  },
                  complete: function () {
                      $("#boxLoading").hide();
                      
                  }
              });
        }
    })
    $('#btnlogout').on('click',function(){
        $.ajax(
              {
                  
                  url: configulr+"/site/logout",
                  type: "POST",
                  data: {},
                  dataType: 'json',
                  beforeSend: function () {
                      $("#boxLoading").show();
                  },
                  success: function (reponse) {
                      if (reponse.kq == true) {
                        window.location.reload();
                          $(location).attr('href', configulr);
                      }
                      else {
                         alert(reponse.msg) ;
                      }
                  },
                  error: function (xhr) {
                      console.log(xhr);
                  },
                  complete: function () {
                      $("#boxLoading").hide();
                  }
              });
        
    })
    $('#citycandi').change(function () {
        //alert($(this).val()); 
        var tinhthanh=$(this).val();
        
              if(tinhthanh != '' || tinhthanh !=0){
              $.ajax(
              {
                  
                  url: configulr+"/site/GetListDistrict",
                  type: "POST",
                  data: { province: tinhthanh },
                  dataType: 'json',
                  beforeSend: function () {
                      $("#boxLoading").show();
                  },
                  success: function (obj) {
                     var strhtml='<option value="">Ch?n Qu?n, Huy?n</option>';
                     if(obj.kq != ''){
                        var reponse=obj.kq;
                        $("#districtcandi option").remove();
                        var o1 = new Option('Ch?n qu?n huy?n', '');
                        $("#districtcandi").append(o1);
                      for (var i = 0; i < reponse.length; i++) {
                           //strhtml+="<option value='"+reponse[i].cit_name+"'>"+reponse[i].cit_name+"</option>";
                          var o = new Option(reponse[i].cit_name, reponse[i].cit_name);
                            $("#districtcandi").append(o);
                           
                        }
                        
                        //$("#district").html=strhtml;
                        //document.getElementById('district').innerHTML=strhtml;
                        //$("#districtcandi").selectpicker('refresh');
                        }else{
                            //alert('không t?n t?i');
                        }
                  },
                  error: function (xhr) {
                      console.log(xhr);
                  },
                  complete: function () {
                      $("#boxLoading").hide();
                  }
              });  
              }
        });
    $('.dangkyungvien').on('click',function(){
        if (self.validateregister()) {
            var hoten = $('#namecandi').val();
            var phone = $("#phonecandi").val();
            var email = $("#emailcandi").val();
            var pass = $("#passcandi").val();
            var city=$('#citycandi').val();
            /* moi bo xung*/
            var district=$('#districtcandi').val();
            /*thong tin them*/
            var school=$('#school').val();
            var schooltype=$('#schooltype').val();
            var xeploaihoctap=$('#xeploaihoctap').val();
            var languagecandi=$('#languagecandi').val();
            /*ket thuc moi bo xung*/
            var ngaysinh=$('#txtngaysinh').val();
            var gioitinh=$('#candisex').val();
            var honnhan=$('#candimarriage').val();
            var cvtitle=$('#jobwish').val();
            var bangcap=$('#candibangcap').val();
            var hinhthuclamviec=$('#candihtlv').val();
            var capbac=$('#candicapbac').val();
            var noilamvieckhac=$('#citycandimore').val();
            var nganhnghe=$('#candicategory').val();
            var nganhnghe1=$('#candicategorymore').val();
            var nganhnghe2=$('#candicategorymore2').val();
            //var extrann=nganhnghe1+','+nganhnghe2;
            var muctieu=$('#canditarget').val();
            var kynang=$('#candiskill').val();
            var diachi=$('#diachicandi').val();
            var mucluong=$('#salarycandi').val();
            var kinhnghiem=$('#candiexp').val();
            $.ajax(
              {
                  
                  url: configulr+"/site/registercandi",
                  type: "POST",
                  data: { 
                        hoten: hoten, 
                        phone: phone,
                        email:email,
                        city:city,
                        pass:pass,
                        ngaysinh:ngaysinh,
                        gioitinh:gioitinh,
                        honnhan:honnhan,
                        cvtitle:cvtitle,
                        bangcap:bangcap,
                        hinhthuclamviec:hinhthuclamviec,
                        capbac:capbac,
                        noilamvieckhac:noilamvieckhac,
                        nganhnghe:nganhnghe,
                        nganhnghe1:nganhnghe1,
                        nganhnghe2:nganhnghe2,
                        muctieu:muctieu,
                        kynang:kynang,
                        diachi:diachi,
                        mucluong:mucluong,
                        kinhnghiem:kinhnghiem,
                        district:district,
                        school:school,
                        schooltype:schooltype,
                        xeploaihoctap:xeploaihoctap,
                        languagecandi:languagecandi
                        },
                  dataType: 'json',
                  beforeSend: function () {
                      $("#boxLoading").show();
                  },
                  success: function (reponse) {
                      if (reponse.kq == true) {
                        alert(reponse.msg)
                          
                      }
                      else {
                          
                      }
                  },
                  error: function (xhr) {
                      console.log(xhr);
                  },
                  complete: function () {
                      $("#boxLoading").hide();
                      //window.location = configulr;
                  }
              }); 
            }
    })
    $('.dangkynhatuyendung').on('click',function(){
        var hoten = $('#namecompany').val();
        var phone = $("#phonecompany").val();
        var email = $("#usercompany").val();
        var pass = $("#passcompany").val();
        var repass = $("#repasscompany").val();
        var term = $('input[name=company-terms]:checked').val();
        var city=$('#citycompany').val();
        var website=$('#websitecompany').val();
        var addresscom=$('#addresscompany').val();
        if(self.validatecomregister()){
            $.ajax(
              {
                  
                  url: configulr+"/site/registercompany",
                  type: "POST",
                  data: { tencongty: hoten, phone: phone,email:email,city:city,pass:pass,website:website,addresscom:addresscom },
                  dataType: 'json',
                  beforeSend: function () {
                      $("#boxLoading").show();
                  },
                  success: function (reponse) {
                      if (reponse.kq == true) {
                        alert(reponse.msg);
                          window.location = configulr;
                      }
                      else {
                          
                      }
                  },
                  error: function (xhr) {
                      console.log(xhr);
                  },
                  complete: function () {
                      $("#boxLoading").hide();
                      //window.location = configulr;
                  }
              }); 
        }
    })
     //Check valid register
    self.validateregister = function () {
        var flag = true;

        var hoten = $('#namecandi').val();
        var phone = $("#phonecandi").val();
        var email = $("#emailcandi").val();
        var pass = $("#passcandi").val();
        var repass = $("#repasscandi").val();
        var term = $('input[name=user-terms]:checked').val();
        var city=$('#citycandi').val();
        var ngaysinh=$('#txtngaysinh').val();
        if ($.trim(ngaysinh) == '') {
            $($('#txtngaysinh')).attr('data-original-title', 'Nh?p ngày sinh').tooltip('show').addClass('errorClass');
            flag = false;
        } else {
            $('#txtngaysinh').data("title", "").removeClass("errorClass").tooltip("destroy");;
        } 
            var gioitinh=$('#candisex').val();
        if($.trim(gioitinh)=='0'){
            $('#candisex').addClass('errorClass');
        }else{
            $('#candisex').removeClass('errorClass');
        }
            var honnhan=$('#candimarriage').val();
        if($.trim(honnhan)=='0'){
            $('#candimarriage').addClass('errorClass');
        }else{
            $('#candimarriage').removeClass('errorClass');
        }
            var cvtitle=$('#jobwish').val();
            var bangcap=$('#candibangcap').val();
        if($.trim(bangcap)=='0'){
            $('#candibangcap').addClass('errorClass');
        }else{
            $('#candibangcap').removeClass('errorClass');
        }
            var hinhthuclamviec=$('#candihtlv').val();
        if($.trim(hinhthuclamviec)=='0'){
            $('#candihtlv').addClass('errorClass');
        }else{
            $('#candihtlv').removeClass('errorClass');
        }
            var capbac=$('#candicapbac').val();
        if($.trim(capbac)=='0'){
            $('#candicapbac').addClass('errorClass');
        }else{
            $('#candicapbac').removeClass('errorClass');
        }
            var nganhnghe=$('#candicategory').val();
        if($.trim(nganhnghe)=='0'){
            $('#candicategory').addClass('errorClass');
        }else{
            $('#candicategory').removeClass('errorClass');
        }
            var muctieu=$('#canditarget').val();
        if ($.trim(muctieu) == '') {
            $($('#canditarget')).attr('data-original-title', 'Nh?p m?c tiêu').tooltip('show').addClass('errorClass');
            flag = false;
        } else {
            $('#canditarget').data("title", "").removeClass("errorClass").tooltip("destroy");;
        } 
            var kynang=$('#candiskill').val();
        if ($.trim(kynang) == '') {
            $($('#candiskill')).attr('data-original-title', 'Nh?p k? nang').tooltip('show').addClass('errorClass');
            flag = false;
        } else {
            $('#candiskill').data("title", "").removeClass("errorClass").tooltip("destroy");;
        } 
        if ($.trim(hoten) == '') {
            $($('#namecandi')).attr('data-original-title', 'Nh?p h? tên').tooltip('show').addClass('errorClass');
            flag = false;
        } else {
            $('#namecandi').data("title", "").removeClass("errorClass").tooltip("destroy");;
        }

        if ($.trim(phone) == '') {
            $($('#phonecandi')).attr('data-original-title', 'Nh?p s? di?n tho?i').tooltip('show').addClass('errorClass');
            flag = false;
        } else {
            $('#phonecandi').data("title", "").removeClass("errorClass").tooltip("destroy");;
        }

        if ($.trim(email) == '') {
            $($('#emailcandi')).attr('data-original-title', 'Nh?p d?a ch? email').tooltip('show').addClass('errorClass');
            flag = false;
        } else {
            $('#emailcandi').data("title", "").removeClass("errorClass").tooltip("destroy");;
        }

        if ($.trim(email) != '') {
            if (!Common.IsValidEmail(email)) {
                $($('#emailcandi')).attr('data-original-title', 'Email không h?p l?').tooltip('show').addClass('errorClass');
                flag = false;
            } else {
                $('#emailcandi').data("title", "").removeClass("errorClass").tooltip("destroy");
            }
        }
if ($.trim(pass) == '') {
            $($('#passcandi')).attr('data-original-title', 'Nh?p m?t kh?u').tooltip('show').addClass('errorClass');
            flag = false;
        } else {
            $('#passcandi').data("title", "").removeClass("errorClass").tooltip("destroy");;
        }
        if (checkPassword(pass, $('#passcandi')) == 1) {
            flag = false;
        }
        if (checkPassword(repass, $('#repasscandi')) == 1) {
            flag = false;
        }

        if (checkPassword(pass, $('#repasscandi')) == 0 && pass != repass) {
            $($('#passcandi')).attr('title', 'Nh?p l?i m?t kh?u không phù h?p').tooltip('show').addClass('errorClass');
            flag = false;
        }

        if ($.trim(term) != 'ok') {
            $('#user-terms').addClass('errorClass');
            flag = false;
        } else {
            
        }
        if(city =='0'){
            flag = false;
            
        }
        return flag;
    };
    self.validatecomregister = function () {
        var flag = true;

        var hoten = $('#namecompany').val();
        var phone = $("#phonecompany").val();
        var email = $("#usercompany").val();
        var pass = $("#passcompany").val();
        var repass = $("#repasscompany").val();
        var term = $('input[name=company-terms]:checked').val();
        var city=$('#citycompany').val();
        var website=$('#websitecompany').val();
        var addresscom=$('#addresscompany').val();
        
        if ($.trim(addresscom) == '') {
            $($('#addresscompany')).attr('data-original-title', 'Nh?p d?a ch? Công ty').tooltip('show').addClass('errorClass');
            flag = false;
        } else {
            $('#addresscompany').data("title", "").removeClass("errorClass").tooltip("destroy");;
        }
        if ($.trim(hoten) == '') {
            $($('#namecompany')).attr('data-original-title', 'Nh?p tên công ty').tooltip('show').addClass('errorClass');
            flag = false;
        } else {
            $('#namecompany').data("title", "").removeClass("errorClass").tooltip("destroy");;
        }

        if ($.trim(phone) == '') {
            $($('#phonecompany')).attr('data-original-title', 'Nh?p s? di?n tho?i').tooltip('show').addClass('errorClass');
            flag = false;
        } else {
            $('#phonecompany').data("title", "").removeClass("errorClass").tooltip("destroy");;
        }

        if ($.trim(email) == '') {
            $($('#usercompany')).attr('data-original-title', 'Nh?p d?a ch? email').tooltip('show').addClass('errorClass');
            flag = false;
        } else {
            $('#usercompany').data("title", "").removeClass("errorClass").tooltip("destroy");;
        }

        if ($.trim(email) != '') {
            if (!Common.IsValidEmail(email)) {
                $($('#usercompany')).attr('data-original-title', 'Email không h?p l?').tooltip('show').addClass('errorClass');
                flag = false;
            } else {
                $('#usercompany').data("title", "").removeClass("errorClass").tooltip("destroy");
            }
        }
if ($.trim(pass) == '') {
            $($('#passcompany')).attr('data-original-title', 'Nh?p m?t kh?u').tooltip('show').addClass('errorClass');
            flag = false;
        } else {
            $('#passcompany').data("title", "").removeClass("errorClass").tooltip("destroy");;
        }
        if (checkPassword(pass, $('#passcompany')) == 1) {
            flag = false;
        }
        if (checkPassword(repass, $('#repasscompany')) == 1) {
            flag = false;
        }

        if (checkPassword(pass, $('#repasscompany')) == 0 && pass != repass) {
            $($('#passcompany')).attr('title', 'Nh?p l?i m?t kh?u không phù h?p').tooltip('show').addClass('errorClass');
            flag = false;
        }

        if ($.trim(term) != 'ok') {
            $('.checkboxcom').addClass('errorClass');
            flag = false;
        } else {
            $('.checkboxcom').removeClass('errorClass');
        }
        if(city =='0'){
            $($('#citycompany')).attr('title', 'Ch?n t?nh thành').tooltip('show').addClass('errorClass');
            flag = false;
            
        }else{
            $('#citycompany').data("title", "").removeClass("errorClass").tooltip("destroy");;
        }
        return flag;
    };
}
function checkPassword(pwd, element) {
    var Hoa = 0;
    var Thuong = 0;
    var So = 0;

    if (pwd.length < 6) {
        $(element).attr('title', 'M?t kh?u ph?i nhi?u hon ho?c có 6 ký t?').tooltip('show').addClass('errorClass');
        return 1;
    }
    //for (i = 0; i < pwd.length; i++) {
    //    a = toAscii(pwd.charAt(i));
    //    if (a >= 65 && a <= 90) {
    //        Hoa = 1;
    //    }
    //    if (a >= 97 && a <= 122) {
    //        Thuong = 1;
    //    }
    //    if (a >= 48 && a <= 57) {
    //        So = 1;
    //    }
    //}
    //if (Hoa == 0) {
    //    $(element).tooltip('hide').attr('title', 'M?t kh?u ph?i g?m c? ký t? vi?t hoa').tooltip('fixTitle').addClass('errorClass');
    //    return 1;
    //}
    //else if (Thuong == 0) {
    //    $(element).tooltip('hide').attr('title', 'M?t kh?u ph?i g?m c? ký t? vi?t thu?ng').tooltip('fixTitle').addClass('errorClass');
    //    return 1;
    //}
    //else if (So == 0) {
    //    $(element).tooltip('hide').attr('title', 'M?t kh?u ph?i g?m c? s?').tooltip('fixTitle').addClass('errorClass');
    //    return 1;
    //}
    $(element).data("title", "").removeClass("errorClass").tooltip("destroy");
    return 0;

}
function SearchJob()
{
    // $('.timvieclam').on('click',function(){
    //     var findkey=$('#findkeyjob').val();
    //     var location=$('#index_dia_diem').val();
    //     var nganhnghe=$('#index_nganhnghe').val();
        
    //     $.ajax(
    //           {
                  
    //               url: configulr+"/site/searchjob",
    //               type: "POST",
    //               data: { findkey: findkey, location: location,nganhnghe:nganhnghe,type:1 },
    //               dataType: 'json',
    //               beforeSend: function () {
    //                   $("#boxLoading").show();
    //               },
    //               success: function (reponse) {
    //                   if (reponse.kq == true) {
    //                       window.location=reponse.data;
    //                   }
                      
    //               },
    //               error: function (xhr) {
    //                   console.log(xhr);
    //               },
    //               complete: function () {
    //                   $("#boxLoading").hide();
    //               }
    //           }); 
    // })
    //searchcompany
    $('.timdoanhnghiep').on('click',function(){
        var findkey=$('#keyworkcom').val();
        if(findkey !=''){
            $.ajax(
              {
                  
                  url: configulr+"/site/searchcompany",
                  type: "POST",
                  data: { findkey: findkey},
                  dataType: 'json',
                  beforeSend: function () {
                      $("#boxLoading").show();
                  },
                  success: function (reponse) {
                      if (reponse.kq == true) {
                          window.location=reponse.data;
                      }
                      
                  },
                  error: function (xhr) {
                      console.log(xhr);
                  },
                  complete: function () {
                      $("#boxLoading").hide();
                  }
              }); 
        }else{
            $('#keyworkcom').addClass('errClass').focus();
        }
    });
    //searchcandi
    $('.timungvien').on('click',function(){
         var findkey=$('#findkeycandi').val();
        var location=$('#candilocation').val();
        var nganhnghe=$('#candinganhnghe').val();
        
        $.ajax(
              {
                  
                  url: configulr+"/site/searchcandi",
                  type: "POST",
                  data: { findkey: findkey, location: location,nganhnghe:nganhnghe },
                  dataType: 'json',
                  beforeSend: function () {
                      $("#boxLoading").show();
                  },
                  success: function (reponse) {
                      if (reponse.kq == true) {
                          window.location=reponse.data;
                      }
                      
                  },
                  error: function (xhr) {
                      console.log(xhr);
                  },
                  complete: function () {
                      $("#boxLoading").hide();
                  }
              }); 
    })
}
function AllClearCooke()
{
    $('#xoacookie').on('click',function(){
         $.ajax(
              {
                  
                  url: configulr+"/site/delcookiephp",
                  type: "POST",
                  data: {  },
                  dataType: 'json',
                  beforeSend: function () {
                      $("#boxLoading").show();
                  },
                  success: function (reponse) {
                      if (reponse.kq == true) {
                          window.location=window.location.href;
                      }
                      
                  },
                  error: function (xhr) {
                      console.log(xhr);
                  },
                  complete: function () {
                      $("#boxLoading").hide();
                  }
              }); 
    })
}