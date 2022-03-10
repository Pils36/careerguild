@extends('layouts.dashboard')

@section('content')
<?php use \App\Http\Controllers\CareerstaterSeriesComment; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Career Starter Series
        <small>Post articles, news and lots more...</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('admin') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Career Starter Series</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Post Articles</h3>

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

                @if (count($data[0]['blogdata']) > 0)
                    @foreach ($data[0]['blogdata'] as $blog)

                    <div class="col-md-6">
                    <!-- Box Comment -->
                    <div class="box box-widget">
                        <div class="box-header with-border">
                        <div class="user-block">
                            <img class="img-circle" src="https://res.cloudinary.com/pearlsea-advisory/image/upload/v1600995902/careerguild/blogpost/7ca25224848822ec24b3c6c8351481cd_kjzfdg.gif" alt="User Image">
                            <span class="username"><a href="#">{{ $blog->post_by }}</a></span>
                            <span class="description">Shared publicly - {{ date('h:i A', strtotime($blog->created_at)) }} <small>{{ date('d/M/Y', strtotime($blog->created_at)) }}</small></span>
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
                        <img class="img-responsive pad" src="{{ $blog->image }}" alt="Photo" style="height: 200px;">

                        {!! $blog->message !!}
                        <button type="button" class="btn btn-default btn-xs" onclick="socialShare('eventshare', 'css5', '{{ $blog->subject }}', '{{ $blog->id }}')"><i class="fa fa-share"></i> Share</button>
                        <a type="button" class="btn btn-success btn-xs" href='/admin/css5edit/{{ $blog->id }}'><i class="fa fa-edit"></i> Edit</a>
                        <button type="button" class="btn btn-danger btn-xs" onclick="deletePost('{{ $blog->id }}', 'css5')"><i class="fa fa-trash"></i> Delete</button>

                        <button type="button" class="btn btn-primary btn-xs" onclick="likeCss5('{{ $blog->id }}')"><i class="fa fa-thumbs-o-up"></i> Like</button>
                        <span class="pull-right text-muted"><b id="likey{{ $blog->id }}">{{ $blog->likes }}</b> likes - <b>@if($commentcount = \App\CareerstaterSeriesComment::where('blog_id', $blog->id)->count()) {{ $commentcount }} @else 0 @endif</b> comments</span>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer box-comments" style="height: 300px; overflow-y: auto;">
                            @if($comment = \App\CareerstaterSeriesComment::where('blog_id', $blog->id)->orderBy('created_at', 'DESC')->get())

                                @if (count($comment) > 0)

                                    @foreach ($comment as $item)
                                        <div class="box-comment">
                                        <!-- User image -->
                                        <img class="img-circle img-sm" src="https://res.cloudinary.com/pearlsea-advisory/image/upload/v1600995902/careerguild/blogpost/7ca25224848822ec24b3c6c8351481cd_kjzfdg.gif" alt="User Image">

                                        <div class="comment-text">
                                            <span class="username">
                                                {{ $item->name }}
                                                <span class="text-muted pull-right">{{ date('h:i A', strtotime($item->created_at)) }} <small>{{ date('d/M/Y', strtotime($item->created_at)) }}</small> </span>
                                            </span><!-- /.username -->
                                                {!! $item->message !!}
                                        </div>
                                        <!-- /.comment-text -->
                                    </div>
                                    <!-- /.box-comment -->
                                    @endforeach

                                @else

                                @endif

                            @endif

                        </div>
                        <!-- /.box-footer -->
                        <div class="box-footer">
                        <form action="{{ route('css5comment') }}" method="post">
                            @csrf
                            <input type="hidden" name="blog_id" value="{{ $blog->id }}">
                            <input type="hidden" name="name" value="{{ session('name') }}">
                            <img class="img-responsive img-circle img-sm" src="https://res.cloudinary.com/pearlsea-advisory/image/upload/v1600995902/careerguild/blogpost/7ca25224848822ec24b3c6c8351481cd_kjzfdg.gif" alt="Alt Text">
                            <!-- .img-push is used to add margin to elements next to floating images -->
                            <div class="img-push">
                            <input type="text" class="form-control input-sm" name="message" placeholder="Press enter to post comment">
                            </div>
                        </form>
                        </div>
                        <!-- /.box-footer -->
                    </div>
                    <!-- /.box -->
                    </div>

                    @endforeach
                @else
                    <div class="col-md-12">
                        <center>No css5 post yet</center>
                    </div>
                @endif


            </div>

            {{-- NAv LINK --}}

            <center>

                <nav aria-label="...">
                    <ul class="pagination pagination-lg">
                        <li class="page-item">
                            {{ $data[0]['blogdata']->links() }}
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
