<?php

class ButtonController extends Controller {
    public function config($position) {
        $buttonModel = $this->model('Button');
        $button = $buttonModel->getButton($position);

        $this->view('config', ['button' => $button, 'position' => $position]);
    }

    public function save() {
        if ($_POST) {
            $position = $_POST['position'];
            $title = $_POST['title'];
            $link = $_POST['link'];
            $color = $_POST['color'];

            $buttonModel = $this->model('Button');
            $buttonModel->saveButton($position, $title, $link, $color);

            header("Location: /");
        }
    }

    public function delete($position) {
        $buttonModel = $this->model('Button');
        $buttonModel->deleteButton($position);

        header("Location: /");
    }
	
    public function updatePositions() {
        // Get the JSON data from the AJAX request
        $input = file_get_contents('php://input');
        $positions = json_decode($input, true)['positions'];

        if (!is_array($positions)) {
            throw new Exception("Invalid input data");
        }

        $buttonModel = $this->model('Button');

        // Loop through the positions and update them in the database
        foreach ($positions as $position) {
            if (isset($position['id']) && isset($position['position'])) {
                $buttonModel->updatePosition($position['id'], $position['position']);
            } else {
                throw new Exception("Invalid data structure: " . json_encode($position));
            }
        }

        // Return a JSON response indicating success
        echo json_encode(['status' => 'success']);
    }
}
