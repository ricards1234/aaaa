<!doctype html> 
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width"> <!--Pieskaņojam lapu atbilstošai ieīcei uz kā tā tiks attēlota-->
		<meta name="description" content="LU DF 1.Kursa students">
		<meta name="keywords" content="Students">   
		<meta name="author" content="Ričards Dišleris rd17018">
		<title>Bilžu blogs | Kontakti </title>
		<link rel="stylesheet" tyoe="text/css" href="<?=$config->urls->templates?>styles/main.css">
	</head>
	<body>
		<script src="./JavaScript/funkcijas.js"> </script>
		<header> 
			<div class="container">
				<?php $homePage = $pages->get('/'); ?>
				<div id="branding">
					<h1><span class="highlight"><?=$homePage->title ?></span></h1> <!--Ieliekam vārdu spanā jo tas ir inline elements un nēpārmet to vārdu uz nākošo rindu kā to izdara div -->
				</div>
				<nav>
					<ul>
						<li><a href="<?=$homePage->url ?>"><?=$homePage->subtitle?></a></li>
						<?php foreach ($homePage->children as $child):?>
							<li>
								<a href="<?=$child->url?>"><?=$child->title?></a>
							</li>
							<?php endforeach; ?>
						<!-- <li><a href="about.html">Par Mūsu blogu</a></li> 
						<li class="current" ><a href="services.html">Pierakstīties</a></li> --> <!--Nomainam current jo esam tagad šajā lapā-->
					</ul>
				</nav>
			</div>
		</header>