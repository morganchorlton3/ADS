@foreach($subcategories as $subcategory)
<ul class="col">
    <li><a class="dropdown-item" href="#">{{ $subcategory->name }}</a>
    </li>
</ul>
@endforeach