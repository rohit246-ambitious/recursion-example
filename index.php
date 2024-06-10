<?php 

require_once 'config.php';
require_once './controllers/MemberController.php';
require_once './models/Member.php';

$controller =new MemberContoller();

if (isset($_GET['action']) && $_GET['action'] === 'addMember') {
    $controller->addMember();
} else {
    $controller->index();
}
?>