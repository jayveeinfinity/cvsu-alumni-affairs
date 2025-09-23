<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class MakeServiceCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:service {name : The name of the service class}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new service class';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->argument('name');

        // Support nested folders (e.g., Auth/UserService)
        $name = str_replace('\\', '/', $name);
        $path = app_path("Services/{$name}.php");

        // Ensure directory exists
        $directory = dirname($path);
        if (!File::isDirectory($directory)) {
            File::makeDirectory($directory, 0755, true);
        }

        // Prevent overwriting
        if (File::exists($path)) {
            $this->error("❌ Service {$name} already exists!");
            return;
        }

        // Extract class name (last part of namespace)
        $className = class_basename($name);

        // Build namespace
        $namespace = 'App\\Services';
        $subNamespace = trim(str_replace('/', '\\', dirname($name)), '.');
        if ($subNamespace !== '.' && $subNamespace !== '') {
            $namespace .= '\\' . $subNamespace;
        }

        // Service class template
        $stub = <<<PHP
        <?php

        namespace {$namespace};

        class {$className}
        {
            public function __construct()
            {
                //
            }
        }
        PHP;

        File::put($path, $stub);

        $this->info("✅ Service {$className} created successfully at {$path}");
    }
}
