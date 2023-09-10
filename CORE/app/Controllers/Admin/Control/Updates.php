<?php

namespace App\Controllers\Admin\Control;

use App\Controllers\Admin\AdminController;

class Updates extends AdminController
{

    private $unauthorizedScheme;

    public function __construct()
    {

        /*** Command line below to use default unauthorized scheme in parent class - from this */
        // $this->unauthorizedScheme = function ($cbPar = []) {

        //     if (method_exists($this, '__unauthorizedScheme'))
        //     return $this->__unauthorizedScheme($cbPar);
        // };
        /*** Command line above to use default unauthorized scheme in parent class - to this */

        return Parent::__construct([
            'unauthorizedScheme' => $this->unauthorizedScheme
        ]);
    }

    // Function to override default unauthorized scheme in parent class
    private function __unauthorizedScheme($cbPar = [])
    {

        return $this->tryCatch(
            function ($cbPar) {

                // $err = new Error($this->request, $this->response);
                // return $err->error(500);
            },
            $cbPar
        );
    }

    // Server Response
    public function index()
    {

        $auth = $this->request->auth->data;

        if ($auth['uuid'] == '6ea010e4-1747-4e8b-aa88-90d4da13e29f') {

            // Excecute line below

            // Do system update
            exec('git pull https://github.com/ralfian01/myumkm-main.git', $log);
            print_r($log);

            return;
        }

        // Show 404 page
        return $this->error404();
    }
}
