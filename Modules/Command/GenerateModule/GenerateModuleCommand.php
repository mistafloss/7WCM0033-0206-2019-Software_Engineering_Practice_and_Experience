<?php

namespace Modules\Command\GenerateModule;

use Illuminate\Support\Str;
use Illuminate\Support\Composer;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Filesystem\Filesystem;

class GenerateModuleCommand extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:module {modulename} {--mode= : Create data migration script.}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new module';

    /**
     * The Composer instance.
     *
     * @var \Illuminate\Support\Composer
     */
    protected $composer;

    protected $basePath;

    protected $modulename;

    /**
     * Create a new module generation command instance.
     *
     * @param  \Illuminate\Support\Composer $composer
     * @return void
     */
    public function __construct(Composer $composer, Filesystem $files)
    {
        parent::__construct();

        $this->composer = $composer;
        $this->files = $files;
    }

    public function setBasePath($mode)
    {
        //TODO place for further modes...
        $folder = 'Modules';
        switch ($mode) {
            case 'Module':
                $folder = 'Modules';
                break;
        }

        $this->basePath = base_path($folder);
    }

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $this->modulename = ucfirst(Str::camel(trim($this->input->getArgument('modulename'))));

        $mode = $this->input->getOption('mode') ?: 'Module';

        $this->setBasePath($mode);

        if ($this->isFolderExist($this->modulename)) {
            $this->error("Module already exist: {$this->modulename}");
            return false;
        }

        $this->makeFolder();

        $this->buildFolderStructure(base_path('/Modules/Command/GenerateModule/stubs/' . $mode));

        $this->composer->dumpAutoloads();
    }

    public function isFolderExist($folder)
    {
        if (File::isDirectory($this->basePath . '/' . $folder)) {
            return true;
        } else {
            return false;
        }
    }

    public function makeFolder($folder = '')
    {
        if($folder == '') {
            $folder = $this->modulename;
        }

        if (File::makeDirectory($this->basePath . '/' . $folder)) {
            return $this->basePath . '/' . $folder;
        } else {
            return false;
        }
    }

    public function getFolders($source)
    {
        $folders = $sweep = File::directories($source);

        foreach ($sweep as $sub_folder) {
            $store = $this->getFolders($sub_folder);
            $folders = array_merge($folders, $store);
        }

        return $folders;
    }

    public function buildFolderStructure($source)
    {
        $stub_folders = $this->getFolders($source);

        foreach ($stub_folders as $folder) {
            $store = str_replace($source, '', $folder);
            $module_folder = $this->makeFolder($this->modulename . '/' . $store);

            $folder_files = File::files($folder);

            foreach ($folder_files as $file) {
                $stub = $this->files->get($file->getPathname());

                $this->files->put(
                    $module_folder . '/' . str_replace(['Dummy','.stub'],[$this->modulename,'.php'],$file->getFilename()) ,
                    $this->populateStub($stub)
                );
            }

        }
    }


    /**
     * Populate the place-holders in the migration stub.
     *
     * @param  string $name
     * @param  string $stub
     * @return string
     */
    protected function populateStub($stub)
    {
        $stub = str_replace('DummyClass', $this->modulename, $stub);
        $stub = str_replace('DummyTable', Str::snake($this->modulename), $stub);

        return $stub;
    }
}