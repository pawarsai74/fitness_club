<div class="main-panel">
     <div class="content-wrapper">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title text-center">Regular Gym Members</h4>
                <?php

use App\Controllers\Members;

 if(!empty(session()->getTempdata('update'))) { ?>
                  <div class="alert alert-success" role="alert"><?= session()->getTempdata('updated'); ?></div>
                <?php } ?>
              <div class="table-responsive">
                  <table class="table table-hover table-bordered">
                    <thead class="text-center">
                      <tr>
                        <th>Id</th>
                        <th>Fullname</th>
                        <th>Email</th>
                        <th>Joining Date</th>
                        <th>Membership Expires</th>
                        <th>Batch</th>
                        <th>Membership Fees</th>
                        <th>Action</th>
                      </tr>
                  </thead>
                    <tbody class="text-center">
                      <?php foreach ($memebrs as $value) { ?>
                      <tr>
                        <td><?= $value['id']; ?></td>
                        <td><?= $value['fullname']; ?></td>
                        <td><?= $value['email']; ?></td>
                        <td><?= date("j M Y", (strtotime($value['created_at']))); ?></td>
                        <td><?= date("j M Y", (strtotime("+6 months", strtotime($value['created_at'])))); ?></td>
                        <td><?= $value['batch']; ?></td>
                        <td><?= $value['fees']; ?></td>
                        <td><a href="<?= base_url('Members/edit_sm_login/'.$value['id']); ?>"><button type="button" class="btn btn-success mb-3 px-4">Edit</button></a><br><a href="<?= base_url('Members/delete_sm_login/'.$value['id']); ?>"><button type="button" value="<?= $value['id']; ?>" class="btn btn-danger delete-social-login px-3">Delete</button></a></td>
                      </tr>
                    <?php } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
