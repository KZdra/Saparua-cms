
                    <?php
            require "config.php";
            $no = 0;
            $read = $pdo->prepare("SELECT * FROM sedikitberita");
            $read->execute();
            while ($data = $read->fetch(PDO::FETCH_DEFAULT)) {
                $id = $data['id'];
                $judul = $data['judul'];
                $artikel = $data['artikel'];
                $foto = $data['foto'];
                echo "
                <!-- Start: Responsive Left Image Card -->
                <div class='row' style='margin:0px;padding:20px;'>
                    <div class='col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4' style='padding: 0px;height: 288px;width: 284px;'>
                        <div style='height: 50vh;background: url(&quot;img/$foto&quot;) center / cover no-repeat;transform: translate(0px);box-shadow: 0px 0px;'></div>
                    </div>
                    <div class='w-100 d-sm-block d-md-none d-lg-none d-xl-none'></div>
                    <div class='col' style='padding: 0px;'>
                        <div class='card'>
                            <div class='card-body' style='height:50vh;'>
                                <h4 class='card-title'>Title</h4>
                                <h6 class='text-muted card-subtitle mb-2'>$judul</h6>
                                <p class='card-text' style='height: 254.17200000000003px;color: rgb(0,0,0);'><br>$artikel<br><br></p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end -->
                ";
            }
            ?>