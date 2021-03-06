@extends('home')

@section('title', 'Show '. $post->title)

@section('content')
    <div class="row">
      <div class="col-md-12">
          @if (Session::has('success'))

              <div class="alert alert-info" role="alert">
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
      <div class="col-md-8">
        <!-- Box Comment -->
        <div class="box box-widget">
          <!-- /.box-header -->
          <div class="box-body">
            <h3 class="text-center">{{ $post->title }}</h3>
            <img class="img-responsive pad" src="{{asset('images/'. $post->img) }}" alt="No Picture Available">

            <p>{!! $post->detail !!}</p>
            <div style="text-align: center;font-size:1.2em"><span class="description">Posted on - {{ date('M j, Y h:i A', strtotime($post->created_at)) }}</span></div>
            <!--<button type="button" class="btn btn-default btn-xs"><i class="fa fa-share"></i> Share</button>
            <button type="button" class="btn btn-default btn-xs"><i class="fa fa-thumbs-o-up"></i> Like</button>
            <span class="pull-right text-muted">127 likes - 3 comments</span>-->
            <hr>
          </div>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-md-4">
          <div class="well">
              <dl class="dl-horizontal">
                  <label>Created At: Date</label>
                  <p>{{ date('M j, Y h:ia', strtotime($post->created_at)) }}</p>
              </dl>

              <dl class="dl-horizontal">
                  <label>Last Updated: Date</label>
                  <p>{{ date('M j, Y h:ia', strtotime($post->updated_at)) }}</p>
              </dl>

              <hr>

              <div class="row">
                  <div class="col-sm-6">
                      {!! Html::linkRoute('imgs.edit', 'Edit', array($post->id ),array('class' => 'btn btn-primary btn-block')) !!}
                  </div>

                  <div class="col-sm-6">
                      {!! Form::open(['route' =>['imgs.destroy', $post->id], 'method' => 'DELETE']) !!}

                      {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-block']) !!}
                      
                      {!! Form::close() !!}
                  </div>
                  <div style="margin-top:10px" class="col-sm-12">
                      {!! Html::linkRoute('imgs.index', '<< See All posts', [],array('class' => 'btn btn-default btn-block')) !!}
                  </div>
              </div>
          </div>
      </div>
      <!-- ./col -->
    </div>
    <!-- /.row -->
@endsection