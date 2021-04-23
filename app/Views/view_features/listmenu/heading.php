<?php
  if ($segments[1] == 'home') {
    $title = 'Home';
  }elseif ($segments[1] == 'exams') {
		$title = 'Exams';
	}
	elseif ($segments[1] == 'customers') {
		$title = 'Customer              ';
	} else {
		$title = 'No Name';
	}
?>
<div class="page-header">
	<div class="row">
		<div class="col-md-6 col-sm-12">
			<div class="title">
				<h4><?=$title?></h4>
			</div>
			<nav aria-label="breadcrumb" role="navigation">
				<ol class="breadcrumb">
					<?php
					foreach ($breadcrumb as $key => $value) { ?>
						<li class="breadcrumb-item active"><a href="/<?=$key?>"><?=$value?></a></li>
					<?php } ?>
				</ol>
			</nav>
		</div>
		<div class="col-md-6 col-sm-12 text-right">
      <a class="btn btn-primary" href="#" role="button">
			  January 2018
			</a>
		</div>
	</div>
</div>
