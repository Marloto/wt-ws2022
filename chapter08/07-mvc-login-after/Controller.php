<?php
class Controller {
    private $users;

    public function __construct($users) {
        $this->users = $users;
    }

    public function showLoginForm($error = "") {
        $view = new View\LoginView();
        $view->show($error);
    }

    public function doLogin() {
        $username = isset($_POST['username']) ? $_POST['username'] : "";
        $password = isset($_POST['password']) ? $_POST['password'] : "";
    
        $user = $this->users->findByUsername($username);
        if($user != null) {
            if($user->checkPassword($password)) {
                $_SESSION["authentificated"] = true;
                $this->showDefault();
                return;
            } else {
                $error = "Password is wrong";
            }
        } else {
            $error = "User not found";
        }
        $this->showLoginForm($error);
    }

    public function doLogout() {
        $_SESSION["authentificated"] = false;
        session_unset();
        $this->showDefault();
    }

    public function showDefault() {
        $view = new View\DefaultView();
        $view->show(isset($_SESSION['authentificated']) && $_SESSION['authentificated']);
    }

    public function run() {
        $action = "";
        if (isset($_REQUEST['action'])) {
            $action = $_REQUEST['action'];
        }

        switch($action) {
            case 'show-login':
                $this->showLoginForm();
                break;
            case 'login':
                $this->doLogin();
                break;
            case 'logout':
                $this->doLogout();
                break;
            case 'edit':
                // ...
                break;
            case 'save':
                // ...
                break;
            default:
                $this->showDefault();
                // austauschen gegen default blog view
                break;
        }
    }
}
?>