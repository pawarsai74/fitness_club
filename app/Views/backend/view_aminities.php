<div class="main-panel">
         <div class="content-wrapper">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title text-center">Amenities Available</h4>
                    <input type="text" id="search_amenities" onkeyup="findAmenities(this.value)" class="form-control mb-3 text-white" placeholder="Search Amenities">
                  <div class="table-responsive">
                      <table class="table table-hover table-bordered text-center">
                        <thead>
                          <tr>
                            <th>Id</th>
                            <th>Amenities</th>
                            <th>Image</th>
                            <th>Edit</th>
                            <th>Delete</th>
                          </tr>
                      </thead>
                        <tbody id="view_aminities">
                          <?php foreach ($details as $data) { ?>
                          <tr>
                            <td><?= $data['id']; ?></td>
                            <td><?= $data['heading']; ?></td>
                            <td><img src="<?= base_url('assets/backend/images/'.$data['img']); ?>" style="width:100px; height:100px;" alt="image"></td>
                            <td><a href="<?= base_url('amenities/edit/'.$data['id']); ?>"><button type="button" class="btn btn-success px-4">Edit</button></a></td>
                            <td><a href="<?= base_url('amenities/delete/'.$data['id']); ?>"><button type="button" value="<?= $data['id']; ?>"  class="btn btn-danger delete-amenitie px-3">Delete</button></a></td>
                          </tr>
                        <?php } ?>
                        </tbody>
                      </table>
                    </div>
                    <?php $pager->setPath('fitness_club/amenities/display_amenities'); ?>
                    <?= $pager->links_3(); ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
