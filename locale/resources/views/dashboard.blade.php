@extends('layouts.master')
@section('main-content')
  <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3>{{ $notActive }}</h3>

              <p>Not Activated</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <!--<a href="#" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i> View All</a>-->
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{ $active }}</h3>

              <p>Activated</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <!--<a href="#" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i> View All</a>-->
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3>{{ $independentInstall }}</h3>

              <p>Inpendent Install</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <!--<a href="#" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i> View All</a>-->
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3>{{ $appRemove }}</h3>

              <p>App Remove</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <!--<a href="#" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i> View All</a>-->
          </div>
        </div>
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{ count($bkash) }}</h3>

              <p>Total Request</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <!--<a href="#" class="small-box-footer"><i class="fa fa-arrow-circle-right"></i> View All</a>-->
          </div>
        </div>
      </div>

      <div class="row">
        <section class="col-lg-12" style="margin-top:10px;">
          <div class="box box-primary">
            <div class="box-header">
              <i class="ion ion-clipboard"></i>
    
              <h3 class="box-title">All <b>(List)</b></h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <div class="box-body table-responsive" style="overflow: auto;">
              <table class="table datatable table-bordered table-hover">
                <thead>
                  <tr>
                    <th>SL</th>
                    <th>ID</th>
                    <th>IMEI 1</th>
                    <th>IMEI 2</th>
                    <th>MAC</th>
                    <th>ANDROID ID</th>
                    <th>SIM 1</th>
                    <th>SIM 2</th>
                    <th>MODEL</th>
                    <th>ACTIVATED</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $sl=1; ?>
                  @foreach($bkash as $value)
                    <tr>
                      <td>{{ $sl++ }}</td>
                      <td>{{ $value->id }}</td>
                      <td>{{ $value->IMEI1 }}</td>
                      <td>{{ $value->IMEI2 }}</td>
                      <td>{{ $value->MAC }}</td>
                      <td>{{ $value->ANDROID_ID }}</td>
                      <td>{{ $value->sim1 }}</td>
                      <td>{{ $value->sim2 }}</td>
                      <td>{{ $value->Model }}</td>
                      <!--<td>@if($value->Activated==1) Activated <button type="button" class="btn btn-success btn-circle"><i class="glyphicon glyphicon-ok"></i></button> @else Not Activated @endif</td>-->
                      <td>@if($value->Activated==0) Not Activated @elseif($value->Activated==1) Activated @elseif($value->Activated==2) Independent Install @elseif($value->Activated==3) App Removed @endif</td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </section>
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
@endsection