<?php

namespace App\Core;

class App
{
    protected  $controller = 'home';
    protected  $method = 'index';
    protected  $params = [];

    function __construct()
    {
        $url = [];
        $admin = false;

        if (isset($_GET['page'])) {
            $url = explode('/', filter_var(rtrim($_GET['page'], '/'), FILTER_SANITIZE_URL));
        }

        if (isset($url[0])) {
            $url[0] == 'admin' ? $admin = true : $admin = false;
        }

        if ($admin) {

            if (isset($url[1]) && file_exists('app/controllers/admin/' . ucfirst($url[1]) . '.php')) {
                $this->controller = $url[1];
                unset($url[0]);
                unset($url[1]);
            }
            require_once 'app/controllers/admin/' . ucfirst($this->controller) . '.php';
        } else {

            if (isset($url[0]) && file_exists('app/controllers/' . ucfirst($url[0]) . '.php')) {
                $this->controller = $url[0];
                unset($url[0]);
            }

            require_once 'app/controllers/' . ucfirst($this->controller) . '.php';
        }

        $this->controller = new $this->controller();

        if ($admin) {
            if (isset($url[2])) {
                if (method_exists($this->controller, $url[2])) {
                    $this->method = $url[2];
                    unset($url[2]);
                }
            }
        } else {
            if (isset($url[1])) {
                if (method_exists($this->controller, $url[1])) {
                    $this->method = $url[1];
                    unset($url[1]);
                }
            }
        }
        $this->params = $url ? array_values($url) : [];
        try {
            call_user_func_array([$this->controller, $this->method], $this->params);
        } catch (\Throwable $th) {
            Redirect::error(404, 'customer');
        }
    }
}
