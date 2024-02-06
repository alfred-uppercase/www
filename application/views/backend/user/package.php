<div class="row">
<div class="col-lg-12">
  <div class="panel panel-primary" data-collapsed="0">
    <div class="panel-heading">
      <div class="panel-title">
        <?php echo get_phrase('purchased_packages'); ?>
      </div>
    </div>
    <div class="panel-body">
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
              <td class="text-center"> 
                <a href="<?php echo site_url('user/package_invoice/'.$purchase_history['id']); ?>" class="btn btn-primary"><i class="entypo-print"></i> <?php echo get_phrase('print_invoice'); ?></a> 
                <div class="bs-example">
                    <div class="btn-group">
                      <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                        <?php echo get_phrase('action'); ?> <span class="caret"></span>
                      </button>
                      <ul class="dropdown-menu dropdown-blue" role="menu">
                        <li><a href="<?php echo get_listing_url($listing['id']); ?>"><?php echo get_phrase('view_in_website'); ?></a></li>
                        <li><a href="<?php echo site_url('admin/listing_form/edit/' . $listing['id']); ?>"><?php echo get_phrase('edit'); ?></a></li>
                        <?php if ($listing['status'] == 'pending') : ?>
                          <li><a href="javascript::" onclick="confirm_modal('<?php echo site_url('admin/listings/make_active/' . $listing['id']); ?>', 'generic_confirmation');"><?php echo get_phrase('mark_as_active'); ?></a></li>
                        <?php else : ?>
                          <li><a href="javascript::" onclick="confirm_modal('<?php echo site_url('admin/listings/make_pending/' . $listing['id']); ?>', 'generic_confirmation');"><?php echo get_phrase('mark_as_pending'); ?></a></li>
                        <?php endif; ?>

                        <?php if ($listing['is_featured'] == 1) : ?>
                          <li><a href="javascript::" onclick="confirm_modal('<?php echo site_url('admin/listings/make_none_featured/' . $listing['id']); ?>', 'generic_confirmation');"><?php echo get_phrase('remove_from_featured'); ?></a></li>
                        <?php elseif ($listing['is_featured'] == 0) : ?>
                          <li><a href="javascript::" onclick="confirm_modal('<?php echo site_url('admin/listings/make_featured/' . $listing['id']); ?>', 'generic_confirmation');"><?php echo get_phrase('mark_as_featured'); ?></a></li>
                        <?php endif; ?>
                        <?php if (get_addon_details('fb_messenger') != 0) : ?>
                          <li><a href="<?php echo site_url('addons/facebook_messenger/api_manager/' . $listing['id']); ?>"><?php echo get_phrase('facebook_chat_manager'); ?></a></li>
                        <?php endif; ?>
                        <li class="divider"></li>
                        <li><a href="javascript::" onclick="confirm_modal('<?php echo site_url('admin/listings/delete/' . $listing['id']); ?>');"><?php echo get_phrase('delete'); ?></a>
                        </li>
                      </ul>
                    </div>
                  </div>
              </td>
            </tr>
          <?php endforeach; ?>
      	</tbody>
      </table>
    </div>
  </div>
</div><!-- end col-->
</div>
