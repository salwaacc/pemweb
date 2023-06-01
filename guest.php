<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        .flex-parent {
            display: flex;
        }

        .jc-center {
            justify-content: center;
        }

        button.margin-right {
            margin-right: 20px;
        }

        .button1 {
            background-color: #24a0ed;
            border-radius: 5px;
            border: 2px solid #24a0ed;
        }

        .button1:hover {
            background-color: #24a0ed;
            color: white;
        }
    </style>

    <title>Data Mahasiswa</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-5">
                <h1 class="text-center">Data Mahasiswa</h1>
                <hr style="height: 1px;color: black;background-color: black;">
                <div class="flex-parent jc-center">
                    <a href=login.php>
                        <button type="submit" class="button1 margin-right"> Log-In Admin <br></button> <br><br>
                    </a>

                </div>


                <div class="row">
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>NIM</th>
                                    <th>Nama</th>
                                    <th>Program Studi</th>
                                    <th>Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                include 'model.php';
                                $model = new Model();
                                $rows = $model->fetch();
                                $i = 1;
                                if (!empty($rows)) {
                                    foreach ($rows as $row) {
                                        ?>
                                        <tr>
                                            <td>
                                                <?php echo $i++; ?>
                                            </td>
                                            <td>
                                                <?php echo $row['NIM']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row['nama']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row['programStudi']; ?>
                                            </td>
                                            <td>
                                                <?php echo $row['email']; ?>
                                            </td>
                                        </tr>

                                        <?php
                                    }
                                } else {
                                    echo "no data";
                                }

                                ?>
                            </tbody>
                        </table>
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