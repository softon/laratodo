@extends('app')

@section('content')
    <form action="{{ url('/edit/'.$todo->id) }}" method="POST">
        
        @csrf
        <div class="todo-table">
            <h1>Edit Todo</h1>
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
            <div class="form-elements">
                <input type="text" name="title" value="{{ $todo->title }}"  placeholder="Type your todo here...">
            </div>
            <button class="btn btn-purple"><i class="fa fa-save"></i> Save</button>
            <a href="{{ url('/') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back</a>
        </div>
    </form>
@endsection


