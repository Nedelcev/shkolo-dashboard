<?php

class DashboardController extends Controller {
    public function index() {
        $buttonModel = $this->model('Button');
        $buttons = $buttonModel->getAllButtons();

        // Pass the buttons data to the view
        $this->view('dashboard', ['buttons' => $buttons]);
    }
}
