<!DOCTYPE html>
<html>
  <head> 
    <base href="/public">
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

          <center>

          <h1 style="font-size:30px;font-weight:bold;">Mail send to <b>{{$contact->name}}</b></h1>

          <div class="container mt-4">
                    <form action="{{url('mail',$contact->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                        <label for="">Greeting</label>
                        <input type="text" class="form-control" id="" name="greeting" >
                        </div>


                        <div class="form-group">
                        <label for="">Mail Body</label>
                        <textarea class="form-control"  name="body" rows="3" ></textarea>
                        </div>

                        <div class="form-group">
                        <label for="">Action text</label>
                        <input type="text" class="form-control" id="" name="action_text" >
                        </div>

                        <div class="form-group">
                        <label for="">Action Url</label>
                        <input type="text" class="form-control" id="" name="action_url" >
                        </div>

                        <div class="form-group">
                        <label for="">END Line</label>
                        <input type="text" class="form-control" id="" name="end_line" >
                        </div>

                        <button type="submit" class="btn btn-primary">Sent Mail</button>
                    </form>
                    </div>



          </center>
          </div>
        </div>
    </div>

    @include('admin.footer')
        
  </body>
</html>