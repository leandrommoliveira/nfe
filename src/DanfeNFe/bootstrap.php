<?php

global $_ENV;
throw new Exception(print_r($_ENV, true));

// Registrar a DOMPDF_DIR
$testing = (trim(@$_ENV['APP_ENV']) == 'testing');
if (($testing != true) && (defined('DOMPDF_DIR') != true)) {
    define('DOMPDF_DIR', __DIR__ . '/../../../../dompdf/dompdf');
}