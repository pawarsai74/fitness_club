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
                        <div class="col-lg-6 col-md-6 log-det">
                            <div class="small-logo">
                            <i class="fa-solid fa-dumbbell"></i> <span class="fw-bold">Fitness Club Log-In</span>
                            </div>
                            <p class="dfmn">Log-in using your Credentials. </p>
                            <div class="mb-3">
                                <?php if(!empty(session()->getTempdata('wrong'))){ ?>
                                    <div class="alert alert-dark text-center text-white font-weight-bold"><?= session()->getTempdata('wrong');  ?></div>
                                    <a href="<?= base_url('payment/pay_membership'); ?>" class="btn btn-success btn-round text-white">Proceed to Pay</a>
                                <?php } ?>
                            </div>
                            <form method="post" action="<?= base_url('home/login'); ?>">
                                <div class="text-box-cont">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-image-portrait"></i></span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Username" name="username" value="">
                                    </div>
                                    <div class="text-danger mb-3"><?php if(isset($form_error) && $form_error->hasError('username')){ echo $form_error->getError('username');} ?></div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-lock"></i></span>
                                        </div>
                                        <input type="password" class="form-control" placeholder="Password" name="pass">
                                    </div>
                                    <div class="text-danger mb-3"><?php if(isset($form_error) && $form_error->hasError('pass')){ echo $form_error->getError('pass');} ?></div>

                                    <div class="input-group center">
                                        <button class="btn btn-dark btn-round" name="sign_in">SIGN IN</button>
                                    </div>
                                    <div class="row">
                                        <p class="forget-p">Forget Password? <a href="" data-bs-toggle="modal" data-bs-target="#exampleModal"><span id="reset-password">Reset Password</span></a></p>
                                    </div>
                                    <div class="row">
                                        <p class="small-info">Connect With Social Media</p>
                                    </div>
                                </div>
                            </form>

                            <div class="row">
                                <ul>
                                    <li><i class="fab fa-facebook-f"></i></li>
                                    <a href="<?= $loginButton; ?>"><li><i class="fab fa-google-plus-g"></i></li></a>
                                    <li><i class="fab fa-linkedin-in"></i></li>
                                </ul>
                            </div>
                          </div>
                        <div class="col-lg-6 col-md-6 box-de">
                           <div class="inn-cover">
                               <div class="ditk-inf">
                                   <div class="small-logo">
                                   <i class="fa-solid fa-dumbbell"></i> Fitness Club
                            </div>
                                    <h3 class="w-100">Don't Have an Account ?</h3>
                                    <p class="">Simply Click on Below "Sign Up" Button to get Account"</p>
                                    <a href="<?= base_url('home/membership'); ?>">
                                    <button type="button" class="btn btn-outline-light sign-up">SIGN UP</button>
                                    </a>
                                </div>
                           </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- Reset Password Model -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header text-danger">
        <h1></h1><h4 class=""><i class="fa-solid fa-dumbbell"></i> Fitness Club Verification</h4> <h2></h2>
      </div>
      <form id="reset_password_form" method="" action="">
        <div class="modal-body text-center">
          <p class="text-muted mb-3">Enter your Registered Email to verify</p>
          <div class="input-group mb-3">
              <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-image-portrait"></i></span>
              </div>
              <input type="text" class="form-control" placeholder="Registered Email-id" name="verify_email">
          </div>
        </div>
      <div class="modal-footer">
        <button class="btn btn-primary" id="verification">Send Reset Link</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
      </div>
    </form>
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
