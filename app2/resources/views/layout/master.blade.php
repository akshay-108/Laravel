<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Home</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<style>
	
		.wrapper{
			/*background-color: #ff0000;*/
			border: 3px solid #000;
			padding: 25px;
			border-radius: 6px;
			width: 500px;
			margin: auto;
		}
		.wrapper .form-control{
			margin: 10px 0;
		}
	</style>
</head>
<body>
	<div class="mt-4 container">
		@yield('content')
	</div>

	
	<div class="container">
		@yield('footer')
	</div>
</body>
</html>