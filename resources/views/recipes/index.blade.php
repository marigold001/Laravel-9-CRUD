@extends('recipes.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Laravel 9 CRUD Example</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('recipes.create') }}"> Create New Recipe</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success my-2">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered my-2">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Rating</th>
            <th style="width: 280px">Action</th>
        </tr>
        @foreach ($recipes as $recipe)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $recipe->recipe }}</td>
                <td>{{ $recipe->rating }}</td>
                <td>
                    <form action="{{ route('recipes.destroy',$recipe->id) }}" method="POST">

                        <a class="btn btn-info" href="{{ route('recipes.show',$recipe->id) }}">Show</a>

                        <a class="btn btn-primary" href="{{ route('recipes.edit',$recipe->id) }}">Edit</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $recipes->links() !!}

@endsection
