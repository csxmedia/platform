@layout('templates.blank')

<!-- Page Title -->
@section('title')
	Platform Register
@endsection

<!-- Queue Styles -->
{{ Theme::queue_asset('auth', 'users::css/form.less', 'style') }}

<!-- Styles -->
@section ('styles')
@endsection

<!-- Queue Scripts -->
{{ Theme::queue_asset('register', 'users::js/register.js', 'jquery') }}

<!-- Scripts -->
@section('scripts')
@endsection

<!-- Page Content -->
@section('content')

<section id="register">
	@widget('platform.users::form.register')
</section>

@endsection
