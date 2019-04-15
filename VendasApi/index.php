<?php

//////phpinfo();


session_start();

include_once "./lib/action.class.php";
include_once "./lib/application.class.php";

$action = new TAction();
if ($_GET)
{
    $action->loadArray($_GET);
}
if ($_POST)
{
    $action->loadArray($_POST);
}

TApplication::create($action);

// phpinfo();

?>