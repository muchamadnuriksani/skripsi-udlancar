<div class="col-sm-12 isotope-item women">
<style type="text/css">
<!--
.style6 {color: #0000FF}
-->
</style>
<script type="text/javascript" src="js/jquery-min.js"></script>
<script>
var $j = jQuery.noConflict();
$j(document).ready(function(){
    $j('#custpass2').focus();
	$j('#custpass2').on('change',function(){
		if ($j(this).val()!=''){
			$j.ajax({

				type: 'post',
				url:'cekpass.php',
				data: {'custpass2': $j(this).val(),'custpass': $j('#custpass').val()},
				success: function(response){
				
					$j('#hasilcek1').html(response);
					$j('#hasilcek1').css('color','red');
					$j('#hasilcek1').css('font-size','14px');
				}
			});
		}
	});
});
</script>

<script type="text/javascript" src="js/jquery-min.js"></script>
<script>
var $j = jQuery.noConflict();
$j(document).ready(function(){
    $j('#custlogin').focus();
	$j('#custlogin').on('change',function(){
		if ($j(this).val()!=''){
			$j.ajax({

				type: 'post',
				url:'cekuser.php',
				data:{'custlogin':$j(this).val() },
				success: function(response){
				
					$j('#hasilcek').html(response);
					$j('#hasilcek').css('color','red');
					$j('#hasilcek').css('font-size','14px');
				}
			});
		}
	});
});
</script>

<div class="login-form">
<script src="js/gen_validatorv31.js" language="javascript"></script>
<form action="savecustomer.php" method="post" name="formCustomer" id="formCustomer">
  <table width="100%" border="0" cellspacing="1" cellpadding="1">
   <tr align="left" valign="top" >
      <td> Email</td>
      <td>:</td>
      <td>
      <input class="form-control" type="text" name="custlogin" id="custlogin" style="width:300px"/>
      <div id="hasilcek" style="display:inline "></div></td>
	 
    </tr>
    <tr align="left" valign="top" >
      <td> Password </td>
      <td>:</td>
      <td><input name="custpass" type="password" class="form-control" id="custpass" style="width:200px"/></td>
    </tr>
     <tr align="left" valign="top" >
      <td> Ulangi Password</td>
      <td>:</td>
      <td><input name="custpass2" type="password" class="form-control" id="custpass2"  style="width:200px"/>
	  <div id="hasilcek1" style="display:inline "></div></td>
    </tr>
    <tr align="left" valign="top" >
      <td width="175">Nama</td>
      <td width="8">:</td>
      <td width="325"><input name="custnm" type="text" class="form-control" id="custnm" style="width:350px" />
      </td>
    </tr>
   
      <tr align="left" valign="top" >
      <td>Alamat </td>
      <td>:</td>
      <td><textarea name="custalm" class="form-control" id="custalm" style="width:500px"></textarea></td>
    </tr>
    
    
    <tr align="left" valign="top" >
      <td>Kota</td>
      <td>:</td>
      <td><select name='custkota' onChange='hrg_kirim(this.form.custkota,this.form.harga_kirim_rp);' style="width:300px" class="form-control" >
		    <option value="">---</option>
		    <?php 
		  $rkota = $jp->sql("select * from biayakirim order by kota");
		  while($rowkota = $jp->fetch($rkota)){
		  $isSelKota = (($_POST[kota]==$rowkota[kota])?"selected":"");
		  ?>
		  	  <option value="<?=$rowkota[kota]?>" <?=$isSelKota?> > <?=$rowkota[kota]?> </option>
		    <?php } ?>
            </select>
</td>
    </tr>
    <tr align="left" valign="top">
      <td>Telepon</td>
      <td>:</td>
      <td><input name="custhp" type="text" class="form-control" id="custhp" style="width:200px"/></td>
    </tr>
  
    
    <tr align="left" valign="top" >
      <td colspan="2" align="left">&nbsp;  </td>
      <td  align="left">
        <button class="flex-c-m stext-101 cl0 size-103 bg3 bor1 hov-btn3 p-lr-11 trans-04 pointer" onclick="return doSubmit()">
  
							Registrasi
						</button>
      
      					
	  
    
      
      
   
    </tr>
  </table>
</form>
</div>
</div>
<script language="javascript">
	var v = new Validator("formCustomer");
	v.addValidation("custlogin","req","Email tidak boleh kosong");
	v.addValidation("custpass","req","Password tidak boleh kosong");
	v.addValidation("custpass2","req","Re-type Password tidak boleh kosong");
	v.addValidation("custnm","req","Nama tidak boleh kosong");
    v.addValidation("custalm","req","Alamat tidak boleh kosong");
	v.addValidation("custhp","req","HP tidak boleh kosong");
	v.addValidation("custemail","req","Email tidak boleh kosong");
	
</script>
