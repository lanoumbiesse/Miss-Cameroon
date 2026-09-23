<?php

return [

    'users' => [
        'order' => 'created_at',
        'direction' => 'desc',
        'role' => 'all',
        'valid' => false,
        'confirmed' => false,
        'new' => false,
    ],
    'posts' => [
        'order' => 'created_at',
        'direction' => 'desc',
        'new' => false,
        'active' => false,
    ],
    'contacts' => [
        'new' => false,
    ],
    'comments' => [
        'new' => false,
        'valid' => false,
    ],
    'candidates' => [
        'order' => 'created_at',
        'direction' => 'asc',
        'regionconcours' => 'all',
        'finaliste' => false,
    ],
    'vote' => [
        'order' => 'created_at',
        'direction' => 'desc',
         'status' => 'all',
    ],

    'inscriptions' => [
        'order' => 'nom',
        'direction' => 'desc',
        'regionconcours' => 'all',
        'finaliste' => false,
        'status' => false,
    ],
    
     'billets' => [
        'order' => 'created_at',
        'direction' => 'desc',
        'regionconcours' => 'all',
        
    ],

];