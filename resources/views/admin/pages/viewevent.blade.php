@extends('layouts.dashboard')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Events
        <small>Available events, both published and not published...</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('admin') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Events</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Events & Trainings</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">

            <div class="row">

                @if (count($data[0]['eventdata']) > 0)
                    @foreach ($data[0]['eventdata'] as $blog)

                    <div class="col-md-12">
                    <!-- Box Comment -->
                    <div class="box box-widget">
                        <div class="box-header with-border">
                        <div class="user-block">
                            <img class="img-circle" src="https://res.cloudinary.com/pearlsea-advisory/image/upload/v1600995902/careerguild/blogpost/7ca25224848822ec24b3c6c8351481cd_kjzfdg.gif" alt="User Image">
                            <span class="username"><a href="#">{{ $blog->event_name }}</a></span>
                            <span class="description">{{ date('h:i A', strtotime($blog->created_at)) }} <small>{{ date('d/M/Y', strtotime($blog->created_at)) }}</small></span>
                        </div>
                        <!-- /.user-block -->
                        <div class="box-tools">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                        <!-- /.box-tools -->
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                        <img class="img-responsive pad" src="{{ $blog->image_url }}" alt="Photo" style="height: 200px;">


                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer box-comments">
                                        <div class="box-comment">
                                        {!! $blog->event_description !!}
                                        <!-- /.comment-text -->
                                    </div>
                                    <!-- /.box-comment -->
                                    <br>
                        <p>
                            <b><i class="fa fa-calendar-week"></i> Date:</b> {{ $blog->event_start_date.' - '.$blog->event_end_date }}
                        </p>

                        <p>
                            <b><i class="fa fa-clock"></i> Time:</b> {{ $blog->event_start_time.' - '.$blog->event_end_time }}
                        </p>

                        <p>
                            <b><i class="fa fa-link"></i> URL:</b> <a href="{{ $blog->event_url }}" target="_blank">{{ $blog->event_url }}</a>
                        </p>

                        <button type="button" class="btn btn-primary btn-xs"><i class="fa fa-share"></i> Share</button>
                        <a type="button" class="btn btn-success btn-xs" href='/admin/eventedit/{{ $blog->id }}'><i class="fa fa-edit"></i> Edit</a>
                        <button type="button" class="btn btn-danger btn-xs" onclick="deletePost('{{ $blog->id }}', 'event')"><i class="fa fa-trash"></i> Delete</button>
                        </div>

                    </div>
                    <!-- /.box -->


                    </div>

                    @endforeach
                @else
                    <div class="col-md-12">
                        <center>No event/training yet</center>
                    </div>
                @endif


            </div>

            {{-- NAv LINK --}}

            <center>

                <nav aria-label="...">
                    <ul class="pagination pagination-lg">
                        <li class="page-item">
                            {{ $data[0]['eventdata']->links() }}
                        </li>
                    </ul>
                    </nav>
            </center>

        </div>
        <!-- /.box-body -->

      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  @endsection
