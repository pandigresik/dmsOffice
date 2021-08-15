<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Str;

class ScaffoldAll extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'scaffold.all:generate {--filepath=} {--table=} {--module=} ';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate scaffold infyom ';
    private $files;

    /**
     * Create a new command instance.
     */
    public function __construct()
    {
        parent::__construct();
        $this->files = new Filesystem();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $filepath = $this->option('filepath');
        $table = $this->option('table');
        $module = $this->option('module');

        $jsonData = [];
        if (!empty($filepath)) {
            $this->info($filepath);
            if (file_exists($filepath)) {
                if (!is_readable($filepath)) {
                    $this->error('File can\'t read');

                    return false;
                }

                $jsonFile = $this->files->get($filepath);
                $this->info($jsonFile);
                $jsonData = json_decode($jsonFile, 1);
            } else {
                $this->error('File not exist');

                return false;
            }
        } else {
            $tmpJson = [];
            if (!empty($table)) {
                $this->info('table ==>'.$table);
                $tmpJson['tables'] = explode(',', $table);
                $tmpJson['module'] = '';
            }

            if (!empty($module)) {
                $this->info('module ==>'.$module);
                $tmpJson['module'] = $module;
            }

            if (!empty($tmpJson)) {
                array_push($jsonData, $tmpJson);
            }
        }

        if (!empty($jsonData)) {
            $this->processJson($jsonData);
        }

        return 0;
    }

    private function generatePermission(string $permissionName)
    {
        \App\Models\Base\Permission::firstOrCreate(['name' => $permissionName.'-index', 'guard_name' => 'web']);
        \App\Models\Base\Permission::firstOrCreate(['name' => $permissionName.'-create', 'guard_name' => 'web']);
        \App\Models\Base\Permission::firstOrCreate(['name' => $permissionName.'-update', 'guard_name' => 'web']);
        \App\Models\Base\Permission::firstOrCreate(['name' => $permissionName.'-delete', 'guard_name' => 'web']);
    }

    private function processJson($jsonData)
    {
        foreach ($jsonData as $json) {
            foreach ($json['tables'] as $t) {
                //infyom:scaffold Departement --fromTable --tableName=departements --ignoreFields= --skip=dump-autoload --prefix=master
                $model = ucfirst(Str::camel($t));
                $prefixOption = $json['module'] ? ['--prefix' => $json['module']] : [];
                $this->call('infyom:scaffold', array_merge($prefixOption, [
                    'model' => $model,
                    '--fromTable' => true,
                    '--tableName' => $t,
                    '--ignoreFields' => 'created_at,updated_at,deleted_at,created_by,updated_by',
                    '--skip' => 'dump-autoload,migration',
                    '--paginate' => 10,
                    //'--jqueryDT' => true,
                    '--localized' => true,
                    '--save' => true,
                ]));
                $this->generatePermission(Str::snake($t));
                $this->call('infyom:api', array_merge($prefixOption, [
                    'model' => $model,
                    '--fieldsFile' => $model.'.json',
                    '--skip' => 'dump-autoload,migration,model',
                ]));

                if (empty($json['module'])) {
                    $resourceClass = "App\\Http\\Resources\\{$model}Resource";
                } else {
                    $prefixModule = ucfirst(Str::camel($json['module']));
                    $resourceClass = "App\\Http\\Resources\\{$prefixModule}\\{$model}Resource";
                }

                $this->call('make:resource', [
                    'name' => $resourceClass,
                    '--collection' => true,
                ]);

                // create tests
                $this->call('infyom.api:tests', array_merge($prefixOption, [
                    'model' => $model,
                    '--fieldsFile' => $model.'.json',
                    '--skip' => 'dump-autoload',
                ]));
            }
        }
    }
}
