<?php
require_once "config/connect.php";
//session_start();
include "index.php";

  if($_GET['mod']=='editMasuk')?>
  <p>Input Surat Masuk</p> 
    <form id="formID" method="post" action="index.php?mod=editMasuk";>
      <table bgcolor="EAFFEA">
              <tr>
                <td>Tanggal Terima</td>
                <td></td>
               <?php $date = date("Y-m-d"); ?> 
                <td><input id="tglterima" class="text validate[required]" type="text" name="tgltrm" value="<?php echo "$date" ?>"  />(bulan-tanggal-tahun)</td>
             </tr>
             <tr>
            <td>Asal Surat</td>
                <td></td>
                <td><input id="asal" class="text validate[required]" type="text" name="asal"  /></td>
             </tr>
             <tr>
            <td>Nomor Surat</td>
                <td></td>
                <td><input id="no_surat" class="text validate[required]" type="text" name="no_surat"  /></td>
             </tr>
             <tr>
                <td>Tanggal pelaksanaan</td>
                <td></td>
               <?php $date = date("Y-m-d"); ?> 
                <td><input id="tglsurat" class="text validate[required]" type="text" name="tglsrt" value="<?php echo "$date" ?>"  />(bulan-tanggal-tahun)</td>
             </tr>
             <tr>
                    <td>Perihal</td>
                    <td></td>
                    <td><select name="prihal">
                        <option selected="selected" value="Biasa">Biasa</option>
                        <option value="Undangan">Undangan</option>
                        <option value="Pengantar">Pengantar</option>
                        <option value="Rahasia">Rahasia</option>
                        <option value="Arsip">Arsip</option>
                    </select></td>
                </tr>
                 <tr>
                    <td>Di Tujukan</td>
                    <td></td>
                    <td><select name="di_tujukan">
                      <option selected="selected" value="Rek">Rek</option>
                        <option value="WR.I">WR.I</option>
                        <option value="WR.II">WR.II</option>
                        <option value="WR.III">WR.III</option>
                        <option value="Dir.I">Dir.I</option>
                        <option value="Dir.II">Dir.II</option>
                        <option value="Dir.III">Dir.III</option>
                        <option value="DK.FAI">DK.FAI</option>
                        <option value="DK.FTK">DK.FTK</option>
                        <option value="DK.FSH">DK.FSH</option>
                        <option value="DK.FIS">DK.FIS</option>
                        <option value="PAI">PAI</option>
                        <option value="AS">AS</option>
                        <option value="PSy">PSy</option>
                        <option value="Sos">Sos</option>
                        <option value="Psi">Psi</option>
                        <option value="Hkm">Hkm</option>
                        <option value="Akt">Akt</option>
                        <option value="PAUD">PAUD</option>
                        <option value="SI">SI</option>
                        <option value="TI">TI</option>
                        <option value="TE">TE</option>
                        <option value="TIn">TIn</option>
                        <option value="TA">TA</option>
                        <option value="PGMI">PGMI</option>
                        <option value="SKI">SKI</option>
                        <option value="ESy">ESy</option>
                        <option value="PPM">PPM</option>
                        <option value="LP3M">LP3M</option>
                        <option value="LPM">LPM</option>
                        <option value="BEM">BEM</option>
                    </select></td>
                </tr>
             <tr valign="top">
            <td>Keterangan</td>
                <td></td>
                <td><textarea id="keterangan" cols="50px" rows="5px" name="keterangan" class="" /></textarea></td>
             </tr>
            <tr>
              <td></td>
              <td colspan="2"><input type="submit" name="save" class="button button1" value="Simpan" />
              </td></td>
             </tr>
         </table>
         </form>
    
    
