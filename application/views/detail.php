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
            $data['kategori'] = $kategori;
            $this->load->view('parts/nav',$data);
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
                                        <?=$book->get_title()?>
                                    </h2>
                                    <br />
                                    <div class="art-postcontent">
                                        <!-- article-content -->

                                        <img class="image_detail" src="<?=base_url()?>/lib/images/<?php
                                        if($book->get_photo() == ""){
                                            echo "image_not_found.png";
                                        }else{
                                            echo $book->get_photo();
                                        }
                                        ?>"/>
                                        <div class="info_detail">
                                            <br />
                                            Judul : <?=$book->get_title()?><br />
                                            Pengarang : <?=$book->get_author()?><br />
                                            Penerbit : <?=$book->get_publisher()->get_name()?><br />
                                            Kategori : <?=$book->get_category()->get_name()?><br /><br />
                                        </div>
                                        Resensi : <br />
                                        <p align="justify"><?=$book->get_detail()?></p>
                                        <?php
                                        echo "<br />Jumlah Item Buku Yang Belum Dipinjam : ".$book->get_available();
                                        ?>
                                        <div class="cleared"></div>
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
