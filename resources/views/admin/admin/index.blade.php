@extends('admin.master')
@section('content')
<section class="content-header">
	<h1>
	    Quản lý user
	    <small>Danh sách</small>
	</h1>
	<ol class="breadcrumb">
	    <li><a href="backend"><i class="fa fa-dashboard"></i> Home</a></li>
	    <li class="active">Quản lý user</li>
	</ol>
</section>
<section class="content">
	<div class="row">
	    <div class="col-xs-12">
		    <div class="box">		    	
		        @include('admin.messages_error')
		        <div class="box-body">
		        	<div class="row" style="margin-bottom: 20px;">
			            <div class="col-md-6">
			            	<a href="{{ route('admin.admin.create') }}" class="btn btn-primary">Thêm</a>
			            </div>
			        </div>
			        <div class="table-responsive">
			        	<table id="example2" class="table table-bordered table-hover">
				            <thead>
					            <tr>			                
					                <th class="text-center with_dieuhuong">ID</th>
					                <td>Tên</td>
					                <td>Tên đăng nhập</td>
					                <td>Email</td>
					                <td>Số điện thoại</td>
					                <td>Trạng thái</td>
					                <th>Hành động</th>
					                <!-- <th class="text-center with_dieuhuong">Sửa</th>
					                <th class="text-center with_dieuhuong">Xóa</th> -->
					            </tr>
				            </thead>
				            <tbody>
				             @foreach($admins as $k=>$item)
					            <tr>
					                <td class="text-center with_dieuhuong">{{ $item->id }}</td>
					                <td>{{ $item->name }}</td>
					                <td>{{ $item->username }}</td>
					                <td>{{ $item->email }}</td>
					                <td>{{ $item->phone }}</td>
					                <td>{{ $item->active ? 'Đã kích hoạt' : 'Chưa kích hoạt' }}</td>
					                <td class="">
					                	<a href="{{ route('admin.admin.edit', $item->id) }}" class="btn btn-warning"><i class="fa fa-edit"></i>Edit</a>					                	
					                	<a onClick="if(!confirm('Xác nhận xóa')) return false;" class="btn btn-danger"  href="{{ route('admin.admin.delete', $item->id) }}">
					                		<i class="fa fa-trash-o fa-fw"></i>Delete
					                	</a>
					                </td>
					                
					            </tr>
				            @endforeach
				            </tbody>
				        </table>
			        </div>
			        
		        </div>
		        <div class="box-footer col-md-12">
			        <div class="row">
			            <div class="col-md-6">
			            	<a href="{{ route('admin.admin.create') }}" class="btn btn-primary">Thêm</a>
			            </div>
			        </div>
		        </div>
		    </div>
	    </div>
	</div>
</section>

@endsection