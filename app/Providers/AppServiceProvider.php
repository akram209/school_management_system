<?php

namespace App\Providers;

use App\Policies\AdminListPolicy;
use App\Policies\ParentListPolicy;
use App\Policies\StudentListPolicy;
use App\Policies\TeacherListPolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

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
        Gate::define('student-list', [StudentListPolicy::class, 'list']);
        Gate::define('parent-list', [ParentListPolicy::class, 'list']);
        Gate::define('teacher-list', [TeacherListPolicy::class, 'list']);
        Gate::define('admin-list', [AdminListPolicy::class, 'list']);
    }
}
