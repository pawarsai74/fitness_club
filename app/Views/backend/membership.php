<div class="main-panel">
     <div class="content-wrapper">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title text-center">Regular Gym Members</h4>
                  <input type="text" name="search_member" id="search" onkeyup="searchKeyword(this.value)" class="form-control mb-3 text-white" placeholder="Search Members">

                <?php if(!empty(session()->getTempdata('update'))) { ?>
                  <div class="alert alert-success" role="alert"><?= session()->getTempdata('updated'); ?></div>
                <?php } ?>
              <div class="table-responsive" >
                  <table class="table table-hover table-bordered">
                    <thead class="text-center">
                      <tr>
                        <th>Id</th>
                        <th>Profile Pic</th>
                        <th>Fullname</th>
                        <th>Email</th>
                        <th>Membership Expires</th>
                        <th>Batch</th>
                        <th>Membership Fees</th>
                        <th>Action</th>
                      </tr>
                  </thead>
                    <tbody class="text-center" id="members_details">
                      <?php foreach ($members as $value) { ?>
                      <tr>
                        <td><?= $value['id']; ?></td>
                        <td><img src="<?= base_url('assets/backend/images/'.$value['file']); ?>" style="width:100px;height:100px"></td>
                        <td><?= $value['fullname']; ?></td>
                        <td><?= $value['email']; ?></td>
                        <td><?= date("j M Y", (strtotime($value['expire_date']))); ?></td>
                        <td><?= $value['batch']; ?></td>
                        <td><?= $value['fees']; ?></td>
                        <td><a href="<?= base_url('members/edit_member/'.$value['id']); ?>"><button type="button" class="btn btn-success mb-3 px-4">Edit</button></a><br><a href="<?= base_url('members/delete/'.$value['id']); ?>"><button type="button" value="<?= $value['id']; ?>"  class="btn btn-danger delete-member px-3">Delete</button></a></td>
                      </tr>
                    <?php } ?>
                    </tbody>
                  </table>
                </div>
                <?php $pager->setPath('fitness_club/Members/membership'); ?>
                <?= $pager->links_5(); ?>
              </div>
            </div>
          </div>
        </div>
      </div>
