@extends('home')

@section('title', 'All messages')

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
                <h3 class="box-title">All Messages</h3>
  
                <div class="box-tools">
                  {!! $posts->links() !!}
                </div>
            </div>
              <!-- /.box-header -->
            <div class="box-body no-padding">
                <table class="table">
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Message</th>
                    <th style="width: 150px">Created at</th>
                    <th></th>
                  </tr>
                  @foreach ($posts as $post)
                    <tr>
                      <th>{{ $post->id }}</th>
                      <td><b>{{ ucfirst(substr($post->name, 0, 30)) }}{{ ucfirst(strlen($post->name) > 30 ? "..." : "") }}</b></td>
                      <td>{{ ucfirst(substr($post->email, 0, 30)) }}{{ ucfirst(strlen($post->email) > 30 ? "..." : "") }}</td>
                      <td>{{ ucfirst(substr($post->phone, 0, 30)) }}{{ ucfirst(strlen($post->phone) > 30 ? "..." : "")}}</td>
                      <td>{{ substr(strip_tags($post->message), 0, 50) }}{{ strlen($post->message) > 50 ? "..." : "" }}</td>
                      <td>{{$post->created_at }}</td>
                      <td>
                        <a style="color:#fff" href="{{ route('msg.show', $post->id) }}" class="btn btn-info btn-flat btn-sm">View</a> <a style="color:#fff" href="{{ route('msg.destroy', $post->id )}}" class="btn btn-danger btn-flat btn-sm">Delete</a>
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