@foreach($subcategories as $subcategory)
<ul class="dropdown-menu" aria-labelledby="menu-2">
    <li><a class="dropdown-item" href="#">
            {{ $subcategory->name }}</a>
    </li>  
</ul>
@endforeach