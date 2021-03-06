@extends('app')
<meta http-equiv="refresh" content="60">
@section('htmlheader_title')
   CURSOS
@endsection
@section('main-content')
<div class="container">
    <div class="row">
        <div class="col-md-14 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">GESTOR FORO</div>
                  <div class="panel-body">



<div class="container">

    <h1>Foro <a href="{{ url('gestor_foros/'.$id_curso.'/crear/foro') }}" class="btn btn-primary btn-xs" title="Add New Foro"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
              
            </thead>
            <tbody>


            {{-- */$x=0;/* --}}
            @foreach($foro as $item)
                {{-- */$x++;/* --}}

             {{-- */
              
                 $cantidad_comentarios=0;
                  for($i=0; $i < count($comentarios); $i++){
                      if($item->id_foro==$comentarios[$i]->id_foro){
                          
                           $cantidad_comentarios++;
                         
                      }
                }
                         
              /* --}}

          
                <tr>
                 <td bgcolor="#b0e0e6">
               

                 <FONT FACE="arial" SIZE= 5px COLOR=red>  {{ $item->titulo }}</FONT> 
                  <br> Publicado por <FONT FACE="arial" SIZE= 3px COLOR=#4169e1>  {{ $item->name }} {{$item->apellido}}</FONT>  el
                  <FONT FACE="arial" SIZE=2 COLOR=#daa520> {{ $item->fecha }} </FONT>

                   </td>
                   
                          {{-- */$id_user_actual=Auth::id(); /* --}}

                   @if($item->id_user==$id_user_actual)
                    <td bgcolor="#b0e0e6">
                        <a href="{{ url('/foro/' . $item->id_foro) }}" class="btn btn-success btn-xs" title="View Foro"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                        <a href="{{ url('/foro/' . $item->id_foro . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Foro"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/foro', $item->id_foro],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Foro" />', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Foro',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ));!!}
                        {!! Form::close() !!}
                    </td>
                    @else
                    <td bgcolor="#b0e0e6">
                    </td>
                    @endif

                </tr>

                 <tr>
                      <td bgcolor="#ffe4e1">{{ $item->mensaje }}</td>
                    <td bgcolor="#ffe4e1">{{ $item->archivo }}</td> 
                 </tr>

                 <tr>
                    

                     <td bgcolor="#cccccc"> 
                     <a href="{{ url('gestor_foros/'.$id_curso.'/crear/'.$item->id_foro.'/comentario') }}">
                     <i class="fa fa-comments" style="font-size:18px;color:#3399ff"></i>
                      {{ $cantidad_comentarios }} comentarios</a>

                      </td>

                     <td bgcolor="#cccccc">
                      <a href="{{ url('gestor_foros/'.$id_curso.'/crear/'.$item->id_foro.'/comentario') }}"><i class="fa fa-comment-o" style="font-size:18px;color:#3399ff"></i> Comentar </a>
                      </td>
                 </tr>
                 <tr bgcolor="#333333">
                    
                 </tr>


            @endforeach
            </tbody>
        </table>
        
    </div>
</div>
              </div>
            </div>
        </div>
    </div>
</div>
@endsection
