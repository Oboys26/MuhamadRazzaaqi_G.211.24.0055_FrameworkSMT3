<!DOCTYPE html>
<html lang="en">
<head>
   <title>Info Mahasiswa</title>
</head>
    <body>
        <h1>
            Saya adalah Mahasiswa Program Studi:
            <?php
            if($progdi=="TI")
                echo "Teknik Informatika";
            elseif($progdi=="SI")
                echo "Sistem Informasi";
            elseif($progdi=="Teknik")
                echo "Teknik Mesin";
            else
                echo "Tidak ada progdi tersebut di fakultas TIK";
            ?>
        </h1>
    </body>
</html>