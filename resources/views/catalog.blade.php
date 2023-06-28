<!DOCTYPE html>
<html lang="en">
    <x-head />	
<body>
	<div class="page-wraper">
        <!-- Header -->
		<x-header />
		<!-- Header End -->
		<div class="page-content bg-grey">
			<section class="content-inner-1 border-bottom px-20">
				<div class="container">
					<div class="d-flex justify-content-between align-items-center">
						<h4 class="title">Libros</h4>
					</div>
					<div class="filter-area m-b30">
						<div class="grid-area">
							<div class="shop-tab">
								<ul class="nav text-center product-filter justify-content-end" role="tablist">
									{{-- <li class="nav-item" id="display-02">
										<a class="nav-link" href="#">
											<svg width="24" height="24" viewbox="0 0 24 24" fill="none"
												xmlns="http://www.w3.org/2000/svg">
												<path
													d="M3 5H21C21.2652 5 21.5196 4.89464 21.7071 4.7071C21.8946 4.51957 22 4.26521 22 4C22 3.73478 21.8946 3.48043 21.7071 3.29289C21.5196 3.10536 21.2652 3 21 3H3C2.73478 3 2.48043 3.10536 2.29289 3.29289C2.10536 3.48043 2 3.73478 2 4C2 4.26521 2.10536 4.51957 2.29289 4.7071C2.48043 4.89464 2.73478 5 3 5Z"
													fill="#AAAAAA"></path>
												<path
													d="M3 13H21C21.2652 13 21.5196 12.8947 21.7071 12.7071C21.8946 12.5196 22 12.2652 22 12C22 11.7348 21.8946 11.4804 21.7071 11.2929C21.5196 11.1054 21.2652 11 21 11H3C2.73478 11 2.48043 11.1054 2.29289 11.2929C2.10536 11.4804 2 11.7348 2 12C2 12.2652 2.10536 12.5196 2.29289 12.7071C2.48043 12.8947 2.73478 13 3 13Z"
													fill="#AAAAAA"></path>
												<path
													d="M3 21H21C21.2652 21 21.5196 20.8947 21.7071 20.7071C21.8946 20.5196 22 20.2652 22 20C22 19.7348 21.8946 19.4804 21.7071 19.2929C21.5196 19.1054 21.2652 19 21 19H3C2.73478 19 2.48043 19.1054 2.29289 19.2929C2.10536 19.4804 2 19.7348 2 20C2 20.2652 2.10536 20.5196 2.29289 20.7071C2.48043 20.8947 2.73478 21 3 21Z"
													fill="#AAAAAA"></path>
											</svg>
										</a>
									</li> --}}
									<li class="nav-item" id="display-01">
										<a class="nav-link" href="#">
											<svg width="24" height="24" viewbox="0 0 24 24" fill="none"
												xmlns="http://www.w3.org/2000/svg">
												<path
													d="M3 22H21C21.2652 22 21.5196 21.8946 21.7071 21.7071C21.8946 21.5196 22 21.2652 22 21V3C22 2.73478 21.8946 2.48043 21.7071 2.29289C21.5196 2.10536 21.2652 2 21 2H3C2.73478 2 2.48043 2.10536 2.29289 2.29289C2.10536 2.48043 2 2.73478 2 3V21C2 21.2652 2.10536 21.5196 2.29289 21.7071C2.48043 21.8946 2.73478 22 3 22ZM13 4H20V11H13V4ZM13 13H20V20H13V13ZM4 4H11V20H4V4Z"
													fill="#AAAAAA"></path>
											</svg>
										</a>
									</li>
								</ul>
							</div>
						</div>
						<div class="category">
							<div class="form-group">
								<i class="fas fa-sort-amount-down me-2 text-secondary"></i>
								<select class="m-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
									<option>Fechas</option>
									<option>1 Día</option>
									<option>1 Semana</option>
									<option>3 Semanas</option>
									<option>1 Mes</option>
									<option>3 Meses</option>
								</select>
							</div>
						</div>
					</div>
                    <div id="div-01">
                        <x-catalog.grid :books="$books" />
                    </div>
                    
                    <div id="div-02" style="display: none">
                        <x-catalog.list :books="$books" />
                    </div>
                    
					<div class="row page mt-0">
						<div class="col-md-6">
							<nav aria-label="Blog Pagination">
								{!! $getbooks->render() !!}
							</nav>
						</div>
					</div>
				</div>
			</section>
		<!-- Footer -->
		<x-footer />
		<!-- Footer End -->
		<button class="scroltop" type="button"><i class="fas fa-arrow-up"></i></button>
	</div>
	<!-- Scripts -->
	<x-scripts />
	<!-- Scripts end -->
</body>
</html>