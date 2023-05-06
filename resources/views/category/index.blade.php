@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div>
            <h1>Panel administratora</h1>
        </div>
            <div class="mb-3">
                <a class="btn btn-primary mr-1 mb-1" href="{{ route('category.create') }}" role="button"><i class="fa-solid fa-puzzle-piece"></i> Dodaj węzeł lub liść</a>
                <button class="btn btn-outline-primary mr-1 mb-1 showAll"><i class="fa-solid fa-eye"></i> Zobacz wszystko</button>
                <a class="btn btn-outline-primary mr-1 mb-1" href="?sort=1"><i class="fa-solid fa-arrow-up-a-z"></i> Sortuj A-Z</a>
                <a class="btn btn-outline-primary mr-1 mb-1" href="?sort=2"><i class="fa-solid fa-arrow-down-a-z"></i> Sortuj Z-A</a>
            </div>
        @if(session()->has('message'))
        <div class="alert alert-success" role="alert">
            {{session()->get('message')}}
          </div>
        @endif
        <h3>Kategorie</h3>
        <ul id="tree">
            @foreach($categorys as $category)
                @if($category->type == "galaz")
                    <li class="m-1 galaz">
                        <form action="{{ route('category.destroy',$category->id) }}" method="Post">
                            <i class="fa-solid fa-caret-right"></i> {{ $category->name}} <a class="btn btn-success" href="{{ route('category.edit',$category->id) }}"><i class="fa-regular fa-pen-to-square"></i></a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"><i class="fa-regular fa-square-minus"></i></button>
                        </form>
                        @if(count($category->childs))
                            @include('childs',['childs' => $category->childs])
                        @endif
                    </li>
                @endif
                @if($category->type == "lisc")
                <li class="m-1">
                    <form action="{{ route('category.destroy',$category->id) }}" method="Post">
                        <i class="fa-solid fa-leaf"></i> {{ $category->name}} <a class="btn btn-success" href="{{ route('category.edit',$category->id) }}"><i class="fa-regular fa-pen-to-square"></i></a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"><i class="fa-regular fa-square-minus"></i></button>
                    </form>
                    @if(count($category->childs))
                        @include('childs',['childs' => $category->childs])
                    @endif
                </li>
            @endif
            @endforeach
        </ul>
      </div>
    </div>
</div>
@endsection


