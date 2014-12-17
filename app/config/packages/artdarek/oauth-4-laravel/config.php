<?php

return array(

    /*
    |--------------------------------------------------------------------------
    | oAuth Config
    |--------------------------------------------------------------------------
    */

    /**
     * Consumers
     */
    'consumers' => array(

        /**
         * Google
         */
        'Google' => array(
            'client_id'     => $_ENV['GOOGLE_CLIENT_ID'],
            'client_secret' => $_ENV['GOOGLE_CLIENT_SECRET'],
            'scope'         => ['userinfo_email'],
        ),

    )

);
