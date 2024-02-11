<?php
    $user_details = $this->user_model->get_all_subscribers($ns_id)->row_array();
 ?>
<div class="row">
  <div class="col-lg-12">
    <div class="panel panel-primary" data-collapsed="0">
      <div class="panel-heading">
        <div class="panel-title">
          <?php echo get_phrase('subscribers_add_form'); ?>
        </div>
      </div>
      <div class="panel-body">
        <form action="<?php echo site_url('admin/newsletter/edit/'.$ns_id); ?>" method="post" enctype="multipart/form-data" role="form" class="form-horizontal form-groups-bordered">
          <div class="form-group">
            <label for="name" class="col-sm-3 control-label"><?php echo get_phrase('email'); ?></label>
            <div class="col-sm-7">
              <input type="email" value="<?php echo $user_details['email']; ?>" class="form-control" name="email" id="email" placeholder="<?php echo get_phrase('email'); ?>" required>
            </div>
          </div>

          <div class="col-sm-offset-3 col-sm-5" style="padding-top: 10px;">
            <button type="submit" class="btn btn-info"><?php echo get_phrase('update_subscibers'); ?></button>
          </div>
        </form>
      </div>
    </div>
  </div><!-- end col-->
</div>
