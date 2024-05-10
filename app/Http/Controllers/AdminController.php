<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Contact;
use App\Models\Gallery;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Room;
use RealRashid\SweetAlert\Facades\Alert;
use App\Notifications\SendEmailNotification;
use Illuminate\Support\Facades\Notification;

class AdminController extends Controller
{
    public function index()
    {

        if (Auth::id()) {
            $userType = Auth()->user()->user_type;
            if ($userType == 'user') {
                $rooms = Room::all();
                $gallery = Gallery::all();
                return view('home.index', compact('rooms', 'gallery'));
            } elseif ($userType == 'admin') {
                return view('admin.index');
            }
        } else {
            return redirect()->back();
        }
    }
    public function add_room()
    {
        return view('admin.add_room');
    }
    public function create_room(Request $request)
    {
        $room = new Room;
        $image = $request->image;
        if ($image) {
            $imageName = time() . '-rabi.' . $image->extension();
            $request->image->move('backend/rooms', $imageName);
            $room->image = $imageName;
        }

        $room->room_title = $request->room_title;
        $room->description = $request->description;
        $room->price = $request->price;
        $room->wifi = $request->wifi;
        $room->room_type = $request->room_type;

        $room->save();
        Alert::success('Room Added Successfully', 'Check View Room'); //instead of success there are other "warning,info"
        return redirect()->back();
    }
    public function view_rooms()
    {
        $data = Room::all();
        return view('admin.view_rooms', compact('data'));
    }
    public function delete_room($id)
    {
        $room = Room::find($id);
        $room->delete();
        Alert::success('Room Removed Successfully', 'Add New Room');
        return redirect()->back();
    }
    public function edit_room($id)
    {
        $room = Room::find($id);

        return view('admin.update_room', compact('room'));
    }
    public function update_room(Request $request, $id)
    {
        $room = Room::find($id);

        $image = $request->image;
        if ($image) {
            $imageName = time() . '-rabi.' . $image->extension();
            $request->image->move('backend/rooms', $imageName);
            $room->image = $imageName;
        }

        $room->room_title = $request->room_title;
        $room->description = $request->description;
        $room->price = $request->price;
        $room->wifi = $request->wifi;
        $room->room_type = $request->room_type;

        $room->save();
        Alert::success('Room data Edited Successfully', 'Check View Room'); //instead of success there are other "warning,info"
        return redirect()->back();
    }
    public function view_bookings()
    {
        $data = Booking::all();
        return view('admin.view_bookings', compact('data'));
    }
    public function delete_booking($id)
    {
        $booking = Booking::find($id);
        $booking->delete();
        Alert::success('Booking Removed Successfully', 'Go to view bookings');
        return redirect()->back();
    }
    public function approve_booking($id)
    {
        $booking = Booking::find($id);
        $booking->status = 'Approved';
        $booking->save();
        Alert::success('Booking Approved Successfully', 'Go to view bookings');
        return redirect()->back();
    }
    public function reject_booking($id)
    {
        $booking = Booking::find($id);
        $booking->status = 'Rejected';
        $booking->save();
        Alert::success('Booking Rejected Successfully', 'Go to view bookings');
        return redirect()->back();
    }
    public function view_gallery()
    {
        $data = Gallery::all();
        return view('admin.add_image_gallery', compact('data'));
    }
    public function add_image_gallery(Request $request)
    {
        $gallery = new Gallery;
        $image = $request->image;
        if ($image) {
            $imageName = time() . '-rabi.' . $image->extension();
            $request->image->move('backend/gallery', $imageName);
            $gallery->image = $imageName;
        }

        $gallery->save();
        Alert::success('Image Added To Gallery Successfully', 'Check Gallery'); //instead of success there are other "warning,info"
        return redirect()->back();
    }
    public function delete_image($id)
    {
        $gallery = Gallery::find($id);
        $gallery->delete();
        Alert::success('Image Removed From Gallery Successfully!', 'Add New!');
        return redirect()->back();
    }
    public function view_messages()
    {
        $messages = Contact::all();
        return view('admin.view_messages', compact('messages'));
    }
    public function send_email($id)
    {
        $data = Contact::find($id);

        return view('admin.send_email', compact('data'));
    }
    public function email(Request $request, $id)
    {
        $data = Contact::find($id);

        $details = [
            'greeting' => $request->greeting,
            'body' => $request->body,
            'action_text' => $request->action_text,
            'action_url' => $request->action_url,
            'end_line' => $request->end_line,
        ];

        Notification::send($data, new SendEmailNotification($details));

        Alert::success('Email Send Successfully!', 'Thanks For Mail!');
        return redirect()->back();
    }
}
