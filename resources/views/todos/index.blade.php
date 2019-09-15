@extends('app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Todo List</div>
                <div class="panel-body">
                    {{ csrf_field() }}
                    <input type="text" name="name" class="form-control" id="todo_input">
                    <a href="javascript:;" class="btn btn-primary" id="add_todo">Add todo</a>

                    <br>
                    <br>
                    <br>

                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <th>Name</th>
                                <th>Is Done</th>
                                <th>Action</th>
                            </th>

                            @if(! count($todos))
                                <tr>
                                    <td colspan="3">No todo</td>
                                </tr>
                            @endif
                            @foreach($todos as $todo)
                                <tr data-id="{{$todo->id}}">
                                    <td><input type="checkbox" value="{{$todo->id}}" class="check_id"> {{ $todo->name }}</td>
                                    <td>{{ $todo->is_done ? 'Done' : 'Not Done' }}</td>
                                    <td>
                                        <a class="btn btn-warning" href="{{ url('todos/'.$todo->id.'/edit') }}">Edit</a>
                                        <a class="btn btn-danger btn_delete" href="javascript:;" data-id="{{$todo->id}}">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                        <input type="hidden" id="ids" value="">
                        <a class="btn btn-danger" id="btn_del_sel" href="javascript:;">Delete Selected</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection