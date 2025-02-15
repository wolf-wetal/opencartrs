<?php
// APPLICATION
define('APPLICATION', 'Catalog');
define('DEBUG', true);
define('ERROR_DISPLAY', true);
define('ERROR_LOG', true);
// HTTP
define('HTTP_SERVER', 'https://dev2.eroticshop.kg/');

// DIR
define('DIR_OPENCART', '/var/www/juli.dementeva/data/www/dev2.eroticshop.kg/');
define('DIR_APPLICATION', DIR_OPENCART . 'catalog/');
define('DIR_EXTENSION', DIR_OPENCART . 'extension/');
define('DIR_IMAGE', DIR_OPENCART . 'image/');
define('DIR_SYSTEM', DIR_OPENCART . 'system/');
define('DIR_STORAGE', DIR_SYSTEM . 'storage/');
define('DIR_LANGUAGE', DIR_APPLICATION . 'language/');
define('DIR_TEMPLATE', DIR_APPLICATION . 'view/template/');
define('DIR_CONFIG', DIR_SYSTEM . 'config/');
define('DIR_CACHE', DIR_STORAGE . 'cache/');
define('DIR_DOWNLOAD', DIR_STORAGE . 'download/');
define('DIR_LOGS', DIR_STORAGE . 'logs/');
define('DIR_SESSION', DIR_STORAGE . 'session/');
define('DIR_UPLOAD', DIR_STORAGE . 'upload/');

// DB
define('DB_DRIVER', 'mysqli');
define('DB_HOSTNAME', 'localhost');
define('DB_USERNAME', 'eroticshopkg');
define('DB_PASSWORD', 'O8s1D9g4');
define('DB_DATABASE', 'eroticshop_new');
define('DB_PORT', '3306');
define('DB_PREFIX', 'oc_');
