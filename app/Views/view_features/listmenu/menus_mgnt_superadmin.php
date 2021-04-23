<li>
	<a href="<?=base_url("home")?>" class="dropdown-toggle no-arrow <?php if ($segments[1] == 'home') {echo 'active';}?>">
		<span class="micon dw dw-house-1"></span><span class="mtext">Home</span>
	</a>
</li>
<li>
	<a href="<?=base_url('customers')?>" class="dropdown-toggle no-arrow <?php if ($segments[1] == 'customers') {echo 'active';}?>">
		<span class="micon dw dw-calendar1"></span><span class="mtext">Customer</span>
	</a>
</li>

<li class="dropdown">
	<a href="javascript:;" class="dropdown-toggle <?php if ($segments[1] == 'users') {echo 'active';}?>">
		<span class="micon dw dw-edit2"></span><span class="mtext">Customer Managing</span>
	</a>
	<ul class="submenu">
	<li><a href="#">Schedules</a></li>
	</ul>
</li>
<li class="dropdown">
	<a href="javascript:;" class="dropdown-toggle <?php if ($segments[1] == 'users') {echo 'active';}?>">
		<span class="micon dw dw-edit2"></span><span class="mtext">Students</span>
	</a>
	<ul class="submenu">
		<li><a href="#">Users</a></li>
	</ul>
</li>
<li class="dropdown">
	<a href="javascript:;" class="dropdown-toggle <?php if ($segments[1] == 'users') {echo 'active';}?>">
		<span class="micon dw dw-edit2"></span><span class="mtext">Users</span>
	</a>
	<ul class="submenu">
	<li><a href="#">Schedules</a></li>
	</ul>
</li>
<li class="dropdown">
	<a href="javascript:;" class="dropdown-toggle <?php if ($segments[1] == 'users') {echo 'active';}?>">
		<span class="micon dw dw-edit2"></span><span class="mtext">Settings</span>
	</a>
	<ul class="submenu">
	<li><a href="#">Schedules</a></li>
	</ul>
</li>
		