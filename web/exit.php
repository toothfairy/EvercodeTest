<?php
require_once "/tmpl/functions.php";

// с какого-то фига не работает в Опере, в хроме норм
header( "HTTP/1.0 401 Unauthorized");
PrintHeader("Выход");
echo "<p><strong>Выход выполнен</strong></p>";
PrintFooter();
?>