<script>
	$(document).ready(function(){ // Ketika halaman sudah siap (sudah selesai di load)
		$("#jurusan").change(function(){ // Ketika user mengganti atau memilih data provinsi
			$("#kelas").show();
			$.ajax({
				type: "POST", // Method pengiriman data bisa dengan GET atau POST
				url: "<?= base_url('PusatData/Kelas_json') ?>", // Isi dengan url/path file php yang dituju
				data: {id_jurusan : $("#jurusan").val()}, // data yang akan dikirim ke file yang dituju
				dataType: "json",
				beforeSend: function(e) {
					if(e && e.overrideMimeType) {
						e.overrideMimeType("application/json;charset=UTF-8");
					}
				},
				success: function(response){ 
					$("#kelas").html(response.list_kelas).show();
				},
				error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
					alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
				}
			});
		});
	});
</script>