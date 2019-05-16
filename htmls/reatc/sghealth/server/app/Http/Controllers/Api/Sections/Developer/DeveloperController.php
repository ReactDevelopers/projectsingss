<?php

namespace App\Http\Controllers\Api\Sections\Developer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DeveloperController extends Controller
{
    //
    /**
     * To Execute the PHP command
     */
    public function executePhpCommand(Request $request) {

        $data = shell_exec('cd '. base_path().' && php artisan '.$request->command);
        return $this->setData([
            'output' => $data
        ])->response();
    }
    /**
     * To Execute the PHP command
     */
    public function executeComposerCommand(Request $request) {
        $command = 'cd '. base_path().' &&  /usr/local/bin/composer --version  2>&1';
        $data = exec($command, $out, $err);
        return $this->setData([
            'output' => $out,
            'err' => $err,
            'command' => $command
        ])->response();
    }

    /**
     * To Execute node/npm command.
     */
    public function executeNodeCommand(Request $request) {

        $command = 'sudo cd '. base_path().'/../client &&  sudo  /usr/local/bin/yarn -E '.$request->command .' 2>&1';

        $data = exec($command, $out, $err);
        return $this->setData([
            'output' => $out,
            'test' => exec('whoami'),
            'err' => $err,
            'command' => $command
        ])->response();
    }
}
