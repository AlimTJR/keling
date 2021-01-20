<!DOCTYPE html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<html>
<head>
	<title>Masuk | Kenal Lingkungan</title>
	<link rel="stylesheet" type="text/css" href="/style/style.css">
</head>
<body>
	<div class="login">	
		<img class="logologin" src="/images/logo.png">
		<div class="masuk">Masuk</div>
		<form class="formlogin" action="/login/auth" method="post" onSubmit="return validasi()">
			<label for="judul" class="<?= ($validation->hasError('username')) ? 'merah' : ''; ?>">ID Admin <?= $validation->getError('username'); ?></label>
			<div class="inputform">
				<input type="text" name="username" id="username" autofocus/>
			</div>
			<label for="judul" class="<?= ($validation->hasError('username')) ? 'merah' : ''; ?>">Kata Sandi <?= $validation->getError('username'); ?></label>
			<div class="inputform">
				<input type="password" name="password" id="password"/>
			<div style="color:rgb(230 74 74);text-align: center;">
			<label><?= session()->getFlashdata('msg') ?>
			</label></div>
			</div><br>
				<input type="submit" value="Masuk" class="tombol">
		</form>
	</div>
</body>
<!-- <script type="text/javascript">
	function validasi() {
		var username = document.getElementById("username").value;
		var password = document.getElementById("password").value;		
		if (username != "" && password!="") {
			return true;
		}else{
			alert('Username dan Password harus di isi !');
			return false;
		}
	}
</script> -->
</html>