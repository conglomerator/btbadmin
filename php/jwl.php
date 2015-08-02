<?php

define("JWL_LOGGING",0);
define("JWL_LOG_TARGET",NULL);

function JWLsetErrorHandlingOptions() {
    return (ini_set("display_errors",0)&&ini_set("error_reporting",E_ALL)&&ini_set("log_errors",JWL_LOGGING)&&ini_set("error_log",JWL_LOG_TARGET));
}