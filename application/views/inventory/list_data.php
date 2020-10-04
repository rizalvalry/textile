<?php
  $no = 1;
  foreach ($dataInventory as $inventory) {
    ?>
    <tr>
      <td><?php echo $no; ?></td>
      <td><?php echo $inventory->nama; ?></td>
      <td><?php echo $inventory->stock; ?></td>
      <td class="text-center" style="min-width:230px;">
          <button class="btn btn-warning btn-xs update-dataInventory" title="Ubah" data-id="<?php echo $inventory->id; ?>"><i class="glyphicon glyphicon-repeat"></i></button>
          <button class="btn btn-danger btn-xs konfirmasiHapus-inventory" title="Hapus" data-id="<?php echo $inventory->id; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove-sign"></i></button>
          <button class="btn btn-info btn-xs detail-dataInventory" title="Detail" data-id="<?php echo $inventory->id; ?>"><i class="glyphicon glyphicon-info-sign"></i></button>
      </td>
    </tr>
    <?php
    $no++;
  }
?>