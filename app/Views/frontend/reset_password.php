<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Log-In Form</title>

    <link rel="shortcut icon" href="<?= base_url('assets/frontend'); ?>/images_login/fav.jpg">
    <link rel="stylesheet" href="<?= base_url('assets/frontend'); ?>/css_login/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/frontend'); ?>/css_login/style.css"/>
    <link rel="shortcut icon" href="<?= base_url('assets/backend'); ?>/images/favicone-1.png"  sizes="32x32"/>

    <style media="screen">
      .modal-footer{
        justify-content: center!important;
      }
      #new_password-error, #conf_pass-error{
            margin-left: 70px;
            margin-top: 8px;
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
                        <div class="col-lg-12 col-md-12 log-det">
                            <div class="small-logo">
                            <i class="fa-solid fa-key"></i> <span class="fw-bold">Change Password</span>
                            </div>
                            <p class="dfmn">Welcome <span class="text-danger fw-bold"><?= $member['fullname']?>...!</span>, Reset Your Password here</p>
                            <div>
                                <?php if(!empty(session()->getTempdata('wrong'))){ ?>
                                    <div class="alert alert-dark text-center text-white font-weight-bold"><?= session()->getTempdata('wrong');  ?></div>
                                <?php } ?>
                            </div>
                            <form method="" action="" id="reset_form">
                                <div class="text-box-cont">
                                  <div class="input-group mb-3">
                                      <div class="input-group-prepend">
                                          <span class="input-group-text" id="basic-addon1"><i class="fas fa-lock"></i></span>
                                      </div>
                                      <input type="password" class="form-control" placeholder="Enter New password" id="new_password" name="new_pass">
                                      <input type="hidden" class="form-control" placeholder="Enter New password" id="user_id" name="id" value="<?= $member['id']?>">
                                  </div>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="fas fa-lock"></i></span>
                                        </div>
                                        <input type="password" class="form-control" placeholder="Confirm New Password" name="conf_pass">
                                    </div>
                                    <div class="input-group center">
                                        <button class="btn btn-dark btn-round" name="sign_in" id="reset_pass">Reset Password</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
<script src="<?= base_url('assets/frontend'); ?>/js_login/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
<script type='text/javascript'>var _base_url = "<?=  base_url() ?>"; </script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="<?= base_url('assets/frontend'); ?>/js/form-ajax.js"></script>
<script src="<?= base_url('assets/frontend'); ?>/js_login/popper.min.js"></script>
<script src="<?= base_url('assets/frontend'); ?>/js_login/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="<?= base_url('assets/frontend'); ?>/js_login/script.js"></script>
</html>
