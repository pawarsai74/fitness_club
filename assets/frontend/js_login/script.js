$('#verification').click(function () {
  $('#reset_password_form').validate({
    rules:{

        verify_email:{
            required: true,
            email: true
        }
      },
      messages:{

          verify_email:{
              required: "Please Enter your Registered Email-id",
              email: "Please Enter a valid Email"
          }
        },
        submitHandler: function(form) {
            var details = $('#reset_password_form').serialize();
            $.ajax({
                url: _base_url + '/ForgetPassword/index',
                type:'post',
                data: details,
                dataType: "JSON",
                success:function(data){
                  if(data.success){
                    toastr.success(data.msg);
                    $('#reset_password_form').trigger('reset');
                  }else {
                    toastr.error(data.msg);
                  }
                }
            });
        }
      });

});

$('#reset_pass').click(function () {
  let id = $('#user_id').val();
  // alert(id);
  $('#reset_form').validate({
    rules:{

        new_pass:{
            required: true,
            minlength: 3,
            maxlength: 8
        },
        conf_pass:{
            required: true,
            minlength: 3,
            maxlength: 8,
            equalTo: "#new_password"
        }
      },
      messages:{

          new_pass:{
              required: "Please Enter New Password",
              minlength: "Min password length is 3",
              maxlength: "Max password length is 8"
          },
          conf_pass:{
            required: "Please Confirm your Password",
            minlength: "Min password length is 3",
            maxlength: "Max password length is 8",
              equalTo: "Password Not Matching"
          }
        },
        submitHandler: function(form) {
            var details = $('#reset_form').serialize();
            $.ajax({
                url: _base_url + '/ForgetPassword/reset/'+id,
                type:'post',
                data: details,
                success:function(data){
                  swal({
                    title: "Hurrayyyy....!!!",
                    text: "Password reset Succefully....!!!",
                    icon: "success",
                  });
                  $('.swal-button--confirm').click(function () {
                  location.href = _base_url + '/home/login';
                  });
                }
            });
        }
      });

});

$( document ).ready(function() {
    var arr = ['bg_1.jpg','bg_2.jpg','bg_3.jpg'];

    var i = 0;
    setInterval(function(){
        if(i == arr.length - 1){
            i = 0;
        }else{
            i++;
        }
        var img = 'url(../assets/images/'+arr[i]+')';
        $(".full-bg").css('background-image',img);

    }, 4000)

});
