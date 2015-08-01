<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US" xml:lang="en">
<?php
$data['title'] = $title;
$this->load->view('parts/head');
?>
<body>
<div id="art-page-background-simple-gradient">
    <div id="art-page-background-gradient"></div>
</div>
<div id="art-main">
    <div class="art-sheet">
        <?php
        $this->load->view('parts/tambahan');
        ?>
        <div class="art-sheet-body">
            <?php
            $this->load->view('parts/nav_admin');
            ?>
            <!-- End Of Nav -->
            <?php
            $this->load->view('parts/header');
            ?>
            <!-- End Of Header -->
            <div class="art-content-layout">
                <div class="art-content-layout-row">
                    <?php
                    $this->load->view('parts/sidebar');
                    ?>
                    <!-- End Of Sidebar -->
                    <div class="art-layout-cell art-content">
                        <div class="art-post">
                            <div class="art-post-tl"></div>
                            <div class="art-post-tr"></div>
                            <div class="art-post-bl"></div>
                            <div class="art-post-br"></div>
                            <div class="art-post-tc"></div>
                            <div class="art-post-bc"></div>
                            <div class="art-post-cl"></div>
                            <div class="art-post-cr"></div>
                            <div class="art-post-cc"></div>
                            <div class="art-post-body">
                                <div class="art-post-inner art-article">
                                    <img src="<?=base_url('lib/images/postheadericon.png')?>" width="29" height="21" alt="postheadericon" />
                                    Edit Member
                                    <div class="cleared"></div>
                                </div>
                                <div class="art-postcontent">
                                    <div class="form">
                                        <script>
                                            $().ready(function() {
                                                $("#form-anggota").validate({
                                                    rules: {
                                                        nama: {
                                                            required: true,
                                                            minlength: 5
                                                        },
                                                        alamat: {
                                                            required: true,
                                                            minlength: 10
                                                        },
                                                        telp:{
                                                            required: true,
                                                            number : true
                                                        },
                                                    },
                                                    messages: {
                                                        nama: {
                                                            required: "Nama harus diisi",
                                                            minlength: "Nama minimal 5 huruf"
                                                        },
                                                        alamat: {
                                                            required: "Alamat harus diisi",
                                                            minlength: "Alamat minimal 10 huruf"
                                                        },
                                                        telp:{
                                                            required: "Nomor telpon harus diisi",
                                                            number : "Nomor telpon harus berupa angka"
                                                        },
                                                    }
                                                });
                                            });
                                        </script>

                                        <form action="<?=base_url('index.php/Anggota/edit/'.$member->get_id())?>" method="post" id="form-anggota">
                                            <label>Nama</label>
                                            <input type="text" name="nama" id="nama" value="<?=$member->get_name()?>" /><br />
                                            <label>Alamat</label><textarea name="alamat" id="alamat"><?=$member->get_address()?></textarea><br />
                                            <label>Telp</label>
                                            <input type="text" name="telp" id="telp" value="<?=$member->get_phone()?>" /><br />
                                            <label>Status</label>
                                            <input type="radio" name="status" value="1" <?php if($member->get_status() == 1) echo "checked"; ?> />Aktif
                                            <input type="radio" name="status" value="0" <?php if($member->get_status() == 0) echo "checked"; ?> />Tidak Aktif
                                            <br />
                                            <label>&nbsp;</label><input type="submit" class="art-button" value="Add" />&nbsp;<input type="button" value="cancel" onclick="location.href='<?=base_url('index.php/Anggota')?>';" class="art-button" />
                                        </form>
                                    </div>
                                </div>
                                <div class="cleared"></div>
                            </div>

                            <!-- End Of Art Post -->
                        </div>

                    </div>
                </div>
            </div>
            <div class="cleared"></div>
            <?php
            $this->load->view('parts/footer');
            ?>
            <div class="cleared"></div>
        </div>
    </div>
    <div class="cleared"></div>
    <p class="art-page-footer"><a href="http://www.artisteer.com/">Web Template</a> created with Artisteer.</p>
</div>

</body>
</html>
