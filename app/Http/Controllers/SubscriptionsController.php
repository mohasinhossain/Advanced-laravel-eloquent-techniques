<?php

namespace App\Http\Controllers;

use DB;
use App\User;
use Illuminate\Http\Request;

class SubscriptionsController extends Controller
{
    public function store(Billable $billable)
    {
        DB::transaction(function () use ($billable){
            $costomer = $billable->createCustomer('token');

            $user = User::register('yadayada');
        });
    }
}
