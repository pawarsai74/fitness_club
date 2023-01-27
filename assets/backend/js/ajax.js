$("#feedback").click(function() {
    $('#replay').validate({

        rules: {

            admin_replay: {
                required: true
            }

        },
        messages: {

            admin_replay: {
                required: 'We need to replay on this Enquiry'

            }
        },
        submitHandler: function(form) {
            var formdata = $('#replay').serialize();
            $.ajax({
                url: _base_url + '/contact/sent',
                type: 'post',
                data: formdata,
                success: function(data) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Replay Sent!',
                        text: 'Check other Enquires too!',
                      });

                }
            });
        }
    });
});
$("#add").click(function() {
    $('#add_sch').validate({

        rules: {

            day: {
                required: true
            },
            timing: {
                required: true
            },
            exercise: {
                required: true
            },
            trainer: {
                required: true
            }

        },
        messages: {

            day: {
                required: 'Please Select Day'
            },
            timing: {
                required: 'Please Select timing'
            },
            exercise: {
                required: 'Please Select exercise'
            },
            trainer: {
                required: 'Please Select trainer'
            }
        }
    });
});
$("#update").click(function() {
    $('#edit_sch').validate({

        submitHandler: function(form) {
            var formdata = $('#edit_sch').serialize();
            $.ajax({
                url: _base_url + '/schedule/update_sch',
                type: 'post',
                data: formdata,
                success: function(data) {
                    window.location.href = _base_url + '/schedule/view_sch';
                }
            });
        }
    });
});
$("#find").click(function() {
    $('#search_sch').validate({

        rules: {

            day: {
                required: true
            },
            timing: {
                required: true
            }
        },
        messages: {

            day: {
                required: 'Please Select Day'
            },
            timing: {
                required: 'Please Select timing'
            }
        }
    });
});
