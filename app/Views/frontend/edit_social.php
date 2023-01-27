<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Fitness Club</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free Website Template" name="keywords">
    <meta content="Free Website Template" name="description">

    <!-- Favicon -->
    <link href="<?= base_url('assets/frontend'); ?>/img/favicon.ico" rel="icon">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Flaticon Font -->
    <link href="<?= base_url('assets/frontend'); ?>/lib/flaticon/font/flaticon.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?= base_url('assets/frontend'); ?>/css/style.min.css" rel="stylesheet">
      <link rel="shortcut icon" href="<?= base_url('assets/backend'); ?>/images/favicone-1.png"  sizes="32x32"/>
      <style>
        .error{
          color:red;
        }
      </style>
</head>

<body class="bg-white">
    <!-- Navbar Start -->
    <div class="container-fluid p-0 nav-bar">
        <nav class="navbar navbar-expand-lg bg-none navbar-dark py-3">
            <a href="<?= base_url('home/index'); ?>" class="navbar-brand">
              <h1 class="m-0 display-4 font-weight-bold text-uppercase text-white">Fitness Club</h1>
                <span class="m-0 font-weight-bold text-uppercase text-white">Home/Membership</span>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
        </nav>
    </div>
    <!-- Navbar End -->
    <section class="h-100 h-custom" style="background-color: #8fc4b7;">
      <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-lg-8 col-xl-6">
            <div class="card rounded-3">
              <img src="<?= base_url('assets/frontend'); ?>/img/bg.jpg"
                class="w-100" style="border-top-left-radius: .3rem; border-top-right-radius: .3rem;"
                alt="Sample photo">
              <div class="card-body p-4 p-md-5">
                <?php if(!empty(session()->getTempdata('added'))){ ?>
                  <div class="alert alert-success text-center text-dark font-weight-bold "><?= session()->getTempdata('added'); ?></div>
                <?php } ?>
                <h3 class="mb-4 pb-2 pb-md-0 mb-md-5 px-md-2 text-center">Update Details here</h3>
                <form method="post" action="<?= base_url('home/update_social_login'); ?>" enctype="multipart/form-data">
                    <div class="container">
                      <div class="row">
                        <div class="col-md-12 control-group mt-3">
                            <input type="text" class="form-control" name="fullname" placeholder="Your Name" value="<?= $member['fullname'];  ?>"/>
                        </div>
                        <div class="col-md-12 control-group mt-3">
                            <input type="email" class="form-control" name="email" placeholder="Your Email" value="<?= $member['email'];  ?>"/>
                        </div>
                        <div class="col-md-12 control-group mt-3">
                            <input type="text" class="form-control" name="mobile" placeholder="Contact No." value="<?= $member['mobile'];  ?>"/>
                        </div>
                        <div class="form-group col-md-6">
                          <label for="exampleInputEmail3">Joining Date</label>
                          <input type="date" class="form-control" id="date" name="created_at" readonly value="<?= date('Y-m-d', strtotime($member['created_at']));  ?>"/>
                        </div>
                        <div class="form-group col-md-6">
                          <label for="exampleInputEmail3">Expire Date</label>
                          <input type="date" class="form-control" id="expire_date" name="expire_date" readonly value="<?= date('Y-m-d', strtotime(date('j M Y', strtotime("+6 months", strtotime($member['expire_date'])))));  ?>"/>
                        </div>
                        <div class="col-md-6 control-group mt-3">
                            <input type="text" class="form-control" name="age" placeholder="Your Age" value="<?= $member['age'];  ?>"/>
                        </div>
                        <div class="col-md-6 control-group mt-3">
                            <input type="text" class="form-control" name="current_weight" placeholder="Current weight (Kg)" value="<?= $member['current_weight'];  ?>"/>
                        </div>
                        <div class="col-md-6 control-group mt-3">
                            <input type="text" class="form-control" name="desired_weight" placeholder="Desired weight (Kg)" value="<?= $member['desired_weight'];  ?>"/>
                        </div>
                        <div class="col-md-6 control-group mt-3">
                            <input type="text" class="form-control" name="fees" readonly value="<?= $member['fees'];  ?>"/>
                        </div>
                        <div class="col-md-6 control-group mt-3">
                            <select class="form-control" name="gender" value="">
                              <option value="">Gender</option>
                              <option value="Male" <?=$member['gender'] == 'Male' ? 'selected' : '' ?>>Male</option>
                              <option value="Female" <?=$member['gender'] == 'Female' ? 'selected' : '' ?>>Female</option>
                              <option value="Other" <?=$member['gender'] == 'Other' ? 'selected' : '' ?>>Other</option>
                            </select>
                        </div>
                        <div class="col-md-6 control-group mt-3">
                            <select class="form-control" name="batch">
                              <option value="">Batch Timing</option>
                              <option value="Morning" <?=$member['batch'] == 'Morning' ? 'selected' : '' ?>>Morning</option>
                              <option value="After-Noon" <?=$member['batch'] == 'After-Noon' ? 'selected' : '' ?>>After-Noon</option>
                              <option value="Evening" <?=$member['batch'] == 'Evening' ? 'selected' : '' ?>>Evening</option>
                            </select>
                        </div>
                        <div class="col-md-12 control-group mt-3">
                            <select class="form-control" name="trainer" placeholder="Need Personal Trainer?"  value="">
                              <option value="">Need Personal Trainer?</option>
                              <option value="yes" <?=$member['trainer'] == 'yes' ? 'selected' : '' ?>>Yes</option>
                              <option value="no" <?=$member['trainer'] == 'no' ? 'selected' : '' ?>>No</option>
                            </select>
                        </div>
                        <div class="col-md-6 mt-4 mb-4">
                            <button class="btn btn-outline-primary px-5" type="submit" >Update</button>
                        </div>
                        <div class="col-md-6 mt-4 mb-4">
                            <a href="<?= base_url('home/profile'); ?>" class="btn btn-outline-primary px-5" id="sendMessageButton">Cancel</a>
                        </div>
                      </div>
                    </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
