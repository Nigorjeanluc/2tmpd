@extends('home')

@section('title', 'All albums')

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
      <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">All images</h3>
  
                <div class="box-tools">
                  {!! $posts->links() !!}
                </div>
            </div>
              <!-- /.box-header -->
            <div class="box-body no-padding">
                <table class="table">
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Title</th>
                    <th>Detail</th>
                    <th>Dimensions</th>
                    <th style="width: 150px">Created at</th>
                    <th></th>
                  </tr>
                  @foreach ($posts as $post)
                    <tr>
                      <th>{{ $post->id }}</th>
                      <td><b>{{ ucfirst(substr($post->title, 0, 30)) }}{{ ucfirst(strlen($post->title) > 30 ? "..." : "") }}</b></td>
                      <td>{{ substr(strip_tags($post->detail), 0, 50) }}{{ strlen($post->detail) > 50 ? "..." : "" }}</td>
                      <td>{{ ucfirst(substr($post->scale, 0, 30)) }}{{ ucfirst(strlen($post->scale) > 30 ? "..." : "")}}</td>
                      <td>{{ $post->created_at }}</td>
                      <td>
                        <a style="color:#fff" href="{{ route('imgs.show', $post->id) }}" class="btn btn-info btn-flat btn-sm">View</a> <a style="color:#fff" href="{{ route('imgs.edit', $post->id )}}" class="btn btn-success btn-flat btn-sm">Edit</a>
                      </td>
                    </tr>
                  @endforeach
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
      </div>
      <!-- ./col -->
    </div>
    <!-- /.row -->
@endsection