<?php

class Router
{
    private static array $handlers = [];
    private const M_POST = 'POST';
    private const M_GET = 'GET';
    private static $notFoundHandler;


    public static function find($method_path){
        return array_key_exists($method_path,self::$handlers);
    }

    public static  function get(string $path, callable $handler): void
    {
       self::addHandler(self::M_GET, $path, $handler);
    }

    private function addHandler(string $method, string $path, callable $handler)
    {
        self::$handlers[$method . $path] = [
            'path' => $path,
            'method' => $method,
            'handler' => $handler,
        ];
    }


    public static function add_not_found_handler(callable $handler)
    {   
        self::$notFoundHandler = $handler;
    }

    public static function run(): void
    {

        $req_uri = parse_url($_SERVER['REQUEST_URI']);
        $path = $req_uri['path'];

        $path_exp = explode("/", $path);
        $req_index = array_search("library-system-latest", $path_exp) + 1;
        $req_path = "/".implode("/",array_slice($path_exp, $req_index));

        $method  = $_SERVER['REQUEST_METHOD'];


        $callback = null;

        foreach (self::$handlers as $handler) {
            if (($handler['path'] === $req_path or $handler['path'] === $req_path) and $handler['method'] === $method) $callback = $handler['handler'];
        }

        if ($callback === null) {
            header('HTTP/1.0 404 NOT FOUND');
            $callback = self::$notFoundHandler;
        }


        call_user_func_array($callback, [
            array_merge($_GET, $_POST)
        ]);
    }
}

function get_temp(string $path,$args=null){
    extract(gettype($args)=="array"?$args:[$args]);
    include "../public/templates/$path.phtml";
}   

function view($path,$args=null){
    extract(gettype($args)=="array"?$args:[$args]);
    include "../public/views/$path.phtml";
}
