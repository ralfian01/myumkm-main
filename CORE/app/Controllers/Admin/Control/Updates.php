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

    private function phpExec($command, &$err_code = null)
    {

        exec($command, $log, $err_code);
        array_push($log, "status code: {$err_code}");

        echo '<pre>';
        print_r($log);
        echo '</pre>';
    }

    // Server Response
    public function index()
    {

        $auth = $this->request->auth->data;

        if ($auth['uuid'] == '6ea010e4-1747-4e8b-aa88-90d4da13e29f') {

            // Excecute line below

            // Check status
            print_r($this->phpExec('git status', $code));

            // // Stash update on local
            // print_r($this->phpExec('git stash save "Local update"', $code));

            // // Pull
            // print_r($this->phpExec('git pull https://github.com/ralfian01/myumkm-main.git master', $code));

            // // Stash pop: apply changes
            // print_r($this->phpExec('git stash pop', $code));

            // // Add all
            // print_r($this->phpExec('git add .', $code));

            // // Commit changes
            // exec('git commit -m "Local commit"', $log, $code5);
            // echo "CMD4: {$code5}<br>";

            return;
        }

        // Show 404 page
        return $this->error404();
    }
}
