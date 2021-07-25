<?php
$admin_pages[] = [
    'title' => 'Tableau de board',
    'icon'  => 'fas fa-home',
    'href'  => '',
    'color' => '#fffffff',
    'desc'  => 'Tableau de board',
];
$admin_pages[] = [
    'title' => 'Configuration du site',
    'icon'  => 'fas fa-cog',
    'href'  => 'configuration',
    'color' => '#3f51b5',
    'desc'  => 'Accéder aux diverses configurations du site et modifiez le favicon, le pied de page, ajouter une feuille de style ou bien encore en activant une maintenance sur le site'
];
$admin_pages[] = [
    'title' => 'Fichiers de logs',
    'icon'  => 'fas fa-file-csv',
    'href'  => 'logs',
    'color' => '#e674f9',
    'desc'  => 'Accéder aux fichiers de logs afin de vérifier le bon fonctionnement du site et de sa sécurité'
];
$admin_pages[] = [
    'title' => 'Gestion des comptes',
    'icon'  => 'fas fa-coins',
    'href'  => 'accounts',
    'color' => '#795548',
    'desc'  => 'Ajoutez, modifier ou supprimer les comptes administrateurs ou utilisateurs du site'
];
$admin_pages[] = [
    'title' => 'Gestion des images',
    'icon' => 'far fa-images',
    'href' => 'images'
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
    ],
    'color' => '#4caf50',
    'desc'  => 'Ajouter une nouvelle page (article) et configurez son contenu, description et sa bannière'
];
$admin_pages[] = [
    'title' => 'Modifier une page',
    'href'  => 'articles/edit',
    'icon'  => 'fas fa-edit',
    'color' => '#e25585',
    'heading' => [
        'title' => 'Gestion des pages',
        'href' => 'articles'
    ],
    'desc'  => 'Supprimer ou désactiver une page (article), ou bien apportez des changements à celle-ci en modifiant son contenu'
];
