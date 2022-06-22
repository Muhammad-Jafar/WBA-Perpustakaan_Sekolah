<html>
<head>
<meta charset="UTF-8">
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="<?=assets_url('css/style.css', false);?>">
<title> <?= $title; ?> </title> 
<style>
  @media print{.no-print,.no-print *{display:none!important}}
  @font-face {
    font-family: 'Tim New Roman';
    font-style: normal;
    font-weight: 400;
    src: url('https://s3-us-west-2.amazonaws.com/lob-assets/timesnewroman.ttf') format('truetype');
  }

  *, *:before, *:after {
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
  }

  ::selection { background-color: #E13300; color: white; }
  ::-moz-selection { background-color: #E13300; color: white; }

  body {
    /* width: 11.7in; */
    /* height: 8.27in; */
    margin: auto;  
    padding: 0;
    font-family: 'Times New Roman';
    background-color: #fff;
    margin: 20px;
    font: 13px/20px normal Helvetica, Arial, sans-serif;
    color: #4F5155;
  }

  .page-portrait {
    page-break-after: always;
    visibility: visible;
    padding: .5rem;
  }


  .page-content {
    margin-left: 5rem;
    margin-right: 5rem;
    
  }

  .wrapper {
    position: absolute;
    top: 0in;
  }

  .signature {
    font-family: 'Times New Roman';
    font-weight: bold;
    font-size: 1rem;
    text-align: left;
  }

  main {
  width: 70%;
  padding: 20px;
  background-color: white;
  min-height: 300px;
  border-radius: 5px;
  margin: 30px auto;
  box-shadow: 0 0 8px #D0D0D0;
  }
  table {
  border-top: solid thin #000;
  border-collapse: collapse;
  }
  th, td {
  border-top: solid thin #000;
  padding: 6px 12px;
  }
 
   a {
  color: #003399;
  background-color: transparent;
  font-weight: normal;
  }

</style>
</head>
<div class="no-print" style="margin:0 0 20px;text-align:center; font-size:1rem;"><a href="javascript:histyle="font-weight:bold">&laquo; KEMBALI</a>   | atau |   <a href="javascript:window.print();" style="font-weight:bold">PRINT</a></div>
<body onload="window.print();">
  <div class="page-portrait-center">
    <div id="header">
      <table width="50%" border="1" cellspacing="0" cellpadding="0" align="center">
        <tbody>
          <tr>
            <td width="10%" class="center">
              <img src="<?=assets_url('logo.png', false);?>" style="width:60px"/>
            </td>
            <td class="center">
              <h3 style="text-align:center; font-family: 'Times New Roman', Times, serif;">
                <b style="font-size:27px;">PERPUSTAKAAN SMAN 1 UTAN</b>
                <br>
                <b style="font-size:25px;">Integrated Library System</b>
                <br>
                <i style="font-size:20px;">Jalan Lintas Sumbawa Besar - Utan</i>
              </h3>
            </td>
          </tr>
        </tbody>
      </table>
    </div>

    <hr height="2" width="40%" color="#000000" border-style="inset" border-width="3px"/>
      <h4 style="text-align:center"> == KOLEKSI DATA TRANSAKSI PERPUSTAKAAN ==</h4>
    <hr height="2" width="40%" color="#000000" border-style="inset" border-width="3px"/>

    <div class="page-content">
      <!-- <p><a href="<?php echo base_url('laporan/exportk_excel') ?>"> <b>Export ke Excel</b></a></p> -->
      <h5>Data Peminjaman Buku Teks Pelajaran</h5>
        <table border="1" width="100%">
          <thead>
            <tr>
              <th>Kategori Buku</th>
              <th>Jenis Buku</th>
              <th>Judul Buku</th>
              <th>Nama Peminjam</th>
              <th>NIPD</th>
              <th>Tanggal Pinjam</th>
              <th>Tanggal Kembali</th>
              <th>Status</th>
              <th>Telat</th>
              <th>Denda</th>
            </tr>
          </thead>
          <tbody>
            <?php $i=1; foreach($teks_pelajaran as $tp) { ?>
              <tr>
                <td><?php echo $tp->kategori_buku; ?></td>
                <td><?php echo $tp->jenis_buku; ?></td>
                <td><?php echo $tp->judul_buku; ?></td>
                <td><?php echo $tp->nama_anggota; ?></td>
                <td><?php echo $tp->nomor_induk; ?></td>
                <td><?php echo $tp->tgl_pinjam; ?></td>
                <td><?php echo $tp->tgl_kembali; ?></td>
                <td><?php echo $tp->status; ?></td>
                <td><?php echo $tp->telat; ?> hari</td>
                <td>Rp. <?php echo $tp->denda; ?></td>
              </tr>
            <?php $i++; } ?>
          </tbody>
        </table>
        <br>
        <h5>Data Peminjaman Buku Non Teks Pelajaran</h5>
        <table border="1" width="100%">
          <thead>
            <tr>
              <th>Kategori Buku</th>
              <th>Jenis Buku</th>
              <th>Judul Buku</th>
              <th>Nama Peminjam</th>
              <th>NIP</th>
              <th>Tanggal Pinjam</th>
              <th>Tanggal Kembali</th>
              <th>Status</th>
              <th>Telat</th>
              <th>Denda</th>
            </tr>
          </thead>
          <tbody>
            <?php $i=1; foreach($non_teks_pelajaran as $ntp) { ?>
              <tr>
                <td><?php echo $ntp->kategori_buku; ?></td>
                <td><?php echo $ntp->jenis_buku; ?></td>
                <td><?php echo $ntp->judul_buku; ?></td>
                <td><?php echo $ntp->nama_anggota; ?></td>
                <td><?php echo $ntp->nomor_induk; ?></td>
                <td><?php echo $ntp->tgl_pinjam; ?></td>
                <td><?php echo $ntp->tgl_kembali; ?></td>
                <td><?php echo $ntp->status; ?></td>
                <td><?php echo $tp->telat; ?> hari</td>
                <td>Rp. <?php echo $tp->denda; ?></td>
              </tr>
            <?php $i++; } ?>
          </tbody>
        </table>
        <br>
        <br>
        <br>
        <tr> 
          <td>
            <table width="22%" border="1" cellspacing="0" cellpadding="0" align="right" >
              <tr color="#000000"> 
                <td>Sumbawa, <?= date("d-m-Y");?> </td>
              </tr>
              <tr>
                <td><p class="signature"> KEPALA PERPUSTAKAAN SMAN 1 UTAN</p></td>
              </tr>
              <tr>
                <td align="end"><p style="text-align: center; font-size: 1.5rem; font-weight: bold;"> <br><br><br><br><br> Novi, S.Kom </p> </td>
              </tr>
              <tr>
              <td align="top"><p style="text-align: center; font-size: 1.2rem;">NIP.69084353 </p> </td>
              </tr>
            </table>
          </td>
        </tr>
    </div>
  </div>  
</body>

</html>