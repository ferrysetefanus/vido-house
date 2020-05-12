<header id="header">
	<!-- bagian nadya (start) -->
	<!-- bagian nadya (finish) -->
	<!-- bagian david -->
	<div class="container">
		<div id="mySidenav" class="sidenav">
			<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
			<div class="search" style="padding: 15px;">
				<input type="text" class="searchTerm" placeholder="Cari Sesuatu?">
				<button type="submit" class="searchButton">
					<i class="fa fa-search"></i>
				</button>
			</div>
			<a href="<?= base_url() ?>">Home</a>
			<a href="#event">Event</a>
			<a href="#menu-list">Menu</a>
			<a href="<?= base_url('auth/login') ?>">Login & Sign Up</a>
			<a href="#contact">Book a table</a>
		</div>
		<!-- Use any element to open the sidenav -->
		<span onclick="openNav()" class="pull-right menu-icon">☰</span>
	</div>
	<!-- bagian david -->
</header>