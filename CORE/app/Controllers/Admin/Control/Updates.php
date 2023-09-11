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

            // Stash update on local
            exec('git stash save "Local update"', $log, $code1);
            echo "CMD1: {$code1}";

            // Pull
            exec('git pull https://github.com/ralfian01/myumkm-main.git master', $log, $code2);
            echo "CMD2: {$code2}";

            // Stash pop: apply changes
            exec('git stash pop', $log, $code3);
            echo "CMD3: {$code3}";

            // Add all
            exec('git add .', $log, $code4);
            echo "CMD4: {$code4}";

            // Commit changes
            exec('git commit -m "Local commit"', $log, $code5);
            echo "CMD4: {$code5}";

            echo "<pre>";
            print_r($log);
            echo "</pre>";

            return;
        }

        // Show 404 page
        return $this->error404();
    }
}
