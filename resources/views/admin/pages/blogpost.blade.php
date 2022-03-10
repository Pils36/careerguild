@extends('layouts.dashboard')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Blog Post
        <small>Post articles, news and lots more...</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('admin') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Create Blog Post</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-info">
            
            <div class="box-body pad">
              <form action="{{ route('blogpost') }}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="form-group has-success">
                        <label class="control-label" for="subject"><i class="fa fa-check"></i> Post Subject</label>
                        <input type="text" class="form-control" id="subject" name="subject" placeholder="Post Subject">
                    </div>
                    <textarea id="editor1" name="editor1" rows="10" cols="80"></textarea>
                    <br>
                    <div class="form-group has-success">
                        <label class="control-label" for="image"><i class="fa fa-check"></i> Post Image</label>
                        <input type="file" name="image" id="image" class="form-control">
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
