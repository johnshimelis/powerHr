<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Auth;
use App\Models\User;
use App\Models\Organization;
use App\Models\Booking;
use Carbon\Carbon;
use Redirect;
use Math;

class DashboardController extends Controller
{
    public function index()
    {
        $users = User::where('role', '=', 3)
        ->orderBy('id','DESC')->get();
        $organization = Organization::first();


        // Upcoming
        $upcommings = Booking::where([['organization_id', 1],['date', '>=', Carbon::today()->toDateString()],['booking_status','Approved']])
        ->orderBy('date', 'asc')
        ->orderBy('start_time', 'asc')
        ->take(8)
        ->get();

        return view('admin.pages.dashboard', compact('users','upcommings'));
    }

    // User Charts
    public function adminUserChartData()
    {
        $masterYear = array();
        $labelsYear = array();

        array_push($masterYear,User::where([['status',1],['role',3]])
        ->whereMonth('created_at', Carbon::now())
        ->count());

        for ($i=1; $i <= 11 ; $i++)
        {
            if($i >= Carbon::now()->month){
                array_push($masterYear,User::where([['status',1],['role',3]])
                ->whereMonth('created_at',Carbon::now()->subMonths($i))
                ->whereYear('created_at', Carbon::now()->subYears(1))
                ->count());
            } else {
                array_push($masterYear,User::where([['status',1],['role',3]])
                ->whereMonth('created_at',Carbon::now()->subMonths($i))
                ->whereYear('created_at', Carbon::now()->year)
                ->count());
            }
            
        }

        array_push($labelsYear, Carbon::now()->format('M-y'));
        for ($i=1; $i <= 11 ; $i++)
        { 
            array_push($labelsYear, Carbon::now()->subMonths($i)->format('M-y'));
        }

        return [$masterYear,$labelsYear];
    }

    public function adminUserMonthChartData()
    {
        $masterMonth = array();
        $labelsMonth = array();

        array_push($masterMonth,User::where([['status',1],['role',3]])
        ->whereDate('created_at',Carbon::today()->format('Y-m-d'))
        ->count());
        for ($i=1; $i <= 30 ; $i++)
        { 

            array_push($masterMonth,User::where([['status',1],['role',3]])
            ->whereDate('created_at',Carbon::now()->subDays($i)->format('Y-m-d'))
            ->count());
        }

        array_push($labelsMonth,Carbon::now()->format('d-M'));
        for ($i=1; $i <= 30 ; $i++)
        { 
            array_push($labelsMonth,Carbon::now()->subDays($i)->format('d-M'));
        }

        return [$masterMonth,$labelsMonth];
    }
    
    public function adminUserWeekChartData()
    {
        $masterWeek = array();
        $labelsWeek = array();

        array_push($masterWeek,User::where([['status',1],['role',3]])
        ->whereDate('created_at', Carbon::today()->format('Y-m-d'))
        ->count());
        for ($i=1; $i <= 6 ; $i++)
        { 
            array_push($masterWeek,User::where([['status',1],['role',3]])
            ->whereDate('created_at', Carbon::now()->subDays($i)->format('Y-m-d'))
            ->count());
        }

        array_push($labelsWeek,Carbon::now()->format('d-M'));
        for ($i=1; $i <= 6 ; $i++)
        { 
            array_push($labelsWeek,Carbon::now()->subDays($i)->format('d-M'));
        }

        return [$masterWeek,$labelsWeek];
    }

    // Revenue Chart
    public function adminRevenueChartData()
    {
        $masterYear = array();
        $labelsYear = array();

        array_push($masterYear,ceil(Booking::where([['payment_status',1],['booking_status','!=','Cancel']])
        ->whereMonth('date', Carbon::now())
        ->sum('payment')));
        
        for ($i=1; $i <= 11 ; $i++)
        {
            if($i >= Carbon::now()->month) {
                array_push($masterYear,ceil(Booking::where([['payment_status',1],['booking_status','!=','Cancel']])
                ->whereMonth('date',Carbon::now()->subMonths($i))
                ->whereYear('date', Carbon::now()->subYears(1))
                ->sum('payment')));
            } else {
                array_push($masterYear,ceil(Booking::where([['payment_status',1],['booking_status','!=','Cancel']])
                ->whereMonth('date',Carbon::now()->subMonths($i))
                ->whereYear('date', Carbon::now()->year)
                ->sum('payment')));
            }
            
        }

        array_push($labelsYear, Carbon::now()->format('M-y'));
        for ($i=1; $i <= 11 ; $i++)
        { 
            array_push($labelsYear, Carbon::now()->subMonths($i)->format('M-y'));
        }

        return [$masterYear,$labelsYear];
    }

    public function adminRevenueMonthChartData()
    {
        $masterMonth = array();
        $labelsMonth = array();

        array_push($masterMonth,ceil(Booking::where([['payment_status',1],['booking_status','!=','Cancel']])
        ->whereDate('date', Carbon::today()->format('Y-m-d'))
        ->sum('payment')));
        for ($i=1; $i <= 30 ; $i++)
        { 
            array_push($masterMonth,ceil(Booking::where([['payment_status',1],['booking_status','!=','Cancel']])
            ->whereDate('date',Carbon::now()->subDays($i)->format('Y-m-d'))
            ->sum('payment')));
        }

        array_push($labelsMonth,Carbon::now()->format('d-M'));
        for ($i=1; $i <= 30 ; $i++)
        { 
            array_push($labelsMonth,Carbon::now()->subDays($i)->format('d-M'));
        }

        return [$masterMonth,$labelsMonth];
    }
    
    public function adminRevenueWeekChartData()
    {
        $masterWeek = array();
        $labelsWeek = array();

        array_push($masterWeek,ceil(Booking::where([['payment_status',1],['booking_status','!=','Cancel']])
        ->whereDate('date', Carbon::today()->format('Y-m-d'))
        ->sum('payment')));
        for ($i=1; $i <= 6 ; $i++)
        { 
            array_push($masterWeek,ceil(Booking::where([['payment_status',1],['booking_status','!=','Cancel']])
            ->whereDate('date',Carbon::now()->subDays($i)->format('Y-m-d'))
            ->sum('payment')));
        }

        array_push($labelsWeek,Carbon::now()->format('d-M'));
        for ($i=1; $i <= 6 ; $i++)
        { 
            array_push($labelsWeek,Carbon::now()->subDays($i)->format('d-M'));
        }

        return [$masterWeek,$labelsWeek];
    }

}
