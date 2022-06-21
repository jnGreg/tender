<div id = "bok_lewy"> <center><head>Na skróty...</head></center>
			<ul id = "category_list" style="list-style-type:none">
				<?php 
				$sql = "SELECT * FROM ctgrs;";
				$result = mysqli_query($conn, $sql);
				while($row = mysqli_fetch_array($result)){ 
					?><br><li value="<?php echo $row['ctgr_id'];?>">
						<?php $c_id = $row['ctgr_id']; echo $row['category'];?>&nbsp(<?php 
						$query = $conn->prepare("SELECT * FROM tenders WHERE ctgr_id = '$c_id';");
						$query->execute();
						$query->store_result();
						$rows = $query->num_rows;
						echo $rows; ?>)</li>
					<ul> <?php
					$sql2 = "SELECT * FROM subctgrs WHERE ctgr_id = '$c_id';";
					$result2 = mysqli_query($conn, $sql2);
					while($row2 = mysqli_fetch_array($result2)){ 
						?><li value="<?php echo $row2['subctgr_id'];?>">
							<?php $sc_id = $row2['subctgr_id']; echo $row2['subcategory'];?>&nbsp(<?php 
						$query = $conn->prepare("SELECT * FROM tenders WHERE subctgr_id = '$sc_id';");
						$query->execute();
						$query->store_result();
						$rows = $query->num_rows;
						echo $rows; ?>)</li>
						<?php
					}?> </ul> <?php }	
				?></ul> 
		</div>
