<div class="main-panel">
  <div class="content-wrapper">
    <div class="col-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title text-center">Update Member here</h4>
          <?php if(!empty(session()->getTempdata('added'))){ ?>
            <div class="alert alert-success text-center"><?= session()->getTempdata('added');?></div>
            <?php  }  ?>
          <form class="forms-sample" action="<?= base_url('members/update_sm_login');?>" method="post" enctype="multipart/form-data">
            <div class="container">
              <div class="row">                
                <input type="hidden" class="form-control" name="id" value="<?= $members['id']; ?>" placeholder="id">
                <div class="form-group col-md-6">
                  <label for="exampleInputName1">Name</label>
                  <input type="text" class="form-control" id="exampleInputName1" name="fullname" value="<?= $members['fullname']; ?>" placeholder="Fullname">
                  </div>
                <div class="form-group col-md-6">
                  <label for="exampleInputEmail3">Email address</label>
                  <input type="text" class="form-control" id="exampleInputEmail3" name="email" readonly value="<?= $members['email']; ?>" placeholder="Email">
                  </div>
                <div class="form-group col-md-6">
                  <label for="exampleInputCity1">Mobile</label>
                  <input type="text" class="form-control" id="mobile" name="mobile" value="<?= $members['mobile']; ?>" placeholder="Mobile">
                  </div>
                <div class="form-group col-md-6">
                  <label for="exampleInputPassword4">Age</label>
                  <input type="text" class="form-control" id="exampleInputPassword4" name="age" value="<?= $members['age']; ?>" placeholder="Age">
                  </div>
                <div class="form-group col-md-6">
                  <label for="exampleInputEmail3">Gender</label>
                  <select class="form-control" name="gender">
                      <option value="">Gender</option>
                      <option value="Male" <?= $members['gender'] == 'Male' ? 'selected' : '' ?>>Male</option>
                      <option value="Female" <?= $members['gender'] == 'Female' ? 'selected' : '' ?>>Female</option>
                      <option value="Other" <?= $members['gender'] == 'Other' ? 'selected' : '' ?>>Other</option>
                  </select>
                  </div>
                <div class="form-group col-md-6">
                  <label for="exampleInputEmail3">Joining Date</label>
                  <input type="date" class="form-control" id="date" name="created_at" value="<?= date('Y-m-d', strtotime($members['created_at']));  ?>"/>
                  </div>
                <div class="form-group col-md-6">
                  <label for="exampleInputEmail3">Expire Date</label>
                  <input type="date" class="form-control" id="expire_date" name="expire_date" value="<?= date('Y-m-d', strtotime($members['expire_date']));  ?>"/>
                  </div>
                <div class="form-group col-md-6">
                  <label for="exampleInputEmail3">Fees Status</label>
                  <select class="form-control" name="fees">
                    <option value="<?= $members['fees']; ?>">Fees Status</option>
                      <option value="Pending" <?= $members['fees'] == 'Pending' ? 'selected' : '' ?>>Pending</option>
                      <option value="Paid" <?= $members['fees'] == 'Paid' ? 'selected' : '' ?>>Paid</option>
                  </select>
                  </div>
                <div class="form-group col-md-6">
                  <label for="exampleInputPassword4">Current Weight</label>
                  <input type="text" class="form-control" id="current_weight" name="current_weight" value="<?= $members['current_weight']; ?>" placeholder="Current Weight">
                  </div>
                <div class="form-group col-md-6">
                  <label for="exampleInputPassword4">Desired Weight</label>
                  <input type="text" class="form-control" id="desired_weight" name="desired_weight" value="<?= $members['desired_weight']; ?>" placeholder="Current Weight">
                  </div>
                <div class="form-group col-md-6">
                  <label for="exampleInputEmail3">Batch Timing</label>
                  <select class="form-control" name="batch">
                    <option value="">Batch Timing</option>
                    <option value="Morning" <?=$members['batch'] == 'Morning' ? 'selected' : '' ?>>Morning</option>
                    <option value="After-Noon" <?=$members['batch'] == 'After-Noon' ? 'selected' : '' ?>>After-Noon</option>
                    <option value="Evening" <?=$members['batch'] == 'Evening' ? 'selected' : '' ?>>Evening</option>
                  </select>
                  </div>
                <div class="form-group col-md-6">
                  <label for="exampleInputEmail3">Need Trainer?</label>
                  <select class="form-control" name="trainer">
                    <option value="">Need Personal Trainer?</option>
                    <option value="yes" <?=$members['trainer'] == 'yes' ? 'selected' : '' ?>>Yes</option>
                    <option value="no" <?=$members['trainer'] == 'no' ? 'selected' : '' ?>>No</option>
                  </select>
                  </div>
                <div class="form-group col-md-6 offset-md-3">
                <button type="submit" class="btn btn-primary me-2">Update</button>
                <a href="<?= base_url('members/sm_login'); ?>" class="btn btn-dark cancel">Cancel</a>
              </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
