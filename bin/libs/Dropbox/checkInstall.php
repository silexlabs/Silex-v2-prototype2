<?php

require_once('functions.php');

if(checkInstall())
	echo "YES!";
else
	echo "no :(";
?>