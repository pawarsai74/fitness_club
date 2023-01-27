$('#memberForm').on('submit', function(e) {

e.preventDefault();

  $('#memberForm').validate({

      rules:{

          name:{
              required: true
          },
          email:{
              required: true,
              email:true,
              remote: {
               url: _base_url + '/Members/check_email',
               type: "post",
               data: {
                  email: function() {
                   return $("#email").val();
                   }
               }
          }
          },
          password:{
              required: true,
              minlength: 5
          },
          conf_password:{
              required: true,
              minlength: 5,
              equalTo: "#password"
          },
          mobile:{
              required: true,
              digits: true
          },
          date:{
              required: true
          },
          gender:{
              required: true
          },
          age:{
              required: true,
              digits: true
          },
          batch:{
              required: true
          },
          current_weight:{
              required: true,
              number: true
          },
          desired_weight:{
              required: true,
              number: true
          },
          trainer:{
              required: true
          }

      },
      messages:{

        name:{
            required: 'Please Enter your name'
        },
        email:{
            required: 'Please Enter your Mail id',
            remote: 'This Email-id is already Register'
        },
        password:{
            required: 'Enter your secret password'
        },
        conf_password:{
            required: 'Password Not match'
        },
        mobile:{
            required: 'Please Enter your Mobile No.',
            digits: 'Please Enter numbers only'
        },
        date:{
            required: 'Please select joining Date'
        },
        gender:{
            required: 'Please Select your Gender'
        },
        age:{
            required: 'Please Enter your Age',
            digits:'Numbers and Special charcters not allowed'
        },
        fees:{
            required: 'Please Confirm Fees Paid or Pending'
        },
        batch:{
            required: 'Please Select your Batch Schedule'
        },
        current_weight:{
            required: 'Please Enter your Current weight in kgs',
            number: 'Please Enter numbers only'
        },
        desired_weight:{
            required: 'Please Enter your Desired weight in kgs',
            number: 'Please Enter numbers only'
        },
        trainer:{
            required: 'Please Confirm Do you need Personal Trainer?'
        }

      }
  });
  // Ajax form submission with image
  if ($('#memberForm').validate){

    var formData = new FormData(this);
    // console.log(formData);
    //We can add more values to form data
    //formData.append("key", "value");

    $.ajax({
      url: _base_url + '/home/membership',
      type: "POST",
      cache: false,
      data: formData,
      processData: false,
      contentType: false,
      dataType: "JSON",
      success: function(data) {
        if (data.success == true) {
          swal({
            title: data.msg,
            text: data.update,
            icon: "success",
          });
          $('#memberForm').trigger('reset');
          $('.swal-button').on('click', function() {
            location.href =  _base_url + '/Payment/pay_membership';
          });
        }else{
          swal({
            title: "Error",
            text: "Something is missing, Check Again....",
            icon: "error",
          });
        }
      },
      error: function(jqXHR, textStatus, errorThrown) {
        swal({
          title: "Error",
          text: "Something is missing, Check Again....",
          icon: "error",
        });
      }
    });
  }

   if(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(memberForm.email.value)){
     $("#invalid").text("");
      return (true);
    }else{
      $("#invalid").text("Email id is not valid");
      $('#email').focus();
      return (false);
  }
});

$('#sendMessageButton').click(function () {
  $('#contactForm').validate({

      rules:{

          fullname:{
              required: true
          },
          email:{
              required: true,
              email:true
          },
          subject:{
              required: true
          }

      },
      messages:{

        fullname:{
            required: 'Please Enter your Fullname'
        },
        email:{
            required: 'Please Enter your Mail id'
        },
        subject:{
            required: 'Enter your Enquiry Subject'
        }
      },
      submitHandler: function(form) {
          var details = $('#contactForm').serialize();
          $.ajax({
              url: _base_url + '/home/contact',
              type:'post',
              data: details,
              success:function(data){
                swal({
                  title: "Thanks....!",
                  text: "We will contact you soon....!!",
                  icon: "success",
                });
                $('#contactForm').trigger('reset');
              }
          });
      }
  });
  if(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(contactForm.email.value)){
    $("#invalid_email").text("");
    return (true);
  }else{
    $("#invalid_email").text("Email id is not valid");
    $('#email').focus();
    return (false);
  }
});
$('select').on('change', function() {
let duration = this.value;
let fees = $("#member_fees").val();
if(duration == "Monthly"){
  $("#member_fees").val(500+' '+'/-');
  $(".proceed").html('Proceed to Pay <b>500</b>'+' '+'/-')
}else if(duration == "Half-year"){
  $("#member_fees").val(2800+' '+'/-');
  $(".proceed").html('Proceed to Pay <b>2800</b>'+' '+'/-')
}else if(duration == "Annual"){
  $("#member_fees").val(5500+' '+'/-');
  $(".proceed").html('Proceed to Pay <b>5500</b>'+' '+'/-')
}else{
  $("#member_fees").val("fees");
  $(".proceed").html('Proceed to Pay')
}

});
