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
        <h1 class="h3 mb-2 text-gray-800">Detail Pegawai</h1>
        <p class="mb-4">Read Detail Pegawai <?= $pegawai['name'] ?></p>

        <div class="card shadow mb-4">

          <!-- Card Body -->
          <div class="card-body">
            <div>
              <img src="<?= base_url('/img/photo' . '/' . $pegawai['photo']) ?>" alt="<?= $pegawai['name'] ?>" width="200px">
            </div>
            <p class="mt-3">Name : <?= $pegawai['name'] ?> </p>
            <p class="mt-3">Telp : <?= $pegawai['telp'] ?> </p>
            <p class="mt-3">Address : <?= $pegawai['address'] ?> </p>
            <p class="mt-3">Field : <?= $pegawai['field'] ?> </p>
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