<!DOCTYPE html>
<html>
<head>
    @include('admin.css')
    <style>
        .table-header {
            background-color: burlywood;
            color: #fff;
        }

        .custom-tbody {
            background-color: #f8f9fa;
            color: gray;
        }

        h1 {
            font-weight: bold;
            color: white;
        }

        /* Decrease table size */
        .table {
            font-size: 14px;
        }

        th, td {
            padding: 8px;
        }
    </style>
</head>
<body>
@include('admin.header')

@include('admin.sidebar')

<div class="page-content">
    <div class="page-header">
        <div class="container-fluid">
            <div class="container mt-4">
                <h1 class="text-center mb-4">Booking Room</h1>
                <div class="table-responsive"> 
                    <table class="table">
                        <thead class="table-header">
                        <tr>
                            <th>Room_Id</th>
                            <th>Customer name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Arrival Date</th>
                            <th>Leaving Date</th>
                            <th>Status</th>
                            <th>Room Title</th>
                            <th>Price</th>
                            <th>Image</th>
                            <th>Delete</th>
                            <th>Status Update</th>
                        </tr>
                        </thead>
                        <tbody class="custom-tbody">
                        @foreach($bookings as $booking)
                            <tr>
                                <td>{{$booking->room_id}}</td>
                                <td>{{$booking->name}}</td>
                                <td>{{$booking->email}}</td>
                                <td>{{$booking->phone}}</td>
                                <td>{{$booking->start_date}}</td>
                                <td>{{$booking->end_date}}</td>
                                <td>{{$booking->status}}</td>
                                <td>{{$booking->room->room_title}}</td>
                                <td>{{$booking->room->price}}$</td>
                                <td>
                                    <img src="/room/{{$booking->room->image}}" alt="Image room" />
                                </td>
                                <td>
                                    <a class="btn btn-danger" href="{{url('delete_booking',$booking->id)}}" onclick="return confirm('Are you sure to delete this ');">Delete</a>
                                </td>
                                <td>
                                  <span style="padding-bottom:10px ;">
                                  <a  class="btn btn-success" href="{{url('approve_book',$booking->id)}}">Approve</a>
                                  </span>
                                  <a  class="btn btn-warning" href="{{url('reject_book',$booking->id)}}">Rejected</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@include('admin.footer')

</body>
</html>
