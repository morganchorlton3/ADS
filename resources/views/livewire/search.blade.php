<div>
    <input type="text" wire:model="searchTerm">
    <ul>
        @foreach($products as $product)
        <li>
            <p>{{ $product->name }}</p>
        </li>
        @endforeach
    </ul>
</div>