<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<style>
.poster{
    background-position: center;
    background-size: cover;
    border-radius: 15px;
    height: 300px;
    width: 100%;
}
.desk{
    margin-bottom: 20px;
}
@media screen and (max-width: 700px){
.poster{
    height: 200px;
    width: 100%;
}
}
</style>
<div class="container">
	<div class="scrollcontent">
		    <div class="poster" style="background-image: url(/images/<?=$materi['foto']?>);">
            </div>
		<div class="content">
            <h2 style="text-align: left;"><?= $materi['judul']?></h2>
			<p><?= $materi['materi']?></p>
			<p class="tag"><?= $materi['kategori']?></p>
			<p style="font-size: 12px;"><i class="fas fa-clock"></i> <?php $tanggal= date_create($materi['created_at']); echo date_format($tanggal,"d M Y")?></p><br><br>
		</div>
	</div>
<?= $this->include('layout/navbar') ?>
</div>
<?= $this->endSection(); ?>