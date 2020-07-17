@extends('layouts.master-fr')	

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12 col-lg-12" style="margin: auto; padding: 10px;">
			<h4>Check Out</h4>
		</div>
		<div class="col-md-12 col-lg-12">
			<form role="form" method="post" action="{{ url('shopping-cart/bayar')  }}" enctype="multipart/form-data">
				@csrf
				<div class="box-body">
						<div class="form-group">
								<label>Penerima</label>
								<input type="text" class="form-control" id="name" name="name" placeholder="Enter name" value="{{ old('name') }}" autofocus required>
						</div>
						<div class="form-group">
								<label>Address</label>
								<textarea name="address" class="form-control"  cols="26" rows="5"></textarea>
						</div>
						<div class="box-footer">
								<button type="submit" class="btn btn-primary">Submit</button>
						</div>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection