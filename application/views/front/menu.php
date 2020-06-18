<div class="container-fluid">
	<div class="row mt-5">
	<?php foreach ($menu as $menu) : ?>
		<?php if ($menu->status == "Publish") { ?>
				<div class="col-md-3 mb-5">
					<div class="card" style="width: 18rem;">
						<img src="<?= base_url('assets/uploads/menu/' . $menu->gambar) ?>" class="card-img-top" alt="...">
						<div class="card-body">
							<h5 class="card-title">Nama menu : <?= $menu->nama_menu ?></h5>
							<p class="card-text"><?= $menu->deskripsi ?></p>
							<p class="card-text">Harga : <?= number_format($menu->harga, 2, ',', '.') ?></p>
						</div>
					</div>
				</div>
			<?php
		} ?>
	<?php endforeach; ?>
	</div>
	<div class="row">
			<div class="col">
				<?= $pagination ?>
			</div>
		</div>
</div>