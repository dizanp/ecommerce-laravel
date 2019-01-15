@extends('admin.dashboard')
@section('content')
@if(count($errors) >0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li> {{$error}} </li>
            @endforeach
        </ul>
    </div>
  @endif
<!-- /. NAV SIDE  -->
	<form method="post" action="/admin/product" enctype="multipart/form-data">
	<div class="panel panel-default">
		<div class="panel-body">
			<div class="col-md-6">
					<div class="form-group">
						<label>Name</label>
						<input type="text" name="name" class="form-control" value="{{old('title')}}" placeholder="tulis nama barang disini">
					</div>
					
					<div class="form-group">
						<label>Image</label>
						<input type="file" name="image" class="form-control" value="{{old('image')}}" placeholder="masukkan foto">
					</div>

		        	</div>

		    <div class="col-md-6">
					<div class="form-group">
						<label>Price</label>
						<input type="text" name="price" class="form-control" value="{{old('price')}}" placeholder="tulis harga barang disini">
					</div>

					<div class="form-group">
						<label>Description</label>
						  <textarea name="description" class="form-control" rows="8" cols="80">{{old('description')}}</textarea>
					</div>

			</div>

					<div class="form-group">
					<input type="submit" name="submit" class="btn btn-success btn-lg" value="Save">
					{{ csrf_field() }}
					<input type="reset" name="reset" class="btn btn-default btn-lg" value="Reset">
					</div>
		</div>
	</div>
	</form>
@endsection