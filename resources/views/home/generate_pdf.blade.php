<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Réservation de chambre</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f2f2f2;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        .info {
            margin-bottom: 10px;
        }
        .info span {
            font-weight: bold;
        }
        .room-details {
            margin-top: 30px;
            border-top: 2px solid #ccc;
            padding-top: 20px;
        }
        .room-img {
            text-align: center;
        }
        .room-img img {
            max-width: 100%;
            height: auto;
            border-radius: 5px;
        }
        .room-title {
            text-align: center;
            margin-top: 20px;
        }
        .room-description {
            text-align: justify;
            margin-top: 10px;
        }
        .room-price {
            text-align: center;
            margin-top: 10px;
            font-size: 20px;
            color: #007bff;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Réservation de chambre</h1>
        

        <div>
            <h2>{{$book->name}}</h2>
            <p>{{$book->email}}</p>
            <p>{{$book->phone}}</p>
            <p>{{$book->start_date}}</p>
            <p>{{$book->end_date}}</p>
            <div class="room-details">
        <div class="room-img">
            <img src="/room/{{$room->image}}" alt="{{ $room->room_title }}">
        </div>
        <div class="room-title">
            <h2>{{ $room->room_title }}</h2>
        </div>
        <div class="room-description">
            <p>{{ $room->description }}</p>
        </div>
        <div class="room-price">
            <p>Prix: {{ $room->price }}</p>
        </div>
    </div>
        </div>
        
    </div>
</body>
</html>
