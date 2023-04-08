<?php
ini_set('display_errors', 1);
define('URL', "https://books.toscrape.com");
define('URL_PAGE_LIMIT', 50);
define('ONLINE', false);
define('PROJECT_NAME', "test_html_parser");
define('ROOT', dirname(__FILE__,2));
define('DOCUMENT_ROOT', dirname(__FILE__,1));
define('ASSETS_CSS', "/src/assets/css");
define('ASSETS_JS', "/src/assets/js");
define('LIB', DOCUMENT_ROOT."/lib");
define('TEMP', DOCUMENT_ROOT."/temp");
define('COMPOSER_WEBSERVER', "localhost:8000");
define('NORMAL_WEBSERVER', "test_html_parser");
define('COMPOSER_CONFIG_FILE', ROOT."/composer.json");
define('HOST_URL', $_SERVER['REQUEST_URI']);
define('ASSETS_OFFLINE_CSS', array(
"bootstrap.min.css",
"dataTables.bootstrap.min.css",
"jquery.dataTables.min.css",
"dataTables.jqueryui.min.css"));
define('ASSETS_ONLINE_CSS', array(
"https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css", 
"https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/css/dataTables.bootstrap.min.css", 
"https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/css/jquery.dataTables.min.css",
"https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/css/dataTables.jqueryui.min.css",
));
define('ASSETS_OFFLINE_JS', array(
"jquery.min.js",
"bootstrap.min.js",
"jquery.dataTables.min.js",
"dataTables.bootstrap.min.js"
));
define('ASSETS_ONLINE_JS', array(
"https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js", 
"https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/js/bootstrap.min.js", 
"https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js", 
"https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/dataTables.bootstrap.min.js"
));
?>