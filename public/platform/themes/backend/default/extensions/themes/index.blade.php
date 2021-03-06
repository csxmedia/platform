@layout('templates.default')

<!-- Page Title -->
@section('title')
	{{ Lang::line('themes::themes.title') }}
@endsection

<!-- Queue Styles -->
{{ Theme::queue_asset('themes','themes::css/themes.less', 'style') }}

<!-- Styles -->
@section ('styles')
@endsection

<!-- Queue Scripts -->
{{ Theme::queue_asset('themes','themes::js/themes.js', 'jquery') }}

<!-- Scripts -->
@section('scripts')
@endsection

<!-- Page Content -->
@section('content')
<section id="themes">

	<header class="row">
			<div class="span4">
				<h1>{{ Lang::line('themes::themes.title') }}</h1>
				<p>{{ Lang::line('themes::themes.description') }}</p>
			</div>
			<nav class="actions span8 pull-right">
			</nav>
	</header>

	<hr>

	<div class="selections row">
		@if($active)
			<div class="active span3">
				<div class="thumbnail">
					<img src="{{ Theme::asset('../../'.$active['dir'].'/assets/img/theme-thumbnail.png') }}" title="{{ $active['dir'] }}">
					<div class="caption">
						<h5>{{ $active['name'] }}</h5>
						<p class="version">{{ Lang::line('themes::themes.general.version') }} {{ $active['version'] }}</p>
						<p class="author">{{ Lang::line('themes::themes.general.author') }}  {{ $active['author'] }}</p>
						<p>{{ $active['description'] }}</p>
						<a href="edit/{{ URI::segment(3).'/'.$active['dir'] }}" class="btn" data-theme="{{ $active['dir'] }}" data-type="backend">Edit</a>
					</div>
				</div>
			</div>
		@else
			<div class="active span3">
				<div class="thumbnail">
					<div class="caption">
						<h5>Select a Theme and activate</h5>
					</div>
				</div>
			</div>
		@endif

		@foreach ($inactive as $theme)
		<div class="span3">
			<div class="thumbnail inactive">
				<img src="{{ Theme::asset('../../'.$theme['dir'].'/assets/img/theme-thumbnail.png') }}" title="{{ $theme['dir'] }}">
				<div class="caption">
					<h5>{{ $theme['name'] }}</h5>
					<p>{{ $theme['description'] }}</p>
					<p>{{ Lang::line('themes::themes.general.version') }} {{ $theme['version'] }}</p>
					<p>{{ Lang::line('themes::themes.general.author') }}  {{ $theme['author'] }}</p>
					<a href="activate/{{ URI::segment(3).'/'.$theme['dir'] }}" class="btn activate" data-token="{{ Session::token() }}" data-theme="{{ $theme['dir'] }}" data-type="{{ URI::segment(3) }}">Activate</a>
				</div>
			</div>
		</div>
		@endforeach
	</div>
</section>
@endsection
