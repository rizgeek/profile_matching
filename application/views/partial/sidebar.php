
<!-- Page Sidebar -->
<div class="page-sidebar">
	<a class="logo-box" href="#">
		<span><?=nama_aplikasi?></span>
		<i class="icon-close" id="sidebar-toggle-button-close"></i>
	</a>
	<div class="page-sidebar-inner">
		<div class="page-sidebar-menu">
			<ul class="accordion-menu">
			<?php for($i = 0; $i< count($menu); $i++): ?>
				<?php if(!$menu[$i]["child"]): ?>
				<li>
					<a href="<?=$menu[$i]["url"]?>">
						<i class="menu-icon <?=$menu[$i]["icon"]?>"></i><span><?=$menu[$i]["label"]?></span>
					</a>
				</li>
				<?php else: ?>
				<li>
					<a href="javascript:void(0);">
						<i class="menu-icon <?=$menu[$i]["icon"]?>"></i><span><?=$menu[$i]['label']?></span><i
							class="accordion-icon fa fa-angle-left"></i>
					</a>
					<ul class="sub-menu">
						<?php for($j = 0; $j < count($menu[$i]['child_menu']); $j++): ?>
							<li><a href="<?=$menu[$i]['child_menu'][$j]['url']?>"><?=$menu[$i]['child_menu'][$j]['label']?></a></li>
						<?php endfor; ?>

					</ul>
				</li>
				<?php endif; ?>
				<?php endfor; ?>
			</ul>
		</div>
	</div>
</div><!-- /Page Sidebar -->
