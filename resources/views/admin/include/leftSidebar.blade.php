<aside class="sidebar-wrapper">
    <div class="iconmenu">
        <div class="nav-toggle-box">
            <div class="nav-toggle-icon"><i class="bi bi-list"></i></div>
        </div>
        <ul class="nav nav-pills flex-column">
            <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="right" title="Blogs">
                <button class="nav-link" data-bs-toggle="pill" data-bs-target="#blog" type="button"><i class="bi bi-house-door-fill"></i></button>
            </li>
            <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="right" title="Category">
                <button class="nav-link" data-bs-toggle="pill" data-bs-target="#category" type="button"><i class="bi bi-grid-fill"></i></button>
            </li>
            <li class="nav-item" data-bs-toggle="tooltip" data-bs-placement="right" title="Auhtor">
                <button class="nav-link" data-bs-toggle="pill" data-bs-target="#author" type="button"><i class="bi bi-briefcase-fill"></i></button>
            </li>

        </ul>
    </div>
    <div class="textmenu">
        <div class="brand-logo">
            <img src="{{asset('adminAsset')}}/assets/images/brand-logo-2.png" width="140" alt=""/>
        </div>
        <div class="tab-content">
            <div class="tab-pane fade" id="blog">
                <div class="list-group list-group-flush">
                    <div class="list-group-item">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-0">Blogs</h5>
                        </div>
                        <small class="mb-0">Add and Manage blogs</small>
                    </div>
                    <a href="{{ route('add.blog') }}"  class="list-group-item"><i class="bi bi-cart-plus"></i>Add Blog</a>
                    <a href="{{ route('manage.blog') }}" class="list-group-item"><i class="bi bi-wallet"></i>Manage Blogs</a>

                </div>
            </div>
            <div class="tab-pane fade" id="category">
                <div class="list-group list-group-flush">
                    <div class="list-group-item">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-0">Categories</h5>
                        </div>
                        <small class="mb-0">Add and Manage Categories</small>
                    </div>
                    <a href="{{ route('category') }}" class="list-group-item"><i class="bi bi-envelope"></i>Categories</a>
                </div>
            </div>
            <div class="tab-pane fade" id="author">
                <div class="list-group list-group-flush">
                    <div class="list-group-item">
                        <div class="d-flex w-100 justify-content-between">
                            <h5 class="mb-0">Authors</h5>
                        </div>
                        <small class="mb-0">Add and Manage Authors</small>
                    </div>
                    <a href="{{ route('author') }}" class="list-group-item"><i class="bi bi-box"></i>Authors</a>

                </div>
            </div>
        </div>
    </div>
</aside>
