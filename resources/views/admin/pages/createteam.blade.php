@extends('layouts.dashboard')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Team
        <small>Here are the team of career builders...</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('admin') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Create Team</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-info">
            
            <div class="box-body pad">
              <form action="{{ route('teampost') }}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="form-group has-success">
                        <label class="control-label" for="name"><i class="fa fa-calendar-alt"></i> Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                    </div>

                    <br>

                    <div class="form-group has-success">
                        <label class="control-label" for="editor1"><i class="fa fa-images"></i> Avatar</label>
                        <input type="file" name="image" id="image" class="form-control">
                    </div>

                    <br>

                    <div class="row">
                        <div class="col-md-12">
                                <div class="form-group has-success">
                                    <label class="control-label" for="position"><i class="fa fa-link"></i> Position</label>
                                    <input type="text" name="position" id="position" class="form-control">
                                </div>
                                <!-- /.form group -->
                        </div>
                    </div>

                    <br>

                    

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group has-success">
                                <label class="control-label" for="facebook"><i class="fa fa-facebook"></i> Facebook</label>
                                <input type="text" name="facebook" id="facebook" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group has-success">
                                <label class="control-label" for="twitter"><i class="fa fa-twitter"></i> Twitter</label>
                                <input type="text" name="twitter" id="twitter" class="form-control">
                            </div>
                        </div>
                    </div>
                    <br>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group has-success">
                                <label class="control-label" for="instagram"><i class="fa fa-instagram"></i> Instagram</label>
                                <input type="text" name="instagram" id="instagram" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group has-success">
                                <label class="control-label" for="youtube"><i class="fa fa-youtube"></i> Youtube</label>
                                <input type="text" name="youtube" id="youtube" class="form-control">
                            </div>
                        </div>
                    </div>

                    <br>

                    <div class="form-group has-success">
                        <label class="control-label" for="editor1"><i class="fa fa-newspaper"></i> Favourite Quote</label>
                        <textarea id="editor1" name="editor1" rows="10" cols="80"></textarea>
                    </div>
                    

                    
                    <br>
                    <button type="submit" class="btn btn-primary btn-block">Submit</button>

              </form>
            </div>
          </div>
          <!-- /.box -->


        </div>
        <!-- /.col-->
      </div>
      <!-- ./row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection
