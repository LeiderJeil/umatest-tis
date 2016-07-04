@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Multiples <a href="{{ url('/gestor_cursos/multiples/create') }}" class="btn btn-primary btn-xs" title="Add New Multiple"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th><th> {{ trans('multiples.respuesta') }} </th><th> {{ trans('multiples.correcta') }} </th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($multiples as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td>{{ $item->respuesta }}</td><td>{{ $item->correcta }}</td>
                    <td>
                        <a href="{{ url('/gestor_cursos/multiples/' . $item->id) }}" class="btn btn-success btn-xs" title="View Multiple"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                        <a href="{{ url('/gestor_cursos/multiples/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Multiple"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/gestor_cursos/multiples', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Multiple" />', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Multiple',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ));!!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination"> {!! $multiples->render() !!} </div>
    </div>

</div>
@endsection
