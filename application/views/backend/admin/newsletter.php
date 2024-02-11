<div class="row ">
<div class="col-lg-12">
        <a href="<?php echo site_url('admin/ns_params/add'); ?>" class="btn btn-primary alignToTitle"><i class="entypo-plus"></i><?php echo get_phrase('add_new_subscribers'); ?></a>
    </div><!-- end col-->
</div>
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-primary" data-collapsed="0">
			<div class="panel-heading">
				<div class="panel-title">
					<?php echo get_phrase('subscribers_list'); ?>
				</div>
			</div>
			<div class="panel-body">
                <table class="table table-bordered datatable">
                	<thead>
                		<tr>
                			<th width="80"><div>#</div></th>
                			<th><div><?php echo get_phrase('email');?></div></th>
                			<th><div><?php echo get_phrase('subscription_date');?></div></th>
                			<th><div><?php echo get_phrase('actions');?></div></th>
                		</tr>
                	</thead>
                	<tbody>
                        <?php
                         $counter = 0;
                         foreach ($subscribers->result_array() as $subscriber): 
                         ?>
                            <tr>
                                <td><?php echo ++$counter; ?></td>
                                <td><?php echo $subscriber['email']; ?></td>
                                <td><?php echo $subscriber['subscription_date']  ?></td>
                                <td>

                                <div class="bs-example">
                                      <div class="btn-group">
                                        <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                                          <?php echo get_phrase('action'); ?> <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu dropdown-blue" role="menu">
                                            <li>
                                                <a href="<?php echo site_url('admin/ns_params/edit/'.$subscriber['id']); ?>" class="">
                                                    <i class="entypo-pencil"></i>
                                                    <?php echo get_phrase('edit'); ?>
                                                </a>
                                            </li>
                                          <li class="divider"></li>
                                          <li>
                                            <a href="#" class="" onclick="confirm_modal('<?php echo site_url('admin/newsletter/delete/'.$subscriber['id']); ?>');">
                                                <i class="entypo-trash"></i>
                                                <?php echo get_phrase('delete'); ?>
                                            </a>
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
