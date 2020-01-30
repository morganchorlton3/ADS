@foreach($subcategories as $subcategory)
    <li><a class="dropdown-item" href="#">{{ $subcategory->name }}</a></li>
	    @if(count($subcategory->subcategory))
            @include('subCategoryList',['subcategories' => $subcategory->subcategory])
        @endif
@endforeach