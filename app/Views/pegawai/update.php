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
        <h1 class="h3 mb-2 text-gray-800">Update Pegawai</h1>
        <p class="mb-4">Update Pegawai <?= $pegawai['name'] ?></p>

        <div class="card shadow mb-4">
          <!-- Card Body -->
          <div class="card-body">
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
            <form action="<?= base_url("/pegawai/update/{$pegawai['id']}"); ?>" method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label for="name">Name</label>
                <input type="name" class="form-control" id="name" aria-describedby="name" name="name" value="<?= $pegawai['name'] ?>" required>
              </div>
              <div class="form-group">
                <label for="telp">Telp</label>
                <input type="number" class="form-control" id="telp" name="telp" value="<?= $pegawai['telp'] ?>" required>
              </div>
              <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control" id="address" name="address" value="<?= $pegawai['address'] ?>" required>
              </div>
              <div class="form-group">
                <label for="field">Field</label>
                <input type="text" class="form-control" id="field" name="field" value="<?= $pegawai['field'] ?>" required>
              </div>
              <div class="form-group">
                <label for="photo" class="form-label fs-5 custom-file-label-poto ">Upload photo <span class="text-danger">*</span></label>
                <div>
                  <img src="<?= base_url('/img/photo' . '/' . $pegawai['photo']) ?>" alt="<?= $pegawai['name'] ?>" width="200px">
                </div>
                <input type="file" class="form-control border mt-3" id="photo" name="photo" required />
                <span>Max. 300 KB, File must JPG or JPEG</span>
              </div>
              <button type="submit" class="btn btn-primary" name="submit">Save</button>
            </form>
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


<?= $this->endSection() ?>