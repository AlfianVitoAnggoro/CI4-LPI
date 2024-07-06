<?= $this->extend('layout/template.php') ?>

<?= $this->section('content') ?>

<!-- Page Wrapper -->
<div id="wrapper">

  <?= $this->include('layout/sidebar') ?>

  <!-- Content Wrapper -->
  <div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

      <?= $this->include('layout/topbar') ?>

      <!-- Begin Page Content -->
      <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">User</h1>
        <p class="mb-4">Management data user.</p>

        <?php if (session()->getFlashdata('success')) : ?>
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= session()->getFlashdata('success'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <?php endif; ?>
        <?php if (session()->getFlashdata('failed')) : ?>
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?= session()->getFlashdata('failed'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        <?php endif; ?>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
          <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Table User</h6>
          </div>
          <div class="card-body">
            <button type="button" class="btn btn-success btn-icon-split mb-3" data-toggle="modal" data-target="#createModal">
              <span class="icon text-white-50">
                <i class="fas fa-solid fa-plus"></i>
              </span>
              <span class="text">Create</span>
            </button>
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Telp</th>
                    <th>Address</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>Name</th>
                    <th>Telp</th>
                    <th>Address</th>
                    <th>Action</th>
                  </tr>
                </tfoot>
                <tbody>
                  <?php foreach ($users as $user) :  ?>
                    <tr>
                      <td><?= $user['name'] ?></td>
                      <td><?= $user['telp'] ?></td>
                      <td><?= $user['address'] ?></td>
                      <td>
                        <a href="<?= base_url('/user' . '/' . $user['id']) ?>" class="btn btn-info btn-circle">
                          <i class="fas fa-regular fa-eye"></i>
                        </a>
                        <a href="<?= base_url('/user/update/' . $user['id']) ?>" class="btn btn-primary btn-circle">
                          <i class="fas fa-solid fa-pen"></i>
                        </a>
                        <button type="button" class="btn btn-danger btn-circle" data-toggle="modal" data-target="#deleteModal" data-id='<?= $user['id'] ?>'>
                          <i class="fas fa-solid fa-trash"></i>
                        </button>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>

      </div>
      <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    <?= $this->include('layout/footer') ?>

  </div>
  <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
  <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
        <a class="btn btn-primary" href="login.html">Logout</a>
      </div>
    </div>
  </div>
</div>

<!-- Modal Create-->
<div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="createModalLabel">Create User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url("/user"); ?>" method="post">
        <div class="modal-body">
          <div class="form-group">
            <label for="name">Name</label>
            <input type="name" class="form-control" id="name" aria-describedby="name" name="name" required>
          </div>
          <div class="form-group">
            <label for="telp">Telp</label>
            <input type="number" class="form-control" id="telp" name="telp" required>
          </div>
          <div class="form-group">
            <label for="address">Address</label>
            <input type="text" class="form-control" id="address" name="address" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" name="submit">Create</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Read -->

<!-- Modal Delete -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Are you sure want to delete this data?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <a href="/user/delete" class="btn btn-primary">Yes</a>
      </div>
    </div>
  </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('script') ?>
<script>
  $(document).ready(function() {

    // Read Modal
    $('#readModal').on('show.bs.modal', function(event) {});

    // Delete Modal
    $('#deleteModal').on('show.bs.modal', function(event) {
      let button = $(event.relatedTarget); // Button that triggered the modal
      let dataId = button.data('id'); // Extract info from data-* attributes
      let modal = $(this);
      // Update the modal's content. Here, you can also use the dataId to make other updates
      modal.find('.modal-footer a').attr('href', '<?= base_url() ?>/user/delete/' + dataId);
    });
  });
</script>
<?= $this->endSection() ?>