<div class="sidebar-section">
	@php
		$active_menu = 'dasboard';
		if(isset($page_meta)){
			$active_menu = $page_meta['active_page'];
		}
	@endphp
	<ul class="nav nav-sidebar" data-nav-type="accordion">
		<!-- Main -->
		<li class="nav-item-header"><div class="text-uppercase font-size-xs line-height-xs">Main</div> <i class="icon-menu" title="Main"></i></li>
		<li class="nav-item">
			<a href="{{ route('dashboard.index'); }}" class="nav-link {{ $active_menu == 'dasboard' ? 'active' : '' }}">
				<i class="icon-home4"></i>
				<span>
					Dashboard
				</span>
			</a>
		</li>
		<li class="nav-item">
			<a href="{{ route('case.index') }}" class="nav-link {{ $active_menu == 'cases' ? 'active' : '' }}">
				<i class="icon-copy"></i> <span>Cases</span>
			</a>
		</li>
        <li class="nav-item">
        	<a href="/appointments" class="nav-link">
        		<i class="icon-calendar"></i> <span>Appoimnets</span>
        	</a>
        </li>
        <li class="nav-item">
        	<a href="/Discussions" class="nav-link">
        		<i class="icon-comments"></i> <span>Discussions</span>
        	</a>
        </li>
        <li class="nav-item">
        	<a href="{{ route('client.index') }}" class="nav-link {{ $active_menu == 'clients' ? 'active' : '' }}">
        		<i class="icon-users"></i> <span>Clients</span>
        	</a>
        </li>
        <li class="nav-item">
        	<a href="{{ route('lawyer.index') }}" class="nav-link {{ $active_menu == 'lawyers' ? 'active' : '' }}">
        		<i class="icon-user"></i> <span>Lawyers</span>
        	</a>
        </li>
        <li class="nav-item">
        	<a href="{{ route('customer.index') }}" class="nav-link {{ $active_menu == 'customer' ? 'active' : '' }}">
        		<i class="icon-users"></i> <span>Users</span>
        	</a>
        </li>
		<!-- /main -->

		<!-- Reports -->
		<li class="nav-item-header">
			<div class="text-uppercase font-size-xs line-height-xs">Reports</div> <i class="icon-menu" title="Reports"></i>
		</li>
		<li class="nav-item nav-item-submenu">
			<a href="#" class="nav-link"><i class="icon-credit-card"></i> <span>Payment Reports</span></a>
			<ul class="nav nav-group-sub" data-submenu-title="Themes">
				<li class="nav-item">
					<a href="../../../LTR/material/full/index.html" class="nav-link">All Paymnets</a>
				</li>
				<li class="nav-item">
					<a href="../../../LTR/material/full/index.html" class="nav-link">Pending Paymnets</a>
				</li>
				<li class="nav-item">
					<a href="../../../LTR/dark/full/index.html" class="nav-link">Completed Paymnets</a>
				</li>
				
			</ul>
		</li>		
		<!-- /Reports -->

		<!-- Other -->
		<li class="nav-item-header">
			<div class="text-uppercase font-size-xs line-height-xs">Other</div> <i class="icon-menu" title="Reports"></i>
		</li>										
		<li class="nav-item">
			<a href="/notifications" class="nav-link"><i class="icon-gift"></i> <span>Notifications</span></a>
		</li>
        <li class="nav-item">
        	<a href="{{ route('blog.index') }}" class="nav-link {{ $active_menu == 'blog' ? 'active' : '' }}">
        		<i class="icon-copy"></i> <span>Blog</span>
        	</a>
        </li>
		
        <li class="nav-item">
        	<a href="/contactus" class="nav-link"><i class="icon-phone"></i> <span>Contact Us</span></a>
        </li>
        <!-- Other -->

		<!-- Master -->
		<li class="nav-item-header">
			<div class="text-uppercase font-size-xs line-height-xs">Master</div> <i class="icon-menu" title="Forms"></i>
		</li>
        <li class="nav-item nav-item-submenu">
			<a href="#" class="nav-link"><i class="icon-lock"></i> <span>Access Control</span></a>
			<ul class="nav nav-group-sub" data-submenu-title="AccessControl">								
				<li class="nav-item">
					<a href="/systemusers" class="nav-link">System Users</a>
				</li>
				<li class="nav-item">
					<a href="/accessrights" class="nav-link">Access Roles</a>
				</li>
			</ul>
		</li>
		<li class="nav-item">
        	<a href="{{ url('cases/type' ) }}" class="nav-link"><i class="icon-phone"></i> <span>Case type</span></a>
        </li>
   
		<li class="nav-item">
			<a href="{{route('mpl.admin.banners.index')}}" class="nav-link"><i class="icon-pencil3"></i> <span>Mobile Banners</span></a>
		</li>
		<li class="nav-item">
			<a href="/filecategory" class="nav-link"><i class="icon-pencil3"></i> <span>File Categories</span></a>
		</li>
		<li class="nav-item">
			<a href="/content" class="nav-link"><i class="icon-copy"></i> <span>Content</span></a>
		</li>
		<!-- /Master -->

	</ul>
</div>