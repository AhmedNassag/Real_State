<!-- Sidebar -->
<div class="sidebar" id="sidebar">
	<div class="sidebar-inner slimscroll">
		<div id="sidebar-menu" class="sidebar-menu">
			<ul>
				<li class="menu-title"><span>Coding System</span></li>

				<!-- home -->
				<li class="{{ Request::is('/home') ? 'active' : '' }}">
					<a href="{{ route('home') }}"><i data-feather="home"></i> <span>{{ trans('main.Dashboard') }}</span></a>
				</li>



				<!-- user & role -->
                @can('صلاحيات المستخدمين')
                    <li class="{{ Request::is('admin/user','admin/role') ? 'active' : '' }} submenu">
                        <a href="#"><i data-feather="user-check"></i> <span>{{ trans('main.User Roles') }}</span> <span class="menu-arrow"></span></a>
                        <ul>
                            @can('عرض صلاحية')
                                <li class="ml-1"><a class=" {{ Request::is(['admin/role', 'admin/role/create', 'admin/role/*/edit', 'admin/role/*']) ? 'active' : '' }}" href="{{ route('role.index') }}">{{ trans('main.Roles') }}</a></li>
                            @endcan
                            @can('عرض مستخدم')
                                <li class="ml-1"><a class=" {{ Request::is('admin/user') ? 'active' : '' }}" href="{{ route('user.index') }}">{{ trans('main.Users') }}</a></li>
                            @endcan
                        </ul>
                    </li>
                @endcan



                <!-- user & role -->
                {{-- @can('الأماكن') --}}
                    <li class="{{ Request::is('admin/country', 'admin/country/*', 'admin/city', 'admin/city/*', 'admin/area', 'admin/area/*') ? 'active' : '' }} submenu">
                        <a href="#"><i data-feather="copy"></i> <span>{{ trans('main.Places') }}</span> <span class="menu-arrow"></span></a>
                        <ul>
                            {{-- @can('عرض دولة') --}}
                                <li class="ml-1"><a class=" {{ Request::is(['admin/country', 'admin/country/*']) ? 'active' : '' }}" href="{{ route('country.index') }}">{{ trans('main.Countries') }}</a></li>
                            {{-- @endcan --}}
                            {{-- @can('عرض مدينة') --}}
                                <li class="ml-1"><a class=" {{ Request::is('admin/city', 'admin/city/*') ? 'active' : '' }}" href="{{ route('city.index') }}">{{ trans('main.Cities') }}</a></li>
                            {{-- @endcan --}}
                            {{-- @can('عرض منطقة') --}}
                                <li class="ml-1"><a class=" {{ Request::is('admin/area', 'admin/area/*') ? 'active' : '' }}" href="{{ route('area.index') }}">{{ trans('main.Areas') }}</a></li>
                            {{-- @endcan --}}
                        </ul>
                    </li>
                {{-- @endcan --}}



				<!-- category -->
				<li class="{{ Request::is('admin/category') ? 'active' : '' }}">
					<a href="{{ route('category.index') }}"><i data-feather="copy"></i> <span>{{ trans('main.Categories') }}</span></a>
				</li>



				<!-- product -->
				<li class="{{ Request::is('admin/product') ? 'active' : '' }}">
					<a href="{{ route('product.index') }}"><i data-feather="copy"></i> <span>{{ trans('main.Products') }}</span></a>
				</li>

			</ul>
		</div>
	</div>
</div>
<!-- /Sidebar -->
