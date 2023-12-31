<!-- <?php
require 'function.php';
require 'cek.php';
?> -->
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Barang Masuk</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="index.php">Sistem Inventaris Bank bjb</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                        <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Stock Barang
                            </a>
                            <a class="nav-link" href="masuk.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Barang Masuk
                            </a>
                            <a class="nav-link" href="keluar.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Barang Keluar
                            </a>
                            <a class="nav-link" href="logout.php">
                                Logout
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Barang Masuk</h1>
                        <div class="card mb-4">
                            <div class="card-header">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                                    Tambah Barang
                                 </button>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Tanggal</th>
                                                <th>Nama Barang</th>
                                                <th>Penerima</th>
                                                <th>Jumlah</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                            $ambil_alldatastock = mysqli_query($conn,"SELECT * FROM masuk m, stock s WHERE s.idbarang=m.idbarang");
                                            while ($data=mysqli_fetch_array($ambil_alldatastock)) :
                                                $idb = $data['idbarang'];
                                                $idm = $data['idmasuk'];
                                                $tanggal = $data['tanggal'];
                                                $namabarang = $data['namabarang'];
                                                $penerima = $data['penerima'];
                                                $qty = $data['qty'];
    
                                            ?>

                                            <tr>
                                                <td><?= $tanggal?></td>
                                                <td><?=$namabarang?></td>
                                                <td><?=$penerima?></td>                                               
                                                <td><?=$qty ?></td>  
                                                <td>
                                                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit<?=$idb;?>">
                                                            Edit
                                                        </button>
                                                        <input type ="hidden" name ="idbaranghapus" value = "<?=$idb;?>">
                                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete<?=$idb;?>">
                                                            Delete
                                                        </button>
                                                </td>
                                      
                                            </tr>         
                                            
                                            <!-- Edit Modal -->                                           
                                            <div class="modal fade" id="edit<?=$idb;?>">
                                            <div class="modal-dialog">
                                            <div class="modal-content">
                                            
                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                <h4 class="modal-title">Edit Barang</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                
                                                <!-- Modal body -->
                                                <form method="post">
                                                <div class="modal-body">
                                                <input type="date" name="tanggal" value="<?$tanggal;?>" class="form-control" required>
                                                <br>
                                                <input type="text" name="penerima" value="<?=$penerima;?>" class="form-control" required>
                                                <br>
                                                <br>
                                                <input type="number" name="qty" value="<?=$qty;?>" class="form-control" required>
                                                <br>
                                                <br>
                                                <input type ="hidden" name ="idb" value = "<?=$idb;?>">
                                                <input type ="hidden" name ="idm" value = "<?=$idm;?>">
                                                <button type="submit" class="btn btn-primary" name="updatebarangmasuk">Submit</button>
                                                </div>
                                                </form>
                                                
                                                
                                            </div>
                                            </div>
                                        </div>    

                                            <!-- Delete Modal -->                                           
                                            <div class="modal fade" id="delete<?=$idb;?>">
                                            <div class="modal-dialog">
                                            <div class="modal-content">
                                            
                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                <h4 class="modal-title">Hapus Barang</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>
                                                
                                                <!-- Modal body -->
                                                <form method="post">
                                                <div class="modal-body">
                                                Hapus <?=$namabarang;?> ?
                                                <br>
                                                <br>
                                                <input type ="hidden" name ="idb" value = "<?=$idb;?>">
                                                <input type ="hidden" name ="kty" value = "<?=$qty;?>">
                                                <button type="submit" class="btn btn-danger" name="hapusbarangmasuk">Hapus</button>
                                                </div>
                                                </form>
                                                
                                                
                                            </div>
                                            </div>
                                        </div>    

                                            <?php 
                                                endwhile;
                                            ?>               
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
    </body>

     <!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Tambah Barang</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <form method="post">
        <div class="modal-body">
            <select name="item_barang" class="form-control">
                <?php
                    $ambil_data = $conn->query("SELECT * FROM stock");
                    while ($fetcharray = mysqli_fetch_array($ambil_data)) :
                        $nama = $fetcharray['namabarang'];
                        $id_barang = $fetcharray['idbarang'];
                    ?>
                        <option value="<?=$id_barang?>"><?=$nama?></option>
                    <?php endwhile; ?>
            </select>
          <br>
          <input type="text" name="penerima" placeholder="Penerima" class="form-control" required>
          <br>
          <input type="date" name="tanggal" class="form-control" required>
          <br>
          <input type="number" name="qty" placeholder="Stock" class="form-control" required>
          <br>
          <br>
          <button type="submit" class="btn btn-primary" name="barangmasuk">Submit</button>
        </div>
        </form>
        
        
      </div>
    </div>
  </div>
</html>
