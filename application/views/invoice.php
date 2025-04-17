<div class="container-fluid bg-white">
	<header>
		<div class="row d-flex align-items-center">
			<div class="col-6">
				<div class="m-2">
					<img src="<?= base_url('assets/img/favicon/logo_senangtour.png'); ?>" alt="Logo Senang Tours" width="50px" height="50px">
					<span class="fw-bold text-uppercase">Senang Tours & Travel</span>
				</div>
			</div>
			<div class="col-6 text-end">
				<span class="fw-bold text-uppercase">Inovice Voucher</span>
			</div>
		</div> 
	</header>

	<section>
		<div class="container my-1">
			<div class="row	">
				<div class="col-12 text-end">
					<button class="btn btn-outline-primary d-print-none" onclick="window.print();">
						<label class="ti ti-file-export mb-sm-1 me-sm-2"></label>Print
					</button>
				</div>
			</div>
		</div>
	</section>

	<section>
		<div class="container">
			<div class="row border p-2">
				<div class="col-6">
					<span class="fw-bold me-4">
						Tour Code 
					</span>
					<span style="font-weight: 500;">
						: <?=$reservasi[0]->tour_code;?> 
					</span>
				</div>
				<div class="col-6 text-end">
					<span class="fw-bold mx-4">Date</span> 
					<span style="font-weight: 500;">: <?=$reservasi[0]->dob;?> </span> 
				</div>
			</div>
		</div> 

		<div class="container mt-1">
			<div class="row border p-2">
				<div class="col-6">
					<div class="row">
						<div class="col-12">
							<span class="fw-bold me-3">
								Nama Tamu
							</span>
							<span style="font-weight: 500;">: <?=$reservasi[0]->guest_name;?></span> 
						</div>
						<div class="col-12">
							<span class="fw-bold me-5">
								Negara
							</span>
							<span style="font-weight: 500;">: <?=$reservasi[0]->nama_bahasa;?></span> 
						</div>
					</div> 
				</div>
				<div class="col-6 text-center">
					<div class="row">
						<div class="col-12">
							<span class="fw-bold">
								Status Pembayaran
							</span>
						</div>
						<div class="col-12">
							<?php if ($reservasi[0]->status == "pending"){
								$bg = "bg-warning";
							}elseif ($reservasi[0]->status == "paid") {
								$bg = "bg-success";
							}elseif ($reservasi[0]->status == "overdue") {
								$bg = "bg-danger";
							}else{
								$bg = "bg-danger";
							}?> 
							<span class="d-print-none badge <?=$bg?> text-white" style="font-size:500">
								<?=$reservasi[0]->status  ?> 
							</span>

							<span class="d-none d-print-block text-dark" style="font-weight:500;">
								<?=$reservasi[0]->status  ?> 
							</span> 
						</div>
					</div>
				</div>
			</div>
		</div>	 
	</section>

	<section>
		<div class="container p-3"> 
			<div class="d-print-none row p-2 bg-primary text-white" style="letter-spacing: 2px;">
				<div class="col-12">DETAIL RESERVASI</div>
			</div>
			<div class="d-print-block d-none row p-2 text-dark fw-bold" style="letter-spacing: 2px;">
				<div class="col-12">DETAIL RESERVASI</div>
			</div>
			<div class="row p-2 ">

				<?php foreach ($reservasi as $d ):?>
				<div class="col-12 my-1">
					<span class="fw-bold">
						Nama Produk
					</span>
					<span style="font-weight: 500;">: <?=$d->nama_produk   ?> </span> 
				</div>
				<?php endforeach ?>

			</div>
		</div>
	</section>

	<section>
		<div class="container"> 
			<div class="d-print-none row p-2 bg-primary text-white" style="letter-spacing: 2px;">
				<div class="col-12">	PEMBAYARAN</div>
			</div>
			<div class="d-print-block d-none row p-2 bg-primary text-dark fw-bold" style="letter-spacing: 2px;">
				<div class="col-12">	PEMBAYARAN</div>
			</div>
			<div class="row border p-2 mt-1 d-flex text-end">
				<div class="col-12">
					<span class="fw-bold me-3">
						TAGIHAN PEMBAYARAN
					</span>
					<span style="font-weight: 500;">: <?=$reservasi[0]->total;?> </span> 
				</div> 
			</div>
		</div> 
	</section>
	<footer>
		<div class="container mt-3">
			<div class="row">
				<div class="col-12">
					<p class="text-center p-2"  style="font-size: 0.8rem;background-color: #AAA6A6;">
						Apabila memerlukan bantuan, mohon hubungi SenangTours&Travel di <span class="fw-bold">CUSTOMER SERVICE</span> 0813 4562 7788 <span class="fw-bold ms-4">EMAIL </span> cs@SenangTours.com
					</p>
					<div class="col-12 text-center"  style="font-size: 0.8rem;">
						<span class="fw-bold">SENANG TOURS & TRAVEL</span>
						<br>
						<p>
							Jl. Merdeka No 9009, Denpasar - Denpasar, Bali - 80122
						</p>
					</div>
				</div>
			</div>
		</div>
	</footer>
</div>  