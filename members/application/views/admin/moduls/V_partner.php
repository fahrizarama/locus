<?php
defined('BASEPATH') or die('No direct script access allowed!');
?>
<style>
    /* Style the tab */
.tab {
  overflow: hidden;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
}

/* Style the buttons inside the tab */
.tab button {
  background-color: inherit;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  color: #000;
  padding: 14px 16px;
  font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
  border: 1px solid #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color: #d15b47;
  color: #fff;
  border: 1px solid #d15b47;
}

/* Style the tab content */
.city {
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
}
</style>
<?php $title = "<i class='fa fa-bar-chart'></i>&nbsp;Merchant Partner"; ?>
<div class="page-header">
    <h1><?php echo $title;?></h1>
</div>

<div class="row">
    <div class="col-md-12">

    <div class="tab">
      <button class="tablink active" onclick="openCity(event, 'Kuliner')" value="Kuliner">Kuliner</button>
      <button class="tablink" onclick="openCity(event, 'IT')" value="IT">IT</button>
      <button class="tablink" onclick="openCity(event, 'Legal')" value="Legal">Legal</button>
    </div>

    <?php $this->load->view('admin/moduls/partner/kuliner') ?>
    <?php $this->load->view('admin/moduls/partner/it') ?>
    <?php $this->load->view('admin/moduls/partner/legal') ?>

</div>
</div>
<div id="modalresult" class="modal fade" tabindex="-1"></div>
<script>
    function delete_produk(id) {
        let confirmation = confirm('Apakah anda yakin ingin menghapus data?');

        if (confirmation) {
            $.ajax({
                url: '<?= base_url(uri_string() . '/hapus_produk') ?>',
                method: 'POST',
                dataType: 'json',
                data: {
                    id: id
                },
                success: function(response) {
                    if (response.RESULT == 'OK') {
                        swal({
                            title: response.MESSAGE,
                            type: 'success'
                        }, function() {
                            window.location.reload();
                        });
                    } else {
                        swal({
                            title: response.MESSAGE,
                            type: 'error'
                        });
                    }
                }
            }).fail(function() {
                swal({
                    title: 'Terjadi kesalahan',
                    type: 'error'
                });
            });
        }
    }

    function edit_produk(id) {
        $.ajax({
            url: '<?= base_url(uri_string() . '/modal_edit_produk') ?>',
            method: 'POST',
            dataType: 'json',
            data: {
                id: id
            },
            success: function(response) {
                if (response.RESULT == 'OK') {
                    $('#modalresult').html(response.HTML);
                    $('#modalresult').modal('show');
                } else {
                    swal({
                        title: response.MESSAGE,
                        type: 'error'
                    });
                }
            }
        }).fail(function() {
            swal({
                title: 'Terjadi kesalahan',
                type: 'error'
            });
        });
    }
</script>
<script>
function openCity(evt, cityName) {
  var i, x, tablinks;
  x = document.getElementsByClassName("city");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < x.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}
</script>