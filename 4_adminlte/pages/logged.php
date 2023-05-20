<?php
	session_start();
	echo "Zalogowany ".$_SESSION["logged"]["firstName"];