<ul class="hide">
    @foreach($childs as $child)
        @if($child->type == "galaz")
            <li class="m-1 galaz">
                <form action="{{ route('category.destroy',$child->id) }}" method="Post">
                    @csrf
                    @method('DELETE')
                    <i class="fa-solid fa-caret-right"></i> {{ $child->name}} <a class="btn btn-success" href="{{ route('category.edit', $child->id) }}" role="button"><i class="fa-regular fa-pen-to-square"></i></a> <button type="submit" class="btn btn-danger"><i class="fa-regular fa-square-minus"></i></button>
                </form>
                @if(count($child->childs))
                    @include('childs',['childs' => $child->childs])
                @endif
            </li>
        @endif
        @if($child->type == "lisc")
        <li class="m-1">
            <form action="{{ route('category.destroy',$child->id) }}" method="Post">
                @csrf
                @method('DELETE')
                <i class="fa-solid fa-leaf"></i> {{ $child->name}} <a class="btn btn-success" href="{{ route('category.edit', $child->id) }}" role="button"><i class="fa-regular fa-pen-to-square"></i></a> <button type="submit" class="btn btn-danger"><i class="fa-regular fa-square-minus"></i></button>
            </form> 
            @if(count($child->childs))
                @include('childs',['childs' => $child->childs])
            @endif
        </li>
    @endif
    @endforeach
</ul>
    
