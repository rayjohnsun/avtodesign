@extends('layouts.comport')

@section('css-style')

	<link rel="stylesheet" href="/assets/colorpicker/css/bootstrap-colorpicker.min.css">

@endsection

@section('content')
	
	<div>
		<div style="max-width: 500px;" class="mx-auto">
			<h3>Create Color</h3>
			<form action="{{ route('colors.store') }}" method="POST">
				@csrf
				<div class="mt-3">
					<input type="text" name="title" placeholder="Title" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Title'" required class="single-input" value="{{ old('title') }}">
				</div>
				<div class="mt-3" style="position: relative;">
					<input type="text" name="color" placeholder="Color" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Color'" required class="single-input" value="{{ old('color') }}" id="ColorInput">
					<div id="ColorInputDiv" style="width: 100px;height: 40px;top: 0;right: 0;position: absolute;"></div>
				</div>
				<div class="mt-3">
					<button type="submit" class="genric-btn primary circle arrow">Create</button>
				</div>
			</form>
		</div>
	</div>

@endsection

@section('js-script')

	<script src="/assets/colorpicker/js/bootstrap-colorpicker.min.js"></script>

	<script>
		$(function() {
			$('#ColorInput').colorpicker();
			$('#ColorInput').on('colorpickerChange', function(event) {
        $('#ColorInputDiv').css('background-color', event.color.toString());
      });
		})
	</script>

@endsection
