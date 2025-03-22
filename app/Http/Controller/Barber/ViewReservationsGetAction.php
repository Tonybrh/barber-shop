<?php

namespace App\Http\Controller\Barber;

use Illuminate\Http\Request;

class ViewReservationsGetAction
{
    public function __invoke(Request $request)
    {
        if ($request->user()->cannot('view-reservations')) {
            abort(403);
        }
    }
}
