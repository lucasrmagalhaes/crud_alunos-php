<?php

define('FCPATH', __DIR__ . DIRECTORY_SEPARATOR);

chdir(__DIR__);

$pathsConfig = FCPATH . '../app/Config/Paths.php';

require realpath($pathsConfig) ?: $pathsConfig;

$paths = new Config\Paths();

$bootstrap = rtrim($paths->systemDirectory, '\\/ ') . DIRECTORY_SEPARATOR . 'bootstrap.php';

$app       = require realpath($bootstrap) ?: $bootstrap;
$app->run();