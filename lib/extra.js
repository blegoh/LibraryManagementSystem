// JavaScript Document

$(document).ready(function() {
	
	$("#tambah").click(function() {
		var kd_item_buku = $('#item').val();
		
		if(kd_item_buku != ""){
			var buku = $('#buku').val();
			if(buku.search(kd_item_buku) >= 0){
				window.alert("Sudah Ada!!");
			}else{
				var awal = $('#buku').val();
				if(awal.length > 0 && awal.charAt(awal.length -1) != "\r\n"){
					$('#buku').val(awal +"\r\n"+ kd_item_buku);
//					getData('engine/show_detail.php?item='+awal +"\r\n"+ kd_item_buku,'detail');
				}else{
					$('#buku').val(awal + kd_item_buku);
//					getData('engine/show_detail.php?item='+awal + kd_item_buku,'detail');
				}
				var action = 'engine/show_detail.php';
				var form_data = {
					item_buku : $("#buku").val(),
					is_ajax: 1
				};
				
				$.ajax({
					type: "POST",
					url: action,
					data: form_data,
					success: function(response)
					{
						$('#detail').html(response);
					}
				});

			}
		}else{
			window.alert("Anda Belum Memilih Kode Item Buku!!");
		}
		
	});
	
	$('#buku').keypress(function() {
		var action = 'engine/show_detail.php';
		var form_data = {
			item_buku : $("#buku").val(),
			is_ajax: 1
		};
		
		$.ajax({
			type: "POST",
			url: action,
			data: form_data,
			success: function(response)
			{
				$('#detail').html(response);
			}
		});
	});
	
	$('#buku').keyup(function() {
		var action = 'engine/show_detail.php';
		var form_data = {
			item_buku : $("#buku").val(),
			is_ajax: 1
		};
		
		$.ajax({
			type: "POST",
			url: action,
			data: form_data,
			success: function(response)
			{
				$('#detail').html(response);
			}
		});
	});
	
	$('#buku').keydown(function() {
		var action = 'engine/show_detail.php';
		var form_data = {
			item_buku : $("#buku").val(),
			is_ajax: 1
		};
		
		$.ajax({
			type: "POST",
			url: action,
			data: form_data,
			success: function(response)
			{
				$('#detail').html(response);
			}
		});
	});
	
});

//function tambahkan(){
//	var kd_item_buku = document.getElementById('item').value;
//	if(kd_item_buku != ""){
//		var buku = document.getElementById('buku').value;
//		if(buku.search(kd_item_buku) >= 0){
//			window.alert("Sudah Ada!!");
//		}else{
//			var awal = document.getElementById('buku').value;
//			if(awal.length > 0 && awal.charAt(awal.length -1) != "\r\n"){
//				document.getElementById('buku').value = awal +"\r\n"+ kd_item_buku;
//				getData('engine/show_detail.php?item='+awal +"\r\n"+ kd_item_buku,'detail');
//			}else{
//				document.getElementById('buku').value = awal + kd_item_buku;
//				getData('engine/show_detail.php?item='+awal + kd_item_buku,'detail');
//			}
//		}
//	}else{
//		window.alert("Anda Belum Memilih Kode Item Buku!!");
//	}
//}

function barcode(){
	var ib_kode = $('#barcode').val;
	alert(ib_kode);
}