

<section class="bg-img1 txt-center p-lr-15 p-tb-92" style="background-image: url('images/bg-02.jpg');">
	<h2 class="ltext-105 cl0 txt-center">
		Register
	</h2>
</section>	

<section class="bg0 p-t-104 p-b-116">
	<div class="container">
		<div class="flex-w flex-tr">
			<div class="col-md-12">
				<div class="size-310 bor10 p-lr-170 p-t-55 p-b-70 p-lr-15-lg w-full-md">
					<form method="POST" action="<?php echo base_url()?>frontend/save_register">
						<h4 class="mtext-105 cl2 txt-center p-b-30">
							Register
						</h4>

						<?php
						$gid=$this->m_padmin->get_max_id();
						$cg=$gid->row_array();
						?>
						<input type="hidden" name="userid" value="<?php echo $cg['maxuser']+1; ?>">
						
						<div class="bor8 m-b-20 how-pos4-parent">
							<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="nama" placeholder="Nama Lengkap">
						</div>
						<div class="bor8 m-b-20 how-pos4-parent">
							<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="text" name="username" placeholder="Username">
						</div>
						<div class="bor8 m-b-20 how-pos4-parent">
							<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="password" name="password" placeholder="Password">
						</div>
						<div class="bor8 m-b-20 how-pos4-parent">
							<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="password" name="repassword" placeholder="RePassword">
						</div>
						<div class="bor8 m-b-20 how-pos4-parent">
							<input class="stext-111 cl2 plh3 size-116 p-l-62 p-r-30" type="email" name="email" placeholder="Email">
						</div>

						<button class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer">
							Submit
						</button>
					</form>
				</div>
			</div>

		</div>
	</div>
</section>	

