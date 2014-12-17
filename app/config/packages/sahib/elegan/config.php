<?php

return [
    'Category' => [
        // An image.
        'photo' => [

            // Mark this attribute as image.
            'is_image'     => true,

            // Path where to store the files.
            'path'         => 'i/categories',

            // Default image to use if the original is missing.
            'default_file' => 'category.jpg',

            // Alternative image sizes, to use with the method image().
            'image_sizes'  => [

                // This is the default size for your image, the image
                // will be adjusted to this size when it's uploaded.
                // This value is always required.
                'full'  => [1024, 768],

                // This is an alternative size.
                // You can define here all sizes you want.
                'thumb' => [150, 150],
            ],
        ],
    ],

    'Participant' => [
        // An image.
        'photo' => [

            // Mark this attribute as image.
            'is_image'     => true,

            // Path where to store the files.
            'path'         => 'i/participants',

            // Default image to use if the original is missing.
            'default_file' => 'participant.jpg',

            // Alternative image sizes, to use with the method image().
            'image_sizes'  => [

                // This is the default size for your image, the image
                // will be adjusted to this size when it's uploaded.
                // This value is always required.
                'full'  => [1024, 768],

                // This is an alternative size.
                // You can define here all sizes you want.
                'thumb' => [150, 150],
            ],
        ],
    ],
];
