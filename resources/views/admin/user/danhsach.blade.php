@extends('admin.layouts.index') 
@section('style')
  <link href="css/admin_thumbnail.css" rel="stylesheet">
@endsection
@section('content')
<div class="container-fluid">
    <div class="page-title">
        <h4>{{ Lang::get('sub.datasheet') }} <strong>{{ Lang::get('sub.user') }} @php echo "- " .count($user). ""; @endphp {{ Lang::get('sub.record') }}</strong>
		    <a href="admin/user/them" title="{{ Lang::get('sub.add') }} {{ Lang::get('sub.user') }}"><button type="button" class="btn-success btn" style="float: right;" ><i class="ti-plus" ></i></button></a>
		 @if(count($errors) > 0)
		 	<br><br>
          	<div class="alert alert-danger">
              	@foreach($errors->all() as $err)
                  	{{$err}}<br>
              @endforeach()
          </div>
        @endif
        @if(session('thongbao'))
          	<br><br>
          	<div class="alert alert-success"> 
              	{{session('thongbao')}}
          	</div>
        @endif
        </h4>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-block">
                    <div class="table-striped">
                        <table id="dt-opt" class="table table-lg table-hover">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>{{ Lang::get('sub.name') }}</th>
                                    <th>{{ Lang::get('sub.email') }}</th>
                                    <th>{{ Lang::get('sub.password') }}</th>
                                    <th>{{ Lang::get('sub.date_upload') }}</th>
                                    <th>{{ Lang::get('sub.edit') }}</th>
                                    <th>{{ Lang::get('sub.delete') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                              @php $i=0 @endphp
                            	@foreach ($user as $u)
									                 <tr>
	                                    <td>
                                          <div class="mrg-top-15">
                                              <span class="text-info"><i>@php echo ++$i @endphp</i></span>
                                          </div>
                                      </td>
                                      <td>
                                          <div class="mrg-top-15">
                                              <h5>{{$u->ten}}</h5>
                                          </div>
                                      </td>
                                      <td>
                                          <div class="mrg-top-15">
                                              <h5>{{$u->email}}</h5>
                                          </div>
                                      </td>
                                      <td>
                                          <div class="mrg-top-15">
                                              <div class="thumbnail">
                                                <h5>{{cutString($u->password, 20)}}</h5>
                                                <p>{{$u->password}}</p>
                                              </div>
                                          </div>
                                      </td>
                                      <td>
                                          <div class="mrg-top-15">
                                              <h5>{{$u->created_at}}</h5>
                                          </div>
                                      </td>
	                                    
	                                    <td>
	                                        <div class="mrg-top-15">
	                                        	<a href="admin/user/sua/{{$u->id}}" title="Sửa {{$u->ten}}"><button class="btn btn-icon btn-flat btn-rounded dropdown-toggle"> 
                                              <h3 class="ti-pencil-alt"></h3>
                                            </button></a>
	                                        </div>
	                                    </td>            
	                                    <td>
	                                        <div class="mrg-top-15">
	                                        	<button class="btn btn-icon btn-flat btn-rounded dropdown-toggle" data-toggle="modal" data-target="#xoaModal{{$u->id}}" title="{{ Lang::get('sub.delete') }} {{$u->ten}}">  
	                                        		<h3 class="ti-trash text-danger"></h3>
	                                        	</button></a>
                                            @include('admin.user.xoa')
	                                        </div>
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
</div>
@endsection
@section('script')
	<script type="text/javascript">
	</script>
@endsection