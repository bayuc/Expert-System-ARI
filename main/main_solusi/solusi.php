<style type="text/css">
<!--
.style2 {font-size: normal;}
-->
</style>

<script type="text/javascript">
function harusangka(jumlah){
  var karakter = (jumlah.which) ? jumlah.which : event.keyCode
  if (karakter > 31 && (karakter < 46 || karakter > 57))
    return (false);

  return (true);
}
</script>

<?php
$sid = session_id();

echo "<div class='judul' align=center><h2>Data Pasien</h2></div><br><br><br><br><table class='in' width='100%'>
<form action='proses' method='post' name='vl'>
          <tr><td>Nama</td><td> <input type=text  name='nama'> *</td></tr>
		  <tr><td height='34';>Jenis Kelamin</td><td valign='middle';>&nbsp;&nbsp; <input type=radio name='jnsk' value='Laki-laki'> Laki-laki &nbsp; <input type=radio name='jnsk' value='Perempuan'> Perempuan *</td></tr>
		   <tr><td>Usia</td><td> <input type=text name='usia' style='width:25px;' maxlength='2' onkeypress='return harusangka(event)'> Tahun *</td></tr>
		   <tr><td>Alamat Pasien</td><td> <textarea name='alamat' style='width:250px;height:100px;' ></textarea></td></tr>
          
          <tr><td></td>
		      <td>&nbsp;&nbsp;&nbsp; &nbsp;
			      
              </td></tr>
          </table> ";
		  
echo "<span class='style2'>*) Harus diisi.</span><br><br>
<div class='judul'><h2>Pilih Gejala Yang Dialami</h2></div><br>
<div style='overflow:auto;border: 1px solid #336699;width: 930px; height: auto;font-size: 15px;'>

	<table id=o width=100% ><tbody> 
	<tr>
		
		<th align=left class=th>Kode Gejala</th>
		<th align=left class=th>Gejala Penyakit</th>
		<th class=th>Jawaban</th>
	</tr>";
	$no = 0;
$tampil=mysql_query("SELECT * FROM gejala ORDER BY (SUBSTR(kd_gejala,2,2) + 0) ASC");
$nomor = 0;
$tidak=0;
$i = 1;

while ($q = mysql_fetch_array($tampil)){
  $nomor++;
  
echo"<tr>
		 <td align=center><label id='lbl$q[id_gejala]'>$q[kd_gejala]</label></td>
		 <td><label id='lbl$q[id_gejala]'>$q[nm_gejala]</label></td>
		 <td align=center>
    <label>
      <input type='radio' name='cekGejala[$nomor]' value='1'  id='cekGejala[]'/>
      YA</label>
    
    <label>
      <input type='radio' name='cekGejala[$nomor]' value='0' id='cekGejala[]'/>
      TIDAK</label>
  
 </td></tr>";

}

echo "</tbody></table></div><hr/><center><input id='hasil' size=50 name='nilai' type='hidden'/> <input name=sid value='$sid' type='hidden'><input type=submit value='Diagnosa' class='disable' id='btn'></center></form>";
?>

