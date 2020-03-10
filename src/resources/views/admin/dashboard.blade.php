@extends('admin.layouts.app')

@section('content')


<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Dashboard</h1>
    

    <!-- Content Row -->
   	<!-- Content Row -->
	<div class="row">
		<div class="col-xl-6 col-md-12 mb-4">
			<div class="card border-left-primary shadow h-100">
				<div class="card-body p-3">
					<div class="row no-gutters align-items-center mb-2">
						<div class="col mr-2">
							<div class="text-sm font-weight-bold text-primary text-uppercase mb-1">Agents</div>
						</div>
						<div class="col-auto">
							<i class="fas fa-users fa-2x text-gray-300"></i>
						</div>
					</div>
					<div class="row">
						<div class="col-xl-4 col-md-12">
							<div class="card shadow h-100">
							  <a href="{{ route('admin.agents.index') }}">
								<div class="card-body py-2 pointer">
									<div class="row no-gutters align-items-center">
										<div class="col mr-2">
											<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total</div>
											<div class="h3 mb-0 font-weight-bold text-gray-800">{{$agents['total']}}</div>
										</div>
									</div>
								</div>
							   </a>
							</div>
						</div>
						<div class="col-xl-4 col-md-12">
							<div class="card shadow h-100">
							  <a href="{{route('admin.agents.active',1)}}">
								<div class="card-body py-2 pointer">
									<div class="row no-gutters align-items-center">
										<div class="col mr-2">
											<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Active</div>
											<div class="h3 mb-0 font-weight-bold text-gray-800">{{$agents['active']}} </div>
										</div>
									</div>
								</div>
							  </a>
							</div>
						</div>
						<div class="col-xl-4 col-md-12">
							<div class="card shadow h-100">
							  <a href="{{route('admin.agents.active',0)}}">
								<div class="card-body py-2 pointer">
									<div class="row no-gutters align-items-center">
										<div class="col mr-2">
											<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">In-Active</div>
											<div class="h3 mb-0 font-weight-bold text-gray-800">{{$agents['in_active']}}</div>
										</div>
									</div>
								</div>
							  </a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-xl-6 col-md-12 mb-4">
			<div class="card border-left-success shadow h-100">
				<div class="card-body p-3">
					<div class="row no-gutters align-items-center mb-2">
						<div class="col mr-2">
							<div class="text-sm font-weight-bold text-primary text-uppercase mb-1">Players</div>
						</div>
						<div class="col-auto">
							<i class="fas fa-users fa-2x text-gray-300"></i>
						</div>
					</div>
					<div class="row">
						<div class="col-xl-4 col-md-12">
							<div class="card shadow h-100">
							   <a href="{{route('admin.players.index')}}">
								<div class="card-body py-2 pointer">
									<div class="row no-gutters align-items-center">
										<div class="col mr-2">
											<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total</div>
											<div class="h3 mb-0 font-weight-bold text-gray-800">{{$players['total']}}</div>
										</div>
									</div>
								</div>
							  </a>
							</div>
						</div>
						<div class="col-xl-4 col-md-12">
							<div class="card shadow h-100">
							<a href="{{route('admin.players.active',1)}}">
								<div class="card-body py-2 pointer">
									<div class="row no-gutters align-items-center">
										<div class="col mr-2">
											<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Active</div>
											<div class="h3 mb-0 font-weight-bold text-gray-800">{{$players['active']}}</div> 
										</div>
									</div>
								</div>
							  </a>
							</div>
						</div>
						<div class="col-xl-4 col-md-12">
							<div class="card shadow h-100">
							   <a href="{{route('admin.agents.active',0)}}">
								<div class="card-body py-2 pointer">
									<div class="row no-gutters align-items-center">
										<div class="col mr-2">
											<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">In-Active</div>
											<div class="h3 mb-0 font-weight-bold text-gray-800">{{$players['in_active']}}</div>
										</div>
									</div>
								</div>
							  </a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /.container-fluid -->
@endsection

@section('js')
@endsection