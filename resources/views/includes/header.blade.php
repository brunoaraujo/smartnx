@php
	$headerClass = (!empty($headerInverse)) ? 'navbar-inverse ' : 'navbar-default ';
	$headerMenu = (!empty($headerMenu)) ? $headerMenu : '';
	$headerMegaMenu = (!empty($headerMegaMenu)) ? $headerMegaMenu : '';
	$headerTopMenu = (!empty($headerTopMenu)) ? $headerTopMenu : '';
@endphp

<div id="header" class="header {{ $headerClass }}">
	<div class="navbar-header">
		@if ($sidebarTwo)
		<button type="button" class="navbar-toggle pull-left" data-click="right-sidebar-toggled">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		@endif
		<a href="index.html" class="navbar-brand"><span class="navbar-logo"></span> <b>SMART</b> NX</a>
	</div>
	<ul class="navbar-nav navbar-right">
		<li class="dropdown navbar-user">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown">
				<span class="d-none d-md-inline">{{Auth::user()->nome}}</span> <b class="caret"></b>
			</a>
			<div class="dropdown-menu dropdown-menu-right">
				<a href="{{url('/')}}/logout" class="dropdown-item">Sair</a>
			</div>
		</li>
	</ul>
</div>
