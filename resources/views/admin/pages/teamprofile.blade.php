@extends('layouts.dashboard')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        {{ $data[0]->name."'s" }} Information
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('admin') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">{{ $data[0]->name."'s" }} Information</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="{{ $data[0]->image }}" alt="User profile picture">

              <h3 class="profile-username text-center">{{ $data[0]->name }}</h3>
              
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              {{-- <li class="active"><a href="#timeline" data-toggle="tab">Timeline</a></li> --}}
              <li class="active"><a href="#settings" data-toggle="tab">Team Information</a></li>
            </ul>


            <div class="tab-content">

             

              <div class="active tab-pane" id="settings">
                    <form class="form-horizontal" action="{{ route('updateteam') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                  <div class="form-group">
                    <label for="name" class="col-sm-2 control-label">Fullname</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="name" id="name" value="{{ $data[0]->name }}" placeholder="Name">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="position" class="col-sm-2 control-label">Position</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="position" id="position" value="{{ $data[0]->position }}" placeholder="Position">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="facebook" class="col-sm-2 control-label">Facebook</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="facebook" id="facebook" placeholder="Facebook" value="{{ $data[0]->facebook }}">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="twitter" class="col-sm-2 control-label">Twitter</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="twitter" id="twitter" placeholder="Twitter" value="{{ $data[0]->twitter }}">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="instagram" class="col-sm-2 control-label">Instagram</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="instagram" id="instagram" placeholder="Instagram" value="{{ $data[0]->instagram }}">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="youtube" class="col-sm-2 control-label">Youtube</label>

                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="youtube" id="youtube" placeholder="Twitter" value="{{ $data[0]->youtube }}">
                    </div>
                  </div>


                  <div class="form-group">
                    <label for="youtube" class="col-sm-2 control-label">Fav. Quote</label>

                    <div class="col-sm-10">
                      <textarea id="editor1" name="editor1" rows="10" cols="80">{{ $data[0]->fav_quote }}</textarea>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="image" class="col-sm-2 control-label">Upload Image</label>

                    <div class="col-sm-10">
                      <input type="file" class="form-control" name="image" id="image">
                    </div>
                  </div>

                  
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        
                            <input type="hidden" name="id" value={{ $data[0]->id }}>
                            <button type="submit" class="btn btn-primary">Update Information</button>
                        
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.tab-pane -->





            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
@endsection
