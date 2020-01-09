@extends('plantilla')

@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Artículos</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Inicio</a></li>
            <li class="breadcrumb-item active">Artículos</li>
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
              <p class="card-title font-weight-bold">Artículos</p>
            </div>
            <div class="card-body">

              @foreach ($articulos as $key => $value)
              <ul>
                <li><h4>{{ $value['titulo'] }}</h4></li>
                <li><p>{{ $value->ver_categoria['titulo'] }}</p></li>
              </ul>
              {{-- expr --}}
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