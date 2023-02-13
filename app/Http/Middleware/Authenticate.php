<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Route;

class Authenticate extends Middleware
{
    protected $user_route = 'user.login';
    protected $owner_route = 'owner.login';
    protected $admin_route = 'admin.login';
    protected $mymy_route='mymy.login';

    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (!$request->expectsJson()) {
            if (Route::is('owner.*')) { //*の意味はowner/以降のURLならなんでもOK
                return route($this->owner_route);
            } elseif (Route::is('admin.*')) { //*の意味 admi/以降のURLならなんでもOK
                return route($this->admin_route);
            }elseif(Route::is('mymy.*')){
                return route($this->mymy_route);

            }else { //*の意味はuser/以降のURLならなんでもOK
                return route($this->user_route);
            }
        }
    }
}
