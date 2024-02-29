<!DOCTYPE html>
<html lang="en">
<head>
    <title>Hotel Adnane</title>
    <base href="/public">
    @include('home.css')
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

</head>
<body class="main-layout">

<div class="loader_bg">
    <div class="loader"><img src="images/loading.gif" alt="#"/></div>
</div>

<header>
    @include('home.header')
</header>

<div class="our_room">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="titlepage">
                    <h2>Our Room</h2>
                    <p>Lorem Ipsum available, but the majority have suffered </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div id="serv_hover" class="room">
                    <div class="room_img">
                        <figure><img style="height: 350px;" src="/room/{{$room->image}}" alt="room image"/></figure>
                    </div>
                    <div class="bed_room">
                        <h1>{{$room->room_title}}</h1>
                        <p>{{$room->description}}</p>
                        <h4 class="mt-2">Free Wifi : {{ $room->wifi == 1 ? 'Yes' : 'No' }}</h4>
                        <h4>Room type : {{$room->room_type}}</h4>
                        <h2><b>Price : {{$room->price}} $</b></h2>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="booking_form">
                    <h1 style="font-size: 40px!important;">Book Room</h1>
                    @if(session()->has('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session()->get('message') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                     </button>  
                     </div>
                    @endif
                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{url('add_booking',$room->id)}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" class="form-control" id="name" name="name" @if(Auth::check()) value="{{Auth::user()->name}}" @endif>
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" name="email" @if(Auth::check()) value="{{Auth::user()->email}}" @endif>
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone:</label>
                            <input type="text" class="form-control" id="phone" name="phone" >
                        </div>
                        <div class="form-group">
                            <label for="start_date">Start Date:</label>
                            <input type="date" class="form-control" id="start_date" name="start_date" value="{{ date('Y-m-d') }}" min="{{ date('Y-m-d') }}" >
                        </div>
                        <div class="form-group">
                            <label for="end_date">End Date:</label>
                            <input type="date" class="form-control" id="end_date" name="end_date" value="{{ date('Y-m-d', strtotime('+1 day')) }}" min="{{ date('Y-m-d', strtotime('+1 day')) }}" >
                        </div>
                        <button type="submit" style="background:deepskyblue ;" class="btn btn-primary">Book Room</button>
                    </form>
                    <!-- <a  href="{{ url('generate_pdf', $room->id) }}" class="btn btn-primary mt-3">Download PDF</a> -->

                </div>
            </div>
        </div>
    </div>
</div>
@include('home.footer')





<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Bootstrap JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
