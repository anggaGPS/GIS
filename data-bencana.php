<?php
if(isset($_POST['submit'])){

	$id_bencana=$_POST['id_bencana'];
	$nama_bencana=ucwords($_POST['nama_bencana']);
	
	$query=mysql_query("insert into tbl_bencana values('$id_bencana','$nama_bencana')");
	
	if($query){
		?><script language="javascript">alert('Berhasil Input Data')</script><?php
		?><script language="javascript">document.location.href="?page=data-bencana"</script><?php
	}else{
		echo mysql_error();
	}
	
}else{
	unset($_POST['submit']);
}

if(isset($_GET['mode'])=='delete'){
	 $id_bencana=$_GET['id_bencana'];
	 mysql_query("delete from tbl_bencana where id_bencana='$id_bencana'");
}
?>
 <link href="dist/css/vendor/bootstrap.min.css" rel="stylesheet">

    <!-- Loading Flat UI -->
    <link href="dist/css/flat-ui.css" rel="stylesheet">
    <link href="docs/assets/css/demo.css" rel="stylesheet">

    <link rel="shortcut icon" href="img/favicon.ico">

<table width="477" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
	<td align="left" valign="top" class="heading">Data Bencana</td>
  </tr>
  <tr>
	<td align="left" valign="top" style="padding-top:20px;"><form method="post" action="?page=data-bencana" style="margin:auto;">
	
	  <table width="94%" border="0" align="left" cellpadding="0" cellspacing="0" class="border">
	   <div class="row">
        <div class="col-xs-3">
          <div class="form-group">
		  <tr>
		   <td width="36%" align="left" valign="middle"><span style="color:#858585;">ID Bencana : </span></td>
           <td> <input type="text" value="" name="id_bencana" placeholder="id bencana" class="form-control" /> </td>
		   </tr>
          </div>
        </div>
		
		<tr>
		  <td width="36%" align="left" valign="middle"><span style="color:#858585;">Nama Bencana : </span></td>
           <td> <input type="text" value="" name="nama_bencana" placeholder="Nama Bencana" class="form-control" /> </td>
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
			
			<th><h3>ID Bencana</h3></th>
			<th><h3>Nama Bencana</h3></th>
			<th><h3>Aksi</h3></th>
		</tr>
	</thead>
	<tbody>
	 <?php
		$query=mysql_query("SELECT * FROM tbl_bencana");					

		while($row=mysql_fetch_assoc($query)){
			?>
			<tr>
		
				<td><?php echo $row['id_bencana'];?></td>
				<td><?php echo $row['nama_bencana'];?></td>
				<td><img src="images/edit.png"> <a href="?page=data-bencana&mode=delete&id_bencana=<?php echo $row['id_bencana'];?>" onClick="return confirm('Apakah Anda Yakin?')"><img src="images/delete.png"></a></td>
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
