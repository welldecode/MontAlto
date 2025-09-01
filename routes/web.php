<?php

use App\Livewire\Admin\Dashboard;
use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use App\Livewire\Web\Home;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Livewire\Livewire;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(
    [
        "prefix" => LaravelLocalization::setLocale(),
        "middleware" => [
            "localeSessionRedirect",
            "localizationRedirect",
            "localeViewPath",
        ],
    ],
    function () {
        Route::get("/", App\Livewire\Web\Home::class)->name("home");
        Route::get("/reserva", App\Livewire\Web\Reservas::class)->name(
            "reserva",
        );
        Route::get("/seminovos", App\Livewire\Web\Seminovos::class)->name(
            "seminovos",
        );
        Route::get("/frotas", App\Livewire\Web\Frotas::class)->name("frotas");
        Route::get(
            "/oportunidades",
            App\Livewire\Web\Oportunidade::class,
        )->name("oportunidades");
        Route::get("/quem-somos", App\Livewire\Web\QuemSomos::class)->name(
            "quemsomos",
        );
        Route::get("/contato", App\Livewire\Web\Contatos::class)->name(
            "contato",
        );

        Route::get("/carros", App\Livewire\Web\Search::class)->name(
            "carros.index",
        );

        Route::prefix("admin")
            ->middleware(["auth", "verified", "admin"])
            ->name("admin.")
            ->group(function () {
                Route::get("/", action: Dashboard::class)->name("index");

                Route::prefix("product")
                    ->name("product.")
                    ->group(function () {
                        Route::get(
                            "/",
                            App\Livewire\Admin\Products\Index::class,
                        )->name("index");
                        Route::get(
                            "/edit/{id?}",
                            App\Livewire\Admin\Products\Create::class,
                        )->name("edit");
                        Route::get(
                            "/create",
                            App\Livewire\Admin\Products\Create::class,
                        )->name("create");
                    });
                Route::prefix("reservas")
                    ->name("reservas.")
                    ->group(function () {
                        Route::get(
                            "/",
                            App\Livewire\Admin\Reservas\Index::class,
                        )->name("index");
                    });
                Route::prefix("contato")
                    ->name("contato.")
                    ->group(function () {
                        Route::get(
                            "/",
                            App\Livewire\Admin\Contato\Index::class,
                        )->name("index");
                    });
            });

        Livewire::setUpdateRoute(function ($handle) {
            return Route::post("/livewire/update", $handle);
        });
    },
);

Route::middleware(["auth"])->group(function () {});

Route::middleware(["auth"])->group(function () {
    Route::redirect("settings", "settings/profile");

    Route::get("settings/profile", Profile::class)->name("settings.profile");
    Route::get("settings/password", Password::class)->name("settings.password");
    Route::get("settings/appearance", Appearance::class)->name(
        "settings.appearance",
    );
});

// Clear log file
Route::get("/clear-config", function () {
    try {
        Artisan::call("config:cache");
        return response()->json(["success" => true]);
    } catch (\Throwable $th) {
        return response()->json(["success" => false]);
    }
});

// cache clear
Route::get("/cache-clear", function () {
    try {
        Artisan::call("optimize:clear");
        return response()->json(["success" => true]);
    } catch (\Throwable $th) {
        return response()->json(["success" => false]);
    }
})->name("cache.clear");

// cache clear
Route::get("/view-clear", function () {
    try {
        Artisan::call("view:clear");
        return response()->json(["success" => true]);
    } catch (\Throwable $th) {
        return response()->json(["success" => false]);
    }
})->name("view.clear");

// cache clear
Route::get("/route-clear", function () {
    try {
        Artisan::call("route:clear");
        return response()->json(["success" => true]);
    } catch (\Throwable $th) {
        return response()->json(["success" => false]);
    }
})->name("route.clear");

Route::get("migrate", function () {
    try {
        Artisan::call("migrate");
        return response()->json(["success" => true]);
    } catch (\Throwable $th) {
        return response()->json(["success" => false]);
    }
});

Livewire::setScriptRoute(function ($handle) {
    return Route::get("/vendor/livewire/livewire.js", $handle);
});

require __DIR__ . "/auth.php";
