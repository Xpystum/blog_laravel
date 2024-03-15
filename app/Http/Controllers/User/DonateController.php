<?php

namespace App\Http\Controllers\User;

use App\Models\Donate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Currency;

class DonateController extends Controller
{
    public function __invoke()
    {   
        // $curr = Currency::query()->get();

        // for($i = 0; $i < 100000; $i++){

        //     Donate::query()->forceCreate([

        //         'created_at' => now()->subDays(rand(0, 1000)),
        //         'currency_id' => $curr->random()->id,
        //         'amount' => rand(1, 1000),

        //     ]);

        // }


        // $stats = [

        //     'total_count'=> Donate::query()->count(),

        //     'total_amount' => Donate::query()->sum('amount'),
    
        //     'avg_amount' => Donate::query()->avg('amount'),
    
        //     'min_amount' => Donate::query()->min('amount'),
    
        //     'max_amount' => Donate::query()->max('amount'),

        // ];

        $stats = Donate::query()
            ->select(['currency_id'])
            ->selectRaw('count(*) as total_count')
            ->selectRaw('sum(amount) as total_amount')
            ->selectRaw('avg(amount) as avg_amount')
            ->selectRaw('min(amount) as min_amount')
            ->selectRaw('max(amount) as max_amount')
            ->groupBy('currency_id')
            ->get();

        // dd($stats->toArray());

        return view('user.donates.index', compact('stats'));

    }
}
