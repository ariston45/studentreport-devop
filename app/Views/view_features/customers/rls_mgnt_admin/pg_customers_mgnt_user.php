
<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
	<h4 class="text-blue h4"><?=$data['subpagetitle']?></h4>
	<p class="mb-20">Manage the customer</p>
	<!--  -->
	<?=view($content['content_menu'])?>
	<!--  -->
	<?php if (!empty(session()->getFlashdata('success'))) : ?>
    <div class="alert alert-success" role="alert">
    	<?php echo session()->getFlashdata('success'); ?>
    </div>
  <?php endif; ?>
	<div class="tab">
		<div class="row clearfix">
			<div class="col-md-3 col-sm-12">
				<ul class="nav flex-column vtabs nav-tabs" role="tablist">
					<li class="nav-item">
						<a class="nav-link active" data-toggle="tab" href="#users" role="tab" aria-selected="true">
							<i class="icon-copy dw dw-user1" style="padding-right: 8px;"></i>Users
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" data-toggle="tab" href="#adduser" role="tab" aria-selected="true">
							<i class="icon-copy dw dw-add-user" style="padding-right: 8px;"></i>Add User
						</a>
					</li>
				</ul>
			</div>
			<div class="col-md-9 col-sm-12">
				<div class="tab-content">
					<div class="tab-pane fade active show" id="users" role="tabpanel">
						<div class="pd-20">
							<table class="data-table table stripe hover nowrap" id="dt">
								<thead>
									<tr>
										<th class="table-plus">No</th>
										<th>Username</th>
										<th>Fullname</th>
										<th>Email</th>
										<th>Rules</th>
										<th class="datatable-nosort">Action</th>
									</tr>
								</thead>
								<tbody>
								<?php
								$no = 1;
								foreach ($data['user'] as $key => $value) { ?>
									<tr>
										<td class="table-plus"><?=$no?></td>
										<td><?= $value['user_login'] ?></td>
										<td><?= $value['user_fullname'] ?></td>
										<td><?= $value['user_email'] ?></td>
										<td><?= $value['user_management_rules'] ?></td>
										<td>
											<div class="dropdown">
												<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
													<i class="dw dw-more"></i>
												</a>
												<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
													<a class="dropdown-item" href="<?=base_url('customers/'.$data['tenant_group_id'].'/user-manager/detail/'.$value['ID'])?>"><i class="dw dw-eye"></i> View</a>
													<a class="dropdown-item" href="<?=base_url('customers/'.$data['tenant_group_id'].'/user-manager/edit/'.$value['ID'])?>"><i class="icon-copy dw dw-edit2"></i> Edit</a>
													<a class="dropdown-item" href="#"><i class="icon-copy dw dw-delete-3"></i> Delete</a>
												</div>
											</div>
										</td>
									</tr>
								<?php $no++; } ?>
								</tbody>
							</table>
						</div>
					</div>
					<div class="tab-pane fade" id="adduser" role="tabpanel">
						<div class="pd-20">
							<form action="<?=base_url('customers/exe-adduser-customer/'.$data['id_access'])?>" method="post" enctype="multipart/form-data">
								<?= csrf_field(); ?>
								<div class="form-group row">
									<label class="col-sm-12 col-md-4 col-form-label">Username</label>
									<div class="col-sm-12 col-md-8">
										<input class="form-control fh-35" type="text" name='username' placeholder="Input username" autocomplete="off">
										<input type="hidden" name='tenant-group' value='<?=$data['tenant_group_id']?>'>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-12 col-md-4 col-form-label">User Access</label>
									<div class="col-sm-12 col-md-8">
										<select class="custom-select col-12 fh-35" name='user-access'>
											<option value="<?=false?>">Select rule access...</option>
											<option value="EX_ADMIN">Admin</option>
											<option value="EX_MANAGER">Exam Manager</option>
											<option value="EX_PROCTOR">Proctor</option>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-12 col-md-4 col-form-label">Tenant Access</label>
									<div class="col-sm-12 col-md-8">
										<select name="tenant-access[]" class="selectpicker form-control" data-size="5" multiple data-actions-box="true" data-selected-text-format="count">
											<optgroup label="- Select Tenant -">
												<?php
													foreach ($data['tenant'] as $key => $value) { ?>
														<option value="<?= $value['ID']?>" <?php if ($value['ID'] == $data['tenant_group_id']) { echo 'selected'; } ?> ><?=$value['tnt_name']?></option>
													<?php }
												?>
											</optgroup>
										</select>
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-12 col-md-4 col-form-label">Password</label>
									<div class="col-sm-12 col-md-8">
										<input class="form-control fh-35" type="text" name='password' placeholder="***************" autocomplete="off">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-12 col-md-4 col-form-label">Confirm Password</label>
									<div class="col-sm-12 col-md-8">
										<input class="form-control fh-35" type="text" name='confirm-password' placeholder="***************" autocomplete="off">
									</div>
								</div>
								<hr>
								<div class="form-group row">
									<label class="col-sm-12 col-md-4 col-form-label">Fullname</label>
									<div class="col-sm-12 col-md-8">
										<input class="form-control fh-35" type="text" name='fullname' placeholder="Fullname" autocomplete="off">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-12 col-md-4 col-form-label">Birthday</label>
									<div class="col-sm-12 col-md-8">
										<input class="form-control fh-35 date-picker" type="text" name='birthday' placeholder="01 January 2000" autocomplete="off">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-12 col-md-4 col-form-label">Address</label>
									<div class="col-sm-12 col-md-8">
										<input class="form-control fh-35" type="text" name='address' placeholder="Some place" autocomplete="off">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-12 col-md-4 col-form-label">Job Rule</label>
									<div class="col-sm-12 col-md-8">
										<input class="form-control fh-35" type="text" name='job' placeholder="Job rule" autocomplete="off">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-12 col-md-4 col-form-label">Email</label>
									<div class="col-sm-12 col-md-8">
										<input class="form-control fh-35" type="text" name='email' placeholder="example@domain.com" autocomplete="off">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-12 col-md-4 col-form-label">Phone Number</label>
									<div class="col-sm-12 col-md-8">
										<input class="form-control fh-35" type="text" name='phone_number' placeholder="+62 - ...." autocomplete="off">
									</div>
								</div>
								<div class="form-group row">
									<label class="col-sm-12 col-md-4 col-form-label">Profile Picture</label>
									<div class="col-sm-12 col-md-8">
										<input type="file" class="custom-file-input" id="pics" name="pics">
										<label class="custom-file-label" for="customFile">Choose file</label> <br>
										<?php if (!empty(session()->getFlashdata('error'))) : ?>
											<div class="alert alert-danger" role="alert">
												<h4>Periksa Entrian Form</h4>
												</hr />
												<?php echo session()->getFlashdata('error'); ?>
											</div>
										<?php endif; ?>
									</div>
								</div>
								
								<div class="col-sm-12 text-right pr-0">
									<button type="reset" class="btn btn-sm btn-outline-secondary" data-dismiss="modal">Cancel</button>
									<button type="submit" class="btn btn-sm btn-outline-primary">Create</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>