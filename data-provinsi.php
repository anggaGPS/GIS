<?php
if(isset($_POST['submit'])){

	$id_prov=$_POST['id_prov'];
	$nama_prov=ucwords($_POST['nama_prov']);
	$ibu_kota=ucwords($_POST['ibu_kota']);
	
	$query=mysql_query("insert into tbl_provinsi values('$id_prov','$nama_prov','$ibu_kota')");
	
	if($query){
		?><script language="javascript">alert('Berhasil Input Data')</script><?php
		?><script language="javascript">document.location.href="?page=data-provinsi"</script><?php
	}else{
		echo mysql_error();
	}
	
}else{
	unset($_POST['submit']);
}

if(isset($_GET['mode'])=='delete'){
	 $id_prov=$_GET['id_prov'];
	 mysql_query("delete from tbl_provinsi where id_prov='$id_prov'");
}
?>
<link href="dist/css/vendor/bootstrap.min.css" rel="stylesheet">

    <!-- Loading Flat UI -->
    <link href="dist/css/flat-ui.css" rel="stylesheet">
    <link href="docs/assets/css/demo.css" rel="stylesheet">

    <link rel="shortcut icon" href="img/favicon.ico">

<table width="477" border="0" align="center" cellpadding="0" cellspacing="0">

  <tr>
	<td align="left" valign="top" class="heading">Data Provinsi</td>
  </tr>
  
  
	<td align="left" valign="top" style="padding-top:20px;"><form method="post" action="?page=data-provinsi" style="margin:auto;">
	  <table width="94%" border="0" align="left" cellpadding="0" cellspacing="0" class="border">
		
		 <div class="row">
        <div class="col-xs-3">
          <div class="form-group">
		  <tr>
		   <td width="36%" align="left" valign="middle"><span style="color:#858585;">ID Provinsi : </span></td>
           <td> <input type="text" value="" name="id_prov" placeholder="id provinsi" class="form-control" /> </td>
		   </tr>
          </div>
        </div>
		
		<tr>
 <div class="row">
        <div class="col-xs-3">
          <div class="form-group">
		  <tr>
		   <td width="36%" align="left" valign="middle"><span style="color:#858585;">Nama Provinsi : </span></td>
           <td> <input type="text" value="" name="nama_prov" placeholder="Nama Provinsi" class="form-control" /> </td>
		   </tr>
          </div>
        </div>
		</tr>
		<tr>
		 <div class="row">
        <div class="col-xs-3">
          <div class="form-group">
		  <tr>
		   <td width="36%" align="left" valign="middle"><span style="color:#858585;">Ibu Kota : </span></td>
           <td> <input type="text" value="" name="ibu_kota" placeholder="Ibuku Kota" class="form-control" /> </td>
		   </tr>
          </div>
        </div>
		  </tr>
		<tr>
		  <td align="left" valign="middle">&nbsp;</td>
		  <td colspan="2" style="padding-top:6px; padding-bottom:6px;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
			   <tr>
			   <div class="row demo-row">
        <div class="col-xs-3">
				<td width="33%"><input class="btn btn-primary btn-lg btn-block"  type="submit" name="submit" value="Submit"></td>
				<td width="67%"></td>
				  </div>
				  </div> 
			  </tr>
		  </table></td>
		</tr>
	  </table>
	</form></td>
  </tr>
</table>


<table cellpadding="0" cellspacing="0" border="0" id="table" class="sortable">
	<thead>
		<tr>

			<th><h3>ID Provinsi</h3></th>
			<th><h3>Nama Provinsi</h3></th>
			<th><h3>Ibu Kota</h3></th>
			<th><h3>Aksi</h3></th>
		</tr>
	</thead>
	<tbody>
	 <?php
		$query=mysql_query("SELECT * FROM tbl_provinsi");					

		while($row=mysql_fetch_assoc($query)){
			?>
			<tr>
			
				<td><?php echo $row['id_prov'];?></td>
				<td><?php echo $row['nama_prov'];?></td>
				<td><?php echo $row['ibu_kota'];?></td>
				<td><img src="images/edit.png"> <a href="?page=data-provinsi&mode=delete&id_prov=<?php echo $row['id_prov'];?>" onClick="return confirm('Apakah Anda Yakin?')"><img src="images/delete.png"></a></td>
			</tr>
			<?php
		}
	?>
	</tbody>
</table>

	<script type="text/javascript" src="script.js"></script>
	<script type="text/javascript">
		var sorter = new TINY.table.sorter("sorter");
		sorter.head = "head";
		sorter.asc = "asc";
		sorter.desc = "desc";
		sorter.even = "evenrow";
		sorter.odd = "oddrow";
		sorter.evensel = "evenselected";
		sorter.oddsel = "oddselected";
		sorter.paginate = true;
		sorter.currentid = "currentpage";
		sorter.limitid = "pagelimit";
		sorter.init("table",0);
	</script>
