<div class="col-sm-12 isotope-item women">
<h2 class="title text-center">Detail Produk</h2>
 
	<?php
	$sumber = ROOT.'/server/api.php/barang/kdbrg/'.$_REQUEST[kdbrg].'/1';
	//echo $sumber;
	$konten = file_get_contents($sumber);
	$od = json_decode('['.$konten.']', true);
		
	?>
	<?php 
		if(file_exists("uploaddir/small_front_".$od[0][kdbrg].".jpg")){ 
			$filename= "uploaddir/small_front_".$od[0][kdbrg].".jpg";
		}else{
			$filename= "uploaddir/nophoto.jpg";
		}
		?>


	
						<div class="col-sm-5">
							<div class="view-product">
								<img src="<?=$filename?>" alt="" />
								
							</div>
						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								<img src="images/product-details/new.jpg" class="newarrival" alt="" />
								<h2><?=($od[0][nmbrg])?> (<?=$od[0][kdbrg]?>)</h2>
								<span>
									<span><? if ($od[0][disk]>0) {?>
			<font style="text-decoration:line-through" color="#FF00" size="-1"><em>	Rp.<?=$jp->pt($od[0][harga])?> </em> </font> &nbsp;(<?=$od[0][disk]?> %)<br /> <b>Rp.<?=$jp->pt($od[0][harga]-($od[0][harga]*$od[0][disk]/100))?> </b>
		<? } else {?>	
         <b>Rp.<?=$jp->pt($od[0][harga])?></b>
        <? } ?>
                                    
                                    
                                    </span>
									
								</span>
								<p><b>Stok:</b> <?=($od[0][stok])?></p>
								<p><b>Deskripsi:</b> <?=($od[0][deskripsi])?></p>
								<a href=""><img src="images/product-details/share.png" class="share img-responsive"  alt="" /></a>
							</div><!--/product-information-->
						</div>
		
                   
                <?php if($_SESSION['idplg']!='') { ?>
									<a href="savetemporder.php?kdbrg=<?=$od[0][kdbrg]?>" class="flex-c-m stext-101 cl5 size-103 bg2 bor1 hov-btn1 p-lr-15 trans-04">
					Add to cart
				</a>                              
                                   
                                     <? } ?>
									  </div>