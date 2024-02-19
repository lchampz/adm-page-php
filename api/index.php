

<?php

include("classes/User.php");

$teste = new User();

$teste->changeName("teste");
echo $teste->displayName();