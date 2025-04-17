function deleteAction(userId) {
    Swal.fire({
        title: 'Delete User',
        text: 'Are you sure want delete this user?',
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
                url: '/3c47c56c-4b77-4437-92dc-b6778f0a37a8/' + userId,
                type: 'DELETE',
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                success: function (response) {
                    Swal.fire({
                        title: 'Success!',
                        text: 'User have been deleted!',
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
