@extends('layouts.dashboard')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Event
        <small>Post events and trainings...</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('admin') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Edit Event</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-info">

            <div class="box-body pad">
              <form action="{{ route('eventedit') }}" method="POST" enctype="multipart/form-data" id="publish_event">
                @csrf
                    <div class="form-group has-success">
                        <label class="control-label" for="name"><i class="fa fa-calendar-alt"></i> Event Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ $data[0]['blogdata'][0]->event_name }}" placeholder="Event Name">
                        <input type="hidden" class="form-control" id="status" name="status" value="{{ $data[0]['blogdata'][0]->status }}">
                        <input type="hidden" class="form-control" id="id" name="id" value="{{ $data[0]['blogdata'][0]->id }}">
                    </div>
                    <br>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group has-success">
                                <label><i class="fa fa-clock"></i> Start Time:</label>

                                <div class="input-group">
                                    <input type="text" class="form-control timepicker" name="event_start_time" value="{{ $data[0]['blogdata'][0]->event_start_time }}">
                                    <div class="input-group-addon">
                                    <i class="fa fa-clock-o"></i>
                                    </div>
                                </div>
                                <!-- /.input group -->
                                </div>
                                <!-- /.form group -->
                        </div>
                        <div class="col-md-6">
                            <div class="form-group has-success">
                                <label><i class="fa fa-clock"></i> End Time:</label>

                                <div class="input-group">
                                    <input type="text" class="form-control timepicker" name="event_end_time" value="{{ $data[0]['blogdata'][0]->event_end_time }}">
                                    <div class="input-group-addon">
                                    <i class="fa fa-clock-o"></i>
                                    </div>
                                </div>
                                <!-- /.input group -->
                                </div>
                                <!-- /.form group -->
                        </div>
                    </div>
                    <br>


                    <div class="row">
                        <div class="col-md-12">
                            <!-- Date range -->
                                <div class="form-group has-success">
                                    <label><i class="fa fa-calendar-day"></i> Date range:</label>

                                    <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" class="form-control pull-right" id="reservation" name="daterange" value="{{ $data[0]['blogdata'][0]->event_start_date." - ".$data[0]['blogdata'][0]->event_end_date }}">
                                    </div>
                                    <!-- /.input group -->
                                </div>
                                <!-- /.form group -->
                        </div>
                    </div>

                    <br>

                    <div class="form-group has-success">
                        <label class="control-label" for="editor1"><i class="fa fa-newspaper"></i> Event Description</label>
                        <textarea id="editor1" name="editor1" rows="10" cols="80">{{ $data[0]['blogdata'][0]->event_description }}</textarea>
                    </div>

                    <br>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group has-success">
                                <label class="control-label" for="image"><i class="fa fa-images"></i> Event Image</label>
                                <input type="file" name="image" id="image" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group has-success">
                                <label class="control-label" for="location"><i class="fa fa-link"></i> Event URL</label>
                                <input type="text" name="location" id="location" class="form-control" placeholder="https://example.com" value="{{ $data[0]['blogdata'][0]->event_url }}">
                            </div>
                        </div>
                    </div>



                    <br>
                    <button type="button" onclick="eventPublish()" class="btn btn-primary btn-block">Update</button>

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
