<?php

	// Detect our key devices
	$iPod    = stripos($_SERVER['HTTP_USER_AGENT'],"iPod");
	$iPhone  = stripos($_SERVER['HTTP_USER_AGENT'],"iPhone");
	$iPad    = stripos($_SERVER['HTTP_USER_AGENT'],"iPad");
	$Android = stripos($_SERVER['HTTP_USER_AGENT'],"Android");

	// if iPad or iPhone, add a deep link to launch the Instagram iOS App
	if( $iPod || $iPhone ){ ?>
	    <a href="instagram://media?id=1719648098521509469">digikala PR Post (Launch iOS App)</a>
	<?php }
	// if iPad there's no iPad Instagram App, so launch in the browser
	else if($iPad){ ?>

		<!-- <a href="instagram://media?id=1719648098521509469">digikala PR Post (Launch iOS App ipad)</a> -->
		header("Location: instagram://media?id=1719648098521509469");

	<?php }
	// if Android launch the Instagram Android App
	else if($Android){ ?>
	    <!-- <a href="instagram://media?id=BfdatWjDO5d">Follow me (Launch Android App)</a> -->
			header("Location: instagram://media?id=BfdatWjDO5d");

	<?php }
	// for any other device, just load the Instagram Website
	else { ?>
		<a href="https://instagram.com/digikalacom/" target="_blank"> digikala PR Post </a>

<?php }	?>
