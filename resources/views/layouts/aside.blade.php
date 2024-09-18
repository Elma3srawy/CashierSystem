<aside class="sidebar-left border-right bg-white shadow" id="leftSidebar" data-simplebar>
    <a href="#" class="btn collapseSidebar toggle-btn d-lg-none text-muted ml-2 mt-3" data-toggle="toggle">
      <i class="fe fe-x"><span class="sr-only"></span></i>
    </a>
    <nav class="vertnav navbar navbar-light">
      <!-- nav bar -->
      <div class="w-100 mb-4 d-flex">
        <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="{{ route('dashboard') }}">
          <svg version="1.1" id="logo" class="navbar-brand-img brand-sm" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 120 120" xml:space="preserve">
            <g>
              <polygon class="st0" points="78,105 15,105 24,87 87,87 	" />
              <polygon class="st0" points="96,69 33,69 42,51 105,51 	" />
              <polygon class="st0" points="78,33 15,33 24,15 87,15 	" />
            </g>
          </svg>
        </a>
      </div>
      <ul class="navbar-nav flex-fill w-100 mb-2">
        <li class="nav-item dropdown">
          <a href="{{ route('dashboard') }}" aria-expanded="false" class="nav-link">
            <i class="fe fe-home fe-16"></i>
            <span class="ml-3 item-text"> لوحة التحكم</span><span class="sr-only"></span>
          </a>
        </li>
      </ul>
      <p class="text-muted nav-heading mt-4 mb-1">
        <span>المحتوي</span>
      </p>
      <ul class="navbar-nav flex-fill w-100 mb-2">
        <li class="nav-item dropdown">
          <a href="#ui-elements" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
            <i class="fe fe-box fe-16"></i>
            <span class="ml-3 item-text">الاقسام</span>
          </a>
          <ul class="collapse list-unstyled pl-4 w-100" id="ui-elements">
            <li class="nav-item">
              <a class="nav-link pl-3" href="{{ route('section.index') }}"><span class="ml-1 item-text">عرض جميع الاقسام</span>
              </a>
            </li>
            <li class="nav-item">
              <a data-toggle="modal" data-target="#varyModal" class="nav-link pl-3" href="#"><span class="ml-1 item-text">اضافة قسم جديد</span>
              </a>
            </li>
          </ul>
        </li>
      </ul>
      <p class="text-muted nav-heading mt-4 mb-1">
        <span>المخزن</span>
      </p>
      <ul class="navbar-nav flex-fill w-100 mb-2">
         {{-- Sections with sub-sections --}}
        @foreach ($sections as $section)
        @if (count($section->subSection) > 0)
            <li class="nav-item dropdown">
                <a href="#section-{{ $loop->index }}-collapse" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                    <i class="fe fe-16 fe-layers"></i>
                    <span class="ml-3 item-text">{{ $section->name }}</span>
                </a>
                <ul class="collapse list-unstyled pl-4 w-100" id="section-{{ $loop->index }}-collapse">
                    @foreach ($section->subSection as $sub)
                        <li>
                            <a class="nav-link pl-3 fe fe-4" href="{{ route('products.index' , $sub->id) }}"><span class="ml-1">{{ $sub->name}}</span></a>
                        </li>
                    @endforeach
                </ul>
            </li>
        @endif
        @endforeach

        {{-- Sections without sub-sections --}}
        @foreach ($sections as $section)
            @if (count($section->subSection) == 0)
                <li class="nav-item">
                    <a href="{{ route('products.index' , $section->id) }}" aria-expanded="false" class="nav-link">
                        <i class="fe fe-4 fe-folder"></i>
                        <span class="ml-3 item-text">{{ $section->name }}</span>
                    </a>
                </li>
            @endif
        @endforeach
    </ul>


       <p class="text-muted nav-heading mt-4 mb-1">
        <span>الحسابات</span>
      </p>
      <ul class="navbar-nav flex-fill w-100 mb-2">
        <li class="nav-item dropdown">
          <a href="#pages" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
            <i class="fe fe-file fe-16"></i>
            <span class="ml-3 item-text">الفواتير</span>
          </a>
          <ul class="collapse list-unstyled pl-4 w-100 w-100" id="pages">
            <li class="nav-item">
                <a class="nav-link pl-3" href="{{ route('invoice.create') }}">
                  <span class="ml-1 item-text">اضافة فاتورة</span>
                </a>
            </li>
            @can('access-superAdmin')
            <li class="nav-item">
              <a class="nav-link pl-3" href="{{ route('invoice.index') }}">
                <span class="ml-1 item-text">عرض جميع الفواتير</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link pl-3" href="{{ route('invoice.pending') }}">
                <span class="ml-1 item-text">عرض فواتير الايجار</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link pl-3" href="{{ route('invoice.inactive') }}">
                <span class="ml-1 item-text">عرض فواتير البيع</span>
              </a>
            </li>
            @endcan
          </ul>
        </li>

        <!-- Separate block for sales -->
        @can('access-superAdmin')
        <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item dropdown">
            <a href="#sales" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                <i class="fe fe-dollar-sign fe-16"></i>
                <span class="ml-3 item-text">الحسابات</span>
            </a>
            <ul class="collapse list-unstyled pl-4 w-100" id="sales">
                <li class="nav-item">
                <a class="nav-link pl-3" href="{{ route('sales.index') }}">
                    <span class="ml-1 item-text">الايجار و البيع</span>
                </a>
                </li>
                <li class="nav-item">
                <a class="nav-link pl-3" href="{{ route('sales.pending') }}">
                    <span class="ml-1 item-text">الايجار</span>
                </a>
                </li>
                <li class="nav-item">
                <a class="nav-link pl-3" href="{{ route('sales.inactive') }}">
                    <span class="ml-1 item-text">البيع</span>
                </a>
                </li>
            </ul>
            </li>
        </ul>
        @endcan

        <p class="text-muted nav-heading mt-4 mb-1">
            <span>العملاء</span>
        </p>
        <ul class="navbar-nav flex-fill w-100 mb-2">
        <li class="nav-item dropdown">
            <a href="#profile" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
              <i class="fe fe-users fe-16"></i>
              <span class="ml-3 item-text">العملاء</span>
            </a>
            <ul class="collapse list-unstyled pl-4 w-100" id="profile">
              <a class="nav-link pl-3" href="{{ route('clients.index') }}"><span class="ml-1">عرض جميع العملاء</span></a>
            </ul>
          </li>
        </ul>
      </ul>
    </nav>
  </aside>
