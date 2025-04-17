function deleteAction(userId) {
    Swal.fire({
        title: 'Delete Feature',
        text: 'Are you sure want delete this feature?',
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
                url: '/6cfa291a-f205-47c2-ac2b-8c12ff464f61/' + userId,
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
