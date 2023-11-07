<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Middleware;
use Tightenco\Ziggy\Ziggy;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that is loaded on the first page visit.
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determine the current asset version.
     */
    public function version(Request $request): string|null
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @return array<string, mixed>
     */
    public function share(Request $request): array
    {
        return array_merge(parent::share($request), [
            'auth' => [
                'user' => $request->user(),
            ],
            'config' => [
                'sidemenu' => $this->formatSideMenu()
            ],
            'ziggy' => function () use ($request) {
                return array_merge((new Ziggy)->toArray(), [
                    'location' => $request->url(),
                ]);
            },
        ]);
    }

    protected function formatSideMenu()
    {
        $menus = config('sidemenu');

        foreach ($menus as $index => $menu) {
            if (isset($menu['permission']) && !Auth::user()->hasPermissionTo($menu['permission'])) {
                unset($menus[$index]);
            }

            if (isset($menu['isHeader']) && !isset($menus[$index+1])){
                unset($menus[$index]);
            }

            if (isset($menu['isHeader']) && isset($menus[$index+1]['isHeader'])){
                unset($menus[$index]);
            }

            if (isset($menu['isHeader']) && isset($menus[$index+1]['isDivider'])){
                unset($menus[$index]);
            }
        }

        return $menus;
    }
}
