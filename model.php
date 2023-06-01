<?php 

	Class Model{

		private $server = "localhost";
		private $username = "root";
		private $password;
		private $db = "tugas1";
		private $conn;

		public function __construct(){
			try {
				
				$this->conn = new mysqli($this->server,$this->username,$this->password,$this->db);
			} catch (Exception $e) {
				echo "connection failed" . $e->getMessage();
			}
		}

		public function insert(){

			if (isset($_POST['submit'])) {
				if (isset($_POST['NIM']) && isset($_POST['nama']) && isset($_POST['programStudi']) && isset($_POST['email']) ) {
					if (!empty($_POST['NIM']) && !empty($_POST['nama']) && !empty($_POST['programStudi']) && !empty($_POST['email']) ) {
						$NIM = $_POST['NIM'];
						$nama = $_POST['nama'];
						$programStudi = $_POST['programStudi'];
						$email = $_POST['email'];
					

						$query = "INSERT INTO mahasiswa (NIM,nama,programStudi,email) VALUES ('$NIM','$nama','$programStudi','$email')";
						if ($sql = $this->conn->query($query)) {
							echo "<script>alert('mahasiswa added successfully');</script>";
							echo "<script>window.location.href = 'records.php';</script>";
						}else{
							echo "<script>alert('failed');</script>";
							echo "<script>window.location.href = 'index.php';</script>";
						}

					}else{
						echo "<script>alert('empty');</script>";
						echo "<script>window.location.href = 'index.php';</script>";
					}
				}
			}
		}

		public function fetch(){
			$data = null;

			$query = "SELECT * FROM mahasiswa";
			if ($sql = $this->conn->query($query)) {
				while ($row = mysqli_fetch_assoc($sql)) {
					$data[] = $row;
				}
			}
			return $data;
		}

		public function delete($NIM){

			$query = "DELETE FROM mahasiswa where NIM = '$NIM'";
			if ($sql = $this->conn->query($query)) {
				return true;
			}else{
				return false;
			}
		}

		public function fetch_single($NIM){

			$data = null;

			$query = "SELECT * FROM mahasiswa WHERE NIM = '$NIM'";
			if ($sql = $this->conn->query($query)) {
				while ($row = $sql->fetch_assoc()) {
					$data = $row;
				}
			}
			return $data;
		}

		public function edit($NIM){

			$data = null;

			$query = "SELECT * FROM mahasiswa WHERE NIM = '$NIM'";
			if ($sql = $this->conn->query($query)) {
				while($row = $sql->fetch_assoc()){
					$data = $row;
				}
			}
			return $data;
		}

		public function update($data){

			$query = "UPDATE mahasiswa SET NIM='$data[NIM]',nama='$data[nama]', programStudi='$data[programStudi]',email='$data[email]' WHERE NIM='$data[NIM] '";

			if ($sql = $this->conn->query($query)) {
				return true;
			}else{
				return false;
			}
		}
	}

 ?>