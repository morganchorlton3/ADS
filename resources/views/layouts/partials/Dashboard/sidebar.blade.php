<nav id="sidebar">
    <div class="sidebar-header">
        <h3>Shop Co</h3>
        <strong>Co</strong>
    </div>

    <ul class="list-unstyled components">
        <li>
            <a href="/">
                Home
            </a>
        </li>
        <li>
            <a href="">
                Orders
            </a>
        </li>
        <li>
            <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                Products
            </a>
            <ul class="collapse list-unstyled" id="pageSubmenu">
                <li>
                    <a href="{{ route('admin.products.create') }}">Create</a>
                </li>
                <li>
                    <a href="#">Modify</a>
                </li>
                <li>
                    <a href="#">Search</a>
                </li>
            </ul>
        </li>
    </ul>
</nav>