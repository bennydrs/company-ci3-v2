const flashData = $('.flash-data').data('flashdata');

if (flashData) {
    Swal({
        title: 'Success',
        text: flashData,
        type: 'success'
    });
}

// tombol-hapus
$('.delete').on('click', function (e) {

    e.preventDefault();
    const href = $(this).attr('href');

    Swal({
        title: 'Are you sure?',
        text: "One delete, you will not be able to recover this file",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Delete Data!'
    }).then((result) => {
        if (result.value) {
            document.location.href = href;
        }
    })

});