<?php

use Faker\Provider\Base;
?>
<div class="pd-20 bg-white border-radius-4 box-shadow mb-30">
	<h4 class="text-blue h4"><?= $content['pg_title'] ?></h4>
	<p style="font-size: 14px;" class="mb-20"><?= $content['pg_subtitle'] ?></p>
	<!--  -->
	<?= view($content['content_menu']) ?>
	<!--  -->
	<hr>
	<p style="font-size: 14px;">
		<b>Buat rumus penilaian untuk ketegori penilaian </b>
	</p>
	<div class="col-sm-7 pl-0">
		<div class="card text-white bg-secondary card-box">
			<div class="card-header">Header</div>
			<div class="card-body">
				<h5 class="card-title text-white">Secondary card title</h5>
				<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
			</div>
		</div>
		<form action="<?= base_url($content['pg_menu_url'] . '/eksekusi-rumus') ?>" method="post" enctype="multipart/form-data">
			<input name="idcat" type="hidden" value="<?= $data['idcat'] ?>">
			<div class="form-group">
				<label for="">Custom Rumus Penilaian</label><br>
				<input name="rumus" id="display1" class="form-control col-12 fh-35" type="text" readonly>
			</div>
			<div class="text-right">
				<button type="reset" class="btn btn-sm btn-outline-secondary">Batal</button>
				<button type="submit" class="btn btn-sm btn-primary">Tambah</button>
			</div>
		</form>
		<button id="zero" class="btn btn-sm btn-primary mb-20">0</button>
		<button id="one" class="btn btn-sm btn-primary mb-20">1</button>
		<button id="two" class="btn btn-sm btn-primary mb-20">2</button>
		<button id="three" class="btn btn-sm btn-primary mb-20">3</button>
		<button id="four" class="btn btn-sm btn-primary mb-20">4</button>
		<button id="five" class="btn btn-sm btn-primary mb-20">5</button>
		<button id="six" class="btn btn-sm btn-primary mb-20">6</button>
		<button id="seven" class="btn btn-sm btn-primary mb-20">7</button>
		<button id="eight" class="btn btn-sm btn-primary mb-20">8</button>
		<button id="nine" class="btn btn-sm btn-primary mb-20">9</button>
		<button id="add" class="btn btn-sm btn-primary mb-20">+</button>
		<button id="subtract" class="btn btn-sm btn-primary mb-20">-</button>
		<button id="divide" class="btn btn-sm btn-primary mb-20">/</button>
		<button id="multiply" class="btn btn-sm btn-primary mb-20">*</button>
		<button id="left-parenthesis" class="btn btn-sm btn-primary mb-20">(</button>
		<button id="right-parenthesis" class="btn btn-sm btn-primary mb-20">)</button>
		<button id="clear" class="btn btn-sm btn-primary mb-20">Clear</button>
		<button id="backspace" class="btn btn-sm btn-primary mb-20">Deletion</button>
		<div class="table-responsive">
			<table class="table table-striped">
				<thead>
					<tr>
						<th scope="col">No.</th>
						<th scope="col">Kode Variabel</th>
						<th scope="col">Nama Variabel</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$no = 1;
					foreach ($data['variable'] as $key => $value) { ?>
						<tr>
							<th scope="row"><?= $no ?></th>
							<td> <button id="<?= $value['var_code'] ?>" class="btn btn-sm btn-primary" style="font-size: 12px; height: 30px;">$<?= $value['var_code'] ?></button></td>
							<td><?= $value['var_name'] ?></td>
						</tr>
					<?php
						$no++;
					}
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>