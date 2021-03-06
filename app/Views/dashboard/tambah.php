<?= $this->extend('layout/template'); ?>
<?= $this->section('content'); ?>
<style>
.container label{
	font-family: 'nunito', sans-serif;
	font-weight: bold;
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
	margin-right: 5px;
	margin-left: 5px;
}
.inputgambar{
	justify-content: center;
	display: flex;
}
.isigambar{
	flex-direction: column;
	align-items: center;
	display: flex;
}
.textarea{
	margin-bottom: 20px;
}
.isigambar img{
    border: 1.5px solid rgb(34, 172, 67);
    margin-bottom: 10px;
	border-radius: 15px;
	margin-top: 10px;
    height: 170px;
    width: 300px;
    padding: 3px;
}
</style>
	<div class="container">
	<div class="scrollcontent">
	<h3 style="text-align: center;">Tambah Materi</h3>
	<form class="formlogin" method="post" action="/dashboard/tambah" enctype="multipart/form-data">
		<label for="judul" class="<?= ($validation->hasError('judul')) ? 'merah' : ''; ?>">Judul Materi <?= $validation->getError('judul'); ?></label>
		<div class="inputform">
			<input type="text" name="judul" placeholder="Judul Materi" autofocus value="<?= old('judul'); ?>">
		</div>
		<label for="foto" class="<?= ($validation->hasError('foto')) ? 'merah' : ''; ?>">Gambar <?= $validation->getError('foto'); ?></label>
		<div class="inputGambar">
			<div class="isigambar">
				<img src="/images/logo.png" class="img-thumbnail img-preview">
				<input type="file" name="foto" id="foto" placeholder="Pilih gambar ysng sesuai materi" onchange="previewImg()">
			</div>
		</div>
		<label for="materi" class="<?= ($validation->hasError('materi')) ? 'merah' : ''; ?>">Isi Materi <?= $validation->getError('materi'); ?></label>
		<div class="inputform">
			<textarea id="mytextarea" class="input textarea" style="height: 300px;" type="text" name="materi" placeholder="Isi Materi"><?= old('materi'); ?></textarea>
		</div><br>
		<label for="kategori" class="<?= ($validation->hasError('kategori')) ? 'merah' : ''; ?>">kategori Materi <?= $validation->getError('kategori'); ?></label>
		<div class="inputform">
			<input type="text" name="kategori" placeholder="isi dengan #hashtag" value="<?= old('kategori'); ?>">
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
<?= $this->endSection(); ?>