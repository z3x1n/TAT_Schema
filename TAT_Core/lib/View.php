<?php

namespace TAT_Core\lib;

class View
{
    protected $assign = [];

    public function assign($name, $value)
    {
        $this->assign[$name] = $value;
    }

    public function display($file, $name)
    {
        $debug = Conf::get('APP_DEBUG', 'app');
        $filePath = APP . '/Views/' . $file . '/' . $name;
        if (is_file($filePath)) {
            if (empty($this->assign)) {
                $this->assign = [];
            }

            $loader = new \Twig\Loader\FilesystemLoader(APP . '/Views/');
            $twig = new \Twig\Environment($loader, [
                'cache' => TAT . '/storage/caches/twig',
                'debug' => $debug
            ]);
            $template = $twig->load($file . '/' . $name);
            echo $template->render($this->assign);
        }
    }
}
