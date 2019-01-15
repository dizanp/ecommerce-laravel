@extends('admin.dashboard')
@section('content')
 @if(session('msg'))
    <div class="alert alert-success">
        <p> {{session('msg')}} </p>
    </div>
  @endif
<!-- /. NAV SIDE  -->
	<div class="row">
		<div class="col-md-12">
	    <!-- Advanced Tables -->
		    <div class="panel panel-default">
			    <div class="panel-heading">
			         Advanced Tables
			    </div>
				<div class="panel-body">
				   <div class="table-responsive">
				   	<p><a href="/admin/product/create" class="btn btn-success"><i class="fa fa-plus"></i> Add </a></p>
				   	<table class="table table-striped table-bordered table-hover" id="dataTables-example">
			   			<thead>
			                <tr>
			                    <th>Name Product</th>
			                    <th>Image</th>
			                    <th>Price</th>
			                    <th>Description</th>
			                    <th width="15%">Action</th>
			                </tr>
	                	</thead>
	                	<tbody>
	                		@foreach($products as $product)
		                    <tr class="odd gradeX">
		                        <td>{{$product->name}}</td>
		                        <td><img src="{{ asset('storage/images/' . $product->image) }}"  width="100px" height="100px"><br></td>
		                        <td>{{$product->price}}</td>
		                        <td>{{$product->description}}</td>
		                        <td>
			                        <a href="/admin/product/{{$product->id}}/edit" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i>Edit</a>
			                        <form method="post" action="/admin/product/{{$product->id}}">
          								{{ csrf_field() }}
							          <input type="hidden" name="_method" value="DELETE">
							          <button type="submit" class="btn btn-danger btn-xs">Delete</button>
							        </form>
			                    </td>
		                    </tr>
		                    @endforeach
	                    </tbody>
					</table>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection