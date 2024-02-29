<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
  </head>
  <body>
    @include('admin.header')
    
    @include('admin.sidebar')

    <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">

          <center>

         
            <h1 style="font-size: 40px; font-weight:bolder;">Gallary</h1>

            <form action="{{url('upload_gallary')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div style="padding:30px;">
                    <label style="color:white;font-weight:bold;">Upload Image</label>
                    <input type="file" name="image" />
                    <input type="submit" value="Add Image" class="btn btn-primary" />
                </div>
            </form>
            @foreach($gallary as $g)
            <div class="col-md-4 card" >
            <img src="/gallary/{{$g->image}}" alt="image gallary" style="height: 200px!important;width:300px;" >
            <a class="btn btn-danger" style="width: 100px;" href="{{url('delete_gallary',$g->id)}}">Delete</a>
            </div>
            
            
            @endforeach
            </center>
          </div>
        </div>
    </div>
    @include('admin.footer')
        
  </body>
</html>