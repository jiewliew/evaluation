@include('layouts.header1')

		{{-- <div id="app"> --}}

			@include('layouts.navbar1')
			<div id ="app">
			<main >
			@yield('content')
			</main>
		</div>


		{{-- </div> --}}

		<div class="clearfix mb-3"></div>

@include('layouts.footer1')
