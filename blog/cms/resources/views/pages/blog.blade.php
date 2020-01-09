@extends('plantilla')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Blog</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ substr(url(''), 0, 11) }}">Inicio</a></li>
            <li class="breadcrumb-item active">Blog</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <p class="card-title font-weight-bold">Titulo</p>
            </div>
            <div class="card-body">
                  
                  @foreach ($blog  as $key => $value)
                    {{$value}}
                  @endforeach
            </div>
            <div class="card-footer">

            </div>
          </div>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
<!-- /.content -->
</div>
@endsection