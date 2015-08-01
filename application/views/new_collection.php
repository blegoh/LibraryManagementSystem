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
                                    <h2 class="art-postheader">
                                        <img src="<?=base_url('lib/images/postheadericon.png')?>" width="29" height="21" alt="postheadericon" />
                                        Koleksi
                                    </h2>
                                    <div class="art-postcontent">
                                        <div class="form">
                                            <script>
                                                $().ready(function() {
                                                    $("#form-koleksi").validate({
                                                        rules: {
                                                            judul: {
                                                                required: true,
                                                                "remote":
                                                                {
                                                                    url: 'engine/cek_judul.php',
                                                                    type: "post",
                                                                    data:
                                                                    {
                                                                        judul: function()
                                                                        {
                                                                            return $('#form-koleksi :input[name="judul"]').val();
                                                                        }
                                                                    }
                                                                }
                                                            },
                                                            kategori: {
                                                                required: true
                                                            },
                                                            penerbit:{
                                                                required: true
                                                            },
                                                            pengarang:{
                                                                required: true,
                                                                minlength: 3
                                                            },
                                                            halaman:{
                                                                required: true,
                                                                number: true,
                                                                min: 5
                                                            },
                                                            thn:{
                                                                required: true,
                                                            },
                                                            deskripsi:{
                                                                required: true,
                                                                minlength: 10
                                                            },
                                                            harga:{
                                                                required: true,
                                                                number : true,
                                                                min: 5000
                                                            },
                                                            eksemplar:{
                                                                required: true,
                                                                number : true,
                                                                min: 1
                                                            },
                                                        },
                                                        messages: {
                                                            judul: {
                                                                required: "Judul harus diisi",
                                                                remote: "Judul sudah ada"
                                                            },
                                                            kategori: {
                                                                required: "Kategori harus dipilih"
                                                            },
                                                            penerbit:{
                                                                required: "Penerbit harus dipilih"
                                                            },
                                                            pengarang:{
                                                                required: "Nama pengarang harus diiisi",
                                                                minlength: "Nama pengarang minimal 3 huruf"
                                                            },
                                                            halaman:{
                                                                required: "Jumlah halaman harus diisi",
                                                                number: "Jumlah halaman harus berupa angka",
                                                                min: "Jumlah halaman minimal 5"
                                                            },
                                                            thn:{
                                                                required: "Tahun terbit harus dipilih",
                                                            },
                                                            deskripsi:{
                                                                required: "Deskripsi buku harus diisi",
                                                                minlength: "Deskripsi minimal 10 huruf"
                                                            },
                                                            harga:{
                                                                required: "Harga harus diisi",
                                                                number : "Harga harus berupa angka",
                                                                min: "Harga minimal 5000"
                                                            },
                                                            eksemplar:{
                                                                required: "Jumlah eksemplar harus diisi",
                                                                number : "Jumlah eksemplar harus berupa angka",
                                                                min: "Jumlah eksemplar minimal 1"
                                                            },
                                                        }
                                                    });
                                                });
                                            </script>

                                            <form action="<?=base_url()?>" method="post" id="form-koleksi" enctype="multipart/form-data">
                                                <label>Judul</label>
                                                <input type="text" name="judul" id="judul"  />
                                                <br />
                                                <label>Kategori</label>
                                                <select name="kategori" id="kategori">
                                                    <option value=""></option>
                                                    <?php foreach ($categories as $category) {?>
                                                    <option value="<?=$category->get_id()?>"><?=$category->get_name()?></option>
                                                    <?php } ?>
                                                </select>
                                                <br />
                                                <label>Penerbit</label>
                                                <select name="penerbit" id="penerbit">
                                                    <option value=""></option>
                                                    <?php foreach ($publishers as  $publisher) { ?>
                                                    <option value="<?=$publisher->get_id()?>"><?=$publisher->get_name()?></option>
                                                    <?php } ?>
                                                </select>
                                                <br />
                                                <label>Pengarang</label>
                                                <input type="text" name="pengarang" id="pengarang" /><br />
                                                <label>Jumlah Halaman</label>
                                                <input type="text" name="halaman" id="halaman" /><br />
                                                <label>Tahun Terbit</label>
                                                <select name="thn" id="thn">
                                                    <option value=""></option>
                                                    <?php
                                                    $tahun = date("Y");
                                                    for($i=1900;$i<=$tahun;$i++){ ?>
                                                        <option><?=$i?></option>
                                                    <?php } ?>
                                                </select>
                                                <br />
                                                <label>Deskripsi</label>
                                                <textarea rows="7" cols="30" id="deskripsi" name="deskripsi"></textarea><br />
                                                <label>Foto</label><input type="file" name="foto" /><br />
                                                <label>Harga</label>
                                                <input type="text" id="harga" name="harga" />
                                                <br />
                                                <label>Jumlah Eksemplar</label>
                                                <input type="text" id="eksemplar" name="eksemplar" /><br />
                                                <label>&nbsp;</label><input type="submit" class="art-button" value="Simpan" />&nbsp;<input type="button" value="cancel" onclick="location.href='<?=base_url('index.php/Collection')?>';" class="art-button" />
                                            </form>
                                        </div>
                                        <!-- /article-content -->
                                    </div>
                                    <div class="cleared"></div>
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
