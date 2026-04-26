<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // productionは本番環境を意味する
        // === は値とデータ型の両方が等しいか（完全一致）を判定する演算子（厳格比較演算子）
        if (config('app.env') === 'production') {
            // .envファイルのAPP_ENVがproduction（本番環境）だった時、URLを全てhttps://にする。
            URL::forceScheme('https');
        }
    }
}
