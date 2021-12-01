<div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
    <div class="c-sidebar-brand d-lg-down-none">
        <svg class="c-sidebar-brand-full" width="118" height="46" alt="CoreUI Logo">
            <use xlink:href="{{ asset('public/coreui/assets/brand/coreui.svg#full') }}"></use>
        </svg>
        <svg class="c-sidebar-brand-minimized" width="46" height="46" alt="CoreUI Logo">
            <use xlink:href="{{ asset('public/coreui/assets/brand/coreui.svg#signet') }}"></use>
        </svg>
    </div>
    <ul class="c-sidebar-nav">
        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('home') }}">
                <svg class="c-sidebar-nav-icon">
                    <use xlink:href="{{ asset('public/coreui/vendors/@coreui/icons/svg/free.svg#cil-speedometer') }}"></use>
                </svg> Dashboard</a>
        </li>

        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('category.index') }}">
                <svg class="c-sidebar-nav-icon">
                    <use xlink:href="{{ asset('public/coreui/vendors/@coreui/icons/svg/free.svg#cil-library') }}"></use>
                </svg> Categories</a>
        </li>

        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('product.index') }}">
                <svg class="c-sidebar-nav-icon">
                    <use xlink:href="{{ asset('public/coreui/vendors/@coreui/icons/svg/free.svg#cil-view-module') }}"></use>
                </svg> Products</a>
        </li>

        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="{{ route('sale.index') }}">
                <svg class="c-sidebar-nav-icon">
                    <use xlink:href="{{ asset('public/coreui/vendors/@coreui/icons/svg/free.svg#cil-spreadsheet') }}"></use>
                </svg> Sales</a>
        </li>

        <li class="c-sidebar-nav-item"><a class="c-sidebar-nav-link" href="#">
                <svg class="c-sidebar-nav-icon">
                    <use xlink:href="{{ asset('public/coreui/vendors/@coreui/icons/svg/free.svg#cil-user') }}"></use>
                </svg> Users</a>
        </li>





    </ul>
    <button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent" data-class="c-sidebar-minimized"></button>
</div>
