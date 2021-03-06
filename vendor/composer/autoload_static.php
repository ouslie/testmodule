<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit7b21b186abee1825b990199f3b161445
{
    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'Modules\\Cabytrim\\' => 17,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Modules\\Cabytrim\\' => 
        array (
            0 => __DIR__ . '/../..' . '/',
        ),
    );

    public static $classMap = array (
        'Modules\\Cabytrim\\Database\\Seeders\\CabytrimDatabaseSeeder' => __DIR__ . '/../..' . '/Database/Seeders/CabytrimDatabaseSeeder.php',
        'Modules\\Cabytrim\\Datatables\\cabytrimDatatable' => __DIR__ . '/../..' . '/Datatables/CabytrimDatatable.php',
        'Modules\\Cabytrim\\Http\\ApiControllers\\CabytrimApiController' => __DIR__ . '/../..' . '/Http/ApiControllers/CabytrimApiController.php',
        'Modules\\Cabytrim\\Http\\Controllers\\CabytrimController' => __DIR__ . '/../..' . '/Http/Controllers/CabytrimController.php',
        'Modules\\Cabytrim\\Http\\Requests\\CreatecabytrimRequest' => __DIR__ . '/../..' . '/Http/Requests/CreateCabytrimRequest.php',
        'Modules\\Cabytrim\\Http\\Requests\\UpdatecabytrimRequest' => __DIR__ . '/../..' . '/Http/Requests/UpdateCabytrimRequest.php',
        'Modules\\Cabytrim\\Http\\Requests\\cabytrimRequest' => __DIR__ . '/../..' . '/Http/Requests/CabytrimRequest.php',
        'Modules\\Cabytrim\\Models\\cabytrim' => __DIR__ . '/../..' . '/Models/Cabytrim.php',
        'Modules\\Cabytrim\\Policies\\CabytrimPolicy' => __DIR__ . '/../..' . '/Policies/CabytrimPolicy.php',
        'Modules\\Cabytrim\\Presenters\\CabytrimPresenter' => __DIR__ . '/../..' . '/Presenters/CabytrimPresenter.php',
        'Modules\\Cabytrim\\Providers\\CabytrimServiceProvider' => __DIR__ . '/../..' . '/Providers/CabytrimServiceProvider.php',
        'Modules\\Cabytrim\\Repositories\\CabytrimRepository' => __DIR__ . '/../..' . '/Repositories/CabytrimRepository.php',
        'Modules\\Cabytrim\\Transformers\\CabytrimTransformer' => __DIR__ . '/../..' . '/Transformers/CabytrimTransformer.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit7b21b186abee1825b990199f3b161445::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit7b21b186abee1825b990199f3b161445::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit7b21b186abee1825b990199f3b161445::$classMap;

        }, null, ClassLoader::class);
    }
}
