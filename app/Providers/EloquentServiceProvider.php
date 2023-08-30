<?php


namespace App\Providers;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\ServiceProvider;

class EloquentServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Builder::macro('whereOrderLike', function (?string $attribute, ?string $searchTerm){
            return $this->where($attribute, 'LIKE', "%{$searchTerm}");
        });

        Builder::macro('whereLike', function (?string $attribute, ?string $searchTerm){
            return $this->where($attribute, 'LIKE', "%{$searchTerm}%");
        });

        Builder::macro('orWhereLike', function (string $attribute, string $searchTerm){
            return $this->orWhere($attribute, 'LIKE', "%{$searchTerm}%");
        });
    }

}
