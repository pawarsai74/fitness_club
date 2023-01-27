$('.delete-member').on('click', function(e) {
e.preventDefault();

var id = $(this).val();

   const swalWithBootstrapButtons = Swal.mixin({
     customClass: {
       confirmButton: 'btn btn-success',
       cancelButton: 'btn btn-danger'
     },
     buttonsStyling: false
   })

   swalWithBootstrapButtons.fire({
     title: 'Are you sure?',
     text: "You won't be able to revert this!",
     icon: 'warning',
     showCancelButton: true,
     confirmButtonText: 'Yes, delete it!',
     cancelButtonText: 'No, cancel!',
     reverseButtons: true
   }).then((result) => {
     if (result.isConfirmed) {
        $.ajax({
            url:  _base_url + '/members/delete/'+id,
            success: function(data) {
                swalWithBootstrapButtons.fire(
                    'Deleted!',
                    'Member data has been deleted.',
                    'success'
                  ).then((confirmed) =>{
                    window.location.reload();
                  });
            }
        });
     } else if (
       /* Read more about handling dismissals below */
       result.dismiss === Swal.DismissReason.cancel
     ) {
       swalWithBootstrapButtons.fire(
         'Cancelled',
         'Member data is safe',
         'error'
       )
     }
   })

});
$('.delete-amenitie').on('click', function(e) {
  e.preventDefault();

  var id = $(this).val();

     const swalWithBootstrapButtons = Swal.mixin({
       customClass: {
         confirmButton: 'btn btn-success',
         cancelButton: 'btn btn-danger'
       },
       buttonsStyling: false
     })

     swalWithBootstrapButtons.fire({
       title: 'Are you sure?',
       text: "You won't be able to revert this!",
       icon: 'warning',
       showCancelButton: true,
       confirmButtonText: 'Yes, delete it!',
       cancelButtonText: 'No, cancel!',
       reverseButtons: true
     }).then((result) => {
       if (result.isConfirmed) {
          $.ajax({
              url:  _base_url + '/amenities/delete/'+id,
              success: function(data) {
                  swalWithBootstrapButtons.fire(
                      'Deleted!',
                      'Amenitie has been deleted.',
                      'success'
                    ).then((confirmed) =>{
                      window.location.reload();
                    });
              }
          });
       } else if (
         /* Read more about handling dismissals below */
         result.dismiss === Swal.DismissReason.cancel
       ) {
         swalWithBootstrapButtons.fire(
           'Cancelled',
           'Amenities data is safe',
           'error'
         )
       }
     })

  });
$('.delete-admin').on('click', function(e) {
    e.preventDefault();

    var id = $(this).val();

       const swalWithBootstrapButtons = Swal.mixin({
         customClass: {
           confirmButton: 'btn btn-success',
           cancelButton: 'btn btn-danger'
         },
         buttonsStyling: false
       })

       swalWithBootstrapButtons.fire({
         title: 'Are you sure?',
         text: "You won't be able to revert this!",
         icon: 'warning',
         showCancelButton: true,
         confirmButtonText: 'Yes, delete it!',
         cancelButtonText: 'Ohh, No!',
         reverseButtons: true
       }).then((result) => {
         if (result.isConfirmed) {
            $.ajax({
                url:  _base_url + '/admin/delete/'+id,
                success: function(data) {
                    swalWithBootstrapButtons.fire(
                        'Deleted!',
                        'Admin data deleted succefully.',
                        'success'
                      ).then((confirmed) =>{
                        window.location.reload();
                      });
                }
            });
         } else if (
           /* Read more about handling dismissals below */
           result.dismiss === Swal.DismissReason.cancel
         ) {
           swalWithBootstrapButtons.fire(
             'Cancelled',
             'Admin data is safe',
             'error'
           )
         }
       })

    });
$('.delete-trainer').on('click', function(e) {
      e.preventDefault();

      var id = $(this).val();

         const swalWithBootstrapButtons = Swal.mixin({
           customClass: {
             confirmButton: 'btn btn-success',
             cancelButton: 'btn btn-danger'
           },
           buttonsStyling: false
         })

         swalWithBootstrapButtons.fire({
           title: 'Are you sure?',
           text: "You won't be able to revert this!",
           icon: 'warning',
           showCancelButton: true,
           confirmButtonText: 'Yes, delete it!',
           cancelButtonText: 'Ohh, No!',
           reverseButtons: true
         }).then((result) => {
           if (result.isConfirmed) {
              $.ajax({
                  url:  _base_url + '/trainer/delete/'+id,
                  success: function(data) {
                      swalWithBootstrapButtons.fire(
                          'Deleted!',
                          'trainer data deleted succefully.',
                          'success'
                        ).then((confirmed) =>{
                          window.location.reload();
                        });
                  }
              });
           } else if (
             /* Read more about handling dismissals below */
             result.dismiss === Swal.DismissReason.cancel
           ) {
             swalWithBootstrapButtons.fire(
               'Cancelled',
               'trainer data is safe',
               'error'
             )
           }
         })

      });
$('.delete-blogs').on('click', function(e) {
        e.preventDefault();

        var id = $(this).val();

           const swalWithBootstrapButtons = Swal.mixin({
             customClass: {
               confirmButton: 'btn btn-success',
               cancelButton: 'btn btn-danger'
             },
             buttonsStyling: false
           })

           swalWithBootstrapButtons.fire({
             title: 'Are you sure?',
             text: "You won't be able to revert this!",
             icon: 'warning',
             showCancelButton: true,
             confirmButtonText: 'Yes, delete it!',
             cancelButtonText: 'Ohh, No!',
             reverseButtons: true
           }).then((result) => {
             if (result.isConfirmed) {
                $.ajax({
                    url:  _base_url + '/blogs/delete_blog/'+id,
                    success: function(data) {
                        swalWithBootstrapButtons.fire(
                            'Deleted!',
                            'blogs data deleted succefully.',
                            'success'
                          ).then((confirmed) =>{
                            window.location.reload();
                          });
                    }
                });
             } else if (
               /* Read more about handling dismissals below */
               result.dismiss === Swal.DismissReason.cancel
             ) {
               swalWithBootstrapButtons.fire(
                 'Cancelled',
                 'blogs data is safe',
                 'error'
               )
             }
           })

        });
 $('.delete-sch').on('click', function(e) {
          e.preventDefault();

          var id = $(this).val();

             const swalWithBootstrapButtons = Swal.mixin({
               customClass: {
                 confirmButton: 'btn btn-success',
                 cancelButton: 'btn btn-danger'
               },
               buttonsStyling: false
             })

             swalWithBootstrapButtons.fire({
               title: 'Are you sure?',
               text: "You won't be able to revert this!",
               icon: 'warning',
               showCancelButton: true,
               confirmButtonText: 'Yes, delete it!',
               cancelButtonText: 'Ohh, No!',
               reverseButtons: true
             }).then((result) => {
               if (result.isConfirmed) {
                  $.ajax({
                      url:  _base_url + '/schedule/delete_sch/'+id,
                      success: function(data) {
                          swalWithBootstrapButtons.fire(
                              'Deleted!',
                              'schedule data deleted succefully.',
                              'success'
                            ).then((confirmed) =>{
                              window.location.href = _base_url + '/schedule/view_sch/';
                            });
                      }
                  });
               } else if (
                 /* Read more about handling dismissals below */
                 result.dismiss === Swal.DismissReason.cancel
               ) {
                 swalWithBootstrapButtons.fire(
                   'Cancelled',
                   'schedule data is safe',
                   'error'
                 )
               }
             })

          });
$('.delete-mail').on('click', function(e) {
          e.preventDefault();

          var id = $(this).val();

             const swalWithBootstrapButtons = Swal.mixin({
               customClass: {
                 confirmButton: 'btn btn-success',
                 cancelButton: 'btn btn-danger'
               },
               buttonsStyling: false
             })

             swalWithBootstrapButtons.fire({
               title: 'Are you sure?',
               text: "You won't be able to revert this!",
               icon: 'warning',
               showCancelButton: true,
               confirmButtonText: 'Yes, delete it!',
               cancelButtonText: 'Ohh, No!',
               reverseButtons: true
             }).then((result) => {
               if (result.isConfirmed) {
                  $.ajax({
                      url:  _base_url + '/contact/delete/'+id,
                      success: function(data) {
                          swalWithBootstrapButtons.fire(
                              'Deleted!',
                              'Email data deleted succefully.',
                              'success'
                            ).then((confirmed) =>{
                              window.location.href = _base_url + '/contact/enquiries/';
                            });
                      }
                  });
               } else if (
                 /* Read more about handling dismissals below */
                 result.dismiss === Swal.DismissReason.cancel
               ) {
                 swalWithBootstrapButtons.fire(
                   'Cancelled',
                   'Email data is safe',
                   'error'
                 )
               }
             })

          });
$('.delete-social-login').on('click', function(e) {
    e.preventDefault();

     var id = $(this).val();

        const swalWithBootstrapButtons = Swal.mixin({
          customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger'
          },
          buttonsStyling: false
        })
        swalWithBootstrapButtons.fire({
          title: 'Are you sure?',
          text: "You won't be able to revert this!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonText: 'Yes, delete it!',
          cancelButtonText: 'Ohh, No!',
          reverseButtons: true
        }).then((result) => {
          if (result.isConfirmed) {
             $.ajax({
                 url:  _base_url + '/members/delete_sm_login/'+id,
                 success: function(data) {
                     swalWithBootstrapButtons.fire(
                         'Deleted!',
                         'Social Login deleted succefully.',
                         'success'
                       ).then((confirmed) =>{
                         window.location.href = _base_url + '/members/sm_login/';
                       });
                 }
             });
          } else if (
            /* Read more about handling dismissals below */
            result.dismiss === Swal.DismissReason.cancel
          ) {
            swalWithBootstrapButtons.fire(
              'Cancelled',
              'Social Login is safe',
              'error'
            )
          }
        })

     });
