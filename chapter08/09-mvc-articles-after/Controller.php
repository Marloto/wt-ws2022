<?php
class Controller {
    private $users;
    private $articles;

    public function __construct($users, $articles) {
        $this->users = $users;
        $this->articles = $articles;
    }

    public function showLoginForm($error = "") {
        $view = new View\Login();
        $view->show($error);
    }

    public function handleLogin() {
        $username = isset($_POST['username']) ? $_POST['username'] : "";
        $password = isset($_POST['password']) ? $_POST['password'] : "";
        $user = $this->users->findByUsername($username);
        if(!$user) {
            $this->showLoginForm("Username is wrong");
        } else if(!$user->checkPassword($password)) {
            $this->showLoginForm("Password is wrong");
        } else {
            $_SESSION["authentificated"] = true;
            $this->showBlog();
        }
    }

    private function isAuthentificated() {
        return isset($_SESSION["authentificated"]) && $_SESSION["authentificated"];
    }

    public function showBlog() {
        $view = new View\Blog();
        $view->show($this->articles->getArticles(), $this->isAuthentificated());
    }

    public function showDefault() {
        $view = new View\DefaultView();
        $view->show($this->isAuthentificated());
    }

    public function showEdit() {
        if(!$this->isAuthentificated()) {
            return $this->showLoginForm();
        }
        $id = intval($_REQUEST['id']);
        $view = new View\Edit();
        $view->show($this->articles->getArticle($id), $id);
    }

    public function handleSave() {
        if(!$this->isAuthentificated()) {
            return $this->showLoginForm();
        }
        $id = intval($_POST['id']);
        if ($id == -1) {
            $this->articles->addArticle($_POST['title'], $_POST['content']);
        } else {
            $this->articles->updateArticle($id, $_POST['title'], $_POST['content']);
        }
        $this->showBlog();
    }

    public function handleLogout() {
        $_SESSION["authentificated"] = false;
        session_unset();
        $this->showBlog();
    }

    public function run() {
        $action = "";
        if(isset($_REQUEST["action"])) {
            $action = $_REQUEST["action"];
        }

        switch($action) {
            case 'show-login':
                $this->showLoginForm();
                break;
            case 'login':
                $this->handleLogin();
                break;
            case 'logout':
                $this->handleLogout();
                break;
            case 'edit':
                $this->showEdit();
                break;
            case 'save':
                $this->handleSave();
                break;
            default:
                $this->showBlog();
                break;
        }
    }
}
?>