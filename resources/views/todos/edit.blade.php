@extends('app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-default">
                    <div class="panel-heading">Todo List</div>
                    <div class="panel-body">
                        <form role="form" method="POST" action="{{ url('/todos/' . $todo->id) }}">
                            {{ csrf_field() }}
                            {{ method_field('put') }}

                            <div class="form-group">
                                <label class="control-label">Name</label>
                                <input type="text" name="name" class="form-control" value="{{ $todo->name }}">
                            </div>

                            <div class="form-group">
                                <label class="control-label">Is Done</label>
                                <div class="radio">
                                    <label>
                                        <input type="radio" value="1" name="is_done"> Done
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" value="0" name="is_done"> Not Done
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Update Todo</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection