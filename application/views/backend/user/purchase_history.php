<div class="row">
<div class="col-lg-12">
  <div class="panel panel-primary" data-collapsed="0">
    <div class="panel-heading">
      <div class="panel-title">
        Package actif
      </div>
    </div>
    <div class="panel-body">
    <div class="panel panel-primary" data-collapsed="0">
      <div class="panel-heading">
        <div class="panel-title">
          Package
        </div>
      </div>
      <div class="panel-body">
      <form action="<?php echo site_url('user/update_package'); ?>" method="post" enctype="multipart/form-data" role="form" class="form-horizontal form-groups-bordered">
        <div class="form-group">
            <label for="active_package" class="col-sm-3 control-label"><?php echo get_phrase('package_active'); ?></label>
            <div class="col-sm-7">
                <select name="active_package" id="active_package" class="select2" data-allow-clear="true" data-placeholder="<?php echo get_phrase('system_currency'); ?>">
                    <option value="">Sélectionner</option>
                    <?php foreach ($purchase_histories as $key => $purchase_history): ?>
                        <option value="<?php echo $purchase_history['id']; ?>" <?php if ($purchase_history['active'] == 1)echo 'selected';?>><?php echo $this->db->get_where('package', array('id' => $purchase_history['package_id']))->row('name'); ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="col-sm-offset-3 col-sm-5" style="padding-top: 10px;">
            <button type="submit" class="btn btn-info"><?php echo get_phrase('update'); ?></button>
        </div>
    </form>

    </div>
  </div>
</div><!-- end col-->
      <table class="table table-bordered datatable">
      	<thead>
      		<tr>
      			<th width="80"><div>#</div></th>
      			<th><div><?php echo get_phrase('package_name');?></div></th>
      			<th><div><?php echo get_phrase('purchase_date');?></div></th>
      			<th><div><?php echo get_phrase('expired_date');?></div></th>
      			<th><div><?php echo get_phrase('amount_paid');?></div></th>
      			<th><div><?php echo get_phrase('payment_method');?></div></th>
      			<th><div><?php echo get_phrase('action');?></div></th>
      		</tr>
      	</thead>
      	<tbody>
          <?php foreach ($purchase_histories as $key => $purchase_history): ?>
            <tr>
              <td><?php echo $key + 1; ?></td>
              <td>
                <?php echo $this->db->get_where('package', array('id' => $purchase_history['package_id']))->row('name'); ?>
                <?php
                $active_package = has_package($this->session->userdata('user_id'), true);
                if ($active_package['id'] == $purchase_history['id']): ?>
                  <br> <small><span class="badge badge-success "><?php echo get_phrase('currently_active'); ?></span></small>
                <?php endif; ?>
              </td>
              <td><?php echo date('D, d-M-Y', $purchase_history['purchase_date']); ?></td>
              <td><?php echo date('D, d-M-Y', $purchase_history['expired_date']); ?></td>
              <td><?php echo currency($purchase_history['amount_paid']); ?></td>
              <td><?php echo ucfirst($purchase_history['payment_method']); ?></td>
              <td class="text-center"> <a href="<?php echo site_url('user/package_invoice/'.$purchase_history['id']); ?>" class="btn btn-primary"><i class="entypo-print"></i> <?php echo get_phrase('print_invoice'); ?></a> </td>
            </tr>
          <?php endforeach; ?>
      	</tbody>
      </table>
    </div>
  </div>
</div><!-- end col-->
</div>
