<?php
$website_title = $this->db->get_where('settings' , array('type'=>'website_title'))->row()->description;
$user_details = $this->user_model->get_all_users($this->session->userdata('user_id'))->row_array();
$text_align     = $this->db->get_where('settings', array('type' => 'text_align'))->row()->description;
$logged_in_user_role = strtolower($this->session->userdata('role'));
?>

<!DOCTYPE html>
<html lang="en" dir="<?php if ($text_align == 'right-to-left') echo 'rtl';?>">
<head>

  <title><?php echo $page_title;?> | <?php echo $website_title;?></title>
  <!-- all the meta tags -->
  <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <meta content="" name="description" />
  <meta content="" name="author" />

  <!-- all the css files -->
  <link rel="shortcut icon" href="<?php echo base_url();?>assets/global/favicon.png">
<!-- Neon theme css -->
<link rel="stylesheet" href="<?php echo base_url('assets/backend/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css');?>" type="text/css">
<link rel="stylesheet" href="<?php echo base_url('assets/backend/css/font-icons/entypo/css/entypo.css');?>" type="text/css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600" type="text/css">
<link rel="stylesheet" href="<?php echo base_url('assets/backend/css/bootstrap.css');?>" type="text/css">
<link rel="stylesheet" href="<?php echo base_url('assets/backend/css/neon-core.css');?>" type="text/css">
<link rel="stylesheet" href="<?php echo base_url('assets/backend/css/neon-theme.css');?>" type="text/css">
<link rel="stylesheet" href="<?php echo base_url('assets/backend/css/neon-forms.css');?>" type="text/css">
<link rel="stylesheet" href="<?php echo base_url('assets/backend/css/custom.css');?>" type="text/css">
<link rel="stylesheet" href="<?php echo base_url('assets/backend/js/vertical-timeline/css/component.css');?>" type="text/css">
<link rel="stylesheet" href="<?php echo base_url('assets/backend/js/datatable/css/dataTables.bootstrap.css');?>" type="text/css"/>
<link rel="stylesheet" href="<?php echo base_url('assets/backend/js/datatable/buttons/css/buttons.bootstrap.css');?>" type="text/css"/>
<link rel="stylesheet" href="<?php echo base_url('assets/backend/js/wysihtml5/bootstrap-wysihtml5.css');?>" type="text/css">
<link rel="stylesheet" href="<?php echo base_url('assets/backend/js/dropzone/dropzone.css');?>" type="text/css">
<link rel="stylesheet" href="<?php echo base_url('assets/backend/js/daterangepicker/daterangepicker-bs3.css');?>" type="text/css">
<!-- font awesome 5 -->
<link href="<?php echo base_url('assets/backend/css/fontawesome-all.min.css') ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url('assets/backend/css/font-awesome-icon-picker/fontawesome-iconpicker.min.css') ?>" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css">
<link rel="stylesheet" href="<?php echo base_url('assets/backend/js/select2/select2.min.css');?>" type="text/css"/>
<link href="<?php echo base_url('assets/backend/css/main.css') ?>" rel="stylesheet" type="text/css" />

<!-- jquery text editor  -->
<link href="<?php echo base_url('assets/jquery_text_editor/trumbowyg.min.css') ?>" rel="stylesheet" type="text/css" />
<!-- RTL Theme -->
<?php if ($text_align == 'right-to-left') : ?>
    <link rel="stylesheet" href="<?php echo base_url('assets/backend/css/neon-rtl.css');?>">
<?php endif; ?>
<script src="<?php echo base_url('assets/backend/js/jquery-2.2.4.min.js'); ?>" charset="utf-8"></script>
<!-- AM Chart resources -->
<script src="https://www.amcharts.com/lib/4/core.js"></script>
<script src="https://www.amcharts.com/lib/4/charts.js"></script>
<script src="https://www.amcharts.com/lib/4/themes/animated.js"></script>

  <style>
	.fileDiv {
  position: relative;
  overflow: hidden;
}
.upload_attachmentfile {
  position: absolute;
  opacity: 0;
  right: 0;
  top: 0;
}

.btnFileOpen {margin-top: -50px; }

.direct-chat-warning .right>.direct-chat-text {
    background: #d2d6de;
    border-color: #d2d6de;
    color: #444;
	text-align: right;
}
.direct-chat-primary .right>.direct-chat-text {
    background: #3c8dbc;
    border-color: #3c8dbc;
    color: #fff;
	text-align: right;
}
.spiner{}
.spiner .fa-spin { font-size:24px;}
.attachmentImgCls{ width:450px; margin-left: -25px; cursor:pointer; }
</style>
</head>



 

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">


<!-- Left side column. contains the logo and sidebar -->


<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper"> 
  
  <!-- Content Header (Page header) -->
  
   
  
  <!-- Main content -->
  
  <section class="content">
     <div class="row">
           

            
            <div class="col-md-8" id="chatSection">
              <!-- DIRECT CHAT -->
              <div class="box box-warning direct-chat direct-chat-primary">
                <div class="box-header with-border">
                  <h3 class="box-title" id="ReciverName_txt"><?=$chatTitle;?></h3>

                  <div class="box-tools pull-right">
                    <span data-toggle="tooltip" title="Clear Chat" class="ClearChat"><i class="fa fa-comments"></i></span>
                    <!--<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>-->
                   <!-- <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="Clear Chat"
                            data-widget="chat-pane-toggle">
                      <i class="fa fa-comments"></i></button>-->
                   <!-- <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                    </button>-->
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <!-- Conversations are loaded here -->
                  <div class="direct-chat-messages" id="content">
                     <!-- /.direct-chat-msg -->

                     <div id="dumppy"></div>

                  </div>
                  <!--/.direct-chat-messages-->
 
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                  <!--<form action="#" method="post">-->
                    <div class="input-group">
                     <?php
						$obj=&get_instance();
						$obj->load->model('user_model');
						// $profile_url = $obj->user_model->PictureUrl();
						$user=$obj->user_model->get_users(['user_id']);
 					?>
                    	
                        <input type="hidden" id="Sender_Name" value="<?= $user->row('name');?>">
                        <!-- <input type="hidden" id="Sender_ProfilePic" value="<?=$profile_url;?>"> -->
                    	
                    	<input type="hidden" id="ReciverId_txt">
                        <input type="text" name="message" placeholder="Type Message ..." class="form-control message">
                      		<span class="input-group-btn">
                             <button type="button" class="btn btn-success btn-flat btnSend" id="nav_down">Send</button>
                             <div class="fileDiv btn btn-info btn-flat"> <i class="fa fa-upload"></i> 
                             <input type="file" name="file" class="upload_attachmentfile"/></div>
                          </span>
                    </div>
                  <!--</form>-->
                </div>
                <!-- /.box-footer-->
              </div>
              <!--/.direct-chat -->
            </div>




            <div class="col-md-4">
              <!-- USERS LIST -->
              <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title"><?=$strTitle;?></h3>

                  <div class="box-tools pull-right">
                    <span class="label label-danger"><?=count($vendorslist);?> <?=$strsubTitle;?></span>
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                    </button>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                  <ul class="users-list clearfix">
                  
                    <?php if(!empty($vendorslist)){
						foreach($vendorslist as $v):
						?>
                        <li class="selectVendor" id="<?=$v['id'];?>" title="<?=$v['name'];?>">
                          <img src="<?=$v['picture_url'];?>" alt="<?=$v['name'];?>" title="<?=$v['name'];?>">
                          <a class="users-list-name" href="#"><?=$v['name'];?></a>
                          <!--<span class="users-list-date">Yesterday</span>-->
                        </li>
                    <?php endforeach;?>
                    
                   <?php }else{?>
                   	<li>
                       <a class="users-list-name" href="#">No Vendor's Find...</a>
                     </li>
                  	<?php } ?>
                    
                    
                  </ul>
                  <!-- /.users-list -->
                </div>
                <!-- /.box-body -->
               <!-- <div class="box-footer text-center">
                  <a href="javascript:void(0)" class="uppercase">View All Users</a>
                </div>-->
                <!-- /.box-footer -->
              </div>
              <!--/.box -->
            </div>
            <!-- /.col -->            
          </div>
    
    <!-- /.row --> 
    
    
    
  </section>
  
  <!-- /.content --> 
  
</div>

<!-- /.content-wrapper --> 

<!-- Modal -->
<div class="modal fade" id="myModalImg">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title" id="modelTitle">Modal Heading</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <img id="modalImgs" src="uploads/attachment/21_preview.png" class="img-thumbnail" alt="Cinque Terre">
        </div>
        
        <!-- Modal footer -->
         
        
      </div>
    </div>
  </div>
<!-- Modal -->
  
  <!-- jQuery 3 -->
  <script src="<?=base_url('assets')?>/components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?=base_url('assets')?>/components/bootstrap/dist/js/bootstrap.min.js"></script>
 <?php if($this->uri->segment(1) != 'chat'){?>
<script src="<?=base_url('assets')?>/components/PACE/pace.min.js"></script>
 <?php }?>
<!-- SlimScroll -->
<script src="<?=base_url('assets')?>/components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="<?=base_url('assets')?>/components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?=base_url('assets')?>/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?=base_url('assets')?>/dist/js/demo.js"></script>
<script>
  $(document).ready(function () {
    $('.sidebar-menu').tree()
  })
  <?php if($this->uri->segment(1) != 'chat'){?>
  $(document).ajaxStart(function () {
    Pace.restart();
  });
  <?php }?>
</script>
<script src="<?=base_url('assets/chat/chat.js');?>"></script> 
 
</body>
</html>