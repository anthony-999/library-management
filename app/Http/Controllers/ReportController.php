<?php

namespace App\Http\Controllers;

use App\Models\Borrowed;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Spatie\LaravelPdf\Facades\Pdf;

class ReportController extends Controller
{
    //
    public function index()
    {
        return view('admin.reports.index');
    }

    public function generate(Request $request)
    {

      
        $request->validate([
            'start_month' => 'required',
            'end_month' => 'required',
        ]);
// Parse without formatting — keep as Carbon instances
    $startDate = Carbon::parse($request->start_month)->startOfMonth(); // 00:00:00
    $endDate = Carbon::parse($request->end_month)->endOfMonth();       // 23:59:59
        
        
    $borrowed = Borrowed::whereBetween('borrow_date', [$startDate, $endDate])->get();

        return Pdf::view('admin.reports.pdf', [
            'borrowed' =>  $borrowed,
            'startMonth' =>  $startDate,
            'endMonth' =>  $endDate,

        ])
            ->format('a4')
        ;
    }
}
