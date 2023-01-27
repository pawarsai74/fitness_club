<div class="main-panel">
     <div class="content-wrapper">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title text-center">Admin Details</h4>
              <div class="table-responsive">
                  <table class="table table-hover table-bordered">
                    <thead  class="text-center">
                      <tr>
                        <th>User Id</th>
                        <th>Profile Picture</th>
                        <th>Fullname</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Action</th>
                      </tr>
                  </thead>
                    <tbody class="text-center">
                      <?php foreach ($admin_details as $value){ ?>
                      <tr>
                        <td><?= $value['user_id']; ?></td>
                        <td><img src="<?= base_url('assets/backend/images/'.$value['profile_pic']); ?>" style="width:100px; height:100px;" alt=""></td>
                        <td><?= $value['fullname']; ?></td>
                        <td><?= $value['email']; ?></td>
                        <td><?= $value['role']; ?></td>
                        <td><a href="<?= site_url('admin/delete/').$value['user_id']; ?>"><button type="button" value="<?= $value['user_id']; ?>"  class="btn btn-danger mb-3 delete-admin px-3">Delete</button></a><br><a href="<?= site_url('admin/edit/').$value['user_id']; ?>"><button type="button" class="btn btn-success px-4">Edit</button></a></td>
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
