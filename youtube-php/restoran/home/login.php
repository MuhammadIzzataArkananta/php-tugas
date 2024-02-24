<div class="row">
            <div class="col-md-3">
            <div class="form-group">
                 <form action="" method="post">
                 <div>
                    <h3>Login Pelanggan</h3>
                 </div>

                 <div class="form-group">
                    <label for="">EMAIL</label>
                    <input type="email" name="email" required  class="form-control">
                </div>

                <div class="form-group">
                    <label for="">PASSWORD</label>
                    <input type="password" name="password" required  class="form-control">
                </div>

                <div>
                    <input type="submit" name="login" value="LOGIN" class="btn btn-primary">
                </div>
        </form>
    </div>
 
<?php

if(isset($_GET['simpan'])) {
    $kategori=$_POST['kategori'];
    $sql="INSERT INTO tblkategori VALUES('','$kategori')";
    $db->runSQL($sql);
    header("location:?f=kategori&m=select");
}

?>

</div>
</div>

<?php 

if (isset($_POST['login'])) {
    $email=$_POST['email'];
    $password=$_POST['password'];
    $sql="SELECT * FROM tblpelanggan WHERE email='$email' AND password='$password' AND aktif=1 ";
    $count=$db->rowCOUNT($sql);
    if ($count == 0) {
        echo"<center><h3>Email atau Password salah</h3></center>";
    }
    else {
        $sql="SELECT * FROM tblpelanggan WHERE email='$email' AND password='$password' AND aktif=1 ";
        $row=$db->getITEM($sql);
        
        $_SESSION['pelanggan']=$row['email'];
        $_SESSION['idpelanggan']=$row['idpelanggan'];
        header("location:index.php");
    }
}

?>