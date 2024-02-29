<?php

namespace App\Http\Controllers;

use App\Imports\RoomsImport;
use App\Models\Booking;
use App\Models\Contact;
use App\Models\Gallary;
use Illuminate\Http\Request;
use App\Models\User;
use   Illuminate\Support\Facades\Auth;
use App\Models\Room;
use App\Notifications\SendEmailNotofication;
use Illuminate\Support\Facades\Notification;
use Maatwebsite\Excel\Facades\Excel;

class AdminController extends Controller
{
    public function index(){

        if(Auth::id()){
            $usertype = Auth()->user()->usertype;

            if($usertype == 'user'){
                $room = Room::all();
                $gallary=Gallary::all();
                return view('home.index',compact('room','gallary'));
            }
            elseif( $usertype =='admin'){
                return view('admin.index');
            }
        else{
            return redirect()->back();
        }
        }
    }
    // view home page 
    public function home(){

        $room = Room::all();

        $gallary = Gallary::all();

        return view('home.index',compact('room','gallary'));
    }

    public function create_room(){

        return view('admin.create_room');

    }

    public function add_room( Request $request){

      $data = new Room();

      $data->room_title = $request->room_title;
      $data->description = $request->description;
      $data->price = $request->price;
      $data->wifi = $request->wifi;
      $data->room_type = $request->room_type;
      $image = $request->image;
      if ($image) {
        $imagename = time().'.'.$image->getClientOriginalExtension();
        $request->image->move('room',$imagename);
        $data->image = $imagename;
      }
        $data->save();

    return redirect()->back();
       
}

    public function view_room(){

        $rooms = Room::all();
        return view('admin.view_room',compact('rooms'));
        
    }

    public function delete_room($id){
        $room = Room::find($id);
        $room->delete(); 
        return redirect()->back();   
    }

    public function update_room($id){
        $room = Room::find($id);
        return view('admin.update_room',compact('room'));
          
    }
    
    public function edit_room(Request $request,$id){
        $room = Room::find($id);


      $room->room_title = $request->room_title;
      $room->description = $request->description;
      $room->price = $request->price;
      $room->wifi = $request->wifi;
      $room->room_type = $request->room_type;
      $image = $request->image;
      if ($image) {
        $imagename = time().'.'.$image->getClientOriginalExtension();
        $request->image->move('room',$imagename);
        $room->image = $imagename;
      }
        $room->save();

        return redirect()->back();
    }

    public function bookings(){

        $bookings = Booking::all();
        return view('admin.booking',compact('bookings'));
    }

    public function delete_booking($id){

        $booking = Booking::find($id);

        $booking->delete();

        return redirect()->back();

    }

    public function approve_book($id){
        
        $booking=Booking::find($id);

        $booking->status = 'approve';
        $booking->save();

        return redirect()->back();
        }

        public function reject_book($id){
        
            $booking=Booking::find($id);
    
            $booking->status = 'rejected';
            $booking->save();
    
            return redirect()->back();
            }
    
    public function view_gallary(){

        $gallary = Gallary::all();

        return view('admin.view_gallary',compact('gallary'));
    }

    public function upload_gallary(Request $request){
        
        $gallary = new Gallary();

        $image = $request->image;
        if($image){
            $imagename=time().'.'.$image->getClientOriginalExtension();
            $request->image->move('gallary',$imagename);
            $gallary->image= $imagename;  
        }
        $gallary->save();
        return redirect()->back(); 
    }

    public function delete_gallary($id){
        $gallary = Gallary::find($id);
        $gallary->delete();
        return redirect()->back();
    }

    public function all_messages(){

        $messages = Contact::all();

        return view("admin.all_messages",compact('messages'));
    }

    public function send_mail($id){

        $contact = Contact::find($id);

        return view('admin.send_mail',compact('contact'));
    }

    public function mail(Request $request,$id){
        
        $contact = Contact::find($id);
        $details = [
                'greeting' => $request->greeting,
                'body' => $request->body,
                'action_text' => $request->action_text,
                'action_url' => $request->action_url,
                'endline' => $request->endline,

        ];

        Notification::send($contact,new SendEmailNotofication($details));

        return redirect()->back();
    }


    public function view_room_import() 
    {
        Excel::import(new RoomsImport, request()->file('file'));
        return redirect()->back();
    }


}