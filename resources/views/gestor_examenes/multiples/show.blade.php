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
        <div class="col-md-14 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">GESTOR MATERIA</div>

                <div class="panel-body">
<div class="container">
{{-- */$id_materia=DB::table('preguntas')->where('id', $id_pregunta)->first();
                   $id_materia=$id_materia->examen_id;    
             /* --}}
             {{-- */$id_test=DB::table('examens')->where('id', $id_materia)->first();
                   $id_test=$id_test->id_cursos;    
             /* --}}
<!--Comienza path para Ver Respuestas a preguntas de seleccion multiples.
    -->
    <div class="col-md-14 col-md-offset-0 borderpath" style="width: 54%;margin-left: 0%;">
                    <ol class="breadcrumb">
                    <li><a href="{{ url('admin/curso_dicta/'.$id_test.'/vista_contenido_curso') }}"><i class="fa fa-dashboard"></i>Principal</a></li>
                    <li><a href="{{ url('gestor_examenes/'.$id_test.'/examen') }}"><i class="fa fa-dashboard"></i>Mis Exámenes</a></li>
                    <li><a href="{{url('/gestor_examenes/pregunta/'.$id_materia.'/index')}}"><i class="fa fa-dashboard"></i>lista de Preguntas</a></li>
                    <li><a href="{{url('/gestor_examenes/multiples/'.$id_pregunta.'/index')}}"><i class="fa fa-dashboard"></i>Respuestas Multiples</a></li>
                    <li><a href="#"></i>Respuesta</a></li>
                    </ol>
        </div>
    <!--Termina path Ver EDITAR Respuestas a preguntas de seleccion multiples.  
    -->
    <h1>Multiple</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tbody>
                <tr>
                    <th>ID.</th><td>{{ $multiple->id }}</td>
                </tr>
                <tr><th> {{ trans('multiples.respuesta') }} </th><td> {{ $multiple->respuesta }} </td></tr><tr><th> {{ trans('multiples.correcta') }} </th><td> {{ $multiple->correcta }} </td></tr>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="2">
                           <a href="{{ url('/gestor_examenes/multiples/' . $multiple->id . '/'.$id_pregunta.'/edit') }}" class="btn btn-primary btn-xs" title="Edit Multiple"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                       <a href="{{ url('/gestor_examenes/multiples/' . $multiple->id . '/'.$id_pregunta.'/delete') }}" class="btn btn-danger btn-xs" title="Delete Multiple" onclick="myfuncion()"><span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Multiple" /></a>
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>

</div>
  </div>
            </div>
        </div>
    </div>
</div>
@endsection