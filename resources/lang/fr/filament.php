<?php
return [
    'pages' => [
        'title' => 'Pages',
        'fields' => [
            'title' => 'Titre',
            'slug' => 'Slug',
            'content' => 'Contenu',
            'created_at' => 'Créé à',
            'updated_at' => 'Mis à jour à',
            'status' => 'Statut',
            'template' => 'Gabarit',
            'add_content' => 'Ajouter du contenu',
            'preview' => 'Aperçu',
        ],
        'status' => [
            'draft' => 'Brouillon',
            'published' => 'Publié'
        ]
    ],
    'services' => [
        'title' => 'Services',
        'fields' => [
            'title' => 'Titre',
            'slug' => 'Slug',
            'content' => 'Contenu',
            'created_at' => 'Créé à',
            'updated_at' => 'Mis à jour à',
            'status' => 'Statut',
            'template' => 'Gabarit',
            'add_content' => 'Ajouter du contenu',
            'preview' => 'Aperçu',
            'featured_image' => 'Image à la une',
        ],
        'status' => [
            'draft' => 'Brouillon',
            'published' => 'Publié'
        ]
    ],
    'users' => [
        'title' => 'Utilisateurs',
        'fields' => [
            'name' => 'Nom complet',
            'email' => 'Courriel',
            'phone' => 'Téléphone',
            'street' => 'Rue',
            'postal_code' => 'Code postal',
            'city' => 'Ville',
            'state' => 'Etat',
            'country' => 'Pays',
            'password' => 'Mot de passe',
            'passwordConfirmation' => 'Confirmation du mot de passe',
            'roles' => 'Rôles',
            'is_approved' => 'Est approuvé',
            'created_at' => 'Créé à',
            'updated_at' => 'Mis à jour à',
            'yes' => 'Oui',
            'no' => 'Non',
        ]
    ],
    'categories' => [
        'title' => 'Catégories',
        'fields' => [
            'title' => 'Titre',
            'created_at' => 'Créé à',
            'updated_at' => 'Mis à jour à',
            'featured_image' => 'Image à la une',
            'categories' => 'Catégories',
        ]
    ],
    'navigation' => [
        'groups' => [
            'general' => 'Général',
            'administration' => 'Administration',
        ]
    ],
];
