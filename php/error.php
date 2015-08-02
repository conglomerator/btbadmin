<?php

// Load JWL library
require_once("jwl.php");

// Set PHP error handling options
JWLsetErrorHandlingOptions();

// Send some test errors
error_log("This is a test error from error_log().");
trigger_error("This is a test error from trigger_error().");
trigger_error("This is a test error from trigger_error() with E_ERROR level set.",E_USER_ERROR);