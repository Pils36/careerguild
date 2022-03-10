@extends('layouts.dashboard')

@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Data Tables
        <small>advanced tables</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Data tables</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">All Subscribers</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Email</th>
                  <th>Status</th>
                  <th style="text-align: center" colspan="2">Action</th>
                </tr>
                </thead>
                <tbody>
                    @if (count($data[0]['subscriber']) > 0)
                    <?php $i = 1;?>
                        @foreach ($data[0]['subscriber'] as $data)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $data->email }}</td>
                                 <td style="{{ ($data->status == 1) ? 'color:green; font-weight:bold;' : 'color:red; font-weight:bold;' }}">{{ ($data->status == 1) ? 'ACTIVE' : 'INACTIVE' }}</td>
                                <td align="center">
                                    <form action="{{ route('unsubscribe') }}" method="post" id="form_delete">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $data->id }}">
                                        <button type="button" onclick="deleteTeam()" class="btn {{ ($data->status == 1) ? 'btn-danger' : 'btn-primary' }}"><i class="fa fa-trash"></i> {{ ($data->status == 1) ? 'Unsubscribe' : 'Subscribe' }}</button>

                                    </form>

                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="4" align="center">No team member created yet</td>
                        </tr>
                    @endif



                </tbody>

              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  @endsection
