<?php

// Require config file; need to set upon deployment
//require_once('');

// Set logging parameters
ini_set('error_reporting', E_ALL);
ini_set('display_errors', '0');
ini_set('log_errors', true);
ini_set('error_log', $_CONFIG['LOG_DESTINATION']);