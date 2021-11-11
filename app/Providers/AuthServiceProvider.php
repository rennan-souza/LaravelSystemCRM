<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;
use App\Models\Role;

use Illuminate\Support\Facades\DB;

class AuthServiceProvider extends ServiceProvider
{
  /**
   * The policy mappings for the application.
   *
   * @var array
   */
  protected $policies = [
    // 'App\Models\Model' => 'App\Policies\ModelPolicy',
  ];

  /**
   * Register any authentication / authorization services.
   *
   * @return void
   */
  public function boot()
  {
    $this->registerPolicies();

    $roles = Role::all();

    foreach ($roles as $r) {
      Gate::define($r->name, function (User $user) use ($r) {

        $role_id = $r->id;

        $roles = DB::connection('mysql')->select('
              select 
                  ur.role_id,
                  ur.user_id
              from 
                  users_roles as ur
              where ur.role_id = ' . $role_id . ' and ur.user_id  = ' . $user->id);


        foreach ($roles as $ur) {
          return $ur;
        }
      });
    }
  }
}
