<div class="col-sm-12 isotope-item women">
<style type="text/css">
<!--
.style6 {color: #0000FF}
-->
</style>
<div class="login-form">
<script src="js/gen_validatorv31.js" language="javascript"></script>
<form action="script.php" method="post" name="formLogin" id="formLogin">
  <table width="100%" border="0" cellspacing="1" cellpadding="1">
   <tr align="left" valign="top" >
      <td> Email</td>
      <td>:</td>
      <td>
      <input class="form-control" type="text" name="namauser" id="namauser" style="width:300px"/>
     </td>
	 
    </tr>
    <tr align="left" valign="top" >
      <td> Password </td>
      <td>:</td>
      <td><input name="passuser" type="password" class="form-control" id="passuser" style="width:200px"/></td>
    </tr>
     
  
    
    <tr align="left" valign="top" >
      <td colspan="2" align="left">&nbsp;  </td>
      <td  align="left">
         <button class="flex-c-m stext-101 cl0 size-103 bg3 bor1 hov-btn3 p-lr-11 trans-04 pointer" onclick="return doSubmit()">
							Login
						</button>
      
      					
	  
    
      
      
   
    </tr>
  </table>
</form>
</div>
</div>
<script language="javascript">
	var v = new Validator("formLogin");
	v.addValidation("namauser","req","Email tidak boleh kosong");
	v.addValidation("passuser","req","Password tidak boleh kosong");
	
	
</script>
