<?php
setcookie('name1', '', time() - 42000, "/");
setcookie('name', '', time() - 42000, "/");
echo "Cookies have been deleted!";
?>