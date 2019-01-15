@extends('admin.dashboard')
@section('content')
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
				   	<table class="table table-striped table-bordered table-hover" id="dataTables-example">
			   			<thead>
			                <tr>
			                    <th>Rendering engine</th>
			                    <th>Browser</th>
			                    <th>Platform(s)</th>
			                    <th>Engine version</th>
			                    <th>CSS grade</th>
			                </tr>
	                	</thead>
	                	<tbody>
		                    <tr class="odd gradeX">
		                        <td>Trident</td>
		                        <td>Internet Explorer 4.0</td>
		                        <td>Win 95+</td>
		                        <td class="center">4</td>
		                        <td class="center">X</td>
		                    </tr>
		                    <tr class="even gradeC">
		                        <td>Trident</td>
		                        <td>Internet Explorer 5.0</td>
		                        <td>Win 95+</td>
		                        <td class="center">5</td>
		                        <td class="center">C</td>
		                    </tr>
		                    <tr class="odd gradeA">
		                        <td>Trident</td>
		                        <td>Internet Explorer 5.5</td>
		                        <td>Win 95+</td>
		                        <td class="center">5.5</td>
		                        <td class="center">A</td>
		                    </tr>
	                    </tbody>
					</table>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection