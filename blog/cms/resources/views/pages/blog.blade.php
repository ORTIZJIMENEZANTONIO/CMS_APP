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
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <p class="card-title font-weight-bold">Titulo</p>
              <button class="btn btn-primary float-right">Guardar</button>
            </div>
            <div class="card-body">
              @foreach ($blog as $key => $value)
              {{--$value--}}
              @endforeach
              <div class="row">
                <!--Textos-->
                <div class="col-12 col-md-7">
                  <div class="card">
                    <div class="card-body">
                      <label>Datos generales</label>
                      <!--Dominio-->
                      <div class="input-group mb-4">
                        <div class="input-group-append">
                          <span class="input-group-text">Dominio</span>
                        </div>
                        <input type="text" class="form-control" name="dominio" value="{{$value['dominio']}}" required>
                      </div>

                       <!--CMS-->
                      <div class="input-group mb-4">
                        <div class="input-group-append">
                          <span class="input-group-text">Url admin</span>
                        </div>
                        <input type="text" class="form-control" name="server" value="{{$value['server']}}" required>
                      </div>

                      <!--Titulo del Blog-->
                      <div class="input-group mb-4">
                        <div class="input-group-append">
                          <span class="input-group-text">Título del Blog</span>
                        </div>
                        <input type="text" class="form-control" name="server" value="{{ $value['titulo'] }}" required/>
                      </div>

                      <!--Descripción-->
                      <div class="input-group mb-4">
                        <div class="input-group-append">
                          <span class="input-group-text">Descripción</span>
                        </div>
                        <textarea class="form-control" rows="5" name="server" required>{{ $value['descripcion'] }}
                        </textarea>
                      </div>      
                    </div>
                  </div>
                  <!--Palabras clave-->
                  <div class="card">
                    <div class="card-body">
                      <div class="form-group mb-3">
                        <div class="row">
                          <div class="col-12">
                            <label>Palabras clave</label>
                          </div>
                          <div class="col-12">
                           @php
                           $etiquetas = json_decode($value['palabras_clave'], true);
                           $palabras_clave = "";
                           foreach($etiquetas as $key => $key_words){
                            $palabras_clave .= $key_words.", ";
                          }
                          @endphp
                          <input class="form-control" type="text" name="palabras_clave" data-role="tagsinput" value=" {{ $palabras_clave }}" required>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!--Agregar Redes sociales -->
                  <div class="card">
                    <div class="card-body">
                      <div class="form-group mb-3">
                        <label>Redes sociales</label>
                        <div class="row">
                          <!--Icono-->
                          <div class="col-4 col-md-5">
                            <div class="input-group mb-3">
                              <div class="input-group-append">
                                <span class="input-group-text">Icono</span>
                              </div>
                              <select class="form-control" id="red_icono">
                                <option value="fab fa-facebook-f">
                                  Facebook
                                </option>
                                <option value="fab fa-youtube">
                                  Youtube
                                </option>
                                <option value="fab fa-twitter">
                                  Twitter
                                </option>
                                <option value="fab fa-instagram">
                                  Instagram
                                </option>
                              </select>
                            </div>       
                          </div>
                          <!--Url-->
                          <div class="col-4 col-md-5">
                            <div class="input-group mb-3">
                              <div class="input-group-append">
                                <span class="input-group-text">URL</span>
                              </div>
                              <input type="text" class="form-control" id="red_url">
                            </div>
                          </div>
                          <!--Botón-->
                          <div class="col-4 col-md-2">
                            <div class="input-group mb-3">
                              <button class="btn btn-primary">Agregar</button>
                            </div>
                          </div>
                        </div>
                      </div>

                      <!--Eliminar Redes sociales -->
                      <div class="row">
                        <div class="col-12">
                          @php
                           $redes_sociales = json_decode($value['redes_sociales']);

                           
                          //echo '<pre>'; print_r(json_decode($value['redes_sociales'])); echo '</pre>';
                          @endphp
                          @foreach ($redes_sociales as $red)
                            <div class="form-group mb-3">
                              <div class="input-group-prepend">
                                <div class="input-group-text" style="background-color: {{ $red->color }}">
                                  <i class="{{ $red->icono }} text-white"></i>
                                </div>
                                <input type="text" class="form-control" name="u" value="{{ $red->url }} ">
                                <div class="input-group-text bg-danger" style="cursor: pointer;">
                                  <i class="rounded-circle bg-danger px-1 text-uppercase h5 m-0">&times;</i>
                                </div>
                              </div>
                            </div>
                          @endforeach
                          
                        </div>
                      </div>

                    
                    </div>
                  </div>
                </div>
                <!--Imágenes-->
                <div class="col-12 col-md-5">
                  <!--Logo-->
                  <div class="card">
                    <div class="card-body">
                      <col class="row">
                        <div class="col-12">
                          <div class="form-group my-2 text-center">
                            <img src=" {{$value['logo']}}" class="img-fluid py-2" alt="{{ $value['titulo'] }}">
                            <div class="btn btn-default btn-file mb-3">
                              <i class="fa fa-paperclip">Adjuntar imagen del logo</i>
                              <input type="file" name="logo">
                            </div>
                            <p class="help-block small">
                              ( Dimensiones: 700px x 200px; 
                              Peso máximo: 2 mb;  
                              Formato: jpg o png )
                            </p>
                          </div>
                        </div>
                      </col>
                    </div>
                  </div>
                  <!--Portada-->
                  <div class="card">
                    <div class="card-body">
                      <col class="row">
                        <div class="col-12">
                          <div class="form-group my-2 text-center">
                            <img src=" {{$value['portada']}}" class="img-fluid py-2" alt="{{ $value['titulo'] }}">
                            <div class="btn btn-default btn-file mb-3">
                              <i class="fa fa-paperclip">Adjuntar imagen del logo</i>
                              <input type="file" name="portada">
                            </div>
                            <p class="help-block small">
                              ( Dimensiones: 700px x 420px; 
                              Peso máximo: 2 mb;  
                              Formato: jpg o png )
                            </p>
                          </div>
                        </div>
                      </col>
                    </div>
                  </div>
                  <!--Logo-->
                  <div class="card">
                    <div class="card-body">
                      <col class="row">
                        <div class="col-12">
                          <div class="form-group my-2 text-center">
                            <div class="col-12">
                              <img src=" {{ $value['icono'] }}" class="img-fluid py-2 rounded-circle" alt="{{ $value['icono'] }}">
                            </div>
                            <div class="btn btn-default btn-file mb-3">
                              <i class="fa fa-paperclip">Adjuntar imagen del logo</i>
                              <input type="file" name="icono">
                            </div>
                            <p class="help-block small">
                              ( Dimensiones: 150px x 150px; 
                              Peso máximo: 2 mb;  
                              Formato: jpg o png )
                            </p>
                          </div>
                        </div>
                      </col>
                    </div>
                  </div>
                </div>
                <!--Sobre mi-->
                <div class="col-12 col-md-7">
                  <div class="card">
                    <div class="card-body">
                      <!--Agregar Redes sociales -->
                      <div class="form-group mb-3">
                        <label>Sobre mi</label>
                        <div class="row">
                          <!--Descripcion-->
                          <div class="col-12">
                            <div class="input-group mb-3">
                              <div class="input-group-append">
                                <span class="input-group-text">Descripción</span>
                              </div>
                              <textarea class="form-control summernote" id="sobre_mi_complete" rows="3" required="true"> {{ $value['sobre_mi'] }}</textarea> 
                            </div>       
                          </div>
                          <!--Semblanza-->
                          <div class="col-12">
                            <div class="input-group mb-3">
                              <div class="input-group-append">
                                <span class="input-group-text">Semblanza</span>
                              </div>
                              <textarea class="form-control summernote" id="red_sobre_mi" rows="10">{{ $value['sobre_mi_completo'] }}</textarea>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
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