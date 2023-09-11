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

    private function phpExec($command, &$err_code = null, $print = false)
    {

        $log = [0 => "command: {$command}"];
        exec($command, $log, $err_code);
        array_push($log, "status code: {$err_code}");

        if ($print) {

            echo "<pre>";
            print_r($log);
            echo "</pre>";
        }

        return $log;
    }

    // Server Response
    public function index()
    {

        $auth = $this->request->auth->data;

        if ($auth['uuid'] == '6ea010e4-1747-4e8b-aa88-90d4da13e29f') {

            // Excecute line below

            // Check status
            $log = $this->phpExec('git status', $code, true);

            // If there is an update
            if (in_array('Changes not staged for commit:', $log)) {

                // Stash update on local
                $this->phpExec('git stash save "Local update"', $code, true);
            }

            // Pull
            $this->phpExec('git pull https://github.com/ralfian01/myumkm-main.git master', $code, true);

            // Check stash
            $log = $this->phpExec('git stash list', $code, true);

            // If there is stash
            if (in_array('stash@{0}: On master: Local update', $log)) {

                // Stash pop: apply changes
                $this->phpExec('git stash pop', $code, true);
            }

            // Add all
            $this->phpExec('git add .', $code, true);

            // // Commit changes
            // exec('git commit -m "Local commit"', $log, $code5);
            // echo "CMD4: {$code5}<br>";

            return;
        }

        // Show 404 page
        return $this->error404();
    }
}
