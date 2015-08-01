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
                                        Detail Item Buku
                                    </h2>
                                    <div class="art-postcontent">
                                        <!-- article-content -->

                                        <form action="engine/add.php" method="post">
                                            <label>Tambahan</label>
                                            <input type="text" name="tambahan" />
                                            <input type="submit" value="Tambahkan" />
                                        </form>
                                        <br />
                                        <br />
                                        <table>
                                            <tr>
                                                <th>No</th>
                                                <th>Kode Item Buku</th>
                                                <th>Aksi</th>
                                            </tr>
                                            <?php
                                            $no = 1;
                                            foreach ($book->get_items() as $item) {?>
                                                <tr>
                                                    <td><?=$no++?></td>
                                                    <td><?=$item->get_id()?></td>
                                                    <td>
                                                        <a class="art-button" href="engine/delete.php?table=item_buku&id=<?=$item->get_id()?>">Hapus</a>
                                                    </td>
                                                </tr>
                                                <?php } ?>
                                        </table>
                                        <br />
                                        <a href="<?=base_url('index.php/Collection')?>" class="art-button" >Kembali</a>

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
