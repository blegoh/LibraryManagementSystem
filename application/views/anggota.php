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
                                        Members
                                    </h2>
                                    <div class="art-postcontent">
                                        <a href="<?=base_url('index.php/Anggota/add')?>" class="art-button">Add Member</a><br /><br />
                                        <!-- article-content -->
                                        <table>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Alamat</th>
                                                <th>Aksi</th>
                                            </tr>
                                            <?php
                                            foreach($members as $member){
                                            ?>
                                            <tr>
                                                <td><?=$i++?></td>
                                                <td><a href="<?=base_url('index.php/Collection/detail/'.$member->get_id())?>" rel="facebox"><?=$member->get_name()?></a></td>
                                                <td><?=$member->get_address()?></td>
                                                <td><a class="art-button" href="<?=base_url('index.php/Anggota/edit/'.$member->get_id())?>">Edit</a></td>
                                                <?php } ?>
                                        </table>
                                        <div class="cleared"></div>
                                        <br />
                                        <br />
                                        <div id="paging">
                                            <?php
                                            echo $this->pagination->create_links();
                                            ?>
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
