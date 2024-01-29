<?php
// $website_title = $this->db->get_where('settings' , array('type'=>'website_title'))->row()->description;
// $user_details = $this->user_model->get_all_users($this->session->userdata('user_id'))->row_array();
// $text_align     = $this->db->get_where('settings', array('type' => 'text_align'))->row()->description;
// $logged_in_user_role = strtolower($this->session->userdata('role'));
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?=base_url('assets')?>/components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=base_url('assets')?>/components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?=base_url('assets')?>/components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=base_url('assets')?>/dist/css/AdminLTE.min.css">
  
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  
  <link rel="stylesheet" href="<?=base_url('assets')?>/dist/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="<?=base_url('assets')?>/plugins/pace/pace.min.css">
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
      <?php 
                        $clientID = isset($_GET['id']) ? $_GET['id'] : null;
                      $obj=&get_instance();
                      $obj->load->model('user_model');
          ?>   
<div class="col-md-2">
                <!-- USERS LIST -->
                <div class="box box-danger">
                  <div class="box-header with-border">
                    <h3 class="box-title">Messages</h3>

                    <div class="box-tools pull-right">
                      <span class="label label-danger"></span>

                    </div>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body no-padding">
                    <ul class="users-list clearfix">
                    

                          <li class="selectVendor" id="<?= $clientID; ?>">
                          <?= $obj->user_model->get_users($clientID)->row('name'); ?>
                          </li>               
                      
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
              
              <div class="col-md-6" id="chatSection">
                <!-- DIRECT CHAT -->
                <div class="box box-warning direct-chat direct-chat-primary">
                  <div class="box-header with-border">
                    <h3 class="box-title" style="display: none;" id="ReciverName_txt"><?=$chatTitle;?> <?= $obj->user_model->get_users($clientID)->row('name'); ?></h3>
                    <h3 class="box-title" id=""><?=$chatTitle;?> <?= $obj->user_model->get_users($clientID)->row('name'); ?></h3>
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
                      <span class="label label-danger"></span>

                    </div>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body no-padding">
                    <ul class="users-list clearfix">
                    

                          <li class="selectVendor" id="<?= $clientID; ?>">
                          <?= $obj->user_model->get_users($clientID)->row('name'); ?>
                          </li>               
                      
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

</div>
<!-- ./wrapper -->
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
  <?php if($this->uri->segment(1) != 'message'){?>
  $(document).ajaxStart(function () {
    Pace.restart();
  });
  <?php }?>
</script>
<script src="<?=base_url('assets/chat/chat.js');?>"></script> 
 
</body>
</html>