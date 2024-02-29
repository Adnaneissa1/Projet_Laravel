<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')



    <style>
    .table-header {
      background-color: indianred; 
      color: #fff; 
    }

    .custom-tbody {
      background-color: #f8f9fa; 
      color:  gray;
    }

    h1 {
      font-weight: bold;
      color: white;
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
            <h1 class="text-center mb-4">Rooms Information</h1>
            <table class="table">
                <thead  class="table-header">
                <tr>
                    <th>Room Title</th>
                    <th>Image</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Wifi</th>
                    <th>Room Type</th>
                    <th>Delete</th>
                    <th>Update</th>
                </tr>
                </thead>
                <tbody class="custom-tbody">

                @foreach($rooms as $room)
                    <tr>
                    <td>{{ $room->room_title }}</td>
                    <td><img src="room/{{$room->image}}" alt="Room Image" class="img-fluid img-thumbnail" style="max-width: 150px;"></td>
                    <td>{{ $room->description }}</td>
                    <td>{{ $room->price }}$</td>
                    <td>{{ $room->wifi == 1 ? 'Yes' : 'No' }}</td>
                    <td>{{ $room->room_type }}</td>
                    <td><a href="{{url('delete_room',$room->id)}}" onclick="return confirm('Are you sure you want to delete this room?')" class="btn btn-danger">Delete </a></td>
                    <td><a href="{{url('update_room',$room->id)}}"  class="btn btn-warning">Update</a></td>

                    </tr>
                @endforeach
                </tbody>
            </table>
            </div>

            <form action="{{url('view_room_import')}}" method="POST" enctype="multipart/form-data" class="mt-4">
              @csrf
              <div class="form-group">
                  <label for="file">Choose File:</label>
                  <input type="file" name="file" class="form-control-file">
              </div>
              <div class="form-group">
                  <button type="submit" class="btn btn-primary">Import Data</button>
              </div>
          </form>

          </div>
        </div>
    </div>
    @include('admin.footer')
        
  </body>
</html>