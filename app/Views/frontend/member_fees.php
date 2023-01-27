<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Log-In Form</title>

    <link rel="shortcut icon" href="<?= base_url('assets/frontend'); ?>/images_login/fav.jpg">
    <link rel="stylesheet" href="<?= base_url('assets/frontend'); ?>/css_login/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/frontend'); ?>/css_login/style.css"/>
    <link rel="shortcut icon" href="<?= base_url('assets/backend'); ?>/images/favicone-1.png"  sizes="32x32"/>

    <style media="screen">
      .modal-footer{
        justify-content: center!important;
      }
      #verify_email-error{
            margin-top: 10px;
            color: red;
        }
        /* body {
	height: 100vh;
	justify-content: center;
	align-items: center;
	display: flex;
	background-color: #eee
} */

.launch {
	height: 50px
}

.close {
	font-size: 21px;
	cursor: pointer
}

.modal-body {
	height: 450px
}

.nav-tabs {
	border: none !important
}

.nav-tabs .nav-link.active {
	color: #495057;
	background-color: #fff;
	border-color: #ffffff #ffffff #fff;
	border-top: 3px solid blue !important
}

.nav-tabs .nav-link {
	margin-bottom: -1px;
	border: 1px solid transparent;
	border-top-left-radius: 0rem;
	border-top-right-radius: 0rem;
	border-top: 3px solid #eee;
	font-size: 20px
}

.nav-tabs .nav-link:hover {
	border-color: #e9ecef #ffffff #ffffff
}

.nav-tabs {
	display: table !important;
	width: 100%
}

.nav-item {
	display: table-cell
}

.form-control {
	border-bottom: 1px solid #eee !important;
	font-weight: 600
}

.form-control:focus {
	color: #495057;
	background-color: #F8F8F8;
	border: 1px solid #b1b1b152!important;
	outline: 0;
	box-shadow: none
}

.inputbox {
	position: relative;
	margin-bottom: 20px;
	width: 100%
}

.inputbox span {
	position: absolute;
	top: 0px;
	left: 11px;
	transition: 0.5s
}

.inputbox i {
	position: absolute;
	top: 13px;
	right: 8px;
	transition: 0.5s;
	color: #3F51B5
}

input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
	-webkit-appearance: none;
	margin: 0
}

.inputbox input:focus~span {
	transform: translateX(-0px) translateY(-15px);
	font-size: 12px
}

.inputbox input:valid~span {
	transform: translateX(-0px) translateY(-15px);
	font-size: 12px
}

.pay button {
	height: 47px;
	border-radius: 37px
}
    </style>
</head>
<body>
     <!-- Navbar Start -->
    <div class="container-fluid p-0 nav-bar">
        <nav class="navbar navbar-expand-lg bg-none navbar-dark py-3">
            <a href="<?= base_url('home/index'); ?>" class="navbar-brand">
                <h1 class="display-4 font-weight-bold text-uppercase text-white shadow bg-body rounded logo">Fitness Club</h1>
            </a>
        </nav>
    </div>
    <!-- Navbar End -->

    <div class="container-fluid ">
        <div class="container ">
            <div class="row cdvfdfd">
                <div class="col-lg-10 col-md-12 login-box">
                    <div class="row">
                        <div class="col-lg-10 col-md-10 log-det">
                            <div class="small-logo">
                            <i class="fa-solid fa-dumbbell"></i> <span class="fw-bold">Fitness Club Membership</span>
                            </div>
                            <p class="dfmn">Select membership duration and Proceed to pay</p>
                            <div>
                                <?php if(!empty(session()->getTempdata('wrong'))){ ?>
                                    <div class="alert alert-dark text-center text-white font-weight-bold"><?= session()->getTempdata('wrong');  ?></div>
                                <?php } ?>
                            </div>
                            <form method="post" action="<?= base_url('payment/pay_membership'); ?>">
                                <div class="text-box-cont">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-calendar"></i></span>
                                        </div>
                                        <select class="form-control" name="membership_duration">
                                          <option value="">Select Membership Duration</option>
                                          <option value="Monthly">Monthly</option>
                                          <option value="Half-year">Half-year</option>
                                          <option value="Annual">Annual</option>
                                        </select>
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-rupee"></i></span>
                                        </div>
                                        <?php  ?>
                                        <input type="text" class="form-control" readonly placeholder="Fees" value="" id="member_fees">
                                    </div>

                                    <div class="input-group center">
                                        <a class="btn btn-dark btn-round text-white proceed" data-bs-toggle="modal" data-bs-target="#staticBackdrop" name="pay">Proceed to Pay</a>
                                    </div>
                                    <div class="row">
                                        <p class="forget-p">do you wan pay later? <a href="<?= base_url('home/index'); ?>" ><span>Pay Later</span></a></p>
                                    </div>
                                    <div class="row">
                                        <p class="small-info">Connect With Social Media</p>
                                    </div>
                                </div>
                            </form>

                            <div class="row">
                                <ul>
                                    <li><i class="fab fa-facebook-f"></i></li>
                                    <a href=""><li><i class="fab fa-google-plus-g"></i></li></a>
                                    <li><i class="fab fa-linkedin-in"></i></li>
                                </ul>
                            </div>
                          </div>
                        <div class="rounded-right col-md-2 bg-secondary">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- Reset Password Model -->

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-body">
            <div class="text-right"> <i class="fa fa-close close" data-bs-dismiss="modal"></i> </div>
            <div class="tabs mt-3">
               <ul class="nav nav-tabs" id="myTab" role="tablist">
                  <li class="nav-item" role="presentation"> <a class="nav-link active" id="visa-tab" data-toggle="tab" href="#visa" role="tab" aria-controls="visa" aria-selected="true"> <img src="https://i.imgur.com/sB4jftM.png" width="80"> </a> </li>
                  <li class="nav-item" role="presentation"> <a class="nav-link" id="paypal-tab" data-toggle="tab" href="#paypal" role="tab" aria-controls="paypal" aria-selected="false"> <img src="https://i.imgur.com/yK7EDD1.png" width="80"> </a> </li>
               </ul>
               <div class="tab-content" id="myTabContent">
                  <div class="tab-pane fade show active" id="visa" role="tabpanel" aria-labelledby="visa-tab">
                     <div class="mt-4 mx-4">
                        <div class="text-center">
                           <h5>Credit card</h5>
                        </div>
                        <div class="form mt-3">
                           <div class="inputbox"> <input type="text" name="name" class="form-control" required="required"> <span>Cardholder Name</span> </div>
                           <div class="inputbox"> <input type="text" name="name" min="1" max="999" class="form-control" required="required"> <span>Card Number</span> <i class="fa fa-eye"></i> </div>
                           <div class="d-flex flex-row">
                              <div class="inputbox"> <input type="text" name="name" min="1" max="999" class="form-control" required="required"> <span>Expiration Date</span> </div>
                              <div class="inputbox ms-3"> <input type="text" name="name" min="1" max="999" class="form-control" required="required"> <span>CVV</span> </div>
                           </div>
                           <div class="px-5 pay"> <button class="btn btn-primary btn-block proceed">Proceed To pay</button> </div>
                        </div>
                     </div>
                  </div>
                  <div class="tab-pane fade" id="paypal" role="tabpanel" aria-labelledby="paypal-tab">
                     <div class="px-5 mt-5">
                        <div class="inputbox"> <input type="text" name="name" class="form-control" required="required"> <span>Paypal Email Address</span> </div>
                        <div class="pay px-5"> <button class="btn btn-primary btn-block proceed">Proceed To pay</button> </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
</body>

<script src="<?= base_url('assets/frontend'); ?>/js_login/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script type='text/javascript'>var _base_url = "<?=  base_url() ?>"; </script>
<script src="<?= base_url('assets/frontend'); ?>/js/form-ajax.js"></script>
<script src="<?= base_url('assets/frontend'); ?>/js_login/popper.min.js"></script>
<script src="<?= base_url('assets/frontend'); ?>/js_login/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="<?= base_url('assets/frontend'); ?>/js_login/script.js"></script>
</html>
