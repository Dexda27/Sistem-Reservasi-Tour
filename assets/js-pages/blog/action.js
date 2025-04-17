function deleteAction(slug) {
    Swal.fire({
        title: 'Delete Post',
        text: 'Are you sure want delete this post?',
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
                url: '/cdf660e5-1c9d-4412-98fd-1bb98b955542/' + slug,
                type: 'DELETE',
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                success: function (response) {
                    Swal.fire({
                        title: 'Success!',
                        text: 'Post have been deleted!',
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
