<div class="row ">

</div>
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-primary" data-collapsed="0">
			<div class="panel-heading">
				<div class="panel-title">
					<?php echo get_phrase('general_company_list'); ?>
				</div>
			</div>
			<div class="panel-body">
                <table class="table table-bordered datatable">
                	<thead>
                		<tr>
                			<th width="80"><div>#</div></th>
                			<th><div><?php echo get_phrase('photo');?></div></th>
                			<th><div><?php echo get_phrase('company_name');?></div></th>
                			<th><div><?php echo get_phrase('user');?></div></th>
                			<th><div><?php echo get_phrase('address');?></div></th>
                			<th><div><?php echo get_phrase('postal_code');?></div></th>
                			<th><div><?php echo get_phrase('secteur');?></div></th>
                			<th><div><?php echo get_phrase('siret');?></div></th>
                		</tr>
                	</thead>
                	<tbody>
                        <?php
                         $counter = 0;
                         foreach ($company->result_array() as $user): 
                            $userDetails = $this->user_model->get_users_name($user['user_id'])->row_array();
                         ?>
                            <tr>
                                <td><?php echo ++$counter; ?></td>

                                <td class="text-center">
                                  <img class="rounded-circle" src="<?php echo $this->user_model->get_company_thumbnail($user['user_id']); ?>" alt="" style="height: 50px; width: 50px; border-radius: 50%">
                                </td>
                                <td><?php echo $user['nomdesociete']; ?></td>
                                <td><?php echo $userDetails['name']  ?> <?php echo $userDetails['lastname']  ?></td>
                                <td><?php echo $user['adresse']; ?></td>
                                <td><?php echo $user['codepostal']; ?></td>
                                <td><?php echo $user['secteur']; ?></td>
                                <td><?php echo $user['siret']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                	</tbody>
                </table>
			</div>
		</div>
	</div><!-- end col-->
</div>
