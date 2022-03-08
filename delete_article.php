<?php
session_start();

require './auth/check_login.php';
require './auth/db_connection.php';
require './auth/fetch_data.php';
require './auth/delete_article.php';