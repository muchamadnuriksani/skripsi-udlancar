<div class="col-sm-12 isotope-item women">
<?php
	$result = $jp->sql("select * from pelanggan where idplg='".$_SESSION[idplg]."'");
	$od = $jp->fetch($result);
?>


<table width="100%" border="0" cellspacing="0" cellpadding="2">
        
        <tr>
          <td width="185" height="20" valign="top">Email </td>
          <td colspan="2" valign="top"> : 
            <?=$od[idplg]?> 
         </td>
        </tr>
		<tr>
          <td width="185" height="20" valign="top">Password </td>
          <td colspan="2" valign="top"> : 
            <?=$od[pass]?> 
         </td>
        </tr>
         <tr>
          <td height="19" valign="top">Nama </td>
          <td colspan="2" valign="top"> : 
          <?=$od[nama]?></td>
        </tr>
		 
		  <tr>
          <td height="19" valign="top">Alamat</td>
          <td colspan="2" valign="top"> : 
          <?=$od[alamat]?> <?=$od[kota]?></td>
        </tr>
		  <tr>
          <td height="19" valign="top">Telepon</td>
          <td colspan="2" valign="top"> : 
          <?=$od[telepon]?></td>
        </tr>
		
		
       
    </table>
</div>