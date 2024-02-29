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
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Message</th>
                    <th>Send  Email</th>
                </tr>
                </thead>
                <tbody class="custom-tbody">

                @foreach($messages as $message)
                    <tr>
                    <td>{{$message->name }}</td>
                    <td>{{ $message->email }}</td>
                    <td>{{ $message->phone  }}</td>
                    <td>{{ $message->message }}</td>
                    <td ><a href="{{url('send_mail',$message->id)}}" class="btn btn-success">email</a> </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            </div>


          
          </div>
        </div>
    </div>


    @include('admin.footer')
        
  </body>
</html>