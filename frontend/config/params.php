<?php
$rel_path = '/common/assets/';
return [
    'adminEmail' => 'info@smartbus.com.np',
    'image_path'                    => [
            'image'    => $rel_path . '/images/',
            'uploads'  => $rel_path . '/images/uploads/',
            'no-image' => $rel_path . '/images/no-image.png',
    ],
    'path'       => [
            'retrieve' => [
                    'image'    => [
                            'ad'      => $rel_path . '\uploads\images\ads',
                            'user'    => $rel_path . '\uploads\images\users',
                            'blog'    => $rel_path . '\uploads\images\blogs',
                            'vehicle' => $rel_path . '\uploads\images\vehicles',
                            'misc'    => $rel_path . '\uploads\images\misc',
                    ],
                    'document' => $rel_path . '\uploads\documents',
                    'temp'     => $rel_path . '\uploads\temp'
            ]
    ]
];
