<script>
	$(document).ready(function(){ // Ketika halaman sudah siap (sudah selesai di load)
		$("#kelas").change(function(){ // Ketika user mengganti atau memilih data provinsi
			$("#mapel").show();
			$.ajax({
				type: "POST", // Method pengiriman data bisa dengan GET atau POST
				url: "<?= base_url('PusatData/Mapel_json') ?>", // Isi dengan url/path file php yang dituju
				data: {id_kelas : $("#kelas").val()}, // data yang akan dikirim ke file yang dituju
				dataType: "json",
				beforeSend: function(e) {
					if(e && e.overrideMimeType) {
						e.overrideMimeType("application/json;charset=UTF-8");
					}
				},
				success: function(response){ 
					$("#mapel").html(response.list_mapel).show();
				},
				error: function (xhr, ajaxOptions, thrownError) { // Ketika ada error
					alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError); // Munculkan alert error
				}
			});
		});
	});
</script>