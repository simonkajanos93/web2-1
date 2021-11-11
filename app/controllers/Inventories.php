<?php

class Inventories extends Controller
{
    public function __construct()
    {
        $this->inventoryModel = $this->model('Inventory');
    }

    private function getComputers() {
        return $this->inventoryModel->getComputers();
    }

    private function getSoftwares() {
        return $this->inventoryModel->getSoftwareList();
    }

    private function getSoftwareInstalls($gepId) {
        return $this->inventoryModel->getSoftwareInstalls($gepId);
    }

    public function index() {
        $data = [
            'title' => 'Client',
            'description' => ''
        ];

        //ini_set("default_socket_timeout", 5000);
        $options = array(
            "location" => "http://localhost/inventories/api",
            "uri" => "http://localhost/inventories/api",
            //"location" => URLROOT . "/soap/api",
            //"uri" => URLROOT . "/soap/api",
            'keep_alive' => false,
        );
        try {
            $kliens = new SoapClient(null, $options);

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                $gepid = $_POST['gepid'];

                $data['computers'] = $kliens->getSoftwareInstalls($gepid);
            }

        } catch (SoapFault $e) {
            var_dump($e);
        }

        $this->view('pages/inventory', $data);
    }

    public function api()
    {
        $options = array(
            "uri" => "http://localhost/inventories/api"
            //"uri" => URLROOT . "/soap/api"
        );
        $server = new SoapServer(null, $options);
        $server->setObject($this);
        $server->handle();
    }
}