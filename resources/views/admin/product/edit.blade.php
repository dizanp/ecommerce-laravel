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
	<form method="post" action="/admin/product/{{$product->id}}" enctype="multipart/form-data">
	<div class="panel panel-default">
		<div class="panel-body">
			<div class="col-md-6">
					<div class="form-group">
						<label>Name</label>
						<input type="text" name="name" class="form-control" value="{{ old('title') ? old('name') : $product->name }}" placeholder="tulis nama barang disini">
					</div>
					
					<div class="form-group">
						<label>Image</label>
						<input type="file" name="image" class="form-control" value="{{old('image')}}" placeholder="masukkan foto">
					</div>

		        	</div>

		    <div class="col-md-6">
					<div class="form-group">
						<label>Price</label>
						<input type="text" name="price" class="form-control" value="{{ old('price') ? old('price') : $product->price }}"placeholder="tulis harga barang disini">
					</div>

					<div class="form-group">
						<label>Description</label>
						  <textarea name="description" class="form-control" rows="8" cols="80">{{ old('description') ? old('description') : $product->description }}</textarea>
					</div>

			</div>

					<div class="form-group">
					{{ csrf_field() }}
					 <input type="hidden" name="_method" value="PUT">
        			<button type="submit" class="btn btn-default btn-lg">Update</button>
					<input type="reset" name="reset" class="btn btn-default btn-lg" value="Reset">
					</div>
		</div>
	</div>
	</form>
@endsection