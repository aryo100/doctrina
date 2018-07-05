var upload_btn = $('.upload_btn_foto, .upload_btn_pekerja_aktif, .upload_btn_slip_gaji');

function pictUpload () {
	upload_btn.on('change', function(e) {
		if (typeof (FileReader) != "undefined") {
			var data_target = $(this).data("target")
			var image_holder = $('.image_preview'+data_target);
			image_holder.empty();

			var reader = new FileReader();
			reader.onload = function(e) {
				$('<img >', {
					'src': e.target.result,
					'class': 'pict_url'
				}).appendTo(image_holder);
			};

			image_holder.show();
			reader.readAsDataURL($(this)[0].files[0]);
		}

		else {
			alert("cant show up the picture. please change your browser to use it properly");
		};
	});
}

$(document).ready(pictUpload);
