    <div class="main-panel">
         <div class="content-wrapper">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title text-center">Trainer Details</h4>
                    <input type="text" id="search_trainers" onkeyup="search(this.value)" class="form-control mb-3 text-white" placeholder="Search Trainers">
                  <div class="table-responsive">
                      <table class="table table-hover table-bordered">
                        <thead>
                          <tr>
                            <th>Trainer Id</th>
                            <th>Trainer Name</th>
                            <th>Trainer Pic</th>
                            <th>Gender</th>
                            <th>Speciality</th>
                            <th>Experience</th>
                            <th>Age</th>
                            <th>Action</th>
                          </tr>
                      </thead>
                        <tbody id="trainers_info">
                          <?php foreach ($trainer as $data) { ?>
                          <tr>
                            <td><?= $data['trainer_id']; ?></td>
                            <td><?= $data['fullname']; ?></td>
                            <td><img src="<?= base_url('assets/backend/images/'.$data['img']); ?>" style="width:100px; height:100px;" alt="image"></td>
                            <td><?= $data['gender']; ?></td>
                            <td><?= $data['specialty']; ?></td>
                            <td><?= $data['experience']; ?></td>
                            <td><?= $data['age']; ?></td>
                            <td><a href="<?= site_url('trainer/delete/').$data['trainer_id']; ?>"><button type="button" value="<?= $data['trainer_id']; ?>"  class="btn btn-danger mb-3 delete-trainer px-3">Delete</button></a><br><a href="<?= site_url('trainer/edit/').$data['trainer_id']; ?>"><button type="button" class="btn btn-success px-4">Edit</button></a></td>
                          </tr>
                        <?php } ?>
                        </tbody>
                      </table>
                    </div>
                    <?php $pager->setPath('fitness_club/trainer/show'); ?>
                    <?= $pager->links(); ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
