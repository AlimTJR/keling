<div class="navbar">
    <div class="menu">
      <a <?php if($title == 'Dashboard') echo 'class="active"'?> href="<?= base_url()?>/dashboard">
        <i class="fas fa-leaf"></i>
        Beranda
      </a>
    </div>
    <div class="menu">
      <a <?php if($title == 'Materi') echo 'class="active"'?> href="<?= base_url()?>/dashboard/materi">
        <i class="fas fa-book"></i>
        Materi
      </a>
    </div>
    <?php 
    if($title == 'Materi'){ ?>
    <div class="menu">
      <a <?php if($title == 'Materi') echo 'class="active"'?> href="<?= base_url('/dashboard/formtambah'); ?>">
      <i class="fas fa-plus"></i>
        Tambah
      </a>
    </div>
    <?php } else if($title == 'Detail Materi'){ ?>
    <div class="menu">
			<a href="<?= base_url('dashboard/formedit/'.$materi['id']); ?>" style="color: rgb(34, 172, 67);"><i class="fas fa-pen"></i> Ubah</a>
    </div>
    <div class="menu">
			<a href="<?= base_url('/dashboard/delete/'.$materi['id']); ?>" style="color: rgb(230 74 74);" onclick="return confirm('Anda yakin ingin menghapus materi ini?')"><i class="fas fa-trash-alt"></i> Hapus</a>
    </div>
    <?php } else { ?>
      
    <div class="menu">
      <a href="<?= base_url('login/logout') ?>" style="color: rgb(230 74 74);" onclick="return confirm('Anda yakin ingin Logout ?')">
        <i class="fas fa-door-open"></i>
        Keluar
      </a>
    </div>
    <?php }
    ?>
</div>