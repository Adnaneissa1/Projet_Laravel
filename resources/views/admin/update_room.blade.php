<!DOCTYPE html>
<html>

<head>

    <base href="/public"> 

    @include('admin.css')

    <style>
    
    h1 {
      font-weight: bold;
      color: white;
    }
  </style>
</head>

<body>
    @include('admin.header')

    @include('admin.sidebar')

    <div class="page-content" >
        <div class="page-header">
            <div class="container-fluid">
                <div class="container mt-4">
                    <h1  class=""text-center mb-4>Update Room</h1>
                    <form action="{{url('edit_room',$room->id)}}" method="POST" enctype="multipart/form-data" >
                        @csrf
                        <div class="form-group">
                        <label for="room_title">Room Title:</label>
                        <input type="text" class="form-control" id="room_title" name="room_title" value="{{$room->room_title}}" >
                        </div>

                        <div class="form-group">
                        <label for="image">Current Image:</label>
                        <img style="width: 200px;"   src="/room/{{$room->image}}">
                        </div>

                        <div class="form-group">
                        <label for="image">Change Room Image:</label>
                        <input type="file" class="form-control-file" id="image" name="image" >
                        </div>

                        <div class="form-group">
                        <label for="description">Description:</label>
                        <textarea class="form-control" id="description" name="description" rows="3" >{{$room->description}}</textarea>
                        </div>

                        <div class="form-group">
                        <label for="price">Price:</label>
                        <input type="number" class="form-control" id="price" name="price" value="{{$room->price}}">
                        </div>

                        <div class="form-group">
                        <label>Wifi Availability:</label>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="wifi-yes" name="wifi" value="1" {{ $room->wifi == 1 ? 'checked' : '' }}>
                            <label class="form-check-label" for="wifi-yes">Yes</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input" id="wifi-no" name="wifi" value="0" {{ $room->wifi == 0 ? 'checked' : '' }}>
                            <label class="form-check-label" for="wifi-no">No</label>
                        </div>
                        </div>


                        <div class="form-group">
                        <label for="room_type">Room Type:</label>
                        <select class="form-control" id="room_type" name="room_type" >
                        <option value="{{$room->room_type}}" selected>{{$room->room_type}}</option>
                            <option value="single">Single</option>
                            <option value="double">Double</option>
                            <option value="suite">Suite</option>
                        </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Update Room</button>
                    </form>
                    </div>

            </div>
        </div>
    </div>

    @include('admin.footer')

</body>

</html>