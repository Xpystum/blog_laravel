<?php
namespace App\Modules\User\Common\Helpers;

use Illuminate\Http\RedirectResponse;

if ( ! function_exists('responseError'))
{
    function responseError(string $message) : RedirectResponse
    {
        return redirect()->back()->withErrors(['error' => $message]);
    }
}
