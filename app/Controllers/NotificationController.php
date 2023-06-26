<?php
namespace App\Controllers;
use App\Models\NotificationModel;
// use Ratchet\Client\Connector;
use React\Socket\Connector;
use Ratchet\Client\WebSocket;
use Ratchet\RFC6455\Messaging\Frame;
class NotificationController extends BaseController {
    public function index() {
        $data = array();
        $model = new NotificationModel();
        $data['notifications'] = $model->findAll();
        return $data;
        return view('notification', $data);
    }
    public function create() {
        $model = new NotificationModel();
        $data = array(
            'user_id' => "session()->get('user_id')",
            'message' => 'New notification!',
        );
        $model->insert($data);
        $config = array(
            'host' => 'localhost',
            'port' => 8080,
            'path' => '/'
        );
        $connector = new Connector;
        $connector($config)->then(function(WebSocket $conn) {
            $conn->send(new Frame("New notification!"));
            $conn->close();
        }, function(\Exception $e) use ($loop) {
            echo "Could not connect: {$e->getMessage()}\n";
        });
        return redirect()->to('/notification');
    }
}