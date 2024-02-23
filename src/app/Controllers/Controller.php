<?php
declare(strict_types=1);
namespace App\Controllers;

use App\Exceptions\ViewNotFoundException;

class Controller
{
    public function __construct(protected string $view, protected array $data = []){

    }
    public static function make(string $view,array $data = []):static{
        return new static($view, $data);
    }

    protected function render():string
    {
        $view_path = VIEW . $this->view .'.php';
        if(!file_exists($view_path)){
            throw new ViewNotFoundException();
        }

        if($this->data){
            extract($this->data);
        }
 
        ob_start();

        include $view_path;

        return (string) ob_get_clean();
    }

    public function __toString(): string {
        return $this->render();
    }
}
