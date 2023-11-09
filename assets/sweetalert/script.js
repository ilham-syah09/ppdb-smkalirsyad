let swal_success = $(".swal-success").data("flashdata");
let swal_error = $(".swal-error").data("flashdata");

if (swal_success) {
	Swal.fire({
		title: "Success",
		text: swal_success,
		icon: "success",
	});
}

if (swal_error) {
	Swal.fire({
		title: "Sorry !!",
		text: swal_error,
		icon: "warning",
	});
}

$(".btnDelete").on("click", function (e) {
	e.preventDefault();

	var href = $(this).attr("href");
	Swal.fire({
		title: "Apakah anda yakin",
		text: "data akan dihapus",
		icon: "warning",
		showCancelButton: true,
		confirmButtonColor: "#3085d6",
		cancelButtonColor: "#d33",
		confirmButtonText: "Hapus Data",
	}).then((result) => {
		if (result.value) {
			document.location.href = href;
		}
	});
});
