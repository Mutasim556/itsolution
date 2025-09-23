<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Schema\Blueprint;

class CustomFieldProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        Blueprint::macro('customDefaults', function () {
            /** @var \Illuminate\Database\Schema\Blueprint $this */
            $this->boolean('status')->default(1);
            $this->boolean('delete')->default(0);

            $this->foreignId('created_by')
                 ->nullable()
                 ->constrained('admins')
                 ->nullOnDelete();

            $this->foreignId('updated_by')
                 ->nullable()
                 ->constrained('admins')
                 ->nullOnDelete();
        });
    }
}
