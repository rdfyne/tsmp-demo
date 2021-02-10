<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(
            [
                'front.course.classroom_schedule.form',
                'front.course.virtual_schedule.form',
            ], 
            'App\View\Composers\ApplicationComposer'
        );

        View::composer(
            [
                'backoffice.course.create',
                'backoffice.course.edit',
            ], 
            'App\View\Composers\Backoffice\CourseFormComposer'
        );

        View::composer(
            [
                'backoffice.category.create',
                'backoffice.category.edit',
            ], 
            'App\View\Composers\Backoffice\CategoryFormComposer'
        );
    }
}
