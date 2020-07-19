<?php 

$q=$jp->sql("select a.*,b.nmkategori from barang a left join kategori b on a.kdkategori=b.kdkategori WHERE stok>0");
$n = 0; while($oPromo = $jp->fetch($q))
{$n++; 
			if(file_exists("uploaddir/small_front_".$oPromo[kdbrg].".jpg"))
				{ 
					$filename= "uploaddir/small_front_".$oPromo[kdbrg].".jpg";
				}else
				{
					$filename= "uploaddir/nophoto.jpg";
				}
			?>
						
					
					<div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item women">
					<!-- Block2 -->
					<div class="block2">
						<div class="block2-pic hov-img0">
							<img src="<?=$filename?>" alt="IMG-PRODUCT" width="291" height="211">

							<a href="index.php?page=detail&kdbrg=<?=$oPromo[kdbrg]?>" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 ">
								Detail
							</a>
						</div>

						<div class="block2-txt flex-w flex-t p-t-14">
							<div class="block2-txt-child1 flex-col-l ">
								
									<?=$oPromo[nmbrg]?>
								
								<span class="stext-105 cl3">
									Rp.<?=$jp->pt($oPromo[harga])?>
								</span>
							</div>
							<?php if($_SESSION['idplg']!='') { ?>
							<div class="block2-txt-child2 flex-r p-t-3">
								<a href="savetemporder.php?kdbrg=<?=$oPromo[kdbrg]?>" class="btn-addwish-b2 dis-block pos-relative">
									<img class="icon-heart1 dis-block trans-04" src="images/icons/icon-heart-01.png" alt="ICON">
									<img class="icon-heart2 dis-block trans-04 ab-t-l" src="images/icons/icon-heart-02.png" alt="ICON">
								</a>
							</div>
							<? } ?>
						</div>
					</div>
				</div>
					
				
						

 <?php 
	}; 
	?>






