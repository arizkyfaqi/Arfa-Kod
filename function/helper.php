<?php
	
	define("BASE_URL", "http://localhost/kodearfa/");

	function kategori($kategori_id = false){
	
	global $koneksi;
	
		$query = mysqli_query($koneksi, "SELECT * FROM kategori WHERE status='on'");

		while ($row=mysqli_fetch_assoc($query)) {
			if ($kategori_id == $row['kategori_id']) {
				echo "<li><a href='".BASE_URL."index.php?page=main&kategori_id=$row[kategori_id]' class='active'>$row[kategori]</a></li>";
			} else {
				echo "<li><a href='".BASE_URL."index.php?page=main&kategori_id=$row[kategori_id]'>$row[kategori]</a></li>";
			}
		}
	}

	function pagination($query, $data_per_halaman, $pagination, $url){

		global $koneksi;
		global $kategori_id;
		$total_data = mysqli_num_rows($query);

		if ($kategori_id) {
			$query = mysqli_query($koneksi, "SELECT * FROM materi ORDER BY kategori_id");
			$row = mysqli_fetch_assoc($query);
			$url = "index.php?page=main&kategori_id=$row[kategori_id]";
			$total_data = mysqli_num_fields($query);

		}

		$total_halaman = ceil($total_data / $data_per_halaman);

		$batasPosisiNomor = 6;
		$batasJumlahHalaman = 10;
		$mulaiPagination = 1;
		$batasAkhirPagination = $total_halaman;

		echo "<ul class='pagination'>";

		if ($pagination > 1) {
			$prev = $pagination-1;
			echo "<li class='page-item' >
						<a class='page-link' href='".BASE_URL."$url&pagination=$prev'><< Prev </a>
				  </li>";
		}

		if ($total_halaman >= $batasJumlahHalaman ) {
			if ($pagination > $batasPosisiNomor) {
				$mulaiPagination = $pagination -($batasPosisiNomor - 1);
			}

			$batasAkhirPagination = ($mulaiPagination - 1) + $batasJumlahHalaman;

			if ($batasAkhirPagination > $total_halaman) {
				$batasAkhirPagination = $total_halaman;
			}
		}

		for ($i=$mulaiPagination; $i <= $batasAkhirPagination; $i++) { 
			if ($pagination == $i) {
				echo "<li class='page-item active'>
						<span class='page-link'>
							<a class='active pg' href='".BASE_URL."$url&pagination=$i'>$i</a>
							<span class='sr-only'>(current)</span>
						</span>
					 </li>";
			}else{
				echo "<li class='page-item'><a class='page-link' href='".BASE_URL."$url&pagination=$i'>$i</a></li>";
			}
		}

		if ($pagination < $total_halaman) {
			$next = $pagination+1;
			echo "<li class='page-item'>
					<a class='page-link' href='".BASE_URL."$url&pagination=$next'> Next >></a>
				 </li>";
		}		
		echo "</ul>";


	}

?>