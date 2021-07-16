<?php
$admin_pages[] = [
    'title' => 'Tableau de board',
    'icon'  => 'fas fa-home',
    'href'  => ''
];
$admin_pages[] = [
    'title' => 'Configuration du site',
    'icon'  => 'fas fa-cog',
    'href'  => 'configuration'
];
$admin_pages[] = [
    'title' => 'Fichiers de logs',
    'icon'  => 'fas fa-file-csv',
    'href'  => 'logs'
];
$admin_pages[] = [
    'title' => 'Gestion des comptes',
    'icon'  => 'fas fa-coins',
    'href'  => 'accounts'
];
$admin_pages[] = [
    'header' => true,
    'title'  => 'Gestion des pages',
    'href'   => 'articles'
];
$admin_pages[] = [
    'title' => 'Ajouter une page',
    'icon'  => 'fas fa-plus-circle',
    'href'  => 'articles/add',
    'heading' => [
        'title' => 'Gestion des pages',
        'href' => 'articles'
    ]
];
$admin_pages[] = [
    'title' => 'Modifier une page',
    'href'  => 'articles/edit',
    'icon'  => 'fas fa-edit',
    'heading' => [
        'title' => 'Gestion des pages',
        'href' => 'articles'
    ]
];
$admin_pages[] = [
    'title' => 'Supprimer une page',
    'icon'  => 'fas fa-minus-circle',
    'href'  => 'articles/delete',
    'heading' => [
        'title' => 'Gestion des pages',
        'href' => 'articles'
    ]
];
