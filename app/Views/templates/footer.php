  <!-- Footer -->
  <footer class="py-3" style="background-color: #007bff !important;">
      <div class="container">
          <p class="m-0 text-center text-white">Copyright &copy; Rental Mobil Dua Putra <?=date('Y');?>
          </p>
      </div>
      <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="<?=base_url('assets/');?>vendor/jquery/jquery.min.js"></script>
  <script src="<?=base_url('assets/');?>js/script.js"></script>
  <script>
    $(document).ready(function () {
        // Find the flash message element
        var flashMessage = $('.alert');

        // Check if the flash message element exists
        if (flashMessage.length) {
            // Hide the flash message initially
            flashMessage.hide();

            // Add effect before showing the flash message
            flashMessage.slideDown('slow');

            // Hide the flash message with a slide-up effect after 7 seconds
            setTimeout(function () {
                flashMessage.slideUp('slow');
            }, 5000);
        }
    });

    $(document).ready(function() {
        $("#tgl_rental, #tgl_kembali").on("input", function() {
            var tglRental = $("#tgl_rental")[0];
            var tglKembali = $("#tgl_kembali")[0];

            tglRental.setCustomValidity("");
            tglKembali.setCustomValidity("");
            
            if (!tglRental.value.trim().length && !tglKembali.value.trim().length) {
                tglRental.setCustomValidity("Please select a date for Tanggal Rental.");
                tglKembali.setCustomValidity("Please select a date for Tanggal Kembali.");
            } else if (!tglRental.value.trim().length && tglKembali.value.trim().length) {
                tglRental.setCustomValidity("Pilihlah Tanggal untuk Mulai Rental !!");
            } else if (tglRental.value.trim().length && !tglKembali.value.trim().length) {
                tglKembali.setCustomValidity("Pilihlah Tanggal untuk Pengembalian !!");
            }
        });
    });

    $(function() {
      $('[data-toggle="tooltip"]').tooltip()
    })
  </script>
  <script src="<?=base_url('assets/');?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>