<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>MovieDB API</title>
	<link rel="stylesheet" href="css/up.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

</head>

<body>
	
	<script src="js/main.js"></script>
	<div id="site-content">
		<header class="smaller normal regular">
			<div id="content">
				<div id="leftside">
					<ul class="primary">
						<li class="logo"><a href="index.php"><img src="img/logo.png"></a></li>
						<li class="menulist"><a class="menu" href="/discover">Discover</a></li>
						<li class="menulist"><a href="/discover" class="menu">Movies</a></li>
						<li class="menulist"><a href="/discover" class="menu">TV shows</a></li>
						<li class="menulist"><a href="/discover" class="menu">People </a></li>
					</ul>
				</div>


				<div class="search_bar">
					<section class="search">
						<div class="sub_media">
							<form id="search_form" action="/search" method="get" accept-charset="utf-8">
								<input dir="auto" id="search_v4" name="query" type="text" tabindex="0" autocorrect="off" autofill="off" autocomplete="off" spellcheck="false" placeholder="Search for a movie, tv show, person..." value="">
							</form>
						</div>
					</section>
				</div>
		</header>

	</div>

	<!-- content -->
	<main id="main" class>
		<div class="media">
			<h2 class="title">Popular Movies</h2>

			<div class="results flex results_poster_card">
			
				<div id="clone">

				</div>
			</div>
			<!-- content over -->
		</div>
		</div>
	</main>
	<div id="loadMore" class="pagination">
		<a id="load" onclick=loadmore()>Load More</a>
	</div>


</body>

</html>