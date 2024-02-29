<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Contact;
use App\Models\Gallary;
use App\Models\Room;
use Barryvdh\DomPDF\Facade\Pdf ;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use Illuminate\Http\Request;



class HomeController extends Controller
{
    public function room_datails($id){

        $room = Room::find($id);

        return view('home.room_details', compact('room'));
    }

    public function add_booking(Request $request,$id){

        $request->validate([
            'name'=>'required|max:255',
            'email'=>'required',
            'phone'=>'required|numeric',
            'start_date'=>'required|date',
            'end_date'=>'date|after:start_date'
        ]);

        $booking = new Booking();

        $booking->room_id = $id;
        $booking->name = $request->name;
        $booking->email = $request->email;
        $booking->phone = $request->phone;

       

        $start_date = $request->start_date;
        $end_date = $request->end_date;
        $isbooked = Booking::where('room_id',$id)
        ->where('start_date', '<=', "$start_date")
        ->where('end_date', '>=',"$end_date")->exists();
        if ($isbooked) {
            return redirect()->back()->with('message','The booking dates are not available');
            }else{
                $booking->start_date = $request->start_date;
                $booking->end_date = $request->end_date;
                
        $booking->save();

        $book=Booking::latest( )->first();
        $room = Room::find($id);
        $pdf = Pdf::loadView('home.generate_pdf', ['book'=>$book, 'room'=>$room]);


        return $pdf->download('booking-info.pdf');

        // return redirect()->back()->with('message','Your  booking has been added');
        
    }
        
    }



    public function contact(Request $request){


        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'phone'=>'numeric|required',
            'message'=>'required|max:250'
        ]);

        $contact = new Contact();

        $contact->name = $request->name;
        $contact->email= $request->email;
        $contact->phone= $request->phone;
        $contact->message = $request->message;

        $contact->save();

        return redirect()->back()->with('message','Message sent Seccessfully');

    }


    public function our_rooms(){
        $room = Room::all();

        return view('home.our_rooms',compact('room'));
    }

    public function hotel_gallary(){

        $gallary = Gallary::all();
        return view('home.hotel_gallary',compact('gallary'));

    }

    public function contact_us(){

        return view('home.contact_us');

    }

    public function generate_pdf($id)
    {
        $room = Room::find($id);

        $pdf = Pdf::loadView('home.generate_pdf', $room );

        return $pdf->download('booking-info.pdf');
    }

    }

