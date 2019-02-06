  <div class="w3-container">
    <br>
    <a href="export.php?e=get_all" target="_blank" class="w3-btn w3-teal w3-padding w3-margin">
    Export Data</a>
     <a href="export.php?e=get_ujian" target="_blank" class="w3-btn w3-teal w3-padding w3-margin">Export data untuk ujian </a>
    <?php
    if(empty($_GET['a']) || $_GET['a'] == 'index')
    {
?>
  <table class="w3-table-all w3-hoverable">
    <thead>
      <tr class="w3-light-grey">
        <th>No</th>
        <th>Nama</th>
        <th>Merokok</th>
        <th>Bertato</th>
        <th>Buta warna</th>
        <th>Berkebutuhan khusus</th>
        <th>Status</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $n=1;
      $q = $db->query('SELECT * FROM registrasi,data_casis,trespass WHERE registrasi.id_reg=data_casis.id_reg AND trespass.id_casis=data_casis.id_casis ');
      while($l = $db->fetch($q))
        {echo'
    <tr>
      <td>'.$n++.'</td>
      <td>'.$l['nama_lengkap'].'</td>
      <td>'.$l['merokok'].'</td>
      <td>'.$l['bertato'].'</td>
      <td>'.$l['bw'].'</td>
      <td>'.$l['bk'].'</td>
      <td>';
      if($l['status'] == 'lulus')
      {
        echo'
      <form method="post" onchange="this.submit();">
      <select name="status">
      <option value="lulus" selected>LULUS</option>
      <option value="tidak">TIDAK LULUS</option>
      </select>
      <input type="hidden" name="id" value="'.$l['id_reg'].'">
      </form>';
    }else{
       echo'
      <form method="post" onchange="this.submit();">
      <select name="status">
      <option value="tidak" selected>TIDAK LULUS</option>
      <option value="lulus" >LULUS</option>
      </select>
      <input type="hidden" name="id" value="'.$l['id_reg'].'">
      </form>';
    }
    echo'
      </td>
      <td><a href="export.php?e=single&id='.$l['id_casis'].'" target="_blank">Export</a> | <a href="?a=del&id1='.$l['id_reg'].'&id2='.$l['id_casis'].'">Delete</a></td>
    </tr>';
  }
  if(isset($_POST['status']))
  {
    $q = $db->update('registrasi',['status' => $_POST['status']],['id_reg' => $_POST['id']]);
    $core->redirect('admin.php');  }
  ?>
  </tbody>
  </table>
  <?php
}else{
if($_GET['a'] == 'setdat')
{
  $q = $db->select('jadwal');
  $f = $db->fetch($q);
  ?><br/><br>
  <div class="w3-card w3-container w3-center" style="width:50%;margin: 0 auto;">
    <div class="w3-panel w3-teal">
      <h3>Atur tanggal ujian</h3>
    </div>
    <form method="post">
      <label>Tanggal ujian</label>
      <input type="text" name="tgl" class="w3-input w3-border" value="<?=$f['tanggal'];?>"><br>
      <label>Jam ujian</label>
      <input type="text" name="jam" class="w3-input w3-border" value="<?=$f['jam'];?>"><br>
      <label>Homepage ujian (Url)</label>
      <input type="text" name="url" class="w3-input w3-border" value="<?=$f['homepage'];?>"><br>
      <label>Keterangan</label>
      <textarea class="w3-input w3-border" name="ket">
      <?=$f['keterangan'];?>
      </textarea><br>
      <input type="submit" name="sbmt" class="w3-btn w3-teal" value="Simpan jadwal !"><br><br>
    </form>
  </div> 
  <?php
  if(isset($_POST['sbmt']))
  {
    $tgl = $core->filter_xss($_POST['tgl']);
    $hm = $core->filter_xss($_POST['url']);
    $kt = $core->filter_xss($_POST['ket']);
    $jm = $core->filter_xss($_POST['jam']);

    $db->query("UPDATE jadwal SET tanggal='$tgl',jam='$jm',homepage='$hm',keterangan='$kt' ");
    $core->redirect('?a=setdat');
  }
}
elseif ($_GET['a'] == 'del') {
  $db->delete('registrasi',['id_reg' => $_GET['id1']]);
  $db->delete('data_casis',['id_reg' => $_GET['id1']]);
  $db->delete('trespass',['id_casis' => $_GET['id2']]);
  $db->delete('nilai_un',['id_casis' => $_GET['id2']]);
  $core->redirect('?');
}
elseif ($_GET['a'] == 'logout') {
  session_destroy();
  $core->redirect('?');
}
}
?>
</div>