<?php

require __DIR__ . '/vendor/autoload.php';

define('TITLE', 'Editar vaga');

use \App\Entity\Opportunity;

// VALIDAÇÃO DO GET
if (!isset($_GET['id']) || !is_numeric($_GET['id']) ) {
    header('location: index.php?status=error');
    exit;
}

// CONSULTA VAGA
$opportunity = Opportunity::getOpportunity($_GET['id']);

// VALIDAÇÃO A VAGA
if (!$opportunity instanceof Opportunity) {
    header('location: index.php?status=error');
    exit;
}

if (isset($_POST['title'], $_POST['description'], $_POST['active'])) {
    $opportunity->title       = $_POST['title'];
    $opportunity->description = $_POST['description'];
    $opportunity->active      = $_POST['active'];

    $opportunity->update();

    header('location: index.php?status=success');
    exit;
}

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/form.php';
include __DIR__ . '/includes/footer.php';
