<style>
	.border-left-primary {
		border-left: .25rem solid #4e73df !important;
	}

	.border-left-success {
		border-left: .25rem solid #1cc88a !important;
	}

	.border-left-info {
		border-left: .25rem solid #36b9cc !important;
	}

	.border-left-warning {
		border-left: .25rem solid #f6c23e !important;
	}

	.card {

		--bs-card-border-width: 0px;
		--bs-card-border-color: #fff;

	}

	a {
		color: #4e73df;
		text-decoration: none;
		background-color: transparent
	}
</style>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
	<!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
			class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
</div>

<!-- Content Row -->
<div class="row">

	<!-- Earnings (Monthly) Card Example -->
	<div class="col-xl-6 col-md-6 mb-4">
		<div class="card border-left-primary shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
							Flashcards</div>
						<div class="h5 mb-0 font-weight-bold text-gray-800">
							<?php echo anchor("flashcard/displayalllist", $total_flash) ?>
						</div>
					</div>
					<div class="col-auto">
						<i class="fa-duotone fa-file-lines fa-2x text-gray-300"></i>

					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Earnings (Monthly) Card Example -->
	<div class="col-xl-6 col-md-6 mb-4">
		<div class="card border-left-success shadow h-100 py-2">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
							Notes</div>
						<div class="h5 mb-0 font-weight-bold text-gray-800">
							<?php echo anchor("quicknote/list", $total_notes); ?>
						</div>
					</div>
					<div class="col-auto">
						<i class="fa-duotone fa-notes fa-2x text-gray-300"></i>
						<!-- <i class="fa-duotone fa-notes"></i> -->
					</div>
				</div>
			</div>
		</div>
	</div>

</div>