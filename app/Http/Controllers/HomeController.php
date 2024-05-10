<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Booking;
use App\Models\Contact;
use App\Models\Gallery;

class HomeController extends Controller
{
    public function index()
    {
        $rooms = Room::all();
        $gallery = Gallery::all();
        return view('home.index', compact('rooms', 'gallery'));
    }
    public function about()
    {
        return view('home.aboutus');
    }
    public function our_rooms()
    {
        $rooms = Room::all();
        return view('home.ourroom', compact('rooms'));
    }
    public function gallery()
    {
        $gallery = Gallery::all();
        return view('home.ourgallery', compact('gallery'));
    }
    public function blog()
    {
        return view('home.ourblog');
    }
    public function contact()
    {
        return view('home.contactus');
    }
    public function room_details($id)
    {
        $room = Room::find($id);

        return view('home.room_details', compact('room'));
    }
    public function add_booking(Request $request, $id)
    {
        $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'date|after:start_date',
        ]);

        $bookRoom = new Booking;

        $bookRoom->room_id = $id;
        $bookRoom->name = $request->name;
        $bookRoom->email = $request->email;
        $bookRoom->phone = $request->phone;

        $start_date = $request->start_date;
        $end_date = $request->end_date;

        $isBooked = Booking::where('room_id', $id)->where('start_date', '<=', $end_date)->where('end_date', '>=', $start_date)->exists();

        if ($isBooked) {
            Alert::info('Room is already Booked', 'Try different date!');
            return redirect()->back();
        } else {
            $bookRoom->start_date = $request->start_date;
            $bookRoom->end_date = $request->end_date;

            $bookRoom->save();
            Alert::success('Room Booked Successfully', 'Visit Us Soon!'); //instead of success there are other "warning,info"
            return redirect()->back();
        }
    }
    public function add_contact(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'phone' => 'required|digits:10|max:10|min:10',
            'message' => 'required',
        ]);

        $addContact = new Contact;

        $addContact->name = $request->name;
        $addContact->email = $request->email;
        $addContact->phone = $request->phone;
        $addContact->message = $request->message;

        $addContact->save();
        Alert::success('Your Message Sent Successfully', 'Our Team will Reply Soon'); //instead of success there are other "warning,info"
        return redirect()->back();
    }
}
