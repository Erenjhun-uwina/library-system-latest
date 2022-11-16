<?php

class Router
{

    private array $handlers = [];
    private const M_POST = 'POST';
    private const M_GET = 'GET';
    private  $notFoundHandler;

    public function get(string $path, callable $handler): void
    {
        $this->addHandler(self::M_GET, $path, $handler);
    }

    private function addHandler(string $method, string $path, callable $handler)
    {
        $this->handlers[$method . $path] = [
            'path' => $path,
            'method' => $method,
            'handler' => $handler,
        ];
    }


    public function add_not_found_handler(callable $handler)
    {
        $this->notFoundHandler = $handler;
    }

    public function run(): void
    {

        $req_uri = parse_url($_SERVER['REQUEST_URI']);
        $path = $req_uri['path'];

        $path_exp = explode("/", $path);
        $req_index = array_search("library-system-latest", $path_exp) + 1;
        $req_path = "/".implode("/",array_slice($path_exp, $req_index));

        $method  = $_SERVER['REQUEST_METHOD'];


        $callback = null;

        foreach ($this->handlers as $handler) {
            if ($handler['path'] === $req_path and $handler['method'] === $method) $callback = $handler['handler'];
        }

        if ($callback === null) {
            header('HTTP/1.0 404 NOT FOUND');
            $callback = $this->notFoundHandler;
        }


        call_user_func_array($callback, [
            array_merge($_GET, $_POST)
        ]);
    }
}


function view(string $path){
    $path = "./templates/".$path.".phtml";
    return $path;
}