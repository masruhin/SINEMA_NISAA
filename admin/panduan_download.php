<?php
$dir="../dok_panduan/";
$filename=$_GET['dok'];
$file_path=$dir.$filename;
$ctype="application/octet-stream";
if(!empty($file_path) && file_exists($file_path)){ /*check keberadaan dok*/
   header("Pragma:public");
   header("Expired:0");
   header("Cache-Control:must-revalidate");
   header("Content-Control:public");
   header("Content-Description: File Transfer");
   header("Content-Type: $ctype");
   header("Content-Disposition:attachment; filename=\"".basename($file_path)."\"");
   header("Content-Transfer-Encoding:binary");
   header("Content-Length:".filesize($file_path));
   ob_clean();
   flush();
   readfile($file_path);
   exit();
}else{
  echo "<script type='text/javascript'>
  alert('Tidak Ada File.'); 
  document.location = 'panduan.php'; 
</script>";
}
?>
