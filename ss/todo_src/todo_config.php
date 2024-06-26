<?php

define("MARIADB_HOST", "localhost");
define("MARIADB_USER", "root");
define("MARIADB_PASSWORD", "php505");
define("MARIADB_NAME", "todoliist");
define("MARIADB_CHARSET", "utf8mb4");
define("MARIADB_DSN", "mysql:host=".MARIADB_HOST.";dbname=".MARIADB_NAME.";charset=".MARIADB_CHARSET);

define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/");
define("FILE_HEADER", ROOT."todo_header.php");
define("FILE_HEADER_INDEX", ROOT."todo_header_index.php");
define("FILE_HEADER_INSERT", ROOT."todo_header_update.php");
define("FILE_LIB_DB", ROOT."todo_lib_db.php");

define("REQUEST_METHOD", strtoupper($_SERVER["REQUEST_METHOD"]));