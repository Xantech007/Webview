<?php
// config.php

define('DB_HOST', 'localhost');
define('DB_USER', 'root');           // change this
define('DB_PASS', '');               // change this
define('DB_NAME', 'web_app');

define('SITE_URL', 'http://localhost/your-project/');  // change to your domain
define('SITE_NAME', 'My Web App');

// For password hashing (do NOT change)
define('PASSWORD_HASH_ALGO', PASSWORD_ARGON2ID);
