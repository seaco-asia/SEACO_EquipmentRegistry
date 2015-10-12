<?php
	define('FPDF_FONTPATH','FPDF/font/');
	require('FPDF/fpdf.php');
	class XFPDF extends FPDF
	{
		function Header()
		{
			global $title;

		$this->SetFont('Arial','B',15);
		$w = $this->GetStringWidth($title)+6;
		$this->SetX((210-$w)/2);
		$this->SetDrawColor(0,80,180);
		$this->SetFillColor(0,0,0);
		$this->SetTextColor(255,255,255);
		$this->SetLineWidth(1);
		$this->Cell($w,9,$title,1,1,'C',true);
		$this->Ln(10);
		// Save ordinate
		$this->y0 = $this->GetY();
		}
		function FancyTable($header,$data)
		{
			$this->SetFillColor(0,0,0);
			$this->SetTextColor(255,255,255);
			$this->SetDrawColor(0,0,0);
			$this->SetLineWidth(.5);
			$this->SetFont('','B');
			$w=array(35,35,23);	//array width need to be same amount as field number
			
			 for($i=0;$i<sizeof($header);$i++)
			{
				$this->Cell($w[$i],7,$header[$i],1,0,'C',1);
			}
			 $this->Ln();
			$this->SetFillColor(224,224,224);
			$this->SetTextColor(0,0,0);
			$this->SetFont('');
			$fill=0;
			foreach($data as $row)
			{
				$this->Cell($w[0],6,$row[0],'LR',0,'L',$fill);
				$this->Cell($w[1],6,$row[1],'LR',0,'L',$fill);
				$this->Cell($w[2],6,$row[2],'LR',0,'L',$fill);
				
				
				


				$this->Ln();
				$fill=!$fill;
				}
			$this->Cell(array_sum($w),0,'','T');
		}
	}
		include("connection.php");
		$conn = oci_connect($dbuname, $dbpwd,$db) or die("DB connection unsuccessful!");
		$query="SELECT EQUIPMENT_ID AS \"EQUIPMENT ID\",EQUIPMENT_NAME AS \"EQUIPMENT NAME\",EQUIPMENT_ACCURACY AS \"EQUIPMENT ACCURACY\" FROM EQUIPMENT ORDER BY EQUIPMENT_NAME";
		$stmt = oci_parse($conn,$query);
		oci_execute($stmt);
		$nrows = oci_fetch_all($stmt,$results);
		if ($nrows> 0)
		{
			$data = array();
			$header= array('Equipment ID', 'Equipment Name', 'Accuracy');
			
			for ($i = 0; $i<$nrows; $i++)
			{
			reset($results);
			$j=0;
			while (list(,$column_value) = each($results))
			{
				$data[$i][$j] = $column_value[$i];
				$j++;
			}
			}
		}
		else
		{
			echo "No Records found";
		}
		oci_free_statement($stmt);
		$title='List of equipment';
		$pdf=new XFPDF();
		$pdf->Open();
		$pdf->SetFont('Arial','',10);
		$pdf->AddPage('P','','A4');
		
		$pdf->SetTitle($title);
		$pdf->FancyTable($header,$data);
		$pdf->Output("Report.pdf");
?>

<html>
<head><title></title></head>
<body>
<?php
  $file = 'Report.pdf';
  $filename = 'Report.pdf';
  header('Content-type: application/pdf');
  header('Content-Disposition: inline; filename="' . $filename . '"');
  header('Content-Transfer-Encoding: binary');
  header('Accept-Ranges: bytes');
  @readfile($file);
?>

</body>
</html>