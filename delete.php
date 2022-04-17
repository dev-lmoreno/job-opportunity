<?php

require __DIR__ . '/vendor/autoload.php';

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

if (isset($_POST['delete'])) {
    $opportunity->delete();

    header('location: index.php?status=success');
    exit;
}

include __DIR__ . '/includes/header.php';
include __DIR__ . '/includes/confirmDelete.php';
include __DIR__ . '/includes/footer.php';
