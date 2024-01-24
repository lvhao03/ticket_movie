<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\BookingHistory;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    public function index(){
        $user_id = Auth::user()->userID;;
        $bookingHistory = BookingHistory::where('user_id', $user_id)->get();
        if ($bookingHistory->isEmpty()){
            return response(['error' => 'Không tồn tại lịch sử đơn hàng'], 400);
        };
        return response($bookingHistory);
    }
}
