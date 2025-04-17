function acceptAction(userId) {
    Swal.fire({
        title: 'Accept TopUp',
        text: 'Are you sure want accept this topup?',
        icon: 'warning',
        showCancelButton: true,
        cancelButtonText: 'Cancel',
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6'
    }).then((result) => {
        if (result.isConfirmed) {
            var csrfToken = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: '/0b2ae1da-def1-46b8-add2-4bf895609ce3/' + userId,
                type: 'POST',
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                success: function (response) {
                    if (response.message === 'TopUp request has been Accepted') {
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
                    } else if (response.message === 'Status is not pending') {
                        Swal.fire({
                            title: 'Failed!',
                            text: response.message,
                            icon: 'error',
                            customClass: {
                              confirmButton: 'btn btn-primary'
                            },
                            buttonsStyling: false
                        });
                    } else {
                        Swal.fire({
                            title: 'Failed!',
                            text: response.message,
                            icon: 'error',
                            customClass: {
                              confirmButton: 'btn btn-primary'
                            },
                            buttonsStyling: false
                        });
                    }
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
                        if (result.isConfirmed){
                            location.reload();
                        }
                    });
                }
            });
        }
    });
}

function cancledAction(userId) {
    Swal.fire({
        title: 'Cancled TopUp',
        text: 'Are you sure want cancle this topup?',
        icon: 'warning',
        showCancelButton: true,
        cancelButtonText: 'Cancel',
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6'
    }).then((result) => {
        if (result.isConfirmed) {
            var csrfToken = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: '/cc4c0e30-fd6d-4c9d-b80b-e1fefbe20609/' + userId,
                type: 'POST',
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                success: function (response) {
                    if (response.message === 'TopUp request has been Cancled') {
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
                    } else if (response.message === 'Status is not pending') {
                        Swal.fire({
                            title: 'Failed!',
                            text: response.message,
                            icon: 'error',
                            customClass: {
                              confirmButton: 'btn btn-primary'
                            },
                            buttonsStyling: false
                        });
                    } else {
                        Swal.fire({
                            title: 'Failed!',
                            text: response.message,
                            icon: 'error',
                            customClass: {
                              confirmButton: 'btn btn-primary'
                            },
                            buttonsStyling: false
                        });
                    }
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
                        if (result.isConfirmed){
                            location.reload();
                        }
                    });
                }
            });
        }
    });
}