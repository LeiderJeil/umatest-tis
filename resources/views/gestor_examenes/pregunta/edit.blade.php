@extends('app')

@section('htmlheader_title')
   Home
@endsection


@section('main-content')
<div class="container">
    <div class="row">
    <!--Comienza path de contenido del curso.
    -->
    <div class="col-md-14 col-md-offset-0 borderpath" style="width: 34%;margin-left: 0%;">
                    <ol class="breadcrumb">
                    <li><a href="{{ url('/home') }}"><i class="fa fa-dashboard"></i>Gestor Materias</a></li>
                    <li><a href="{{ url('/admin/curso_dicta') }}"><i class="fa fa-dashboard"></i>Materias</a></li>
                    <li><a href="#"></i>Contenido del Curso</a></li>
                    </ol>
        </div>
    <!--Termina path de las Listas de contenido del curso.
    -->
        <div class="col-md-14 col-md-offset-0" style="padding-top:50px;">
            <div class="panel panel-default">
                <div class="panel-heading">GESTOR MATERIA</div>

                <div class="panel-body">

<div class="container">
{{-- */$id_test=DB::table('examens')->where('id', $id_examen)->first();
                    $id_test=$id_test->id_cursos;
             /* --}}
    <!--Comienza path de crear preguntas para examen.
    -->
    <div class="col-md-14 col-md-offset-0 borderpath" style="width: 42%;margin-left: 0%;">
                    <ol class="breadcrumb">
                    <li><a href="{{ url('admin/curso_dicta/'.$id_test.'/vista_contenido_curso') }}"><i class="fa fa-dashboard"></i>Principal</a></li>
                    <li><a href="{{ url('gestor_examenes/'.$id_test.'/examen') }}"><i class="fa fa-dashboard"></i>Mis Exámenes</a></li>
                    <li><a href="{{url('/gestor_examenes/pregunta/'.$id_examen.'/index')}}"><i class="fa fa-dashboard"></i>lista de Preguntas</a></li>
                    <li><a href="#"></i>Editar Pregunta</a></li>
                    </ol>
        </div>
    <!--Termina path de crear preguntas para examen.
    -->

    <h1 style="padding-top: 20px;">Editar Pregunta</h1>

    {!! Form::model($preguntum, [
        'method' => 'PATCH',
        'url' => ['/gestor_examenes/pregunta', $preguntum->id],
        'class' => 'form-horizontal'
    ]) !!}
    
       @if($mensaje_create!="")
        <ul class="alert alert-danger"><li>{{ $mensaje_create }}</li></ul>
        @endif
                <div class="form-group {{ $errors->has('nombre_pregunta') ? 'has-error' : ''}}">
                {!! Form::label('nombre_pregunta', trans('pregunta.nombre_pregunta'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('nombre_pregunta', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('nombre_pregunta', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('puntaje_pregunta') ? 'has-error' : ''}}">
                {!! Form::label('puntaje_pregunta', trans('pregunta.puntaje_pregunta'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('puntaje_pregunta', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    {!! $errors->first('puntaje_pregunta', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            
              <div class="form-group {{ $errors->has('examen_id') ? 'has-error' : ''}}">
                
                <div class="col-sm-6">
                    {!! Form::hidden('examen_id',$id_examen, ['class' => 'form-control' , 'required' => 'required']) !!}
                    {!! $errors->first('examen_id', '<p class="help-block">:message</p>') !!}
                </div>
                </div>




    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-3">
            {!! Form::submit('Actualizar', ['class' => 'btn btn-primary form-control']) !!}
        </div>
    </div>
    {!! Form::close() !!}

    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

</div>
  </div>
            </div>
        </div>
    </div>
</div>
@endsection