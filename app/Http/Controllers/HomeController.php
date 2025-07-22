<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Borrowed;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\DB; // Make sure to import this at the top
use Illuminate\Notifications\Notifiable;


class HomeController extends Controller
{
     use Notifiable;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
     public function index()
    {

        $allMonths = [
            'January',
            'February',
            'March',
            'April',
            'May',
            'June',
            'July',
            'August',
            'September',
            'October',
            'November',
            'December'
        ];

        // Helper function to get counts per status per month
        $getStatusData = function ($status) {
            return DB::table('borroweds')
                ->select(DB::raw("MONTHNAME(borrow_date) as month"), DB::raw("COUNT(*) as total"))
                ->whereYear('borrow_date', now()->year)
                ->where('status', $status)
                ->groupBy(DB::raw("MONTH(borrow_date)"), DB::raw("MONTHNAME(borrow_date)"))
                ->orderBy(DB::raw("MONTH(borrow_date)"))
                ->pluck('total', 'month');
        };

        $borrowedPerMonth = DB::table('borroweds')
            ->select(DB::raw("MONTHNAME(borrow_date) as month"), DB::raw("COUNT(*) as total"))
            ->whereYear('borrow_date', now()->year)
            ->groupBy(DB::raw("MONTH(borrow_date)"), DB::raw("MONTHNAME(borrow_date)"))
            ->orderBy(DB::raw("MONTH(borrow_date)"))
            ->pluck('total', 'month');

        $returnedPerMonth = $getStatusData('returned');
        $overduePerMonth  = $getStatusData('overdue');

        // Build chart data for each month
        $borrowedData = [];
        $returnedData = [];
        $overdueData  = [];

        foreach ($allMonths as $month) {
            $borrowedData[] = $borrowedPerMonth[$month] ?? 0;
            $returnedData[] = $returnedPerMonth[$month] ?? 0;
            $overdueData[]  = $overduePerMonth[$month] ?? 0;
        }

        if (!Auth::check()) {
            return redirect('/login');
        }

        if (Auth::user()->role == 'admin') {
             $user = Auth::user();
            return view('admin.dashboard', [
    
                  'users' => User::all(),
                'categories' => Category::all(),
                'books' => Book::all(),
                'borrowed' => Borrowed::all(),
                'return' => Borrowed::where('status', 'returned')->get(),
                'overdue' => Borrowed::where('status', 'overdue')->get(),
                'labels' => $allMonths,
                'borrowedData' => $borrowedData,
                'returnedData' => $returnedData,
                'overdueData' => $overdueData,

            ]);
        } elseif (Auth::user()->role == 'user') {
            return  redirect()->intended('/'); // make sure this view exists
        } else {
            abort(403, 'Unauthorized'); // optional
        }
    }
}
