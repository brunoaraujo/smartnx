@php
	$sidebarClass = (!empty($sidebarTransparent)) ? 'sidebar-transparent' : '';
@endphp
<div id="sidebar" class="sidebar {{ $sidebarClass }}">
	<div data-scrollbar="true" data-height="100%">
		<ul class="nav">
			<li class="nav-header">MENU</li>
			{{MenuItem::render()}}
			<li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a></li>
		</ul>
	</div>
</div>
<div class="sidebar-bg"></div>

