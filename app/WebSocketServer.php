<?php
use Ratchet\Server\IoServer;
use App\WebSocket\Notification;
require dirname(__DIR__) . '/vendor/autoload.php';
$server = IoServer::factory(
    new Notification(),
    8080
);
$server->run();