<?php

require __DIR__ . '/vendor/autoload.php';

define('TITLE', 'Registrar vaga');

use \App\Entity\Opportunity;

$opportunity = new Opportunity();

if (isset($_POST['title'], $_POST['description'], $_POST['active'])) {
    $opportunity->title       = $_POST['title'];
    $opportunity->description = $_POST['description'];
    $opportunity->active      = $_POST['active'];

    $opportunity->register();

    header('location: index.php?status=success');
    exit;
}

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/form.php';
include __DIR__ . '/includes/footer.php';
