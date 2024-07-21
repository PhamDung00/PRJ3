@extends('client.layout.app')
@section('title', 'Checkout')
@section('content') 
<main>
    <section class="shop-checkout container">
      <div class="ec-content-wrapper">
				<div class="content">
					<div class="row">
						<div class="col-12">
							<div class="ec-odr-dtl card card-default">
								<div class="card-header card-header-border-bottom d-flex justify-content-between">
									<h2 class="ec-odr">Order Detail<br>
										<span class="small">Order ID: #1082</span>
									</h2>
								</div>
								<div class="card-body">
									<div class="row">
										<div class="col-xl-3 col-lg-6">
											<address class="info-grid">
												<div class="info-title"><strong>Customer:</strong></div><br>
												<div class="info-content">
													Customer name<br>
													Customer Email	<br>
												</div>
											</address>
										</div>
										<div class="col-xl-3 col-lg-6">
											<address class="info-grid">
												<div class="info-title"><strong>Ship To:</strong></div><br>
												<div class="info-content">
													Customer address <br>
													<abbr title="Phone">P:</abbr> Phone
												</div>
											</address>
										</div>
										<div class="col-xl-3 col-lg-6">
											<address class="info-grid">
												<div class="info-title"><strong>Payment Method:</strong></div><br>
												<div class="info-content">
													Money or QR
												</div>
											</address>
										</div>
										<div class="col-xl-3 col-lg-6">
											<address class="info-grid">
												<div class="info-title"><strong>Order Date:</strong></div><br>
												<div class="info-content">
													4:34PM,<br>
													Wed, Aug 13, 2020
												</div>
											</address>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<h3 class="tbl-title">PRODUCT SUMMARY</h3>
											<div class="table-responsive">
												<table class="table table-striped o-tbl">
													<thead>
														<tr class="line">
															<td><strong>#</strong></td>
															<td class="text-center"><strong>IMAGE</strong></td>
															<td class="text-center"><strong>PRODUCT</strong></td>
															<td class="text-center"><strong>PRICE</strong></td>
															<td class="text-center"><strong>QUANTITY</strong></td>
															<td class="text-right"><strong>SUBTOTAL</strong></td>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td>1</td>
															<td><img class="product-img"
																	src="assets/img/products/p1.jpg" alt="" /></td>
															<td><strong>Baby Pink Shoes</strong><br>a vary smooth and
																comfert Shoes ever for baby.</td>
																<td class="text-center">$75</td>
																<td class="text-center">15</td>
															<td class="text-right">$1,125.00</td>
														</tr>
														<tr>
															<td colspan="4"></td>
															<td class="text-right"><strong>Total</strong></td>
															<td class="text-right"><strong>$2,400.00</strong></td>
														</tr>

                                                        <tr>
                                                            <td colspan="4"></td>
                                                            <td class="text-right"><strong>Payment Status</strong></td>
                                                            <td class="text-right"><strong>PAID</strong></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- End Content -->
            </div>
        </section>
    </main>
@endsection
