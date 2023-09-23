<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class Module extends Command
{
    protected $signature = 'make:module {name : The name of the CRUD resource}';
    protected $description = 'Generate a complete CRUD resource';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $name = $this->argument('name');

        // Generate Model
        Artisan::call('make:model', ['name' => $name]);

        // Generate Controller
        Artisan::call('make:controller', ['name' => $name . 'Controller', '--resource' => true,]);

        // Generate Views (create, edit, index, show)
        Artisan::call('make:view', ['name' => $name.'.create', ]);
        Artisan::call('make:view', ['name' => $name.'.edit', ]);
        Artisan::call('make:view', ['name' => $name.'.index', ]);
        Artisan::call('make:view', ['name' => $name.'.form', ]);

        // Add Resource Routes
        $this->appendRoutes($name);

        $this->info("CRUD resource for '$name' generated successfully.");
    }

    protected function appendRoutes($name)
    {
        $routeContent = file_get_contents(base_path('routes/web.php'));

        $routesToAdd = <<<EOL
Route::resource('$name', ${name}Controller::class);
EOL;

        $newRouteContent = $routeContent . "\n" . $routesToAdd;

        file_put_contents(base_path('routes/web.php'), $newRouteContent);
    }
}
