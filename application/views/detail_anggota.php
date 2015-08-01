<div class="da">
    <label>Nama</label><?=$member->get_name()?><br />
    <label>Telepon</label><?=$member->get_phone()?><br />
    <label>Status</label><?php
    if($member->get_status() == 1){
        echo "Aktif";
    }else{
        echo "Tidak Aktif";
    }
    ?><br />
    <label>Alamat</label><?=$member->get_address()?><br />
</div>