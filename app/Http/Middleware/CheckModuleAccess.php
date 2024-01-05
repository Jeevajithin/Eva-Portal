<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Modules_assigned_detail;

class CheckModuleAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
       
        echo $userId = session('user_id');
        $userType = session('user_type');

        if (!$userId) {
            return redirect('/login');
        }

        // If the user is a Super Admin, grant access to all routes
        if ($userType === 'Super Admin') {
            return $next($request);
        }

        // Determine the module ID based on the route or any other relevant information
        echo "aaaaaaaaaaaaa ".$moduleId = $this->getModuleIdFromRoute($request);

        if ($moduleId === null) {
            // Handle the case where the module ID is not specified in the route
            //return redirect('/unauthorized');
        }

        // Check if the user has access to the module
        if (!$this->userHasModuleAccess($userId, $moduleId)) {
            // Handle unauthorized access
           // return redirect('/unauthorized'); // Redirect to an unauthorized page
        }

        return $next($request);
    }

    /**
     * Get the module ID based on the route or any other relevant information.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return int
     */
    protected function getModuleIdFromRoute($request)
    {
        // Example: Extract module ID from the route parameters
        $routeParameters = $request->route()->parameters();
        return $routeParameters['moduleId'] ?? null; // Default to 1 if not found
    }

    /**
     * Check if the user has access to the specified module.
     *
     * @param  int  $userId
     * @param  int  $moduleId
     * @return bool
     */
    protected function userHasModuleAccess($userId, $moduleId)
    {
        return Modules_assigned_detail::where('user_id', $userId)
            ->where('module_id', $moduleId)
            ->exists();
    }
}
