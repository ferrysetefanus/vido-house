<header id="header">
	<!-- bagian nadya (start) -->
	<!-- bagian nadya (finish) -->
	<!-- bagian david -->
	<div class="container">
		<div id="mySidenav" class="sidenav">
			<?php if ($this->session->userdata('username')) {
				echo "<h5 class='text-center'>Hallo, ". $this->session->userdata('username') ." </h5>";
			} ?>
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
			<?php if ($this->session->userdata('username')) {
				echo anchor('auth/logout', 'Logout');
			} else {
				echo anchor('auth/login', 'Login & Sign Up');
			} ?>
			<a href="#contact">Book a table</a>
		</div>
		<!-- Use any element to open the sidenav -->
		<span onclick="openNav()" class="pull-right menu-icon">☰</span>
	</div>
	<!-- bagian david -->
</header>