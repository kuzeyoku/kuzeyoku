<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Artisan;
use App\Http\Requests\Setup\SetupStoreRequest;

class SetupController extends Controller
{
    public function index()
    {
        if (Schema::hasTable("setups")) {
            if (\App\Models\Setup::status() == "installed") {
                return redirect()->route("home");
            }
        }
        return view('setup.index');
    }

    public function store(SetupStoreRequest $request)
    {
        if (Schema::hasTable("setup")) {
            if (\App\Models\Setup::status() == "installed") {
                return redirect()->route("home");
            }
        }

        $configData = [
            "mysql.database_name" => $request->db_name,
            "mysql.user" => $request->user,
            "mysql.password" => $request->password,
        ];

        $filePath = config_path("setup_database.php");
        $data = '<?php return ' . var_export($configData, true) . ';';
        file_put_contents($filePath, $data);



        Artisan::call("migrate:fresh", ["--seed" => true]);

        $query = \App\Models\Setup::create([
            "status" => "installed"
        ]);

        if ($query)
            return redirect()->route("setup.end")->withSuccess("Kurulum Başarıyla Tamamlandı");
        else
            return redirect()->route("setup.index")->withError("Kurulum Başarısız");
    }

    public function end()
    {
        if (Schema::hasTable("setup")) {
            if (\App\Models\Setup::status() == "installed") {
                return redirect()->route("home");
            }
        }
        return view('setup.end');
    }
}
