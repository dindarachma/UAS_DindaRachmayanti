<?php
error_reporting(0);
//Buat Koneksinya
/*$con = new mysqli( "localhost","root", "","pendaftaran_siswa");*/
/*$tgl = date ('d F Y');
/*$id=$_GET['id'];*/
/*$result = $con->query($sql);*/
/*$query = mysqli_query($con, "SELECT * FROM `tbl_calon_siswa` where id ='$id'");
$isi = $query->fetch_assoc();*/
include'../controller/Siswa.php';
/*$isi = $hasil;*/
$ctrl = new Siswa();
$id=$_GET['id'];
$isi = $ctrl->getData($id);
$query = $ctrl->getAgamaData();



if ($isi["agama"]=='1'){
      $agm = "ISLAM";
    }
    else if($isi["agama"]=='2'){
      $agm = "KRISTEN";
    }else if ($isi["agama"]=='3'){
      $agm = "PROTESTAN";
    }else if ($isi["agama"]=='4'){
      $agm = "HINDU";
    }else if ($isi["agama"]=='5'){
      $agm = "BUDHA";
    }else if ($isi["agama"]=='6'){
      $agm = "KONGHUCU";
    }
    else{
      $agm = "Kode Bermasalah";
    }

?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit Data Siswa</title>
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>
<body>
	<div class="container">
	<row>
		<div class="card">
		<H2 align="center">Edit Data Siswa</H2>
		<div class="card-body">
			<form class="row g-3" action="<?php echo $ctrl->updateSiswa($id)?>" method="post" name="form1">
				<input type="hidden" class="form-control" id="id" name="id" value="<?php echo $isi['id']?>" required>
			  <div class="col-md-6">
			    <label for="nisn" class="form-label">NISN</label>
			    <input type="text" class="form-control" id="nisn" name="nisn" value="<?php echo $isi['NISN']?>" required>
			  </div>
			   <div class="col-12">
			    <label for="Nama" class="form-label">NAMA</label>
			    <input type="text" class="form-control" id="Nama" name="Nama" value="<?php echo $isi['nama']?>" placeholder="Nama Lengkap" required>
			  </div>
			   <div class="col-12">
			    <label for="Alamat" class="form-label">ALAMAT</label>
			    <input type="text" class="form-control" id="Alamat" name="Alamat" value="<?php echo $isi['alamat']?>" placeholder="Alamat Lengkap" required>
			  </div>
			  <div class="col-12">
			    <label for="jnsKelamin" >JENIS KELAMIN</label>
			    <label><input type="radio"  id="jnsKelamin" name="jnsKelamin" value="<?php echo $isi['jenis_kelamin']?>"  required>Laki-laki</label>
			    <label><input type="radio"  id="jnsKelamin" name="jnsKelamin" value="<?php echo $isi['jenis_kelamin']?>" required>Perempuan</label>
			  </div>
			  

			  <div class="col-md-6">
			    <label for="Agama" class="form-label">AGAMA</label>
			    <select id="Agama" name="Agama" class="form-select" required> 
			      <option selected>Silahkan Pilih...</option>
			      <?php
  					foreach ($query as $agm){
    				?>
			      <option value="<?=$agm['agama']?>"><?=$agm['agama']?></option>
			      <?php
			  }
			  ?>
			    </select>
			  </div>
			 <div class="col-12">
			    <label for="SklhAsal" class="form-label">SEKOLAH ASAL</label>
			    <input type="text" class="form-control" id="SklhAsal" name="SklhAsal" value="<?php echo $isi['sekolah_asal']?>" required>
			  </div>
			   <div class="col-12">
			    <button type="submit" class="btn btn-primary" name="update">Update</button>
			    <a href="content.php" class="btn btn-danger">Batal</a>
			  </div>
			</form>
		</div>
		</div>
	</row>
	</div>
	
</body>
<script src="../assets/js/bootstrap.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</html>

