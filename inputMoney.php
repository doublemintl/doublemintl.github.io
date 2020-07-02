<?PHP
	header("Content-type:text/html;charset=utf-8");
	
	$pin_str="";
	for($i=0; $i<6; $i++){
		$temp = rand(0, 15);
		if($temp <=9)
			$pin_str .= chr(48+$temp);
		else
			$pin_str .= chr(65+$temp-10);
	}
	
?>

<html>
	<head>
		<meta charset="utf-8">
		<title>实验6_2</title>
	</head>
	<body>
		<form action="drawPicture.php" method="post" enctype="multipart/form-data">
			<div align="center" >
				公司名称：<input name="company" type="text">
				<br></br>
				年份：
				<select name="year">
					<?php
						$years = range(date("Y"), date("Y", strtotime("now - 100 years"))); 
						foreach($years as $year){ 
						  echo'<option value="'.$year.'">'.$year.'</option>'; 
						} 
					?>
				</select>
				<br></br>
				<table border="1" cellspacing="0" style="text-align:center;">
					<tr>
						<td>月份</td>
						<td>一月</td>
						<td>二月</td>
						<td>三月</td>
						<td>四月</td>
						<td>五月</td>
						<td>六月</td>
					</tr>

					<tr>
						<td>
							销售额（万元）
						</td>
						<td>
							<input name="money[]" type="text" size="2">
						</td>
						<td>
							<input name="money[]" type="text" size="2">
						</td>
						<td>
							<input name="money[]" type="text" size="2">
						</td>
						<td>
							<input name="money[]" type="text" size="2">
						</td>
						<td>
							<input name="money[]" type="text" size="2">
						</td>
						<td>
							<input name="money[]" type="text" size="2">
						</td>
					</tr>
					
					<tr>
						<td>月份</td>
						<td>七月</td>
						<td>八月</td>
						<td>九月</td>
						<td>十月</td>
						<td>十一月</td>
						<td>十二月</td>
					</tr>
					
					<tr>
						<td>
							销售额（万元）
						</td>
						<td>
							<input name="money[]" type="text" size="2">
						</td>
						<td>
							<input name="money[]" type="text" size="2">
						</td>
						<td>
							<input name="money[]" type="text" size="2">
						</td>
						<td>
							<input name="money[]" type="text" size="2">
						</td>
						<td>
							<input name="money[]" type="text" size="2">
						</td>
						<td>
							<input name="money[]" type="text" size="2">
						</td>
					</tr>
					
				</table>
				
				<br>
				
				<input name="submit" type="submit" value="提交">
				
				
				
				
			</div>
		</form>
	</body>
</html>