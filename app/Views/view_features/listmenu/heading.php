<div class="page-header">
	<div class="row">
		<div class="col-md-6 col-sm-12">
			<div class="title">
				<h4 style="color: #1b00ff; font-weight:700;"><?=strtoupper($pgtitle) ?></h4>
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
