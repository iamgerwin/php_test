<?php
declare(strict_types=1);
namespace Iamgerwin\PhpTest\Core;

class Router
{
    protected $routes = [];
    public function __construct()
    {
        //
    }

    public function route($uri, $method)
    {
        foreach ($this->routes as $route) {

            if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {

                return require base_path('src/controllers/' . $route['controller']);
            }

            $this->abort();
        }

        $this->abort();
    }

    public function previousUrl(): string
    {
        return $_SERVER['HTTP_REFERER'];
    }
    public function add(string $method, string $uri, string $controller): self
    {
        $this->routes[] = [
            'method' => $method,
            'uri' => $uri,
            'controller' => $controller,
        ];

        return $this;
    }
    public function get(string $uri, string $controller): self
    {
        return $this->add('GET', $uri, $controller);
    }

    public function post(string $uri, string $controller): self
    {
        return $this->add('POST', $uri, $controller);
    }

    public function delete(string $uri, string $controller): self
    {
        return $this->add('DELETE', $uri, $controller);
    }

    public function patch(string $uri, string $controller): self
    {
        return $this->add('PATCH', $uri, $controller);
    }

    public function put(string $uri, string $controller): self
    {
        return $this->add('PUT', $uri, $controller);
    }

    protected function abort($code = 404)
    {
        http_response_code($code);
        echo 'not found';
        die();
    }
}