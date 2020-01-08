function show_alert(title, text){
	Swal.fire({
		title: title,
		text: text,
		icon: 'success',
		showCancelButton: false,
		confirmButtonColor: '#3085d6',
		confirmButtonText: 'Ok'
	}).then((result) => {
		if (result.value) {
			window.location = window.location.href;
		}
	});
}

function show_success_alert(position, title){
	Swal.fire({
		position: position,
		icon: 'success',
		title: title,
		showConfirmButton: false,
		timer: 1500
	});
}