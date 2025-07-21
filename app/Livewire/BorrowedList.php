<?php

namespace App\Livewire;

use App\Models\Borrowed;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;


class BorrowedList extends Component
{
    public function render()
    {
        $user = Auth::user();

      $borrowedGroups = Borrowed::with('book')
        ->where('user_id', $user->id)
        ->orderBy('created_at', 'desc')
        ->get()
        ->groupBy(function ($borrowed) {
            // Group by exact created_at datetime string
            return $borrowed->created_at->toDateTimeString();
        });
         
        return view('livewire.borrowed-list', [
                        'users' => $user,     // For grouped display

            'borrowedGroups' => $borrowedGroups,
        ]);
        
    }
}
