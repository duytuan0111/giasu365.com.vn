<?php
$CI=&get_instance();
$CI->load->model('site/site_model');
$type = 3;
if(isset($_SESSION['UserInfo']) || !empty($_SESSION['UserInfo'])){
    $tg=$_SESSION['UserInfo'];
    if($tg['Type']==2){
        $urlgiasu='2';
    }else{
        $urlgiasu='1';
    }
    //
    if ($tg['UserType'] == 1) {
        $type = 1;
    } else {
        $type = 0;
    }
    }
    $userid=$tg['UserId'];
            $kq=$CI->site_model->countclassnotteacherbyuserid($userid);
            $trace="class_".$item->ClassID;
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
                 <h3><i class="fa fa-ntd-logout"></i> Thông tin lớp học</h3>         
              </div>
            </div>             
        </div>
        <div class="row">
            <div class="col-md-2 col-sm-12 padd-r-0">
                <div class="detailjob-header">
                    <?php if(!empty($item->Image)){?>
                                        <img class="img-responsive" src="<?php gethumbnail(geturlimageAvatar(strtotime($item->CreateDate)).$item->Image,$item->Image,strtotime($item->CreateDate),180,180,100) ?>" onerror='this.onerror=null;this.src="images/no-image2.png";' />
                                    <?php }else{ ?>
                                     <img class="img-responsive" src="images/no-image2.png" alt="<?php echo $item->Name ?>" onerror='this.onerror=null;this.src="images/no-image2.png";' />
                                     <?php } ?>
                </div>
            </div>
            <div class="col-md-10 col-sm-12 padd-l-10">
                <div class="detailjob-header">                    
                    <div class="detailjob-info col-md-8 col-sm-12 padd-l-0">
                        <h1 class="detailjob-name"><a><i class="fa fa-online-big" data-toggle="tooltip" title="" data-original-title="Phụ huynh đang online"></i> <?php echo $item->ClassTitle ?></a></h1>
                        <div class="detailjob-cty"><i class="fa fa-shield" data-toggle="tooltip" data-placement="top" title="" data-original-title="Phụ huynh đã xác thực"></i>Tạo bởi:<a href=""> <?php echo $item->Name; ?></a><span>Mã số lớp: ML<?php echo $item->ClassID ?></span><span>Ngày tạo: <?php echo date("d/m/Y",strtotime($item->CreateDate)) ?></span></div>
                        <div class="detailjob-cty">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Trạng thái: <a class="font-bold"><?php 
                        if($item->dongyday > 0){echo "Đã có giáo viên";}else{echo "Đang tìm giáo viên";}
                        ?></a></div>
                        <div class="detailjob-salary"><i class="fa fa-usd-bold"></i><strong>Mức học phí: </strong> từ <?php echo number_format($item->Money)." vnđ/h" ?></div>
                        <div class="detailjob-location"><i class="fa fa-map-marker"></i><strong>Địa chỉ: </strong><?php if(!empty($item->Address)){echo $item->Address;}else{echo $item->Addressu;} ?></div>
                    </div>
                    <div class="detailjob-social col-md-4 col-sm-12">
                        <span class="jobview"><?php if($item->denghiday > 0){echo "Có ".$item->denghiday." đề nghị dạy";}else{echo "Chưa có đề nghị nào";} ?></span>
                        
                        <div class="divbtn">
                        <?php if($type == 1){ ?>
                        <span class="btn btndenghiday" data-val="<?php echo $item->ClassID ?>">Đề nghị dạy</span><?php } else { ?><span class="btn btnactive">Đăng yêu cầu mới</span> <?php } ?>
                        </div>                        
                        
                        <ul>
                        <?php
                            # Using SCRIPT_NAME
                            $queryString = $_SERVER['QUERY_STRING'];
                            // echo "Query: " .base_url(). $queryString;
                            ?>
                            <li><div class="fb-like fb_iframe_widget" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button" data-action="like" data-size="small" data-show-faces="true" data-share="true" fb-xfbml-state="rendered" fb-iframe-plugin-query="action=like&amp;app_id=&amp;container_width=0&amp;href=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;layout=button&amp;locale=vi_VN&amp;sdk=joey&amp;share=true&amp;show_faces=true&amp;size=small"><span style="vertical-align: bottom; width: 112px; height: 20px;"><iframe name="ff41c8dbc049a8" width="1000px" height="1000px" frameborder="0" allowtransparency="true" allowfullscreen="true" scrolling="no" allow="encrypted-media" title="fb:like Facebook Social Plugin" src="https://www.facebook.com/v3.1/plugins/like.php?action=like&amp;app_id=&amp;channel=https%3A%2F%2Fstaticxx.facebook.com%2Fconnect%2Fxd_arbiter%2Fr%2F__Bz3h5RzMx.js%3Fversion%3D42%23cb%3Df2afb4f993516a%26domain%3Dlocalhost%26origin%3Dhttp%253A%252F%252Flocalhost%253A9001%252Ff25d959f42fbcb8%26relation%3Dparent.parent&amp;container_width=0&amp;href=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;layout=button&amp;locale=vi_VN&amp;sdk=joey&amp;share=true&amp;show_faces=true&amp;size=small" style="border: none; visibility: visible; width: 112px; height: 20px;" class=""></iframe></span></div></li>
                            <li><?php echo '<a aria-label="facebook" rel="nofollow" href="https://www.facebook.com/sharer/sharer.php?u=https://timviec365.vn/ssl/'. $queryString . '"  target="_blank"><i class="fa fa-facebook-square"></i></a> '?></li>
                            <li><?php echo '<a aria-label="facebook" rel="nofollow" href="http://www.twitter.com/share?url=https://timviec365.vn/ssl/'. $queryString . '" target="_blank"><i class="fa fa-twitter-square"></i></a>'?></li>

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
                    <div class="detailjob-body">
                        <h3 class="title">Thông tin cơ bản</h3>
                        <div class="detailjob-body1">
                            <div class="col-md-4">
                                <p><strong>Số học viên: </strong> <?php echo $item->Student ?></p>
                                
                                <p><strong>Môn học: </strong> <?php echo $item->SubjectName ?></p>
                                
                            </div>
                            <div class="col-md-4">
                                <?php
                              $num = array_count_values(array(
                                $item->CMonMorning,
                                $item->CMonAfter,
                                $item->CMonNight,
                                $item->CTueMorning,
                                $item->CTueAfter,
                                $item->CTueNight,
                                $item->CWeMorning,
                                $item->CWeAfter,
                                $item->CWeNight,
                                $item->CThuMorning,
                                $item->CThuAfter,
                                $item->CThuNight,
                                $item->CFriMorning,
                                $item->CFriAfter,
                                $item->CFriNight,
                                $item->CSatMorning,
                                $item->CSatAfter,
                                $item->CSatNight,
                                $item->CSunMorning,
                                $item->CSunAfter,
                                $item->CSunNight
                            ));
                            ?>
                                <p><strong>Số buổi trong tuần: </strong> <?php echo $num[1]; ?></p>
                                <p><strong>Số giờ học 1 buổi: </strong> <?php echo $item->Hours ?></p>
                               
                            </div>
                            <div class="col-md-4">
                                 <p><strong>Hình thức dạy: </strong> <?php $tg=explode(',',$item->LearnType);
                                    echo GetLearnType($tg[0]);
                                ?></p>
                                <p><strong>Tìm giáo viên: </strong>  
                                <?php 
                                    $tg=explode(',',$item->TeacherSex);
                                    $sex = '';
                                    foreach ($tg as $key => $value) {
                                        $sex .= GetSex($tg[$key]).", ";
                                    }

                                    echo rtrim($sex,', ');
                                ?></p>
                            </div>
                        </div>
                        <div class="clr"></div>
                        <h3 class="title">Chi tiết nội dung</h3>
                        <div class="detaijob-body2">
                            <p><?php echo nl2br($item->DescClass) ?></p>
                        </div>
                        <h3 class="title">Lịch học dự kiến <small>(Có thể thỏa thuận)</small></h3>
                        <div class="detaijob-body2 lichday">
                             <div class="col-md-15 col-sm-12 padd-l-5 padd-r-5">
                                <div>Thứ 2
                                </div>
                                <ul>
                                    <li>
                                        <label class="<?php if($item->CMonMorning ==0){ echo""; }else{ echo "active";}?>">Sáng</label>                                        
                                    </li>
                                    <li>
                                        
                                        <label class="<?php if($item->CMonAfter ==0){ echo""; }else{ echo "active";}?>">Chiều</label>
                                        
                                    </li>
                                    <li>
                                        <label class="<?php if($item->CMonNight ==0){ echo""; }else{ echo "active";}?>">Tối</label>
                                    </li>
                                </ul>
                             </div> 
                             <div class="col-md-15 col-sm-12 padd-l-5 padd-r-5">
                             <div>Thứ 3
                                </div>
                                <ul>
                                    <li>
                                        <label class="<?php if($item->CTueMorning ==0){ echo""; }else{ echo "active";}?>">Sáng</label>                                        
                                    </li>
                                    <li>
                                        
                                        <label class="<?php if($item->CTueAfter ==0){ echo""; }else{ echo "active";}?>">Chiều</label>
                                        
                                    </li>
                                    <li>
                                        <label class="<?php if($item->CTueNight ==0){ echo""; }else{ echo "active";}?>">Tối</label>
                                    </li>
                                </ul>
                             </div>
                             <div class="col-md-15 col-sm-12 padd-l-5 padd-r-5">
                             <div>Thứ 4
                                </div>
                                <ul>
                                    <li>
                                        <label class="<?php if($item->CWeMorning ==0){ echo""; }else{ echo "active";}?>">Sáng</label>                                        
                                    </li>
                                    <li>
                                        
                                        <label class="<?php if($item->CWeAfter ==0){ echo""; }else{ echo "active";}?>">Chiều</label>
                                        
                                    </li>
                                    <li>
                                        <label class="<?php if($item->CWeNight ==0){ echo""; }else{ echo "active";}?>">Tối</label>
                                    </li>
                                </ul>
                             </div>
                             <div class="col-md-15 col-sm-12 padd-l-5 padd-r-5">
                                <div>Thứ 5
                                </div>
                                <ul>
                                    <li>
                                        <label class="<?php if($item->CThuMorning ==0){ echo""; }else{ echo "active";}?>">Sáng</label>                                        
                                    </li>
                                    <li>
                                        
                                        <label class="<?php if($item->CThuAfter ==0){ echo""; }else{ echo "active";}?>">Chiều</label>
                                        
                                    </li>
                                    <li>
                                        <label class="<?php if($item->CThuNight ==0){ echo""; }else{ echo "active";}?>">Tối</label>
                                    </li>
                                </ul>
                             </div>
                             <div class="col-md-15 col-sm-12 padd-l-5 padd-r-5">
                                <div>Thứ 6
                                </div>
                                <ul>
                                    <li>
                                        <label class="<?php if($item->CFriMorning ==0){ echo""; }else{ echo "active";}?>">Sáng</label>                                        
                                    </li>
                                    <li>
                                        
                                        <label class="<?php if($item->CFriAfter ==0){ echo""; }else{ echo "active";}?>">Chiều</label>
                                        
                                    </li>
                                    <li>
                                        <label class="<?php if($item->CFriNight ==0){ echo""; }else{ echo "active";}?>">Tối</label>
                                    </li>
                                </ul>
                             </div>
                             <div class="col-md-15 col-sm-12 padd-l-5 padd-r-5">
                                <div>Thứ 7
                                </div>
                                <ul>
                                    <li>
                                        <label class="<?php if($item->CSatMorning ==0){ echo""; }else{ echo "active";}?>">Sáng</label>                                        
                                    </li>
                                    <li>
                                        
                                        <label class="<?php if($item->CSatAfter ==0){ echo""; }else{ echo "active";}?>">Chiều</label>
                                        
                                    </li>
                                    <li>
                                        <label class="<?php if($item->CSatNight ==0){ echo""; }else{ echo "active";}?>">Tối</label>
                                    </li>
                                </ul>
                             </div>
                             <div class="col-md-15 col-sm-12 padd-l-5 padd-r-5">
                                <div>Chủ nhật
                                </div>
                                <ul>
                                    <li>
                                        <label class="<?php if($item->CSunMorning ==0){ echo""; }else{ echo "active";}?>">Sáng</label>                                        
                                    </li>
                                    <li>
                                        
                                        <label class="<?php if($item->CSunAfter ==0){ echo""; }else{ echo "active";}?>">Chiều</label>
                                        
                                    </li>
                                    <li>
                                        <label class="<?php if($item->CSunNight ==0){ echo""; }else{ echo "active";}?>">Tối</label>
                                    </li>
                                </ul>
                             </div>                                         
                        </div>
                    </div>
                    </div>
                    <ul class="blockfun">
                        <!-- <li class="color-orange">
                            <a><i class="fa fa-chat-white"></i> Gửi tin nhắn</a>
                        </li> -->
                        <li>
                            <a data-val="<?php echo "class_".$item->ClassID ?>" class="btnviewcontactinfo"><i class="fa fa-view-att-white"></i> Xem liên hệ</a>
                        </li>
                        <li>
                            <a class="btnsaveclass" data-val="<?php echo $item->ClassID ?>"><i class="fa fa-block-download"></i> Lưu hồ sơ</a>
                        </li>
                        <?php if($type== 1){ ?>
                        <li>
                            <a class="btndenghiday" data-val="<?php echo $item->ClassID ?>"><i class="fa fa-uv-upload-small"></i> Đề nghị dạy</a>
                        </li>
                        <?php } ?>
                        <li>
                            <a><i class="fa fa-envelope-o"></i> Gửi email</a>
                        </li>
                    </ul>
            </div>
            <div class="col-md-30 col-sm-12 col-right-search padd-l-0">
                <div class="box_job_search user">
        	        <h3><i class="fa fa-userl"></i> Tìm kiếm lớp dạy</h3>
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
                <div class="timkiemungvien registerclass">
                    <div class="box-f box-document">
                        <h3 class="title">Gửi email cho ứng viên</h3>
                        <ul>
                            <li>Kết nối, tuyển dụng và quản lý nhân tài</li>
                            <li>Talent Solution - Giải pháp tuyển dụng toàn diện dành cho doanh nghiệp được sáng tạo độc quyền bởi timviec365.vn</li>
                        </ul>
                        <span class="btnuvboxcreatedocument">Gửi email ngay</span>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</section>
<section class="bgbrown padd-0">
    <div class="container">
        <div class="row">
            <h3 class="title-relative"><span>Danh sách lớp học liên quan</span></h3>
        </div>
        
    </div>
</section>
<section class="padd-0">
    <div class="container relativeitem">        
        <div class="main_tg">
                    <?php if(!empty($relative)){
                  foreach($relative as $n){
                    ?>
                    
                        <div class="col-md-4 col-sm-12 padd-l-5 padd-r-5">
                            <div class="item_hd vip" data-object="<?php echo $n->UserID ?>" data-type="<?php echo $n->UserID ?>">
                               <div class="company_logo">
                                  <a href="<?php echo base_url().'lop-hoc/'.vn_str_filter($n->ClassTitle).'-'.$n->ClassID ?>" title="<?php echo $n->ClassTitle; ?>">
                                    <?php if(!empty($n->Image)){?>
                                        <img src="<?php gethumbnail(geturlimageAvatar(strtotime($n->CreateDate)).$n->Image,$n->Image,strtotime($n->CreateDate),63,63,100) ?>" onerror='this.onerror=null;this.src="images/no-image2.png";' />
                                    <?php }else{ ?>
                                     <img src="images/no-image2.png" alt="#" onerror='this.onerror=null;this.src="images/no-image2.png";' />
                                     <?php } ?>
                                  </a>
                               </div>
                               <div class="right_item">
                                  <a href="<?php echo base_url().'lop-hoc/'.vn_str_filter($n->ClassTitle).'-'.$n->ClassID ?>" title="#" class="title_new"><i class="fa fa-online"></i><?php echo $n->ClassTitle ?></a>
                                  <a href="" title="" class="title_co"><i class="fa fa-giasuname"></i><?php echo $n->Name ?> <i class="fa fa-chat"></i></a>
                                  
                                  <span class="time_item"><i class="fa fa-makerbrow"></i> Địa điểm: <span><?php echo $n->CityName ?></span></span>
                               </div>
                               <span class="oldview">Đã xem</span>
                            </div>
                        </div>
                  <?php
                     } } 
                    ?>
                    
                 </div> 
                 <div class="pull-right">
                 <a href="<?php echo base_url() ?>tim-kiem-lop-hoc" class="span_hd">Xem thêm lớp học liên quan <img src="images/ic_muiten.png" alt="#"></a>
                 </div>       
    </div>
</section>
<div class="modal fade capnhattrangthaiclass" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <div class="modal-title"><b>Cập nhật trạng thái</b></div>
          <input type="hidden" id="txtclassid" name="txtclassid" />
          <input type="hidden" id="txtid" name="txtid" /> 
        </div>
        <div class="modal-body">
            <div class="col-md-12">
                <div class="row padd-top-15 padd-bot-5" style="">                    
                    <div class="col-md-12">
                        
                        <?php if($logpoint!=""){ ?>
                        <div class="form-group" style="margin:5px auto;">
                            <label class="control-label">SĐT: <?php echo $item->Phone; ?></label>
                            </div>
                            <div class="form-group" style="margin:5px auto;">
                            <label class="control-label">Email: <?php echo $item->Email; ?></label>
                            </div>
                        <?php }else{ ?>
                         <div class="form-group" style="margin:5px auto;">
                            <label class="control-label" id="txtviewphone"></label>
                            </div>
                            <div class="form-group" style="margin:5px auto;">
                            <label class="control-label" id="txtviewemail"></label>
                            </div>
                        <?php } ?>
                            
                        
                    </div>
                </div>                
            </div>            
        </div>
        <div class="modal-footer" style="text-align:left;">
            <button type="button" id="btnhuy" class="btn btn-primary btn-warning" data-dismiss="modal" style="padding: 6px 20px;width: 109px;margin-left: 5px;display: inline-block;">Đóng</button>
            
        </div>
      </div>
    </div>
  </div>
<script>
    $(document).ready(function() {
       var configulr='<?php echo site_url() ?>';
       $('#monhoc').select2({ width: '100%',placeholder:"Chọn môn học" });
       $('#chudehoc').select2({ width: '100%',placeholder: "Chọn chủ đề"});
       $('#gioitinh').select2({ width: '100%',placeholder:"Chọn giới tính" });
       $('#hinhthuchoc').select2({ width: '100%',placeholder:"Chọn hình thức học" });
       $('#tinhthanh').select2({ width: '100%',placeholder:"Chọn tỉnh thành" });
       // dang yeu cau moi
       $('.btnactive').on('click', function(event) {
          var type = <?php echo isset($type) ? $type : 3 ?>;
          if (type == 1) {
            if(confirm('Bạn có muốn đăng nhập phụ huynh để thực hiện chức năng này không?')) {
                window.location.href = configulr+'phu-huynh-dang-nhap';
            }
          }
          else {
            window.location.href = configulr+'mn-hv-dang-tin';
          }
       });
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
       $('.btnviewcontactinfo').on('click',function(){
        var trace=$(this).attr('data-val');
        var checklog='<?php echo $logpoint; ?>';
        if(checklog==""){
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
                          $('#txtviewphone').text('SĐT: <?php echo $item->Phone; ?>');
                          $('#txtviewemail').text('Email: <?php echo $item->Email; ?>');
                          $('#myModal').modal('show');
                      }else{
                        alert('Bạn cần đăng nhập để xem liên hệ');
                        
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
            $('#myModal').modal('show');
        }
        
    });
       $('.btndenghiday').on('click',function(){
            $.ajax(
              {
                  
                  url: configulr+"/site/ajaxuservsclass",
                  type: "POST",
                  data: { classid: $(this).attr('data-val') },
                  dataType: 'json',
                  beforeSend: function () {
                      $("#boxLoading").show();
                  },
                  success: function (obj) {
                     
                     if(obj.kq ==true){
                        alert(obj.data);
                        }else{
                            alert('Bạn đã gửi thông tin ứng tuyển dạy lớp học này');
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
       $('.btnsaveclass').on('click',function(){
            $.ajax(
              {
                  
                  url: configulr+"/site/ajaxusersaveclass",
                  type: "POST",
                  data: { classid: $(this).attr('data-val') },
                  dataType: 'json',
                  beforeSend: function () {
                      $("#boxLoading").show();
                  },
                  success: function (obj) {
                     
                     if(obj.kq ==true){
                        alert(obj.data);
                        }else{
                            alert('Bạn cần đăng nhập hoặc bạn phải là giáo viên');
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
       $('.btnsearchuv').on('click',function(){
        var findkey=$('#findkey').val();
        var strsubj=$('#monhoc').val();
        var strtopic=$('#chudehoc').val();
        var strtinhthanh=$('#tinhthanh').val();
        var strgioitinh=$('#gioitinh').val();
        var strtype=$('#hinhthuchoc').val();
        
        $.ajax(
              {
                  
                  url: configulr+"/site/searchteacher",
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
    });
</script>