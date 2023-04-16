<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;
use CodeIgniter\API\ResponseTrait;
use App\Models\EventModels;

class EventController extends ResourceController {

    use ResponseTrait;

    

    public function getEvent() {
        $eventModel = new EventModels();
        $data["event"] = $eventModel->findAll();
        return view("get_event", $data);
    }

    public function insertEvent() {
        $eventModel = new EventModels();
        $upload = $this->request->getFile("gambar");

        $data = [
            "title" => $this->request->getVar("title"),
            "description" => $this->request->getVar("description"),
            "gambar" => $upload->getName()
        ];
        $upload->move(WRITEPATH. '../public/assets/images/');
        $result = $eventModel->save($data);

        if($result) {
            $response = [
                "status" => 201,
                "message" => "Successfully Add Event"
            ];
            return redirect()->to("/event");
        } else {
            $response = [
                "status" => 400,
                "message" => "Failed Add Event"
            ];
            return $this->respond($response, 400);
        }
    }

    public function getEventById($id) {
        $eventModel = new EventModels();
        $data = $eventModel->where("id", $id)->findAll();
        return $this->respond($data);
    }

    public function getEventByTitle($title) {
        $eventModel = new EventModels();
        $data = $eventModel->where("title", $title)->findAll();
        return $this->respond($data);
    }

    public function editEventbyId($id) {
        $eventModel = new EventModels();
        $data = [
            "title" => $this->request->getVar("title"),
            "description" => $this->request->getVar("description"),
            "gambar" => $this->request->getVar("gambar")
        ];
        $result = $eventModel->update($id, $data);

        if($result) {
            $response = [
                "status" => 201,
                "message" => "successfully edit event"
            ];
        return $this->respondCreated($response);
        } else {
            $response = [
                "status" => 500,
                "message" => "Failed edit event"
            ];
        return $this->respond($response, 500);
        }
    }

    public function deleteEventById($id) {
        $eventModel = new EventModels();
        $result = $eventModel->delete($id);

        if($result) {
            $response = [
                "status" => 201,
                "message" => "Successfully delete event"
            ];
            return $this->respond($response);
        } else {
            $response = [
                "status" => 500,
                "message" => "Failed delete event"
            ];
            return $this->respond($response, 400);
        }
    }
}

?>