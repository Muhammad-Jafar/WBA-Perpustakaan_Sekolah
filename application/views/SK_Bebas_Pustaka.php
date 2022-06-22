<html>
<head>
<title>Surat Keterangan</title>
<meta http-equiv="Content-Type" content="text/html; charset=Windows-1252">
<style>
  @media print {
    .no-print,.no-print * {
      display:none!important
    }
  }
  body, table {
    font-family: Arial, Helvetica;
    font-size: 13px !important;
  }
  @font-face {
    font-family: 'Loved by the King';
    font-style: normal;
    font-weight: 400;
    src: url('<?=assets_url('fonts/LovedbytheKing/LovedbytheKing.ttf');?>') format('truetype');
  }
  .kop-surat {
    font-size: 26px;
  }
  .title {
    font-size: 18px;
  }
  .eng {
    font-family: Arial, Helvetica;
    font-size:9px; font-style:italic;
  }
  .signature {
    font-family: 'Loved by the King';
    font-size: 30px;
  }
</style>
</head>
<body bgcolor="#FFFFFF">
<table width="670" border="0" cellspacing="2" cellpadding="2" align="center">
  <tr> 
    <td> 
      <div align="center">
        <b class="kop-surat">PERPUSTAKAAN SMAN 1 UTAN</b><br>
        Utan, Sumbawa Nusa Tenggara Barat
      </div>
      <hr size="2" align="center" width="100%" color="#000000"/>
    </td>
  </tr>
  <tr> 
    <td> 
      <div align="center" class="title"><b>SURAT 
        KETERANGAN BEBAS PUSTAKA</b><br>
      </div>
    </td>
  </tr>
  <tr> 
    <td>&nbsp;<br></td>
  </tr>
  <tr>
    <td style="text-align: right;">Sumbawa, <?=date("d M Y");?></td>
  </tr>
  <tr> 
    <td>&nbsp;<br></td>
  </tr>
  <tr>
    <div align="left">
      <td>
      <table width="100%" border="0" cellspacing="1" cellpadding="1">
        <tr> 
          <td width="13%">Nomor</td>
          <td width="70%">: <?= $data->kode_sk; ?> </td>
        </tr>
        <tr> 
          <td width="13%">Hal</td>
          <td width="70%">: Pernyataan Bebas Peminjaman Buku Perpustakaan</td>
        </tr>
      </table>
    </td>
    </div>
  </tr>
  <tr> 
    <td>&nbsp;<br></td>
  </tr>
  <tr> 
    <td>&nbsp;<br>
    </td>
  </tr>
  <tr>
    <td>Yang bertanda tangan dibawah ini :<br>
    </td>
  </tr>
  <tr> 
    <td> 
      <table width="100%" border="0" cellspacing="1" cellpadding="1">
		    <tr><td>&nbsp;</td></tr>
        <tr> 
          <td width="1%">&nbsp;</td>
          <td width="29%">Nama</td>
          <td width="70%">:&nbsp; <b> <?=strtoupper($data->nama_anggota);?> </b> </td>
        </tr>
        <tr> 
          <td width="1%">&nbsp;</td>
          <td width="29%">Nomor Induk Pegawai</td>
          <td width="70%">:&nbsp; <?=$data->nomor_induk;?> </td>
        </tr>
        <tr> 
          <td width="1%">&nbsp;</td>
          <td width="29%">Kelas</td>
          <td width="70%">:&nbsp;  <?=$data->kelas;?> </td>
        </tr>
        <tr> 
          <td width="1%">&nbsp;</td>
          <td width="29%">Jurusan</td>
          <td width="70%">:&nbsp; <?=$data->jurusan;?></td>
        </tr>
      </table>
    </td>
  </tr>
  <tr> 
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Berdasarkan peraturan Kepala sekolah Nomor. 12 Tahun 2002 tentang persyaratan pengambilan ijazah pasal 1 ayat 2 yang berunyi bahwa siswa harus mengembalikan buku dan melunasi denda sebelum bisa mengambil ijazah disekolah. <br>
        Maka Dengan ini, siswa yang namanya tercantum pada data diatas dinyatakan <b>TELAH BEBAS DARI PEMINJAMAN BUKU </b> dan / atau <b>TELAH MELUNASI DENDA TELAT PEMINJAMAN BUKU</b>.<br>
    </td>
  </tr>
  <tr> 
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Demikian surat keterangan ini dibuat agar dapat dipergunakan sebagaimana mestinya, atas perhatian dan kebijaksanaannya saya ucapkan banyak terima kasih.</td>
  </tr>
  <tr>
    <td>&nbsp;<br><br><br></td>
  </tr>
  <tr> 
    <td>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr align="center"> 
          <td width="45%">Kepala Perpustakaan SMAN 1 UTAN<br></td>
          <td width="45%">Pemohon,<br></td>
        </tr>
        <tr align="center">
          <td width="45%"><br><p class="signature">Kepala Perpustakaan</p></td>

          <td width="45%"><br><br><br><br><br><br></td>
        </tr>
        <tr align="center"> 
          <td width="45%"></td>
          <td width="45%"></td>
        </tr>
        <tr align="center">
          <td width="35%" align="center"><p style="text-align: center;"><br></p><hr size="1" align="center" width="60%" color="#000000"></td>
          <td width="35%" align="center"><p style="text-align: center;"> <?= $data->nama_anggota; ?> </p><hr size="1" align="center" width="40%" color="#000000"></td>
        </tr>
        <tr align="center">
          <td width="45%">NIP. 1321131232131<br></td>
          <td width="45%">NIPD. <?= $data->nomor_induk; ?> </td>
		    </tr>
      </table>
    </td>
  </tr>
  <tr>
    <?php if(!$dl) { ?>
    <td><div class="no-print" style="margin:0 0 20px;text-align:center;"><a href="javascript:history.go(-1);" style="font-weight:bold">&laquo; KEMBALI</a> | atau | <a href="javascript:window.print();" style="font-weight:bold" >PRINT</a></div></td>
    <?php } ?>
  </tr>
</table>
<?php if(!$dl) { ?>
<script type="text/javascript">window.print();</script>
<?php } ?>
</body>
</html>