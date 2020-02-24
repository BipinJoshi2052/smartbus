<?php
$rel_path = '/../common/assets/';
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
                                'ad'      => $rel_path . '\uploads\images\ads' . DIRECTORY_SEPARATOR,
                                'user'    => $rel_path . '\uploads\images\users' . DIRECTORY_SEPARATOR,
                                'blog'    => $rel_path . '\uploads\images\blogs' . DIRECTORY_SEPARATOR,
                                'vehicle' => $rel_path . '\uploads\images\vehicles' . DIRECTORY_SEPARATOR,
                                'misc'    => $rel_path . '\uploads\images\misc' . DIRECTORY_SEPARATOR,
                        ],
                        'document' => $rel_path . '\uploads\documents' . DIRECTORY_SEPARATOR,
                        'temp'     => $rel_path . '\uploads\temp' . DIRECTORY_SEPARATOR
                ]
        ]
];
