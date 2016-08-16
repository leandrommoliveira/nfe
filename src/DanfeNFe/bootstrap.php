<?php

// Registrar a DOMPDF_DIR
$testing = (trim(@$_ENV['APP_ENV']) == 'testing');
if (($testing != true) && (defined('DOMPDF_DIR') != true)) {
    define('DOMPDF_DIR', __DIR__ . '/../../../../dompdf/dompdf');
}