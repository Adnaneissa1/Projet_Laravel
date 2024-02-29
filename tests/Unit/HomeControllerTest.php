<?php

namespace Tests\Unit;

use App\Http\Controllers\HomeController;
use App\Models\Booking;
use App\Models\Contact;
use App\Models\Room;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Request;
use Tests\TestCase;

class HomeControllerTest extends TestCase
{
    // use RefreshDatabase;

    // /**
    //  * Test the add_booking method.
    //  *
    //  * @return void
    //  */
    // public function test_add_booking()
    // {
    //     // Create a room
    //     $room = Room::factory()->create();

    //     // Create a request
    //     $request = new Request();
    //     $request->replace([
    //         'name' => 'Test Name',
    //         'email' => 'test@example.com',
    //         'phone' => '1234567890',
    //         'start_date' => '2024-01-01',
    //         'end_date' => '2024-01-02'
    //     ]);

    //     // Call the method
    //     $controller = new HomeController();
    //     $controller->add_booking($request, $room->id);

    //     // Assert a booking was created
    //     $this->assertCount(1, Booking::all());
    //     $booking = Booking::first();
    //     $this->assertEquals($room->id, $booking->room_id);
    //     $this->assertEquals('Test Name', $booking->name);
    //     $this->assertEquals('test@example.com', $booking->email);
    //     $this->assertEquals('1234567890', $booking->phone);
    //     $this->assertEquals('2024-01-01', $booking->start_date);
    //     $this->assertEquals('2024-01-02', $booking->end_date);
    // }

    // public function test_room_details()
    // {
    //     $room = Room::factory()->create();

    //     $controller = new HomeController();

    //     $view = $controller->room_datails($room->id);

    //     $this->assertEquals('home.room_details', $view->name());
    //     $this->assertArrayHasKey('room', $view->getData());
    // }

    // public function test_contact()
    // {
    //     $request = new Request();
    //     $request->replace([
    //         'name' => 'Test Name',
    //         'email' => 'test@example.com',
    //         'phone' => '1234567890',
    //         'message' => 'Test message'
    //     ]);

    //     $controller = new HomeController();
    //     $response = $controller->contact($request);

    //     $this->assertEquals(302, $response->getStatusCode());
    //     $this->assertCount(1, Contact::all());
    // }


}
