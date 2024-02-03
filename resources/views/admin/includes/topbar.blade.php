	<!--**********************************
			Nav header start
		***********************************-->
		<div class="nav-header">
			<a href="index.html" class="brand-logo">
            <img class="logo-abbr" src="{{URL::to('/public/admin/assets/images/logo/logo.png')}}" width="70" height="53" alt="Image">


			</a>
			<div class="nav-control">
				<div class="hamburger">
					<span class="line"></span>
					<span class="line"></span>
					<span class="line"></span>
				</div>
			</div>
		</div>
		<!--**********************************
	Nav header end
***********************************-->



		<!--**********************************
	Header start
***********************************-->
		<div class="header">
			<div class="header-content">
				<nav class="navbar navbar-expand">
					<div class="collapse navbar-collapse justify-content-between">
						<div class="header-left">
							<!-- <form>
								<div class="input-group search-area">
									<span class="input-group-text"><button class="bg-transparent border-0">
											<svg width="19" height="19" viewBox="0 0 19 19" fill="none"
												xmlns="">
												<circle cx="8.78605" cy="8.78605" r="8.23951" stroke="white"
													stroke-linecap="round" stroke-linejoin="round" />
												<path d="M14.5168 14.9447L17.7471 18.1667" stroke="white"
													stroke-linecap="round" stroke-linejoin="round" />
											</svg>
										</button></span>
									<input type="text" class="form-control" placeholder="Search">
								</div>
							</form> -->
						</div>
						<ul class="navbar-nav header-right">

							<li class="nav-item dropdown notification_dropdown">
								<a class="nav-link bell dz-fullscreen" href="javascript:void(0);">
									<svg id="icon-full" viewBox="0 0 24 24" width="20" height="20" stroke="currentColor"
										stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"
										class="css-i6dzq1">
										<path
											d="M8 3H5a2 2 0 0 0-2 2v3m18 0V5a2 2 0 0 0-2-2h-3m0 18h3a2 2 0 0 0 2-2v-3M3 16v3a2 2 0 0 0 2 2h3"
											style="stroke-dasharray: 37, 57; stroke-dashoffset: 0;"></path>
									</svg>
									<svg id="icon-minimize" width="20" height="20" viewBox="0 0 24 24" fill="none"
										stroke="A098AE" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
										class="feather feather-minimize">
										<path
											d="M8 3v3a2 2 0 0 1-2 2H3m18 0h-3a2 2 0 0 1-2-2V3m0 18v-3a2 2 0 0 1 2-2h3M3 16h3a2 2 0 0 1 2 2v3"
											style="stroke-dasharray: 37, 57; stroke-dashoffset: 0;"></path>
									</svg>
								</a>
							</li>
							<li class="nav-item ps-3">
								<div class="dropdown header-profile2">
									<a class="nav-link" href="javascript:void(0);" role="button"
										data-bs-toggle="dropdown" aria-expanded="false">
										<div class="header-info2 d-flex align-items-center">
											<div class="header-media">
												<img  src="{{URL::to('/public/admin/assets')}}/images/tab/1.jpg" alt="">
											</div>
											<div class="header-info">
												<h6> {{ Auth::guard('admin')->user() ?    Auth::guard('admin')->user()->first_name : 'Admin'   }}</h6>
												<p> {{ Auth::guard('admin')->user()->email  }}</p>
											</div>

										</div>
									</a>
									<div class="dropdown-menu dropdown-menu-end" style="">
										<div class="card border-0 mb-0">
											<div class="card-header py-2">
												<div class="products">
													<img  src="{{URL::to('/public/admin/assets')}}/images/tab/1.jpg" class="avatar avatar-md" alt="">
													<div>
                                                    <h6> {{ Auth::guard('admin')->user() ?    Auth::guard('admin')->user()->first_name : 'Admin'   }}</h6>

														<span>{{ Auth::guard('admin')->user()->email  }}</span>
													</div>
												</div>
											</div>

											<div class="card-footer px-0 py-2">

												<a  href="{{route('admin.logout')}}" class="dropdown-item ai-icon">
													<svg class="profle-logout" xmlns=""
														width="18" height="18" viewBox="0 0 24 24" fill="none"
														stroke="#ff7979" stroke-width="2" stroke-linecap="round"
														stroke-linejoin="round">
														<path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
														<polyline points="16 17 21 12 16 7"></polyline>
														<line x1="21" y1="12" x2="9" y2="12"></line>
													</svg>
													<span class="ms-2 text-danger">Logout </span>
												</a>
											</div>
										</div>

									</div>
								</div>
							</li>
						</ul>
					</div>
				</nav>
			</div>
		</div>
		<!--**********************************
	Header end
***********************************-->
