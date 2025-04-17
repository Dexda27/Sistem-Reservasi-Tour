<div class="container"> 
  <div class="row"> 
    <div class="col-8"></div>
    <div class="col-4">
      <input type="text" class="form-control" placeholder="search ... " id="search">
    </div>
    <form action="<?= base_url("Reservation/saveCustomReservasi"); ?>" method="POST">
      <div class="col-12"> 
        <div class="card mt-2"> 
          <h5 class="card-header">Pilih Produk</h5>
          <div class="card-body">
            <div class="row">
              <div class="col-12 row mb-2" id="produk-list">
                <?php foreach ($produks as $produk): ?> 
                  <div class="col-md-4 mb-md-0 my-2"> 
                    <div class="form-check custom-option custom-option-basic">
                      <label class="form-check-label custom-option-content" for="customCheckTemp1-<?=$produk->id?>">
                        <input name="id_produk[]" class="form-check-input" type="checkbox" value="<?=$produk->id?>" id="customCheckTemp1-<?=$produk->id?>">
                        <span class="custom-option-header"> 
                          <span class="h6 mb-0 "><?=$produk->nama_produk;  ?></span> 
                          <small class="text-muted">
                            Rp. <?=$produk->harga;?>
                            <span class="badge bg-label-warning"><?=$produk->tipe_produk;?> </span>
                          </small> 
                        </span>
                        <span class="custom-option-body">
                          <small><?=$produk->deskripsi;   ?></small> 
                        </span>
                        <span class="custom-option-footer"><br><br> 
                          <small class="badge bg-label-primary m-1"> <?=$produk->area  ?> </small> 
                        </span>
                      </label>
                    </div>
                  </div>
                <?php endforeach; ?>
              </div>
              <div class="col-12"> 
                <div class="d-flex justify-content-between"> 
                  <button class="btn btn-secondary" disabled>Previous</button>  
                  <button class="btn btn-primary" type="submit">Next</button>
                </div>
              </div> 
            </div>
          </div>
        </div> 
      </div>
    </form> 
  </div>
</div>
<script>
  $(document).ready(function(){
    $('#search').on('input', function() {
      var searchValue = $(this).val();
      var selectedProducts = $('input[name="id_produk[]"]:checked').map(function() {
        return $(this).val();
      }).get();

      $.ajax({
        type: 'POST',
        url: '<?=base_url('Reservation/searchProduk/');?>',
        data: {search: searchValue},
        dataType: 'json',
        success: function(response) {
          var productsHtml = '';
          $.each(response, function(index, produk) {
            var checked = selectedProducts.includes(produk.id.toString()) ? 'checked' : '';
            productsHtml += '<div class="col-md-4 mb-md-0 my-2">' +
            '<div class="form-check custom-option custom-option-basic">' +
            '<label class="form-check-label custom-option-content" for="customCheckTemp1-' + produk.id + '">' +
            '<input name="id_produk[]" class="form-check-input" type="checkbox" value="' + produk.id + '" id="customCheckTemp1-' + produk.id + '" ' + checked + '>' +
            '<span class="custom-option-header">' +
            '<span class="h6 mb-0">' + produk.nama_produk + '</span>' +
            '<small class="text-muted">' +
            'Rp. ' + produk.harga +
            '<span class="badge bg-label-warning">' + produk.tipe_produk + '</span>' +
            '</small>' +
            '</span>' +
            '<span class="custom-option-body">' +
            '<small>' + produk.deskripsi + '</small>' +
            '</span>' +
            '<span class="custom-option-footer"><br><br>' +
            '<small class="badge bg-label-primary m-1">' + produk.area + '</small>' +
            '</span>' +
            '</label>' +
            '</div>' +
            '</div>';
          });
          $('#produk-list').html(productsHtml);
        }
      });
    });
  });

</script>