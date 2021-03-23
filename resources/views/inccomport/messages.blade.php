<div class="my-2">
	<div>
		@if(session('sucMsg'))
			<div class="alert alert-success">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
				<div> {{ session('sucMsg') }} </div>
			</div>
		@endif
	</div>
	<div>
		@if(session('errMsg'))
			<div class="alert alert-danger">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
				<div> {{ session('errMsg') }} </div>
			</div>
		@endif
	</div>
	<div>
		@if($errors->any())
			<div class="alert alert-danger">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
				<ul>
					@foreach($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach()
				</ul>
			</div>
		@endif
	</div>
</div>