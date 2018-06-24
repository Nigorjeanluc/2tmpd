@extends('layouts.dashboard')

@section('title', 'Create an album')

@section('styles')
    {!! Html::style('/css/parsley.min.css') !!}
    {!! Html::style('/css/select2.min.css') !!}
    <script src="/js/tiny/tinymce.min.js"></script>

    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: 'link lists code image imagetools',
            menubar: false,
              /*menu: {
                  view: {title: 'Edit', items: 'cut, copy, paste'}
              }*/
              /*toolbar: 'undo redo | cut copy paste'*/
        });
    </script>
@endsection

@section('pageview')
      <h1>
        Dashboard
        <small>Add albums</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Home</a></li>
      </ol>
@endsection

@section('content')
          <div class="row">
            <div class="col-md-12">
              @if (Session::has('success'))
                  <div class="alert alert-success" role="alert">
                      <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                      <strong>Success:</strong> {{ Session::get('success') }}
                  </div>
    
              @endif
    
              @if (count($errors) > 0)
    
                <div class="alert alert-danger" role="alert">
                      <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                      <strong>Errors:</strong>
                      <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                      </ul>
                  </div> 
    
              @endif
            </div>
            <div class="col-md-10 col-md-offset-1">
              <div class="box box-warning">
                <div class="box-body">
                {!! Form::model($post, ['route' => ['albums.update', $post->id], 'method' => 'PUT', 'files' => true]) !!}
                        <!-- text input -->
                    <div class="form-group">
                      {{ Form::label('name', 'Name of the album') }}
                      {{ Form::text('name',null,['class' => 'form-control', /*'required' => ''*/'data-parsley-required' => 'true']) }}
                    </div>
    
                    
                    <div class="form-group">
                            {{ Form::label('cover', 'Upload the album cover:') }}
                            {{ Form::file('cover') }}
                    </div>
    
                    <div class="form-group">
                      {{ Form::label('content') }}
                      {{ Form::textarea('content', null,['class' => 'form-control','rows' => '10'/*, 'required' => ''*/]) }}
                    </div>
    
                    {{ Form::submit('Edit the Album Post', ['class' => 'btn btn-success btn-lg btn-block'])}}
    
                  {!! Form::close() !!}
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
            </div>
            <!-- ./col -->
          </div>
          <!-- /.row -->
@endsection


@section('scripts')

{!! Html::script('/js/parsley.min.js') !!}
{!! Html::script('/js/select2.full.min.js') !!}

<script type="text/javascript">
  $('.select2-multi').select2();
</script>

@endsection
