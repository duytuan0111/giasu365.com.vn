<?php ?>
<section class="padd-0">
<div class="container">
    <div class="row">
        <div class="manager-col-left col-md-3 col-sm-12 width-250">
            <?php $this->load->view('left1'); ?>
        </div>
        <div class="manager-col-right col-md-9 col-sm-12">
            <div class="content-right right-uv" style="min-height:300px;">
            <div class="fromdatime">
                    <div class="clr" style="height:0px"></div>
                    <!--<div class="form-control">
                        <input type="text" id="datepiker" name="datepiker" placeholder="Chọn khoảng thời gian" />
                        <i class="fa fa-datetime"></i> 
                    </div>-->
                    <div class="countitem">Tổng số: <?php echo $giaovienluu->giasumoiday ?></div>
                </div>
               <div class="box-file-newest uvrecruitjob">
                    <div class="title"><i class="fa fa-man-brown"></i> Danh sách gia sư đã mời dạy                    
                    </div>
                    <table class="uv-ungtuyen box-has-news teacherinvite">
                        <thead>
                        <tr>
                            
                            <th style="width:40%">Gia sư/Môn học</th>
                            <th style="width:13%">Hình thức dạy</th>
                            <th style="width:15%">Mức học phí</th>
                            <th style="width:17%">Ngày mời dạy</th>
                            <th style="width:15%">Trạng thái</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php if(!empty($giasudaluu)){
                                foreach($giasudaluu as $n){
                                    
                                
                            ?>
                                <tr>
                                
                                <td><a href="<?php echo base_url().vn_str_filter($n->Name).'-gv'.$n->UserID ?>"><?php echo $n->Name; ?></a>
                                    <span><?php echo $n->TitleView; ?></span>
                                </td>
                                <td><?php echo GetLearnType($n->WorkID) ?></td>                                
                                <td><?php echo "Từ: ".number_format($n->Free)." vnđ/h"; ?></td>
                                <td><?php echo date('d/m/Y',strtotime($n->ngaymoi)) ?></td>
                                <td >
                                   <?php if($n->Active ==1){echo "Chưa phản hồi";}else{echo "Đã phản hồi";} ?> 
                                </td>
                            </tr>
                            <?php } } ?>                            
                            
                        </tbody>
                        <?php //if(!empty($giasudaluu) && count($giasudaluu) >= 6){ ?>
                           <tfoot>
                            <tr>
                                <td colspan="5">
                                    <div class="loadmoreitem"><input type="hidden" id="txtpage" name="txtpage" value="2" /><span id="btnloadmoreitem" class="btn-link"><i class="fa fa-arrow-loadmore"></i> Xem thêm</span></div>
                                </td>
                            </tr>
                        </tfoot> 
                        <?php// } ?>
                        
                    </table>
                    
                </div> 
            </div>
        </div>
    </div>
</div>
</section>
<script>
    $(document).ready(function () {
        var configulr='<?php echo base_url(); ?>';
        $('#btnloadmoreitem').on('click',function(){
            $.ajax(
                      {                          
                          url: configulr+"site/ajaxloadmoreteacherinvite",
                          type: "POST",
                          data: { 
                            page: $('#txtpage').val()
                          },
                          dataType: 'json',
                          beforeSend: function () {
                              $("#boxLoading").show();
                          },
                          success: function (obj) {
                             
                             if(obj.kq ==true){
                                var j=parseInt($('#txtpage').val())+1;
                                $('.teacherinvite tbody').append(obj.data);
                                $('#txtpage').val(j);
                                }else{
                                   alert('Đã tải toàn bộ lớp bạn đã lưu');
                                }
                          },
                          error: function (xhr) {
                              alert("error");
                          },
                          complete: function () {
                              
                          }
                      }); 
        });
        
        
        });
 </script>