<nav class="navbar navbar-expand-sm">
  <div class="container-fluid">
    <ul class="nav nav-pills">
      <li class="nav-item">
        <a href="{{ route('medicines.index') }}"
           class="nav-link {{ request()->is('medicines*') && !request()->has('type') && !request()->has('stock') ? 'active' : '' }}">
          All
        </a>
      </li>
      <li class="nav-item">
        <a href="{{ route('medicines.filter') }}"
           class="nav-link {{ request()->is('medicines') && (request()->has('type') || request()->has('stock')) ? 'active' : '' }}">
          Filter
        </a>
      </li>
    </ul>
  </div>
</nav>