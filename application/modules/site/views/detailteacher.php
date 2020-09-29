<?php 

$urlgiasu='0';
$CI=&get_instance();
$CI->load->model('site/site_model');
if(isset($_SESSION['UserInfo']) || !empty($_SESSION['UserInfo'])){
    $tg=$_SESSION['UserInfo'];
    if($tg['Type']==2){
        $urlgiasu='2';
    }else{
        $urlgiasu='1';
    }
}
$userid=$tg['UserId'];
$kq=$CI->site_model->countclassnotteacherbyuserid($userid);
$trace="users_".$item->UserID;
$logpoint=$CI->site_model->getlogpoint($userid,$trace);         
?>
<div class="container">
<?php $this->load->view('headerfun'); ?>
</div>
<section class="padd-top-20 padd-bot-20">
    <div class="container">
        <div class="row">
            <div class="col-md-12 titledetail">
                <div class="tit_hd">
                   <h3><i class="fa fa-ntd-logout"></i> Thông tin gia sư</h3>         
               </div>
           </div>             
       </div>
       <div class="row">
        <div class="col-md-2 col-sm-12 padd-r-0">
            <div class="detailjob-header teacher">
                <?php if(!empty($item->Image)){?>
                    <img class="img-responsive" src="<?= gethumbnail(geturlimageAvatar(strtotime($item->CreateDate)).$item->Image,$item->Image,strtotime($item->CreateDate),180,180,100) ?>" onerror='this.onerror=null;this.src="images/no-image2.png";' />
                <?php }else{ ?>
                   <img class="img-responsive" src="images/no-image2.png" alt="<?php echo $item->Name ?>" onerror='this.onerror=null;this.src="images/no-image2.png";' />
               <?php } ?>
           </div>
       </div>
       <div class="col-md-10 col-sm-12 padd-l-10">
        <div class="detailjob-header">                    
            <div class="detailjob-info col-md-8 col-sm-12 padd-l-0">
                <h1 class="detailjob-name"><a><i class="fa fa-online-big" data-toggle="tooltip" title="" data-original-title="Phụ huynh đang online"></i> <?php echo $item->Name; ?></a></h1>
                <div class="detailjob-cty teacher"><i class="fa fa-chat"></i>&nbsp;<i class="fa fa-conhau"></i>&nbsp;&nbsp;<a href=""><?php echo $item->TitleView ?> </a></div>
                <div class="detailjob-location teacher"><strong>Khu vực nhận dạy: </strong><?php if(!empty($item->City2)){echo $item->CityName2." - ".$item->CityName;}else{echo "Chưa cập nhật";} ?></div>
                <div class="detailjob-salary"><strong>Mức học phí: </strong> từ <?php echo number_format($item->Free)." vnđ/h" ?></div>
                <div class="detailjob-location teacher"><strong>Hình thức dạy: </strong><?php echo GetLearn($item->WorkID) ?></div>

            </div>
            <div class="detailjob-social col-md-4 col-sm-12 teacher">                        
                <div class="divbtn" style="text-align: center;margin-bottom:15px;"><span class="btn btndaxacthuc">Đã xác thực</span></div>
                <p><span class="jobview teacher">Lượt xem: <?php echo number_format($countview); ?></span>
                    <span class="jobview teacher">Ngày cập nhật: <?php echo date('d/m/Y',strtotime($item->CreateDate)) ?></span>
                </p>
                <ul>
                    <?php
                    # Using SCRIPT_NAME
                    $queryString = $_SERVER['QUERY_STRING'];
                    // echo "Query: " .base_url(). $queryString;
                    ?>
                   <li><div class="fb-like fb_iframe_widget" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button" data-action="like" data-size="small" data-show-faces="true" data-share="true" fb-xfbml-state="rendered" fb-iframe-plugin-query="action=like&amp;app_id=&amp;container_width=0&amp;href=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;layout=button&amp;locale=vi_VN&amp;sdk=joey&amp;share=true&amp;show_faces=true&amp;size=small"><span style="vertical-align: bottom; width: 112px; height: 20px;"><iframe name="ff41c8dbc049a8" width="1000px" height="1000px" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" allow="encrypted-media" title="fb:like Facebook Social Plugin" src="https://www.facebook.com/v3.1/plugins/like.php?action=like&amp;app_id=&amp;channel=https%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter%2Fr%2F__Bz3h5RzMx.js%3Fversion%3D42%23cb%3Df2afb4f993516a%26domain%3Dlocalhost%26origin%3Dhttp%253A%252F%252Flocalhost%253A9001%252Ff25d959f42fbcb8%26relation%3Dparent.parent&amp;container_width=0&amp;href=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;layout=button&amp;locale=vi_VN&amp;sdk=joey&amp;share=true&amp;show_faces=true&amp;size=small" style="border: none; visibility: visible; width: 112px; height: 20px;" class=""></iframe></span></div></li>
                   <li><?php echo '<a aria-label="facebook" rel="nofollow" href="https://www.facebook.com/sharer/sharer.php?u=https://timviec365.vn/ssl/'. $queryString . '"  target="_blank"><i class="fa fa-facebook-square"></i></a> '?></li>
                   <li><?php echo '<a aria-label="facebook" rel="nofollow" href="http://www.twitter.com/share?url=https://timviec365.vn/ssl/'. $queryString . '" target="_blank"><i class="fa fa-twitter-square"></i></a>'?></li>
                   <!-- <li><a aria-label="facebook" rel="nofollow" href="https://plus.google.com/share?url={https://timviec365.vn/ssl/trai-nganh-luong-cao-hay-dung-nganh-luong-thap-b87.html}" target="_blank"><i class="fa fa-google-plus-square"></i></a></li> -->
                   <!-- <li><a aria-label="facebook" rel="nofollow" href="https://www.instagram.com/?url=https://www.drdrop.co/" target="_blank"><i class="fa fa-instalgram"></i></a></li> -->
                   <!-- <li><a href=""><i class="img share"></i>Chia sẻ ẩn danh</a></li> -->

               </ul>
           </div>
       </div>
   </div>
</div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-70 col-sm-12">
            <div class="top-detail">   
                <ul class="blockfun">
                    <li class="color-orange">
                        <a><i class="fa fa-chat-white"></i> Gửi tin nhắn</a>
                    </li>
                    <?php if($logpoint ==""){ ?> 

                        <li>
                            <a data-val="<?php echo "users_".$item->UserID ?>" class="btnviewcontactinfo"><i class="fa fa-view-att-white"></i> Xem liên hệ</a>
                        </li>
                    <?php } ?>

                    <li>
                        <a class="btnluuhosogv"><i class="fa fa-block-download"></i> Lưu hồ sơ</a>
                    </li>
                    <?php if($kq > 0){ ?>
                        <li>
                            <a class="btnmoidayngay"><i class="fa fa-uv-upload-small"></i> Mời dạy ngay</a>
                        </li>
                    <?php } ?>
                    <li>
                        <a><i class="fa fa-envelope-o"></i> Gửi email</a>
                    </li>
                </ul>                 
                <div class="detailjob-body">
                    <h3 class="title">Thông tin chung</h3>
                    <div class="detailjob-body1 detailteach">
                        <div class="chiso">1. Giới thiệu chung</div>
                        <p>
                            <?php echo $item->Description ?>
                        </p>
                        <div class="chiso">2. Lớp và chủ đề dạy</div>
                            <div>
                                <span><?= $item->classname ?></span>
                            </div>
                            <ul class="topicteach">
                                <?php if(!empty($topic)){
                                   foreach($topic as $n){ ?>
                                    <li><label><?php echo $n->TopicName ?></label></li>
                                <?php }   
                            }?>
                    </ul>
                    <div class="chiso">3. Kiểu giáo viên</div>
                    <ul class="starteach">
                        <li><label><?php echo GetTeacherType($item->TeachType) ?></label></li>
                    </ul>
                </div>
                <div class="clr"></div>
                <h3 class="title">Kinh nghiệm</h3>
                <div class="detaijob-body2">
                    <p><?php if(!empty($item->Exp)){ echo $item->Exp;}else{echo "Chưa cập nhật";} ?></p>
                </div>
                <h3 class="title">Thành tích</h3>
                <div class="detaijob-body2">
                    <p><?php if(!empty($item->Bonus)){ echo $item->Bonus;}else{echo "Chưa cập nhật";} ?></p>
                </div>
                <h3 class="title">Buổi có thể dạy</small></h3>
                <div class="detaijob-body2 lichday">
                   <div class="col-md-15 col-sm-12 padd-l-5 padd-r-5">
                    <div>Thứ 2
                    </div>
                    <ul>
                        <li>
                            <label class="<?php if($item->MonMorning ==0){ echo""; }else{ echo "active";}?>">Sáng</label>                                        
                        </li>
                        <li>

                            <label class="<?php if($item->MonAfter ==0){ echo""; }else{ echo "active";}?>">Chiều</label>

                        </li>
                        <li>
                            <label class="<?php if($item->MonNight ==0){ echo""; }else{ echo "active";}?>">Tối</label>
                        </li>
                    </ul>
                </div> 
                <div class="col-md-15 col-sm-12 padd-l-5 padd-r-5">
                   <div>Thứ 3
                   </div>
                   <ul>
                    <li>
                        <label class="<?php if($item->TueMorning ==0){ echo""; }else{ echo "active";}?>">Sáng</label>                                        
                    </li>
                    <li>

                        <label class="<?php if($item->TueAfter ==0){ echo""; }else{ echo "active";}?>">Chiều</label>

                    </li>
                    <li>
                        <label class="<?php if($item->TueNight ==0){ echo""; }else{ echo "active";}?>">Tối</label>
                    </li>
                </ul>
            </div>
            <div class="col-md-15 col-sm-12 padd-l-5 padd-r-5">
               <div>Thứ 4
               </div>
               <ul>
                <li>
                    <label class="<?php if($item->WeMorning ==0){ echo""; }else{ echo "active";}?>">Sáng</label>                                        
                </li>
                <li>

                    <label class="<?php if($item->WeAfter ==0){ echo""; }else{ echo "active";}?>">Chiều</label>

                </li>
                <li>
                    <label class="<?php if($item->WeNight ==0){ echo""; }else{ echo "active";}?>">Tối</label>
                </li>
            </ul>
        </div>
        <div class="col-md-15 col-sm-12 padd-l-5 padd-r-5">
            <div>Thứ 5
            </div>
            <ul>
                <li>
                    <label class="<?php if($item->ThuMorning ==0){ echo""; }else{ echo "active";}?>">Sáng</label>                                        
                </li>
                <li>

                    <label class="<?php if($item->ThuAfter ==0){ echo""; }else{ echo "active";}?>">Chiều</label>

                </li>
                <li>
                    <label class="<?php if($item->ThuNight ==0){ echo""; }else{ echo "active";}?>">Tối</label>
                </li>
            </ul>
        </div>
        <div class="col-md-15 col-sm-12 padd-l-5 padd-r-5">
            <div>Thứ 6
            </div>
            <ul>
                <li>
                    <label class="<?php if($item->FriMorning ==0){ echo""; }else{ echo "active";}?>">Sáng</label>                                        
                </li>
                <li>

                    <label class="<?php if($item->FriAfter ==0){ echo""; }else{ echo "active";}?>">Chiều</label>

                </li>
                <li>
                    <label class="<?php if($item->FriNight ==0){ echo""; }else{ echo "active";}?>">Tối</label>
                </li>
            </ul>
        </div>
        <div class="col-md-15 col-sm-12 padd-l-5 padd-r-5">
            <div>Thứ 7
            </div>
            <ul>
                <li>
                    <label class="<?php if($item->SatMorning ==0){ echo""; }else{ echo "active";}?>">Sáng</label>                                        
                </li>
                <li>

                    <label class="<?php if($item->SatAfter ==0){ echo""; }else{ echo "active";}?>">Chiều</label>

                </li>
                <li>
                    <label class="<?php if($item->SatNight ==0){ echo""; }else{ echo "active";}?>">Tối</label>
                </li>
            </ul>
        </div>
        <div class="col-md-15 col-sm-12 padd-l-5 padd-r-5">
            <div>Chủ nhật
            </div>
            <ul>
                <li>
                    <label class="<?php if($item->SunMorning ==0){ echo""; }else{ echo "active";}?>">Sáng</label>                                        
                </li>
                <li>

                    <label class="<?php if($item->SunAfter ==0){ echo""; }else{ echo "active";}?>">Chiều</label>

                </li>
                <li>
                    <label class="<?php if($item->SunNight ==0){ echo""; }else{ echo "active";}?>">Tối</label>
                </li>
            </ul>
        </div>                                         
    </div>
</div>
</div>
<ul class="blockfun">
 <!--    <li class="color-orange">
        <a><i class="fa fa-chat-white"></i> Gửi tin nhắn</a>
    </li> -->
    <?php if($logpoint !=""){ ?> 
    <?php }else{?> 
        <li>
            <a data-val="<?php echo "users_".$item->UserID ?>" class="btnviewcontactinfo"><i class="fa fa-view-att-white"></i> Xem liên hệ</a>
        </li>
    <?php } ?>

    <li>
        <a class="btnluuhosogv"><i class="fa fa-block-download"></i> Lưu hồ sơ</a>
    </li>
    <li>
        <a class="btnmoidayngay"><i class="fa fa-uv-upload-small"></i> Mời dạy ngay</a>
    </li>
<!--     <li>
        <a><i class="fa fa-envelope-o"></i> Gửi email</a>
    </li> -->
</ul>
<div class="clearfix"></div>
<hr style="border-top:1px dotted #dbdbdb">
<div class="detailjob-keywork">
    <div class="title"><i class="fa fa-keywork-relative"></i> Từ khóa liên quan</div>
    <ul>
        <li><a>Gia sư tiếng anh</a></li>
        <li><a>Gia sư tiếng nhật</a></li>
        <li><a>Gia sư toán</a></li>
        <li><a>Gia sư tiếng việt</a></li>
        <li><a>Luyện thi THPT</a></li>
        <li><a>Luyện thi đại học</a></li>
        <li><a>Gia sư toán cấp 3</a></li>
        <li><a>Tiếng anh chuyên đề</a></li>
    </ul>
</div>
<div class="clearfix"></div>
<hr style="border-top:1px dotted #dbdbdb">
<div class="vl_lc detailjobrelative">
   <div class="tit_hd">
    <div class="ir_h3">
     <h3><img src="images/icon-gia-su-blue.png" alt="gia sư tương tự"/><span>gia sư tương tự</span></h3>                               
 </div>
 <a href="" class="span_hd">Xem thêm <img src="images/ic_muiten.png" alt="#"/></a>
</div>
<div class="main_lc">
    <?php if(!empty($moreteach)){

      foreach($moreteach as $n){ 
        ?>
        <div class="item_lc">
            <div class="col-md-3 col-sm-12 padd-0">
                <div class="giasu_logo">
                  <a href="<?php echo base_url().vn_str_filter($n->Name).'-gv'.$n->UserID ?>" title="<?php echo $n->Name; ?>">
                    <?php if(!empty($n->Image)){?>
                        <img src="<?= gethumbnail(geturlimageAvatar(strtotime($n->CreateDate)).$n->Image,$n->Image,strtotime($n->CreateDate),174,174,100) ?>" onerror='this.onerror=null;this.src="images/no-image2.png";' />
                    <?php }else{ ?>
                       <img src="images/no-image2.png" alt="#" onerror='this.onerror=null;this.src="images/no-image2.png";' />
                   <?php } ?>
                   <span class="viewnow">Xem hồ sơ</span>
               </a>
           </div>
       </div>
       <div class="col-md-9 col-sm-12">
        <div class="giasu_info">
            <a href="<?php echo base_url().vn_str_filter($n->Name).'-gv'.$n->UserID ?>" title="<?php echo $n->Name; ?>" class="giasu_name"><i class="fa fa-online"></i><?php echo $n->Name ?> <i class="fa fa-chat"></i></a>
            <div title="#" class="giasu_titleview">
                <span>Gia sư:</span><?php echo str_replace('Gia sư','',$n->TitleView); ?>
            </div>
            <div>
                <span>Khu vực: <span><a><?php echo $n->CityName ?></a></span></span>
            </div>
            <span class="giasu_luong">Từ: <span><?php echo number_format($n->Free)." vnđ/h" ?></span></span>
            <p><?php
            $gn_text=$n->Description;
            if ( strlen( $n->Description ) > 175 ) {
               $gn_text = substr( $n->Description, 0, 175 );
               $space   = strrpos( $gn_text, ' ' );
               $gn_text = substr( $gn_text, 0, $space ). '...';				   
           }
           echo $gn_text ; 

           ?></p>
       </div>
   </div>
</div>

<?php
} } 
?>
</div>
</div>
</div>
<div class="col-md-30 col-sm-12 col-right-search padd-l-0">
    <div class="box_job_search detailungvien">
        <div class="fullname">
            Thông tin cá nhân
        </div>
        <div class="uvngaysinh"> 
            Ngày sinh: <?php if(empty($item->Birth)){echo "01/01/1970";}else{echo date('d/m/Y',strtotime($item->Birth));} ?>               
        </div>
        <div class="uvgioitinh">
       Giới tính: <?php echo GetSex(intval($item->Sex)); ?> 
                       
     </div>
     <div class="uvhonnhan"> 
        Hôn nhân: Độc thân               
    </div>
    <div class="uvdiachi"> 
        Địa chỉ: <?php echo $item->Addressu ?>               
    </div>
    <div class="uvsodienthoai"> 
        SĐT:&nbsp;&nbsp;&nbsp;<span data-val="<?php echo "users_".$item->UserID ?>" id="txtviewphone" class="btnviewlienhe btnviewcontactinfo"><?php if($logpoint !=""){ echo $item->phoneu;}else{echo "Xem liên hệ";} ?></span>               
    </div>
    <div class="uvemail"> 
        Email:&nbsp;<span data-val="<?php echo "users_".$item->UserID ?>" id="txtviewemail" class="btnviewlienhe btnviewcontactinfo"><?php if($logpoint !=""){ echo $item->Email;}else{echo "Xem liên hệ";} ?></span>             
    </div>
</div>
<!-- <div class="box_job_search tagwork uvonline" style="display: none;">
    <h3>Gia sư đang online
    </h3>
    <div class="formtagwork">
        <div class="col-md-8 col-sm-12 padd-l-0 padd-r-5">
            <input placeholder="Nhập từ khóa" id="keyworktag" aria-label="từ khóa " />
        </div>
        <div class="col-md-4 col-sm-12 padd-0">
            <select id="tag_city" class="city_ab_tag" name="tag_city" aria-label="tag">
                <option data-tokens="0" value="">Tỉnh thành</option>
                <option data-tokens="1" value="1">Hà Nội</option> 
                <option data-tokens="45" value="45">Hồ Chí Minh</option> 
                <option data-tokens="49" value="49">An Giang</option> 
                <option data-tokens="47" value="47">Bà Rịa Vũng Tàu</option> 
                <option data-tokens="3" value="3">Bắc Giang</option> 
                <option data-tokens="4" value="4">Bắc Kạn</option> 
                <option data-tokens="50" value="50">Bạc Liêu</option> 
                <option data-tokens="5" value="5">Bắc Ninh</option> 
                <option data-tokens="52" value="52">Bến Tre</option> 
                <option data-tokens="46" value="46">Bình Dương</option> 
                <option data-tokens="51" value="51">Bình Phước</option> 
                <option data-tokens="31" value="31">Bình Thuận</option> 
                <option data-tokens="30" value="30">Bình Định</option> 
                <option data-tokens="53" value="53">Cà Mau</option> 
                <option data-tokens="48" value="48">Cần Thơ</option> 
                <option data-tokens="6" value="6">Cao Bằng</option> 
                <option data-tokens="34" value="34">Gia Lai</option> 
                <option data-tokens="10" value="10">Hà Giang</option> 
                <option data-tokens="11" value="11">Hà Nam</option> 
                <option data-tokens="35" value="35">Hà Tĩnh</option> 
                <option data-tokens="9" value="9">Hải Dương</option> 
                <option data-tokens="2" value="2">Hải Phòng</option> 
                <option data-tokens="56" value="56">Hậu Giang</option> 
                <option data-tokens="8" value="8">Hòa Bình</option> 
                <option data-tokens="12" value="12">Hưng Yên</option> 
                <option data-tokens="28" value="28">Khánh Hòa</option> 
                <option data-tokens="57" value="57">Kiên Giang</option> 
                <option data-tokens="36" value="36">Kon Tum</option> 
                <option data-tokens="14" value="14">Lai Châu</option> 
                <option data-tokens="29" value="29">Lâm Đồng</option> 
                <option data-tokens="15" value="15">Lạng Sơn</option> 
                <option data-tokens="13" value="13">Lào Cai</option> 
                <option data-tokens="58" value="58">Long An</option> 
                <option data-tokens="17" value="17">Nam Định</option> 
                <option data-tokens="37" value="37">Nghệ An</option> 
                <option data-tokens="16" value="16">Ninh Bình</option> 
                <option data-tokens="38" value="38">Ninh Thuận</option> 
                <option data-tokens="18" value="18">Phú Thọ</option> 
                <option data-tokens="39" value="39">Phú Yên</option> 
                <option data-tokens="40" value="40">Quảng Bình</option> 
                <option data-tokens="41" value="41">Quảng Nam</option> 
                <option data-tokens="42" value="42">Quảng Ngãi</option> 
                <option data-tokens="19" value="19">Quảng Ninh</option> 
                <option data-tokens="43" value="43">Quảng Trị</option> 
                <option data-tokens="59" value="59">Sóc Trăng</option> 
                <option data-tokens="20" value="20">Sơn La</option> 
                <option data-tokens="61" value="61">Tây Ninh</option> 
                <option data-tokens="21" value="21">Thái Bình</option> 
                <option data-tokens="22" value="22">Thái Nguyên</option> 
                <option data-tokens="44" value="44">Thanh Hóa</option> 
                <option data-tokens="27" value="27">Thừa Thiên Huế</option> 
                <option data-tokens="60" value="60">Tiền Giang</option> 
                <option data-tokens="62" value="62">Trà Vinh</option> 
                <option data-tokens="23" value="23">Tuyên Quang</option> 
                <option data-tokens="63" value="63">Vĩnh Long</option> 
                <option data-tokens="24" value="24">Vĩnh Phúc</option> 
                <option data-tokens="25" value="25">Yên Bái</option> 
                <option data-tokens="26" value="26">Đà Nẵng</option> 
                <option data-tokens="32" value="32">Đắk Lắk</option> 
                <option data-tokens="33" value="33">Đắk Nông</option> 
                <option data-tokens="7" value="7">Điện Biên</option> 
                <option data-tokens="55" value="55">Đồng Nai</option> 
                <option data-tokens="54" value="54">Đồng Tháp</option>                       
            </select>
        </div>               

    </div>
    <div class="clearfix"></div>
    <div class="list_workonline">
        <?php if(!empty($lstonline)){
            foreach($lstonline as $n){ ?>
                <div class="item-uv-online">
                    <div class="item-uv-onlien-job"><a href="<?php echo base_url().vn_str_filter($n->Name).'-gv'.$n->UserID ?>"><i class="fa fa-online"></i><?php echo $n->TitleView ?> <?php echo $n->classname ?></a></div>
                    <div class="item-uv-name"><a href="<?php echo base_url().vn_str_filter($n->Name).'-gv'.$n->UserID ?>"><?php echo $n->Name ?> </a><span><span>Từ:</span> <?php echo number_format($n->Free)." vnđ/h" ?></span></div>
                    <div class="item-uv-online-chat">
                        <span class="uvonline-chat"><i class="fa fa-chat" ></i> Chat với gia sư</span>
                        <span class="uvonline-kinhnghiem"><span>Hình thức: </span><?php                                         
                        echo GetLearnType($n->WorkID);
                        ?></span>
                    </div>
                </div>
            <?php }
        } ?>
    </div>
</div> -->
<div class="box_job_search user">
   <h3><i class="fa fa-userl"></i> Tìm kiếm nâng cao</h3>
   <div class="main_sc">        
      <form action="" method="post">	
         <div class="input">
            <input type="text" name="findkey" id="findkey" placeholder="Nhập từ khóa..." />
        </div>
        <div class="input">
            <span class="icon-before"><img src="images/s_01.png" alt=""></span>
            <select id="monhoc" name="monhoc">
             <option value="">Chọn môn học</option>
             <?php 
             if(!empty($monhoc)){
                foreach($monhoc as $n){ ?>
                    <option value="<?php echo $n->ID ?>"><?php echo $n->SubjectName ?></option>
                <?php }
            }
            ?> 
        </select>
    </div>
    <div class="input">
        <span class="icon-before"><img src="images/s_01.png" alt=""></span>
        <select id="chudehoc" class="city_ab_tag">                        
            <option value="" >Chọn chủ đề môn học</option>

        </select>
    </div>
    <div class="input">
        <span class="icon-before" style="top:8px"><img src="images/s_02.png" alt=""></span>
        <select id="tinhthanh" class="mucluong_ab_tag">                        
            <option data-tokens="0" value="">Tỉnh thành</option>
            <option data-tokens="1" value="1">Hà Nội</option> 
            <option data-tokens="45" value="45">Hồ Chí Minh</option> 
            <option data-tokens="49" value="49">An Giang</option> 
            <option data-tokens="47" value="47">Bà Rịa Vũng Tàu</option> 
            <option data-tokens="3" value="3">Bắc Giang</option> 
            <option data-tokens="4" value="4">Bắc Kạn</option> 
            <option data-tokens="50" value="50">Bạc Liêu</option> 
            <option data-tokens="5" value="5">Bắc Ninh</option> 
            <option data-tokens="52" value="52">Bến Tre</option> 
            <option data-tokens="46" value="46">Bình Dương</option> 
            <option data-tokens="51" value="51">Bình Phước</option> 
            <option data-tokens="31" value="31">Bình Thuận</option> 
            <option data-tokens="30" value="30">Bình Định</option> 
            <option data-tokens="53" value="53">Cà Mau</option> 
            <option data-tokens="48" value="48">Cần Thơ</option> 
            <option data-tokens="6" value="6">Cao Bằng</option> 
            <option data-tokens="34" value="34">Gia Lai</option> 
            <option data-tokens="10" value="10">Hà Giang</option> 
            <option data-tokens="11" value="11">Hà Nam</option> 
            <option data-tokens="35" value="35">Hà Tĩnh</option> 
            <option data-tokens="9" value="9">Hải Dương</option> 
            <option data-tokens="2" value="2">Hải Phòng</option> 
            <option data-tokens="56" value="56">Hậu Giang</option> 
            <option data-tokens="8" value="8">Hòa Bình</option> 
            <option data-tokens="12" value="12">Hưng Yên</option> 
            <option data-tokens="28" value="28">Khánh Hòa</option> 
            <option data-tokens="57" value="57">Kiên Giang</option> 
            <option data-tokens="36" value="36">Kon Tum</option> 
            <option data-tokens="14" value="14">Lai Châu</option> 
            <option data-tokens="29" value="29">Lâm Đồng</option> 
            <option data-tokens="15" value="15">Lạng Sơn</option> 
            <option data-tokens="13" value="13">Lào Cai</option> 
            <option data-tokens="58" value="58">Long An</option> 
            <option data-tokens="17" value="17">Nam Định</option> 
            <option data-tokens="37" value="37">Nghệ An</option> 
            <option data-tokens="16" value="16">Ninh Bình</option> 
            <option data-tokens="38" value="38">Ninh Thuận</option> 
            <option data-tokens="18" value="18">Phú Thọ</option> 
            <option data-tokens="39" value="39">Phú Yên</option> 
            <option data-tokens="40" value="40">Quảng Bình</option> 
            <option data-tokens="41" value="41">Quảng Nam</option> 
            <option data-tokens="42" value="42">Quảng Ngãi</option> 
            <option data-tokens="19" value="19">Quảng Ninh</option> 
            <option data-tokens="43" value="43">Quảng Trị</option> 
            <option data-tokens="59" value="59">Sóc Trăng</option> 
            <option data-tokens="20" value="20">Sơn La</option> 
            <option data-tokens="61" value="61">Tây Ninh</option> 
            <option data-tokens="21" value="21">Thái Bình</option> 
            <option data-tokens="22" value="22">Thái Nguyên</option> 
            <option data-tokens="44" value="44">Thanh Hóa</option> 
            <option data-tokens="27" value="27">Thừa Thiên Huế</option> 
            <option data-tokens="60" value="60">Tiền Giang</option> 
            <option data-tokens="62" value="62">Trà Vinh</option> 
            <option data-tokens="23" value="23">Tuyên Quang</option> 
            <option data-tokens="63" value="63">Vĩnh Long</option> 
            <option data-tokens="24" value="24">Vĩnh Phúc</option> 
            <option data-tokens="25" value="25">Yên Bái</option> 
            <option data-tokens="26" value="26">Đà Nẵng</option> 
            <option data-tokens="32" value="32">Đắk Lắk</option> 
            <option data-tokens="33" value="33">Đắk Nông</option> 
            <option data-tokens="7" value="7">Điện Biên</option> 
            <option data-tokens="55" value="55">Đồng Nai</option> 
            <option data-tokens="54" value="54">Đồng Tháp</option>                         
        </select>
    </div>
<div class="input">
    <span class="icon-before"><img src="images/icongioitinh.png" alt=""></span>
    <select id="gioitinh" class="ngoaingu_ab_tag">                        
        <option value="" ></option>
        <option value="1">Nam</option>
        <option value="2">Nữ</option>                         
    </select>
</div>
<div class="input">
    <span class="icon-before" style="top:8px"><img src="images/iconhinhthuchoc.png" alt=""></span>
    <select id="hinhthuchoc" class="kinhnghiem_ab_tag">                        
        <option value="">Chọn hình thức dạy</option>
        <option value="1">Offline) Gặp mặt</option>
        <option value="2">Online) Trực tuyến</option>                         
    </select>
</div>        									
<center><input class="btn btnsearchuv" type="button" name="submit" value="Tìm kiếm"></center>
</form>
</div>
</div>
<!-- <div class="timkiemungvien registerclass">
    <div class="box-f box-document">
        <h3 class="title">Gửi email cho ứng viên</h3>
        <ul>
            <li>Kết nối, tuyển dụng và quản lý nhân tài</li>
            <li>Talent Solution - Giải pháp tuyển dụng toàn diện dành cho doanh nghiệp được sáng tạo độc quyền bởi timviec365.vn</li>
        </ul>
        <span class="btnuvboxcreatedocument">Gửi email ngay</span>
    </div>
</div> -->

</div>


<div class="modal fade capnhattrangthaiclass" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <div class="modal-title"><b>Mời dạy lớp</b></div>
          <input type="hidden" id="txtuserid" name="txtuserid" value="<?php echo $item->UserID ?>" />
      </div>
      <div class="modal-body">
        <div class="col-md-12">
            <div class="row padd-top-15 padd-bot-5" style="">                    
                <div class="col-md-12">
                    <div class="form-group" style="margin:5px auto;">
                        <label class="control-label">Chọn lớp</label>
                        <select id="txtchonlop" name="txtchonlop" class="form-control"></select>
                    </div>
                </div>
            </div>                
        </div>            
    </div>
    <div class="modal-footer" style="text-align:left;">
        <button type="button" id="btnhuy" class="btn btn-primary btn-warning" data-dismiss="modal" style="padding: 6px 20px;width: 109px;margin-left: 5px;display: inline-block;">Hủy</button>
        <button type="button" class="btn btn-primary btn-success" id="btnmoigiaovien" style="padding: 6px 20px;width: 143px;margin-left: 7px;display: inline-block;">Lưu thay đổi</button>
    </div>
</div>
</div>
</div>
<!-- <a class="btn btn-primary" data-toggle="modal" href='#modal-id'>Đăng nhập gia sư</a> -->
<div class="modal fade" id="modal_login">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title text-center">ĐĂNG NHẬP TÀI KHOẢN GIA SƯ</h4>
            </div>
            <div class="modal-body">
                    <form action="" method="POST" role="form" id="form-login">
                    <div class="form-group" id="div_email_login">
                        <input type="text" class="form-control" id="useremail" name="useremail"  placeholder="Nhập địa chỉ email của bạn">
                    </div>
                    <div class="form-group" id="div_password_login">
                        <input type="password" class="form-control" id="userpassword" name="userpassword" placeholder="Nhập mật khẩu">
                    </div>
                    <div class="info_loginone pull-right" style="margin-right: 17px;">
                        <span class="howto">Bạn chưa có tài khoản?</span>
                        <span class="btnregisteruv">Đăng ký</span></a>
                    </div>
                    </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="phuhuynhlogin12">Đăng Nhập</button>
            </div>
        </div>
    </div>
</div>
<script src="js/theme6/jquery.slimscroll.min.js" type="text/javascript"></script>
<script>
    $(document).ready(function() {
        var configulr='<?php echo site_url() ?>';
        $('#monhoc').select2({ width: '100%',placeholder:"Chọn môn học" });
        $('#chudehoc').select2({ width: '100%',placeholder: "Chọn chủ đề"});
        $('#gioitinh').select2({ width: '100%',placeholder:"Chọn giới tính" });
        $('#hinhthuchoc').select2({ width: '100%',placeholder:"Chọn hình thức học" });
        $('#tinhthanh').select2({ width: '100%',placeholder:"Chọn tỉnh thành" });
        $('#monhoc').change(function () {
            var monhoc=$(this).val();
            if(monhoc != '' || monhoc !=0){
                $.ajax(
                {

                  url: configulr+"/site/Ajaxchude",
                  type: "POST",
                  data: { idmon: monhoc },
                  dataType: 'json',
                  beforeSend: function () {
                      $("#boxLoading").show();
                  },
                  success: function (obj) {

                   if(obj.kq != ''){
                    var reponse=obj.kq;
                    $("#chudehoc option").remove();                        
                    $("#chudehoc").append(obj.data);                           

                    $("#chudehoc").select2();
                }else{
                    /*alert('không tồn tại');*/
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
        $('.btnsearchuv').on('click',function(){
            var findkey=$('#findkey').val();
            var strsubj=$('#monhoc').val();
            var strtopic=$('#chudehoc').val();
            var strtinhthanh=$('#tinhthanh').val();
            var strgioitinh=$('#gioitinh').val();
            var strtype=$('#hinhthuchoc').val();

            $.ajax(
            {

              url: configulr+"/site/searchclass",
              type: "POST",
              data: { key:findkey,subject:strsubj,topic:strtopic,place:strtinhthanh,type:strtype,sex:strgioitinh },
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
                  alert("error");
              },
              complete: function () {
                  $("#boxLoading").hide();
              }
          }); 
        });
        $('.btnluuhosogv').on('click',function(){
            $.ajax(
            {

              url: configulr+"/site/ajaxusersaveuser",
              type: "POST",
              data: { giaovien:$('#txtuserid').val() },
              dataType: 'json',
              beforeSend: function () {
                  $("#boxLoading").show();
              },
              success: function (reponse) {
                  if (reponse.kq == true) {                          
                      alert(reponse.data);
                  }else{
                    alert('Lưu hồ sơ thành công');
                }

            },
            error: function (xhr) {
              alert("error");
          },
          complete: function () {
              $("#boxLoading").hide();
          }
      }); 
        });
        $('.btnviewcontactinfo').on('click',function(){
            var trace=$(this).attr('data-val');
            $.ajax(
            {

              url: configulr+"/site/ajaxviewcontactinfo",
              type: "POST",
              data: { keyview:trace },
              dataType: 'json',
              beforeSend: function () {
                  $("#boxLoading").show();
              },
              success: function (reponse) {
                  if (reponse.kq == true) {                          
                      $('#txtviewphone').text('<?php echo $item->Phone; ?>');
                      $('#txtviewemail').text('<?php echo $item->Email; ?>');
                  }else{
                    $('#modal_login').modal('show');
                }

            },
            error: function (xhr) {
              alert("error");
          },
          complete: function () {
              $("#boxLoading").hide();
          }
      }); 
        });

        //btn dang ki
        $('.btnregisteruv').click(function(event) {
           window.location.href = '<?php echo base_url(); ?>dang-ky-nguoi-dung';
        });
        $('#btnmoigiaovien').on('click',function(){
            if($('#txtchonlop').val()!=''){
                $.ajax(
                {

                  url: configulr+"/site/ajaxaddclassvsusers",
                  type: "POST",
                  data: { lophoc:$('#txtchonlop').val(),giaovien:$('#txtuserid').val() },
                  dataType: 'json',
                  beforeSend: function () {
                      $("#boxLoading").show();
                  },
                  success: function (reponse) {
                      if (reponse.kq == true) {
                          $('#myModal').modal('hide');
                          alert(reponse.data);
                      }

                  },
                  error: function (xhr) {
                      alert("error");
                  },
                  complete: function () {
                      $("#boxLoading").hide();
                  }
              }); 
            }else{
                alert('Bạn phải chọn lớp');
            }
        });
        $('.btnmoidayngay').on('click',function(){
            $.ajax({

              url: configulr+"/site/ajaxgetclassnotteacherbyuserid",
              type: "POST",
              data: { },
              dataType: 'json',
              beforeSend: function () {
                  $("#boxLoading").show();
              },
              success: function (reponse) {
                  if (reponse.kq == true) {
                      $('#txtchonlop').append(reponse.data);
                      $('#myModal').modal('show');
                  }else{
                    alert('Bạn không còn lớp học trống để mời gia sư');
                }

            },
            error: function (xhr) {
              alert("error");
          },
          complete: function () {
              $("#boxLoading").hide();
          }
      });
        });
        $('.list_workonline').slimscroll({
          height: '500'

      });
        $('#tag_city').select2();
        $("#keyworktag").keypress(function (e) {
            if (e.which === 13) {
                e.preventDefault();
                $.ajax(
                {

                  url: configulr+"/site/ajaxlstteacher",
                  type: "POST",
                  data: { keytag:$("#keyworktag").val(),city:$('#tag_city').val() },
                  dataType: 'json',
                  beforeSend: function () {
                      $("#boxLoading").show();
                  },
                  success: function (reponse) {
                    $(".list_workonline div").remove();
                    /*$("#list_workonline").innerHTML = reponse.data;*/                        
                    $(".list_workonline").append(reponse.data); 


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
        $('#tag_city').change(function () {
            var cityval=$(this).val();
            if(cityval != '' || cityval !=0){
             $.ajax(
             {

              url: configulr+"/site/ajaxlstteacher",
              type: "POST",
              data: { keytag:$("#keyworktag").val(),city:cityval },
              dataType: 'json',
              beforeSend: function () {
                  $("#boxLoading").show();
              },
              success: function (reponse) {
                $(".list_workonline div").remove();
                /*$("#list_workonline").innerHTML = reponse.data;*/                        
                $(".list_workonline").append(reponse.data);
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
    });
</script>