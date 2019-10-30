<?php

session_start();
unset($_SESSION['pass']);
if(empty($_SESSION['pass'])){
	echo "Session Pass is Unset";
}




?>