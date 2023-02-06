<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        /** Declarations */
        $date   =   (@$request->dob) ? date('Y-m-d', strtotime($request->dob)) : date('Y-m-d');
        $month  =   date('m', strtotime($date));
        $year   =   date('Y', strtotime($date));
        $next_year  =   date('Y', strtotime($date . '+ 1 year'));
        

        /** number of records for the next 7 days  */
        $limit  =   User::getBirthdaysOfWeek($date);

        /** fetch birthday lists */
        $birthdays  =   DB::table('users');

        /** check current month december or not, if yes, include next year recrds too, else current year records only  */
        $birthdays  =   $birthdays->whereYear('dob', '<=', ($month == 12) ? $next_year : $year);

        /**select date greater than or equel to today date */
        $birthdays  =   $birthdays->whereDate('dob', '>=', $date)
            ->orderBy('dob', 'asc')
            ->take($limit)
            ->get();

        return view('welcome', compact('birthdays'));
    }
}
