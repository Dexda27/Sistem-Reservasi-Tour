function deleteAction(userId) {
    Swal.fire({
        title: 'Delete Product',
        text: 'Are you sure want delete this Product?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Delete',
        cancelButtonText: 'Cancel',
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6'
    }).then((result) => {
        if (result.isConfirmed) {
            var csrfToken = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: '/9d8794f1-38e1-42d2-9cb2-c66328d2854d/' + userId,
                type: 'DELETE',
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                success: function (response) {
                    Swal.fire({
                        title: 'Success!',
                        text: 'Product have been deleted!',
                        icon: 'success',
                        customClass: {
                          confirmButton: 'btn btn-primary'
                        },
                        buttonsStyling: false
                    }).then((result) => {
                        location.reload();
                    });
                },
                error: function (response) {
                    Swal.fire({
                        title: 'Failed!',
                        text: 'Something Wrong!',
                        icon: 'error',
                        customClass: {
                          confirmButton: 'btn btn-primary'
                        },
                        buttonsStyling: false
                    }).then((result) => {
                        if(result.isConfirmed){
                            location.reload()
                        }
                    });
                }
            });
        }
    });
}
