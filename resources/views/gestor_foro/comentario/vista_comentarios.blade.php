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

    <h2>Comentarios </h2>

   
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
              
            </thead>


 <tbody>


 {{-- */$id_user_actual=Auth::id(); /* --}}
 @foreach($foro as $item)

                <tr>
                 <td bgcolor="#b0e0e6">
                <h4 style="font-size: 24px; color: red;">{{ $item->titulo }} </h4>


                  <br> Publicado por <FONT FACE="arial" SIZE= 3px COLOR=#4169e1>  {{ $item->name }} {{$item->apellido  }}</FONT>  el
                  <FONT FACE="arial" SIZE=2 COLOR=#daa520> {{ $item->fecha }} </FONT>

                   </td>
                   
                     @if($item->id_user==$id_user_actual)    
                    <td bgcolor="#b0e0e6">
                        <a href="" class="btn btn-success btn-xs" title="View Foro"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                        <a href="" class="btn btn-primary btn-xs" title="Edit Foro"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
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
                    @else <td bgcolor="#b0e0e6"> </td> 
                    @endif

                </tr>

                 <tr>
                      <td bgcolor="#ffe4e1">{{ $item->mensaje }}</td>
                    <td bgcolor="#ffe4e1">{{ $item->archivo }}</td> 
                 </tr>
                 

               {{-- */
                $cantidad_comentarios=count($comentarios);
               
               /* --}}

                 <tr>
                     <td bgcolor="#cccccc" >                      
                     <i i class="fa fa-comments" style="font-size:18px;color:#3399ff"> {{ $cantidad_comentarios }} comentarios </i>
                      </td>
                    <td bgcolor="#cccccc"></td>
                 </tr>
                 <tr bgcolor="#333333">
                    
                 </tr>

            @endforeach

            @foreach($comentarios as $item)


                  <tr>
                  <td bgcolor="#b6fcd5">
               
                  <FONT FACE="arial" SIZE= 3px COLOR=#4169e1>  {{ $item->name }} {{$item->apellido}}</FONT>  (
                  <FONT FACE="arial" SIZE=2 COLOR=#daa520> {{ $item->fecha }} </FONT>)

                   </td>
                   
                  

                   @if($item->id_user==$id_user_actual)



                       <td bgcolor="#b6fcd5">
                        <a href="" class="btn btn-success btn-xs" title="View Comentario"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                        <a href="" class="btn btn-primary btn-xs" title="Edit Comentario"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/gestor_foros/comentario', $item->id_coment],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Comentario" />', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Comentario',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ));!!}
                        {!! Form::close() !!}
                    </td>
                    @else
                     <td bgcolor="#b6fcd5"> </td>
                    @endif

                </tr>

                 <tr>
                      <td bgcolor="#f5f5dc">{{ $item->mensaje }}</td>
                      <td bgcolor="#f5f5dc"></td>
                      
                 </tr>

                 <!--tr>
                     <td bgcolor="#cccccc" style="font-size: 14px; color: #4169e1;"> {{ $cantidad_comentarios }} comentarios</td>
                     <td bgcolor="#cccccc">
                      <li><a href=""><i class="fa fa-file-text-o"></i> Comentar </a></li> 
                      </td>
                 </tr-->
                 <tr bgcolor="#f5f5dc">
                    
                 </tr>

            @endforeach

 </tbody>

  
 {!! Form::open(['url' => '/gestor_foros/comentario', 'class' => 'form-horizontal']) !!}

<tr>
<td bgcolor="#b0e0e6">

                          <div class="form-group {{ $errors->has('mensaje') ? 'has-error' : ''}}">
                {!! Form::label('mensaje', trans('comentario.mensaje'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('mensaje',null, ['class' => 'form-control', 'placeholder' => 'Escribe un comentario...','required' => 'required']) !!}
                    {!! $errors->first('mensaje', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
 

              <div class="form-group {{ $errors->has('id_curso') ? 'has-error' : ''}}">
                
                <div class="col-sm-6">
                    {!! Form::hidden('id_curso',$id_curso, ['class' => 'form-control' , 'required' => 'required']) !!}
                    {!! $errors->first('id_curso', '<p class="help-block">:message</p>') !!}
                </div>
                </div>

              <div class="form-group {{ $errors->has('id_curso') ? 'has-error' : ''}}">
                
                <div class="col-sm-6">
                    {!! Form::hidden('id_foro',$id_foro, ['class' => 'form-control' , 'required' => 'required']) !!}
                    {!! $errors->first('id_foro', '<p class="help-block">:message</p>') !!}
                </div>
                </div>
</td>


<td bgcolor="#b0e0e6" WIDTH=100>

      
            {!! Form::submit('comentar', ['class' => 'btn btn-warning']) !!}
       
    


    {!! Form::close() !!}
</td>
    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

 </tr>

 </table>




           
     
        
    </div>
</div>
              </div>
            </div>
        </div>
    </div>
</div>
@endsection
