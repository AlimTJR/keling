<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
  <div class="container" style="font-weight: 600;">
    <h3 class="active">Hi <?php
          $session = session(); 
          echo $session->get('nama');
        ?>
    </h3>
    <div class="wraper">
      <div class="banner" style="background: linear-gradient(90deg, rgba(34,172,67,1) 0%, rgba(16,177,54,1) 100%); color: #fff">
          <div class="text">
            <div style="font-size: 20px;">Halaman Admin</div>
            <div style="font-size: 12px;">Anda bisa menambah materi di halaman ini</div>
          </div>
          <img class="banner-logo" src="images/banner.png" width="100px" >
    </div>
      <a href="<?= base_url('/dashboard/materi')?>">
        <div class="banner">
          <h3>Kelola Materi | Total <?= $materi; ?> Materi</h3>
        </div>
      </a>
    </div>
<?= $this->include('layout/navbar'); ?>
  </div>
<?= $this->endSection(); ?>