<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<div class="container">
		<form action="" method="post" class="formcari">
			<input type="text" class="inputcari" name="cari" placeholder="Cari materi...">
		</form>
		<div class="scrollcontent">
		<?php $session = session(); foreach($materi as $data): ?>
		<a href="<?= base_url('dashboard/detail/'. $data['id']); ?>">
			<div class="materi">
				<div class="gambarkartu" style="background-image: url(/images/<?=$data['foto']?>);"></div>
				<div class="content">
					<b><p class="judulmateri"><?= $data['judul']; ?></p></b>
					<!-- <p class="isimateri"><?= $data['materi']; ?></p> -->
					<p class="tag"><?= $data['kategori']; ?></p>
					<p style="font-size: 12px;"><i class="fas fa-clock"></i> <?php $tanggal= date_create($data['created_at']); echo date_format($tanggal,"d M Y")?></p>
					<div class="pilihan">
						<a href="<?= base_url('dashboard/formedit/'.$data['id']); ?>"><i class="fas fa-pen"></i> Ubah</a>
						<a class="merah" href="<?= base_url('dashboard/delete/'.$data['id']); ?>" onclick="return confirm('Anda yakin ingin menghapus materi ini?')"><i class="fas fa-trash-alt"></i> Hapus</a>
					</div>
				</div>
			</div>
		</a>
		<?php endForeach; ?>
		<?= $pager->links() ?>
		<br><br><br>
	</div>
<?= $this->include('layout/navbar'); ?>
</div>
<?= $this->endSection(); ?>