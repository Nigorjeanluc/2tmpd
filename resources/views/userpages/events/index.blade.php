@extends('home')

@section('title', 'All events')

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
                <h3 class="box-title">All events</h3>
  
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
                    <th>Content</th>
                    <th style="width: 150px">Created at</th>
                    <th></th>
                  </tr>
                  @foreach ($posts as $post)
                    <tr>
                      <th>{{ $post->id }}</th>
                      <td><b>{{ substr($post->title, 0, 30) }}{{ strlen($post->title) > 30 ? "..." : "" }}</b></td>
                      <td>{{ substr(strip_tags($post->content), 0, 50) }}{{ strlen($post->content) > 50 ? "..." : "" }}</td>
                      <td>{{ $post->created_at }}</td>
                      <td>
                        <a style="color:#fff" href="{{ route('events.show', $post->id) }}" class="btn btn-info btn-flat btn-sm">View</a> <a style="color:#fff" href="{{ route('events.edit', $post->id )}}" class="btn btn-success btn-flat btn-sm">Edit</a>
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