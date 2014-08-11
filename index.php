<head>
	<title>basic html sample page</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

	<!-- Latest compiled and minified JavaScript -->
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

	<script data-main="js/main.js" src="js/libs/require.js"></script>
</head>
<body bgcolor="white">
	<center>
	<h1>a simple sample web page</h1>
	<nav class="navbar navbar-default" role="navigation">
		<div class="navbar-header">
			<a class="navbar-brand" href="#">Example</a>
		</div>
		<div>
			<ul class="nav navbar-nav">
				<li class="tab active" id="tab1"><a href="#">Hello</a></li>
				<li class="tab" id="tab2"><a href="#">Movies</a></li>
				<li class="tab" id="tab3"><a href="#">Shows</a></li>
				<li class="tab" id="tab4"><a href="#">Books</a></li>
			</ul>
		</div>
	</nav>

			<div class ="tabPage" id="firstTab">
				<? include 'public/hello.html' ?> 
			</div>
			
			<div class ="tabPage" id="secondTab" style="display:none">
				<? include 'public/movies.html' ?> 
			</div>
			
			<div class ="tabPage" id="thirdTab" style="display:none">
				<? include 'public/shows.html' ?> 
			</div>  

			<div class ="tabPage" id="fourthTab" style="display:none">
				<? include 'public/books.html' ?> 
			</div>  
</body>
