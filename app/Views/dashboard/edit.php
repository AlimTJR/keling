<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<style>
.container label{
	font-weight: bold;
	font-family: 'nunito', sans-serif;
	font-size: 13px;
}
.formlogin input{
	width: 100%;
}
.scrollcontent{
	overflow-y: scroll;
	height: 100%;
	margin:-20px;
	padding:10px;
}
.formlogin textarea{
    font-family: 'nunito', sans-serif;
    border: 1px solid #e0eae2;
    background-color: #e0eae2;
    border-radius: 10px;
    margin-bottom: 10px;
    font-weight: 800;
    transition: 1s;
	padding: 10px;
	width: 100%;
}
.menu{
	margin-left: 5px;
	margin-right: 5px;
}
.inputgambar{
	justify-content: center;
	display: flex;
}
.isigambar{
	display: flex;
	flex-direction: column;
	align-items: center;
}
.isigambar img{
	margin-top: 10px;
    margin-bottom: 10px;
    width: 300px;
    height: 170px;
    border: 1px solid rgb(34, 172, 67);
    padding: 3px;
}
</style>
	<div class="container">
	<div class="scrollcontent">
	<h3 style="text-align: center;">Ubah Materi</h3>
	<form class="formlogin" method="post" action="/dashboard/edit/<?= $materi['id'];?>" enctype="multipart/form-data">
		<input type="hidden" name="fotoLama" value="<?= $materi['foto']; ?>">
		<label for="judul">Judul Materi</label>
		<div class="inputform">
			<input type="text" name="judul" placeholder="Judul Materi" value="<?= $materi['judul']?>">
		</div>
		<label for="foto">Gambar</label>
		<div class="inputGambar">
			<div class="isigambar">
				<img src="/images/<?= $materi['foto']; ?>" class="img-thumbnail img-preview">
				<input type="file" name="foto" id="foto" placeholder="Pilih gambar ysng sesuai materi" onchange="previewImg()">
			</div>
		</div>
		<label for="materi">Isi Materi</label>
		<div class="inputform">
			<textarea class="input" style="height: 300px;" type="text" name="materi" placeholder="Isi Materi"><?= $materi['materi']?></textarea>
		</div><br>
		<label for="kategori">kategori Materi</label>
		<div class="inputform">
			<input type="text" name="kategori" placeholder="isi dengan #hashtag" value="<?= $materi['kategori']?>">
		</div>
		<div class="navbar">
		<div class="menu">
			<a href="#"><input class="tombol" type="submit" value="Simpan"></a>
		</div>
		<div class="menu">	
			<a href="/dashboard/materi"><input class="tombol" type="button" value="Batal"></a>
		</div>
		</div>
	</form>
	</div>
    </div>
	<script src="//cdn.ckeditor.com/4.15.1/basic/ckeditor.js"></script>
	<script>CKEDITOR.replace('materi');</script>
<?= $this->endSection(); ?>