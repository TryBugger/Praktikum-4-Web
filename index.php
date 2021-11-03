<?php
    require_once "fulltime.php";
    require_once "parttime.php";

    $data_karyawan = 
    [
        [
            "nama"=>"Ahmad", 
            "ttl"=>"Nganjuk,\t17 Oktober 2001", 
            "gender"=>"Pria", 
            "level"=>"Amateur", 
            "status"=>"Part Time"
        ],
        [
            "nama"=>"Udin", 
            "ttl"=>"Malang,\t22 Agustus 2001", 
            "gender"=>"Pria", 
            "level"=>"Junior", 
            "status"=>"Full Time"
        ],
        [
            "nama"=>"Salwa", 
            "ttl"=>"Jogja,\t27 Juni 2001", 
            "gender"=>"Wanita", 
            "level"=>"Senior", 
            "status"=>"Full Time"
        ],
        [
            "nama"=>"Firmansyah", 
            "ttl"=>"Jembrana,\t2 Maret 2001", 
            "gender"=>"Pria", 
            "level"=>"Senior", 
            "status"=>"Full Time"
        ],
        [
            "nama"=>"Intan", 
            "ttl"=>"Jembrana,\t30 Februari 2001", 
            "gender"=>"Wanita", 
            "level"=>"Amateur", 
            "status"=>"Full Time"
        ],
        [
            "nama"=>"Nisa", 
            "ttl"=>"Nganjuk,\t9 Desember 2001", 
            "gender"=>"Wanita", 
            "level"=>"Junior", 
            "status"=>"Part Time"
        ],
        [
            "nama"=>"Faris", 
            "ttl"=>"Malang,\t14 Maret 2001", 
            "gender"=>"Pria", 
            "level"=>"Senior", 
            "status"=>"Full Time"
        ],
        [
            "nama"=>"Annisa", 
            "ttl"=>"Nganjuk,\t20 Mei 2001", 
            "gender"=>"Wanita", 
            "level"=>"Amateur", 
            "status"=>"Part Time"
        ]
    ];

    $list_karyawan = array();

    foreach($data_karyawan as $index=>$data) {
        if($data["status"] == "Full Time") {
            $list_karyawan[$index] = new Fulltime($data["nama"], $data["ttl"], $data["gender"]);
        } else if($data["status"] == "Part Time") {
            $list_karyawan[$index] = new Parttime($data["nama"], $data["ttl"], $data["gender"]);
        }

        $list_karyawan[$index]->set_level($data["level"]);
    }
?>

<!DOCTYPE <html>
    <head>
        <title>Praktikum 4 - Data Karyawan</title>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="style.css">
    </head>

    <body>

        <div class="judulContainer">
            <div class="namaJudul"><b>List Karyawan</b></div>
        </div>

        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Tempat Tanggal Lahir</th>
                    <th>Jenis Kelamin</th>
                    <th>Level Karyawan</th>
                    <th>Status</th>
                    <th>Gaji Karyawan</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $no_urut = 1;
                    if($_POST == NULL || $_POST["filter"] == "All") {
                        foreach($list_karyawan as $karyawan) {
                ?>
                            <tr>
                                <td><?= $no_urut ?></td>
                                <td><?= $karyawan->get_nama() ?></td>
                                <td style="text-align: left;"><?= $karyawan->get_ttl() ?></td>
                                <td><?= $karyawan->get_gender() ?></td>
                                <td><?= $karyawan->get_level() ?></td>
                                <td><?= $karyawan->get_status() ?></td>
                                <td><?= $karyawan->get_gaji() ?></td>
                            </tr>
                <?php 
                            $no_urut += 1;
                        }
                    } else {
                        foreach($list_karyawan as $index=>$karyawan) {
                            if($karyawan->get_status() == $_POST["filter"]) {
                ?>
                                <tr>
                                    <td><?= $no_urut ?></td>
                                    <td><?= $karyawan->get_nama() ?></td>
                                    <td style="text-align: left;"><?= $karyawan->get_ttl() ?></td>
                                    <td><?= $karyawan->get_gender() ?></td>
                                    <td><?= $karyawan->get_level() ?></td>
                                    <td><?= $karyawan->get_status() ?></td>
                                    <td><?= $karyawan->get_gaji() ?></td>
                                </tr>
                <?php
                                $no_urut += 1;
                            }
                        }
                    }
                ?>
            </tbody>
        </table>

        <form action="" method="POST" class="formContainer">
            <button class="filterButton" name="filter" value="Part time">Part Time</button>
            <button class="filterButton" name="filter" value="All">All</button>
            <button class="filterButton" name="filter" value="Full time">Full Time</button>
        </form>

        <footer>
            <p>Created By</p>
            <p><b>M Taqiyyuddin F : 105219039 </b></p>
        </footer>
    </body>
</html>