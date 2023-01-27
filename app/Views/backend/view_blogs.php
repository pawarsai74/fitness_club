<div class="main-panel">
     <div class="content-wrapper">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                  <h4 class="card-title text-center">All Blogs</h4>
                  <input type="text" id="search_blogs" onkeyup="findBlogs(this.value)" class="form-control mb-3 text-white" placeholder="Search Blogs">
              <div class="table-responsive">
                  <table class="table table-hover table-bordered">
                    <thead class="text-center">
                      <tr>
                        <th>Blog Id</th>
                        <th>Bloger Name</th>
                        <th>Title</th>
                        <th>Edit Blog</th>
                        <th>Delete Blog</th>
                      </tr>
                  </thead>
                    <tbody class="text-center" id="blogs_search">
                      <?php foreach ($blog as $value) {  ?>
                      <tr>
                        <td><?= $value['id']; ?></td>
                        <td><?= $value['bloger_name']; ?></td>
                        <td><?= $value['title']; ?></td>
                        <td><a href="<?= site_url('blogs/edit_blog/').$value['id']; ?>"><button type="button" class="btn btn-success px-4">Edit</button></a></td>
                        <td><a href="<?= site_url('blogs/delete_blog/').$value['id']; ?>"><button type="button" value="<?= $value['id']; ?>"  class="btn btn-danger delete-blogs px-3">Delete</button></a></td>
                      </tr>
                    <?php } ?>
                    </tbody>
                  </table>
                </div>
                <?php $pager->setPath('fitness_club/blogs/view_blog'); ?>
                <?= $pager->links_6(); ?>
              </div>
            </div>
          </div>
        </div>
      </div>
