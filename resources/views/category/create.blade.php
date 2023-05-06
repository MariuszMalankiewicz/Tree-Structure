@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Dodaj węzeł lub liść</h1>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form action="{{route('category.store')}}" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="form-group">
        <label for="name">Nazwa elementu</label>
        <input type="text" class="form-control" id="name" value="{{old('name')}}" placeholder="nazwa elementu" name="name" minlength="3" maxlength="20" required>
      </div>
      <div class="form-group">
        <label for="type">Typ</label>
        <select class="form-control" id="type" name="type" required>
          <option>galaz</option>
          <option>lisc</option>
        </select>
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
        <button type="submit" class="btn btn-primary" name="add"><i class="fa-solid fa-plus"></i> Dodaj</button>
        <a class="btn btn-outline-secondary" href="{{ route('category.index') }}" role="button">Powrót</a>
      </div>
      @csrf
    </form>
</div>
@endsection
