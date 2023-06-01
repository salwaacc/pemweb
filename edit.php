<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <title>PHP OOP CRUD TUTORIAL</title>
</head>

<body>
  <div class="container">
    <div class="row">
      <div class="col-md-12 mt-5">
        <h1 class="text-center">Data Mahasiswa</h1>
        <hr style="height: 1px;color: black;background-color: black;">
      </div>
    </div>
    <div class="row">
      <div class="col-md-5 mx-auto">
        <?php

        include 'model.php';
        $model = new Model();
        $NIM = $_REQUEST['NIM'];
        $row = $model->edit($NIM);

        if (isset($_POST['update'])) {
          if (isset($_POST['NIM']) && isset($_POST['nama']) && isset($_POST['programStudi']) && isset($_POST['email'])) {
            if (!empty($_POST['NIM']) && !empty($_POST['nama']) && !empty($_POST['programStudi']) && !empty($_POST['email'])) {

              $data['NIM'] = $NIM;
              $data['nama'] = $_POST['nama'];
              $data['programStudi'] = $_POST['programStudi'];
              $data['email'] = $_POST['email'];

              $update = $model->update($data);

              if ($update) {
                echo "<script>alert('record update successfully');</script>";
                echo "<script>window.location.href = 'records.php';</script>";
              } else {
                echo "<script>alert('record update failed');</script>";
                echo "<script>window.location.href = 'records.php';</script>";
              }

            } else {
              echo "<script>alert('empty');</script>";
              header("Location: edit.php?NIM=$NIM");
            }
          }
        }

        ?>
        <form action="" method="post">
          <div class="form-group">
            <label for="">NIM</label>
            <input type="text" name="NIM" value="<?php echo $row['NIM']; ?>" class="form-control">
          </div>
          <div class="form-group">
            <label for="">Nama</label>
            <input type="text" name="nama" value="<?php echo $row['nama']; ?>" class="form-control">
          </div>
          <div class="form-group">
            <label for="">Program Studi</label>
            <input type="text" name="programStudi" value="<?php echo $row['programStudi']; ?>" class="form-control">
          </div>
          <div class="form-group">
            <label for="">Email</label>
            <input type="email" name="email" value="<?php echo $row['email']; ?>" class="form-control">
          </div>
          <div class="form-group">
            <button type="submit" name="update" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous"></script>
</body>

</html>
