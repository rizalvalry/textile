<div class="col-md-12 well">
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;"><i class="fa fa-location-arrow"></i> Nama Produk: <b><?php echo $inventory->nama; ?></b></h3>

  <div class="box box-body">
      <table id="tabel-detail" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>Warna</th>
            <th>Ukuran</th>
          </tr>
        </thead>
        <tbody id="data-pegawai">
          <?php
            foreach ($dataInventory as $inventory) {
              ?>
              <tr>
                <td><?php echo $inventory->warna; ?></td>
                <td><?php echo (isset($inventory->ukuran)) ? $inventory->ukuran : 'Semua Ukuran'; ?></td>
              </tr>
              <?php
            }
          ?>
        </tbody>
      </table>
  </div>

  <div class="text-right">
    <button class="btn btn-danger" data-dismiss="modal"> Tutup</button>
  </div>
</div>