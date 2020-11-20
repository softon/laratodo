@extends('app')

@section('content')
<form action="">
    <div class="todo-table">
            <h1>My Todo's</h1>
            <h6>{{ $status }}</h6>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="btn-holder">
                <a href="{{ url('/add') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Add New Todo</a>
                
                
            </div>
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Todo Title</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($todos as $todo)
                        <tr class="
                            @if ($todo->status)
                                complete
                            @endif
                            "
                        >
                            <td>{{ $todo->id }}</td>
                            <td>{{ $todo->title }}</td>
                            @if ($todo->status)
                                <td>Complete</td>
                            @else
                                <td>Pending</td>
                            @endif
                            <td>
                                <a href="{{ url('/complete/'.$todo->id) }}"  class="btn btn-purple" title="Complete"><i class="fa fa-thumbs-up"></i></a>
                                <a href="{{ url('/pending/'.$todo->id) }}"  class="btn btn-orange" title="Pending"><i class="fa fa-thumbs-down"></i></a>
                                <a href="{{ url('/edit/'.$todo->id) }}" class="btn btn-secondary" title="Edit"><i class="fa fa-edit"></i></a>
                                <a href="{{ url('/delete/'.$todo->id) }}" title="Delete" class="btn btn-danger"><i class="fa fa-times"></i></a>
                            </td>
                        </tr>
                    @endforeach
                   
                </tbody>
            </table>
        </div>
    </form>
@endsection