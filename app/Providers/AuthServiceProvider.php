<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Laravel\Passport\Passport;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Passport::routes();
        Gate::define('Vocabulary_List', function ($user){
           return $user->checkPermisionAccess('Vocabulary_List');
        });
        Gate::define('Vocabulary_Detail', function ($user){
            return $user->checkPermisionAccess('Vocabulary_Detail');
        });
        Gate::define('Question_Vocabulary_List', function ($user){
            return $user->checkPermisionAccess('Question_Vocabulary_List');
        });
        Gate::define('Question_Vocabulary_Create', function ($user){
            return $user->checkPermisionAccess('Question_Vocabulary_Create');
        });

        Gate::define('Listening_List', function ($user){
            return $user->checkPermisionAccess('Listening_List');
        });
        Gate::define('Listening_Detail', function ($user){
            return $user->checkPermisionAccess('Listening_Detail');
        });
        Gate::define('Question_Listening_List', function ($user){
            return $user->checkPermisionAccess('Question_Listening_List');
        });
        Gate::define('Question_Listening_Edit', function ($user){
            return $user->checkPermisionAccess('Question_Listening_Edit');
        });
        Gate::define('Question_Listening_Create', function ($user){
            return $user->checkPermisionAccess('Question_Listening_Create');
        });

        Gate::define('Grammar_List', function ($user){
            return $user->checkPermisionAccess('Grammar_List');
        });
        Gate::define('Grammar_Detail', function ($user){
            return $user->checkPermisionAccess('Grammar_Detail');
        });
        Gate::define('Question_Grammar_List', function ($user){
            return $user->checkPermisionAccess('Question_Grammar_List');
        });
        Gate::define('Question_Grammar_Create', function ($user){
            return $user->checkPermisionAccess('Question_Grammar_Create');
        });

        Gate::define('Listening_List', function ($user){
            return $user->checkPermisionAccess('Listening_List');
        });
        Gate::define('Listening_Detail', function ($user){
            return $user->checkPermisionAccess('Listening_Detail');
        });
        Gate::define('Question_Listening_List', function ($user){
            return $user->checkPermisionAccess('Question_Listening_List');
        });
        Gate::define('Question_Listening_Edit', function ($user){
            return $user->checkPermisionAccess('Question_Listening_Edit');
        });

        Gate::define('Reading_List', function ($user){
            return $user->checkPermisionAccess('Reading_List');
        });
        Gate::define('Reading_Detail', function ($user){
            return $user->checkPermisionAccess('Reading_Detail');
        });
        Gate::define('Reading_Create', function ($user){
            return $user->checkPermisionAccess('Reading_Create');
        });

        Gate::define('User_List', function ($user){
            return $user->checkPermisionAccess('User_List');
        });
        Gate::define('User_Create', function ($user){
            return $user->checkPermisionAccess('User_Create');
        });
        Gate::define('User_Edit', function ($user){
            return $user->checkPermisionAccess('User_Edit');
        });

        Gate::define('Role_List', function ($user){
            return $user->checkPermisionAccess('Role_List');
        });
        Gate::define('Role_Create', function ($user){
            return $user->checkPermisionAccess('Role_Create');
        });
        Gate::define('Role_Edit', function ($user){
            return $user->checkPermisionAccess('Role_Edit');
        });

        Gate::define('Lesson_List', function ($user){
            return $user->checkPermisionAccess('Lesson_List');
        });
        Gate::define('Lesson_Create', function ($user){
            return $user->checkPermisionAccess('Lesson_Create');
        });
        Gate::define('Lesson_Edit', function ($user){
            return $user->checkPermisionAccess('Lesson_Edit');
        });

        Gate::define('Level_List', function ($user){
            return $user->checkPermisionAccess('Level_List');
        });
        Gate::define('Level_Create', function ($user){
            return $user->checkPermisionAccess('Level_Create');
        });
        Gate::define('Level_Edit', function ($user){
            return $user->checkPermisionAccess('Level_Edit');
        });
        //
    }
}
