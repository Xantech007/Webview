<?php
require_once "../app/core/Controller.php";
require_once "../app/models/User.php";

class DashboardController extends Controller {

    public function index() {

        if (!isset($_SESSION['user_id'])) {
            header("Location: /login");
            exit;
        }

        $userModel = new User();
        $user = $userModel->find($_SESSION['user_id']);
        $stats = $userModel->getStats($_SESSION['user_id']);

        $this->view("dashboard/index", [
            "user" => $user,
            "stats" => $stats
        ]);
    }
}
