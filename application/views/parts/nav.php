<div class="art-nav">
	<div class="l"></div>
	<div class="r"></div>
	<ul class="art-menu">
		<li>
			<a href="<?=base_url()?>" class="active"><span class="l"></span><span class="r"></span><span class="t">Home</span></a>
		</li>
		<li>
			<a href="#"><span class="l"></span><span class="r"></span><span class="t">Kategori</span></a>
			<ul>
				<li><a href="<?=base_url()?>index.php/book">Semua</a></li>
				<?php
				foreach($kategori as $kat){
                    echo "<li><a href='".base_url()."index.php/book/show_books/".$kat->get_id()."'>".$kat->get_name()."</a></li>";
                }
				?>
			</ul>
		</li>
		<li>
			<a href="index.php?page=about"><span class="l"></span><span class="r"></span><span class="t">About</span></a>
		</li>
	</ul>
</div>