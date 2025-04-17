function deleteAction(userId) {
    Swal.fire({
        title: 'Delete Script',
        text: 'Are you sure want delete this Script?',
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
                url: '/eb8e49c2-2641-417c-9fc9-1b22bb0db76b/' + userId,
                type: 'DELETE',
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                success: function (response) {
                    Swal.fire({
                        title: 'Success!',
                        text: response.message,
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
