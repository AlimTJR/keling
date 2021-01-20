<html>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="/fontawesome/css/fontawesome.css" rel="stylesheet">
 	<link href="/fontawesome/css/brands.css" rel="stylesheet">
 	<link href="/fontawesome/css/solid.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="/style/style.css">
  <title><?= $title; ?></title>
<body>
<?= $this->renderSection('content'); ?>
</body>
<script>
function previewImg(){
	const foto = document.querySelector('#foto');
	const imgPreview = document.querySelector('.img-preview');
	
	const fileGambar = new FileReader();
	fileGambar.readAsDataURL(foto.files[0]);
	fileGambar.onload = function(e){
		imgPreview.src = e.target.result;
	}

}
</script>
</html>