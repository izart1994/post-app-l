@extends('layouts.app')

@section('content')

    <div class="jumbotron">
        @if ($createdBy != "")
            <h1>Your Own {{$title}}</h1>
            @if(count($createddata)>0)
                <div>
                    <table id="dt" class="table table-striped table-hover table-bordered">
                        <thead>
                            <tr>
                                <th width="5%"><center>No</center></th>
                                <th width="65%">Title</th>
                                <th width="17%"><center>Picture</center></th>
                                <th width="13%"><center>Action</center></th>
                            </tr>
                        </thead>
                        <?php $num = 1; ?>
                        <tbody>
                            @foreach($createddata as $post)
                                <tr>
                                    <td><center>{{$num++}}</center></td>
                                    <td>{{$post->title}}</td>
                                    <td>
                                        <img style="width:100%" src="/storage/cover_images/{{$post->cover_image}}">
                                    </td>
                                    <td class="row justify-content-center align-items-center">
                                        <a href="/posts/{{$post->id}}/edit" class="btn mr-1">Edit</a>
                                        {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                                            {{Form::hidden('_method', 'DELETE')}}
                                            {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                                        {!!Form::close()!!}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <p>You have no posts</p>
            @endif
        @else
            <h1>{{$title}}</h1>
            <ul class="list-group">
                @if (count($posts)>0)
                    @foreach ($posts as $post)
                        <a href="/posts/{{$post->id}}" class="list-group-item list-group-item-action flex-column align-items-start">
                            <div class="well">
                                <div class="row">
                                    <div class="col-md-2 col-sm-2">
                                        <img style="width:100%;" src="/storage/cover_images/{{$post->cover_image}}">
                                    </div>
                                    <div class="col-md-10 col-sm-10">
                                        <div class="d-flex w-100 justify-content-between">
                                            <h5 class="mb-1">{{$post->title}}</h5>
                                            <small>created at: {{$post->created_at}}</small>
                                        </div>
                                        <div class="align-self-end">
                                            <p class="mb-1">created by: {{$post->user->name}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <br>
                    @endforeach
                    <hr>
                    {{$posts->links()}}
                @else
                    <li class="list-group-item">No item found</li>
                @endif
            </ul>
        @endif
    </div>
@endsection

<script>
    $(document).ready(function () {
        $('#dt').DataTable();
        $('.dataTables_length').addClass('bs-select');
    });
</script>
