@foreach($subcategories as $subcategory)
    <li><a class="dropdown-item" href="{{ route('category', $subcategory->slug) }}">{{ $subcategory->name }}</a></li>
	    @if(count($subcategory->subcategory))
            @include('subCategoryList',['subcategories' => $subcategory->subcategory])
        @endif
@endforeach