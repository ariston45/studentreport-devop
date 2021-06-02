<script>
	$(".kategori").click(function() {
		var ids = $(this).attr('data-id');
		$("#idkategori").val(ids);
		$('#confirmation-modal').modal('show');
	});
</script>