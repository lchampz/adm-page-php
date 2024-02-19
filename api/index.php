

<?php

include("User.php");
$teste = new User();

$teste->changeName("teste");
echo $teste->displayName();