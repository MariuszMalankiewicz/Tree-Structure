@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edytuj węzeł lub liść</h1>
    <form action="{{route('category.update', $category_id) }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="form-group">
        <label for="name">Nazwa elementu</label>
        <input type="text" class="form-control" id="name" placeholder="nazwa elementu" name="name" value="{{$category_id->name}}" minlength="3" maxlength="20" required>
      </div>
      <div class="form-group">
        <label for="parent_id">Rodzic</label>
        <select class="form-control" id="parent_id" name="parent_id">
          <option value="0">glowna galaz</option>
          @foreach ($branches as $branch)
          <option value="{{$branch->id}}">
            {{$branch->name}}
          </option>
          @endforeach
        </select>
      </div>
      <div class="mt-2">
        <button type="submit" class="btn btn-success" name="edit"><i class="fa-solid fa-pen"></i> Edytuj</button>
        <a class="btn btn-outline-secondary" href="{{ route('category.index') }}" role="button">Powrót</a>
      </div>
    </form>
</div>
@endsection
