﻿<?php
require_once('./config/configDB.php');
include('./connect.php');
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="fr"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		
        <title>Liste des Pixels Actifs</title>
        <meta name="keywords" lang="fr" content="pixel actif">
		<meta name="description" content="Liste des Pixels Actifs">
		<meta name="publisher" content="Pixel Humain">
		<meta name="author" lang="fr" content="Pixel Humain" />
		<meta name="robots" content="Index,Follow" />
		
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="css/bootstrap.min.css">
		<!--[if lt IE 7]><link rel="stylesheet" href="http://blueimp.github.com/cdn/css/bootstrap-ie6.min.css"><![endif]-->
		<link rel="stylesheet" href="css/bootstrap-image-gallery.min.css">
		<link rel="shortcut icon" href="img/logo/favicon.gif" />
        <link rel="stylesheet" href="css/bootstrap-responsive.min.css">
        <link rel="stylesheet" href="css/main.css">
		<link rel="stylesheet" href="css/region.css">
		<link rel="stylesheet" href="css/select2.css">
    </head>
    <body>
		<!-- Mutualisation de code entre 2 fichiers index4.php et listePixelActifs.html => crée un html à part qui garantie unicité du code et on transforme le html père en .php car on utilise des fonctionnalité php "include" -->
       <?php /*include('menuPH.html')?>
	   <?php include('modalPA.php')*/?>
		
		<body>
	<section>
		
		<!-- BEGIN HEADER -->
		<?php 
		
		$region = $connection->pixelhumain->france;
		$ct = $region->find();
		
		?>
		<header class="ns">
			<div class="wrapper just wf">
				<a id="logo" class="ib" href="./region.php">
					<img src="img/logo/logo144.png"  onload="imgLoaded(this)"/>
					<h1 class="ib"><strong>Pixel Humain </strong>: Région Réunion (974 - <?php echo $ct->count();?> communes)</h1> 
				</a>
				
				<a href="#" onclick="page = prompt('wiki page name ?'); window.location.href='getWikipediaInfobox.php?page='+page">
					<div class="ib anim150 button">+ COMMUNE</div>
				</a>
			</div>
		</header>
		
		<!-- END HEADER -->
		
		<!-- BEGIN DEMO WRAPPER -->
		
		<div class="wrapper wf">
			
			<!-- BEGIN CONTROLS -->
			
			<nav class="controls just">
				<div class="group" id="Sorts">
					<div class="button " id="ToList"><i></i>List View</div>
					<div class="button" id="ToGrid"><i></i>Grid View</div>
					<div class="button active" id="ToMap"><i></i>Map View</div>
				</div>
				<div class="group" id="Filters">
					
					<div class="drop_down wf">
						<span class="anim150">Zoom Administratif </span>
						<ul class="anim250">
							<li class="active" data-filter="national" data-dimension="administration">Pays</li>
							<li data-filter="region" data-dimension="administration">Région</li>
							<li data-filter="departement" data-dimension="administration">Département</li>
							<li data-filter="commune" data-dimension="administration">Commune</li>
							<li data-filter="quartier" data-dimension="administration">Quartier</li>
							<li data-filter="citoyen" data-dimension="administration">Citoyen</li>
						</ul>
					</div>
					
					<div class="drop_down wf">
						<span class="anim150">Région</span>
						<ul class="anim250">
							<li class="active" data-filter="all" data-dimension="region">All</li>
							
							<li data-filter="northeast" data-dimension="region">Nord-Est</li>
							<li data-filter="northwest" data-dimension="region">Nord-Ouest</li>
							<li data-filter="center" data-dimension="region">Centre</li>
							<li data-filter="southeast" data-dimension="region">Sud-Est</li>
							<li data-filter="southwest" data-dimension="region">Sud-Ouest</li>
							
						</ul>
					</div>
					<div class="drop_down wf">
						<span class="anim150">Nature</span>
						<ul class="anim250">
							<li class="active" data-filter="all" data-dimension="nature">All</li>
							<li data-filter="mountains" data-dimension="nature">Montagne</li>
							<li data-filter="waterfalls" data-dimension="nature">Cascade</li>
							<li data-filter="river" data-dimension="nature">Rivière</li>
							<li data-filter="lagoon" data-dimension="nature">Lagon</li>
							<li data-filter="sea" data-dimension="nature">Mer</li>
						</ul>
					</div>
					<div class="drop_down wf">
						<span class="anim150">Activité</span>
						<ul class="anim250">
							<li class="active" data-filter="all" data-dimension="recreation">All</li>
							<li data-filter="camping" data-dimension="recreation">Camping</li>
							<li data-filter="climbing" data-dimension="recreation">Grimpe</li>
							<li data-filter="fishing" data-dimension="recreation">Peche</li>
							<li data-filter="swimming" data-dimension="recreation">PMT (Palme Masque Tuba)</li>
						</ul>
					</div>
				</div>
			</nav>
			
			<!-- END CONTROLS -->
			
			<!-- BEGIN PARKS -->
			<div id="InfoPanel" class="">
				<h1>Bienvenu à la Réunion</h1>
				Si vous êtes réunionais découvrez votre pays
				et pour les voyageurs vous etes 
				au bon endroit pour decouvrir une île au 1001 couleurs.
			</div>
			<svg
			   xmlns:i="http://ns.adobe.com/AdobeIllustrator/10.0/"
			   xmlns:dc="http://purl.org/dc/elements/1.1/"
			   xmlns:cc="http://creativecommons.org/ns#"
			   xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
			   xmlns:svg="http://www.w3.org/2000/svg"
			   xmlns="http://www.w3.org/2000/svg"
			   version="1.1"
			   width="80%"
			   viewBox="0 0 699.177 609.899"
			   id="svg"
			   xml:space="preserve"
			   style="overflow:visible">
			  <title    id="titre">Réunion communes</title>
			  <desc     id="description">Crée par Victor GASIA 2012 à partir d'un travail original de Wikimedia</desc>
			  <metadata id="metadata"></metadata>
			  <defs     id="defs"></defs>
			<polygon
				 points="698.163,356.784 684.777,361.955 673.801,397.971 659.1,439.346 667.969,540.967 667.886,545.193 630.317,582.497 526.88,591.632 518.729,606.871 442,608.984 424.176,594.141 371.715,590.391 282.423,555.724 276.387,555.605 267.565,543.657 229.697,534.759 213.875,510.294 189.399,495.923 140.152,482.275 132.567,468.841 128.627,454.271 119.419,446.543 90.47,429.367 80.803,398.984 75.809,391.941 86.806,370.118 77.741,339.747 66.439,331.07 63.599,321.958 47.931,289.644 8.581,248.714 8.705,242.376 9.014,226.682 9.168,218.835 1.068,208.562 6.252,198.247 24.102,181.086 31.345,181.229 39.795,181.395 63.113,162.531 69.978,151.193 75.814,130.776 68.382,109.496 78.256,68.024 113.136,75.353 173.145,33.056 192.225,14.712 204.44,7.707 231.1,3.099 251.659,1.692 259.524,0.94 275.536,15.748 299.077,16.211 331.086,15.936 343.129,17.682 358.706,24.027 431.067,29.073 443.47,43.206 484.411,49.446 512.221,78.374 524.889,94.323 539.393,109.102 537.886,154.963 550.147,176.339 577.959,205.268 578.746,211.322 577.792,213.718 577.709,217.944 591.615,232.409 615.402,266.39 637.557,291.282 661.879,298.1 686.91,314.897 698.269,351.351 "
				 id="polygon13"
				 style="fill:#f4e2ba" /><polygon
				 points="268.681,241.452 276.266,254.886 254.536,254.458 229.148,271.168 211.064,254.207 223.765,230.152 210.752,224.007 202.718,187.317 207.146,177.139 182.535,154.312 163.896,134.924 138.662,128.389 112.897,118.221 113.229,101.319 125.634,84.656 118.574,71.52 173.145,33.056 208.907,118.298 209.659,126.163 209.504,134.01 229.229,128.963 256.13,142.777 273.112,169.681 273.514,179.954 273.365,187.5 264.257,190.038 266.316,208.194 266.079,220.266 265.054,226.284 262.503,233.178 "
				 id="polygon16" class="active"
				  onmouseover="$('#InfoPanel').show();"
				  onmouseout="$('#InfoPanel').hide();"
				  onmousedown=""/>
				 <polygon points="192.225,14.712 204.44,7.707 231.1,3.099 251.659,1.692 259.524,0.94 275.536,15.748 299.077,16.211 322.01,16.014 322.01,16.014 328.995,60.88 300.089,118.281 304.538,137.691 285.418,164.893 285.279,165.089 273.112,169.681 256.13,142.777 229.229,128.963 209.504,134.01 209.659,126.163 208.907,118.298 173.145,33.056 "
				 id="polygon19"
				 style="fill:none" />
				 <polygon
				 points="334.646,157.305 352.5,155.241 364,153.958 401.122,78 398.497,26.802 398.794,26.822 358.706,24.027 343.129,17.682 331.086,15.936 322.01,16.014 322.01,16.014 328.995,60.88 300.089,118.281 304.538,137.691 285.279,165.089 304.667,161.848 309.129,149.859 329.688,148.452 "
				 id="polygon22"
				 style="fill:none" />
				 <polygon
				 points="394.938,146.716 364,153.958 401.122,78 398.497,26.802 398.794,26.822 431.067,29.073 443.47,43.206 460.653,45.825 461.178,45.905 459.401,62.238 480.301,74.123 468.299,85.661 458.76,94.834 450.682,91.051 434.436,111.111 419.736,113.993 "
				 id="polygon25"
				 style="fill:red" /><polygon
				 points="434.436,111.111 450.682,91.051 458.76,94.834 468.299,85.661 480.301,74.123 459.401,62.238 461.178,45.905 460.653,45.825 484.411,49.446 512.221,78.374 524.889,94.323 539.393,109.102 539.235,113.935 539.235,113.936 527.156,117.314 499.135,129.745 484.832,120.104 411.65,156.706 411.65,156.707 394.938,146.716 419.736,113.993 "
				 id="polygon28"
				 style="fill:none" /><polygon
				 points="382.944,234.643 387.75,205.148 382.407,200.515 387.254,168.908 484.832,120.104 499.135,129.745 527.156,117.314 539.235,113.936 539.235,113.935 537.886,154.963 530.645,154.822 520.987,154.631 504.37,170.608 505.895,185.13 490.65,192.68 459.676,201.733 412.52,250.623 "
				 id="polygon31"
				 style="fill:none" /><polygon
				 points="422.163,297.31 429.98,298.974 495.078,274.29 558.275,346.182 577.721,339.924 582.833,295.038 615.402,266.39 591.615,232.409 577.709,217.944 577.792,213.718 578.746,211.322 577.959,205.268 550.147,176.339 537.886,154.963 530.645,154.822 520.987,154.631 504.37,170.608 505.895,185.13 490.65,192.68 459.676,201.733 412.52,250.623 382.944,234.643 348.258,247.851 343.795,259.839 316.821,280.444 327.671,312.057 363.285,312.758 405.018,309.352 416.73,297.204 "
				 id="polygon34"
				 style="fill:none" /><polygon
				 points="615.402,266.39 637.557,291.282 661.879,298.1 686.91,314.897 698.269,351.351 698.163,356.784 684.777,361.955 673.801,397.971 659.1,439.346 519.189,429.953 485.495,423.855 492.762,391.994 497.237,379.402 558.275,346.182 577.721,339.924 582.833,295.038 "
				 id="polygon37"
				 style="fill:red" /><polygon
				 points="630.317,582.497 552.215,589.395 527.494,498.955 534.656,472.527 522.122,465.034 519.189,429.953 659.1,439.346 667.969,540.967 667.886,545.193 "
				 id="polygon40"
				 style="fill:none" /><polygon
				 points="445.657,392.274 470.69,378.275 492.762,391.994 485.495,423.855 519.189,429.953 522.122,465.034 534.656,472.527 527.494,498.955 552.215,589.395 526.88,591.632 518.729,606.871 442,608.984 424.176,594.141 420.125,593.852 421.135,593.922 426.307,547.083 419.449,542.721 420.793,520.405 436.641,512.869 432.205,492.852 429.519,475.892 440.638,401.837 "
				 id="polygon43"
				 style="fill:none" /><polygon
				 points="213.875,510.294 189.399,495.923 201.426,467.78 196.665,372.278 204.229,356.123 213.568,341.813 220.146,344.961 257.497,380.116 274.825,374.118 280.375,383.585 273.054,479.454 "
				 id="polygon46"
				 style="fill:none" /><polygon
				 points="164.574,438.07 156.43,453.005 128.627,454.271 119.419,446.543 211.415,328.488 213.568,341.813 204.229,356.123 196.665,372.278 186.403,372.076 179.969,399.875 153.42,421.849 "
				 id="polygon51"
				 style="fill:none" /><polygon
				 points="90.47,429.367 80.803,398.984 75.809,391.941 86.806,370.118 77.741,339.747 66.439,331.07 63.599,321.958 72.129,318.198 120.935,292.891 210.933,291.643 219.699,297.364 219.566,297.851 211.415,328.488 119.419,446.543 "
				 id="polygon58"
				 style="fill:none" /><polygon
				 points="165.58,264.181 105.219,262.994 76.587,275.714 47.931,289.644 63.599,321.958 72.129,318.198 120.935,292.891 210.933,291.643 220.472,297.869 228.402,293.797 229.68,290.2 204.709,270.385 "
				 id="polygon61"
				 style="fill:none" /><polygon
				 points="202.718,187.317 210.752,224.007 223.765,230.152 211.064,254.207 229.148,271.168 254.536,254.458 276.266,254.886 276.173,259.715 270.963,278.935 264.271,281.521 229.68,290.2 204.709,270.385 165.58,264.181 105.219,262.994 76.587,275.714 47.931,289.644 8.581,248.714 8.705,242.376 9.014,226.682 9.168,218.835 1.068,208.562 6.252,198.247 24.102,181.086 31.345,181.229 39.795,181.395 63.113,162.531 69.978,151.193 75.814,130.776 68.382,109.496 78.256,68.024 113.136,75.353 118.574,71.52 125.634,84.656 113.229,101.319 112.897,118.221 138.662,128.389 163.896,134.924 182.535,154.312 207.146,177.139 "
				 id="polygon64"
				 style="fill:none" /><polygon
				 points="118.574,71.52 125.634,84.656 113.229,101.319 112.897,118.221 96.802,107.638 68.382,109.496 78.256,68.024 113.136,75.353 "
				 id="polygon67"
				 style="fill:none" /><polygon
				 points="426.307,547.083 421.135,593.922 420.788,593.899 371.715,590.391 357.603,584.913 358.055,585.087 371.663,531.515 407.526,519.54 423.151,492.674 432.205,492.852 436.641,512.869 420.793,520.405 419.449,542.721 "
				 id="polygon70"
				 style="fill:none" /><polygon
				 points="357.934,523.395 354.383,519.702 337.755,505.487 306.217,451.123 290.429,455.644 281.479,480.83 273.054,479.454 213.875,510.294 229.697,534.759 267.565,543.657 276.387,555.605 282.423,555.724 358.184,585.137 358.055,585.087 371.663,531.515 407.526,519.54 423.151,492.674 432.205,492.852 429.519,475.892 414.915,481.643 409.776,497.242 "
				 id="polygon73"
				 style="fill:none" /><polygon
				 points="189.399,495.923 140.152,482.275 132.567,468.841 128.627,454.271 156.43,453.005 164.574,438.07 153.42,421.849 179.969,399.875 186.403,372.076 196.665,372.278 201.426,467.78 "
				 id="polygon76"
				 style="fill:none" /><polyline
				 style="fill:none"
				 id="polyline83"
				 points="63.599,321.958 72.129,318.198 120.935,292.891 "
				 i:knockout="Off" /><polygon
				 points="276.173,259.715 276.213,257.655 276.226,256.999 316.821,280.444 327.671,312.057 312.104,366.702 280.375,383.585 274.825,374.118 257.497,380.116 220.146,344.961 213.568,341.813 211.415,328.488 219.566,297.851 220.472,297.869 228.402,293.797 229.68,290.2 264.271,281.521 270.963,278.935 "
				 id="polygon85"
				 style="fill:none" /><polygon
				 points="337.712,415.514 334.896,405.193 358.427,375.463 374.76,373.972 381.584,364.748 363.285,312.758 327.671,312.057 312.104,366.702 280.375,383.585 273.1,478.864 273.054,479.454 281.479,480.83 290.429,455.644 306.217,451.123 "
				 id="polygon94"
				 style="fill:none" /><polygon
				 points="337.755,505.487 354.383,519.702 357.934,523.395 409.776,497.242 414.915,481.643 429.519,475.892 440.638,401.837 445.657,392.274 470.69,378.275 492.762,391.994 497.237,379.402 470.844,339.632 460.126,347.271 459.889,359.343 450.249,365.948 440.082,368.616 420.78,352.235 405.018,309.352 363.695,312.725 363.285,312.758 381.584,364.748 374.76,373.972 358.427,375.463 334.896,405.193 337.712,415.514 306.217,451.123 307.267,452.931 "
				 id="polygon101"
				 style="fill:none" /><polyline
				 style="fill:none"
				 id="polyline104"
				 points="276.216,257.484 276.266,254.886 268.681,241.452 262.503,233.178        265.054,226.284 266.079,220.266 266.316,208.194 264.257,190.038 273.365,187.5 273.514,179.954 273.112,169.681        285.279,165.089 304.667,161.848 309.129,149.859 329.688,148.452 334.646,157.305 352.5,155.241 364,153.958 394.938,146.716        411.65,156.707 411.65,156.706 387.254,168.908 382.407,200.515 387.75,205.148 382.944,234.643 348.258,247.851        343.795,259.839 316.821,280.444 276.226,256.999 "
				 i:knockout="Off" /><polyline
				 style="fill:none"
				 id="polyline111"
				 points="557.961,346.353 497.721,379.138 497.237,379.402 470.844,339.632        460.126,347.271 459.889,359.343 450.249,365.948 440.082,368.616 420.78,352.235 405.018,309.352 416.73,297.204        422.163,297.31 429.98,298.974 495.078,274.29 558.275,346.182 "
				 i:knockout="Off" /><polyline
				 style="fill:none"
				 id="polyline113"
				 points="558.569,346.087 558.275,346.182 557.961,346.353 "
				 i:knockout="Off" /><polyline
				 style="fill:none;stroke:#5b5759;stroke-width:0.90560001"
				 id="polyline116"
				 points="537.886,154.963 530.645,154.822        520.987,154.631 504.37,170.608 505.895,185.13 490.65,192.68 459.676,201.733 412.52,250.623 382.944,234.643 387.75,205.148        382.407,200.515 387.254,168.908 484.832,120.104 499.135,129.745 527.156,117.314 539.235,113.936 "
				 i:knockout="Off" /><polyline
				 style="fill:none;stroke:#5b5759;stroke-width:0.90560001"
				 id="polyline118"
				 points="461.178,45.905 459.401,62.238        480.301,74.123 468.299,85.661 458.76,94.834 450.682,91.051 434.436,111.111 419.736,113.993 394.938,146.716 411.65,156.707        "
				 i:knockout="Off" /><polyline
				 style="fill:none;stroke:#5b5759;stroke-width:0.90560001"
				 id="polyline120"
				 points="398.497,26.802 401.122,78        364,153.958 394.938,146.716 "
				 i:knockout="Off" /><polyline
				 style="fill:none;stroke:#5b5759;stroke-width:0.90560001"
				 id="polyline122"
				 points="322.01,16.014 328.995,60.88        300.089,118.281 304.538,137.691 285.279,165.089 304.667,161.848 309.129,149.859 329.688,148.452 334.646,157.305        352.5,155.241 364,153.958 "
				 i:knockout="Off" /><polyline
				 style="fill:none;stroke:#5b5759;stroke-width:0.90560001"
				 id="polyline124"
				 points="173.145,33.056 208.907,118.298        209.659,126.163 209.504,134.01 229.229,128.963 256.13,142.777 273.112,169.681 285.279,165.089 "
				 i:knockout="Off" /><polyline
				 style="fill:none;stroke:#5b5759;stroke-width:0.90560001"
				 id="polyline126"
				 points="118.574,71.52 125.634,84.656        113.229,101.319 112.897,118.221 138.662,128.389 163.896,134.924 182.535,154.312 207.146,177.139 202.718,187.317        210.752,224.007 223.765,230.152 211.064,254.207 229.148,271.168 254.536,254.458 276.266,254.886 268.681,241.452        262.503,233.178 265.054,226.284 266.079,220.266 266.316,208.194 264.257,190.038 273.365,187.5 273.514,179.954        273.112,169.681 "
				 i:knockout="Off" /><polyline
				 style="fill:none;stroke:#5b5759;stroke-width:0.90560001"
				 id="polyline128"
				 points="68.382,109.496 96.802,107.638        112.897,118.221 "
				 i:knockout="Off" /><polyline
				 style="fill:none;stroke:#5b5759;stroke-width:0.90560001"
				 id="polyline130"
				 points="47.931,289.644 76.587,275.714        105.219,262.994 165.58,264.181 204.709,270.385 229.68,290.2 264.271,281.521 270.963,278.935 276.173,259.715        276.266,254.886 "
				 i:knockout="Off" /><polyline
				 style="fill:none;stroke:#5b5759;stroke-width:0.90560001"
				 id="polyline132"
				 points="63.599,321.958 72.129,318.198        120.935,292.891 210.933,291.643 220.472,297.869 228.402,293.797 229.68,290.2 "
				 i:knockout="Off" /><polyline
				 style="fill:none;stroke:#5b5759;stroke-width:0.90560001"
				 id="polyline134"
				 points="119.419,446.543 211.415,328.488        219.566,297.851 "
				 i:knockout="Off" /><polyline
				 style="fill:none;stroke:#5b5759;stroke-width:0.90560001"
				 id="polyline136"
				 points="128.627,454.271 156.43,453.005        164.574,438.07 153.42,421.849 179.969,399.875 186.403,372.076 196.665,372.278 204.229,356.123 213.568,341.813        211.415,328.488 "
				 i:knockout="Off" /><polyline
				 style="fill:none;stroke:#5b5759;stroke-width:0.90560001"
				 id="polyline138"
				 points="189.399,495.923 201.426,467.78        196.665,372.278 "
				 i:knockout="Off" /><polyline
				 style="fill:none;stroke:#5b5759;stroke-width:0.90560001"
				 id="polyline140"
				 points="213.875,510.294 273.054,479.454        280.375,383.585 274.825,374.118 257.497,380.116 220.146,344.961 213.568,341.813 "
				 i:knockout="Off" /><polyline
				 style="fill:none;stroke:#5b5759;stroke-width:0.90560001"
				 id="polyline142"
				 points="358.055,585.087 371.663,531.515        407.526,519.54 423.151,492.674 432.205,492.852 429.519,475.892 414.915,481.643 409.776,497.242 357.934,523.395        354.383,519.702 337.755,505.487 306.217,451.123 290.429,455.644 281.479,480.83 273.054,479.454 "
				 i:knockout="Off" /><polyline
				 style="fill:none;stroke:#5b5759;stroke-width:0.90560001"
				 id="polyline144"
				 points="421.135,593.922 426.307,547.083        419.449,542.721 420.793,520.405 436.641,512.869 432.205,492.852 429.519,475.892 440.638,401.837 445.657,392.274        470.69,378.275 492.762,391.994 485.495,423.855 519.189,429.953 522.122,465.034 534.656,472.527 527.494,498.955        552.215,589.395 "
				 i:knockout="Off" /><line
				 style="fill:none;stroke:#5b5759;stroke-width:0.90560001"
				 id="line146"
				 y2="429.953"
				 x2="519.18903"
				 y1="439.34601"
				 x1="659.09998"
				 i:knockout="Off" /><polyline
				 style="fill:none;stroke:#5b5759;stroke-width:0.90560001"
				 id="polyline148"
				 points="615.402,266.39 582.833,295.038        577.721,339.924 558.275,346.182 497.237,379.402 492.762,391.994 "
				 i:knockout="Off" /><polyline
				 style="fill:none;stroke:#5b5759;stroke-width:0.90560001"
				 id="polyline150"
				 points="382.944,234.643 348.258,247.851        343.795,259.839 316.821,280.444 327.671,312.057 363.285,312.758 405.018,309.352 416.73,297.204 422.163,297.31        429.98,298.974 495.078,274.29 558.275,346.182 "
				 i:knockout="Off" /><polyline
				 style="fill:none;stroke:#5b5759;stroke-width:0.90560001"
				 id="polyline152"
				 points="280.375,383.585 312.104,366.702        327.671,312.057 "
				 i:knockout="Off" /><polyline
				 style="fill:none;stroke:#5b5759;stroke-width:0.90560001"
				 id="polyline154"
				 points="306.217,451.123 337.712,415.514        334.896,405.193 358.427,375.463 374.76,373.972 381.584,364.748 363.285,312.758 "
				 i:knockout="Off" /><polyline
				 style="fill:none;stroke:#5b5759;stroke-width:0.90560001"
				 id="polyline156"
				 points="497.237,379.402 470.844,339.632        460.126,347.271 459.889,359.343 450.249,365.948 440.082,368.616 420.78,352.235 405.018,309.352 "
				 i:knockout="Off" /><line
				 style="fill:none;stroke:#5b5759;stroke-width:0.90560001"
				 id="line158"
				 y2="256.99899"
				 x2="276.22601"
				 y1="280.444"
				 x1="316.82101"
				 i:knockout="Off" /><polygon
				 points="698.163,356.784 684.777,361.955 673.801,397.971 659.1,439.346 667.969,540.967 667.886,545.193 630.317,582.497 526.88,591.632 518.729,606.871 442,608.984 424.176,594.141 371.715,590.391 282.423,555.724 276.387,555.605 267.565,543.657 229.697,534.759 213.875,510.294 189.399,495.923 140.152,482.275 132.567,468.841 128.627,454.271 119.419,446.543 90.47,429.367 80.803,398.984 75.809,391.941 86.806,370.118 77.741,339.747 66.439,331.07 63.599,321.958 47.931,289.644 8.581,248.714 8.705,242.376 9.014,226.682 9.168,218.835 1.068,208.562 6.252,198.247 24.102,181.086 31.345,181.229 39.795,181.395 63.113,162.531 69.978,151.193 75.814,130.776 68.382,109.496 78.256,68.024 113.136,75.353 173.145,33.056 192.225,14.712 204.44,7.707 231.1,3.099 251.659,1.692 259.524,0.94 275.536,15.748 299.077,16.211 331.086,15.936 343.129,17.682 358.706,24.027 431.067,29.073 443.47,43.206 484.411,49.446 512.221,78.374 524.889,94.323 539.393,109.102 537.886,154.963 550.147,176.339 577.959,205.268 578.746,211.322 577.792,213.718 577.709,217.944 591.615,232.409 615.402,266.39 637.557,291.282 661.879,298.1 686.91,314.897 698.269,351.351 "
				 id="polygon161"
				 style="fill:none;stroke:#000000;stroke-width:1.81120002" />
			</svg>
		</section>
		
		<!-- BEGIN FOOTER -->
		
		<footer class="wf">
				<div class="right">
					<p><strong>Pixel Humain</strong></p>
					<p class="small">Comment rétablir le PH d'une ville.</p>
				</div>
			<div class="clear"></div>
		</footer>
		
		<!-- END FOOTER -->
		
	    <script type="text/javascript" src="js/vendor/jquery-1.9.1.min.js"></script>
		<script type="text/javascript" src="js/vendor/jquery-ui.sortable.min.js"></script>
		<script type="text/javascript" src="js/vendor/jquery.ui.touch-punch.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.8.3.min.js"><\/script>')</script>

        <script type="text/javascript" src="js/vendor/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/old/main_live.js"></script>
		<script type="text/javascript" src="js/jquery.validate.min.js"></script>
		<script type="text/javascript" src="js/select2.js"></script>
		<script type="text/javascript" src="js/jquery.mixitup.min.js"></script>
		<script type="text/javascript" src="js/main.region.js"></script>

        <script>
			$('#particpateTabs a').click(function (e) {
			  e.preventDefault();
			  $(this).tab('show');
			})
		
            /*var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));*/
			
			 var uvOptions = {};
			  (function() {
				var uv = document.createElement('script'); uv.type = 'text/javascript'; uv.async = true;
				uv.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'widget.uservoice.com/YmmyBM5muP7JoGkF31YDg.js';
				var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(uv, s);
			  })();
			  
        </script>
    </body>
</html>
