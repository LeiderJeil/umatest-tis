@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Falsoverdadero <a href="{{ url('/gestor_cursos/falsoverdadero/create') }}" class="btn btn-primary btn-xs" title="Add New Falsoverdadero"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th><th> {{ trans('falsoverdadero.respuesta') }} </th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($falsoverdadero as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td>{{ $item->respuesta }}</td>
                    <td>
                        <a href="{{ url('/gestor_cursos/falsoverdadero/' . $item->id) }}" class="btn btn-success btn-xs" title="View Falsoverdadero"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                        <a href="{{ url('/gestor_cursos/falsoverdadero/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Falsoverdadero"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/gestor_cursos/falsoverdadero', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Falsoverdadero" />', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Falsoverdadero',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ));!!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination"> {!! $falsoverdadero->render() !!} </div>
    </div>

</div>
@endsection
