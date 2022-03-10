@extends('layouts.dashboard')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Subscriber Mail
        <small>Keep your subscribers updated...</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('admin') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Create Subscriber Mail</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-info">

            <div class="box-body pad">
              <form action="{{ route('sendsubscribtion') }}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="form-group has-success">
                        <label class="control-label" for="subject"><i class="fa fa-check"></i> Select Email</label>

                        <select class="form-control select2" multiple="multiple" data-placeholder="Select subscribers" style="width: 100%;" name="email[]" id="email">
                            @if (count($data[0]['subscriber']) > 0)
                            <option value="all">All</option>
                            @foreach ($data[0]['subscriber'] as $subscribers)
                            <option value="{{ $subscribers->email }}">{{ $subscribers->email }}</option>
                            @endforeach
                            @else
                            <option value="">No subscriber yet</option>
                            @endif
                        </select>
                        <small style="color: red; font-weight: bold;">Hold ctrl + click to select multiple</small>
                    </div>
                    <div class="form-group has-success">
                        <label class="control-label" for="subject"><i class="fa fa-check"></i> Subject</label>

                        <input type="text" name="subject" id="subject" class="form-control" placeholder="Subject">
                    </div>

                    <textarea id="editor1" name="editor1" rows="10" cols="80"></textarea>

                    <br>
                    <button type="submit" class="btn btn-primary btn-block">Send Message</button>

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
