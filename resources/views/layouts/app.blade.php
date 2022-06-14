@include('layouts.header')

		{{-- <div id="app"> --}}

			@include('layouts.navbar')
			<div id ="app">
			<main >
				<div id="right-panel" class="right-panel">


					@yield('content')

				</div>

			</main>
		</div>


		{{-- </div> --}}

		<div class="clearfix mb-3"></div>

@include('layouts.footer')
