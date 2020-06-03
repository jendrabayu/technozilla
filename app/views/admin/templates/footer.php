      <footer class="main-footer">
          <div class="footer-left">
              Copyright &copy; 2020 <div class="bullet"></div>
              Develop By Jendra Bayu Nugraha
              <div class="bullet"></div> Template By <a href="https://nauval.in/">Muhamad Nauval Azhar</a>
          </div>
          <div class="footer-right">

          </div>
      </footer>
      </div>
      </div>

      <!-- General JS Scripts -->
      <script src="<?= asset('backend/modules/jquery.min.js') ?>"></script>
      <script src="<?= asset('backend/modules/popper.js') ?>"></script>
      <script src="<?= asset('backend/modules/tooltip.js') ?>"></script>
      <script src="<?= asset('backend/modules/bootstrap/js/bootstrap.min.js') ?>"></script>
      <script src="<?= asset('backend/modules/nicescroll/jquery.nicescroll.min.js') ?>"></script>
      <script src="<?= asset('backend/modules/moment.min.js') ?>"></script>
      <script src="<?= asset('backend/js/stisla.js') ?>"></script>

      <!-- JS Libraies -->
      <script src="<?= asset('backend/modules/datatables/datatables.min.js') ?>"></script>
      <script src="<?= asset('backend/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') ?>"></script>
      <script src="<?= asset('backend/modules/datatables/Select-1.2.4/js/dataTables.select.min.js') ?>"></script>
      <script src="<?= asset('backend/modules/jquery-ui/jquery-ui.min.js') ?>"></script>


      <!-- Page Specific JS File -->
      <script src="<?= asset('backend/js/page/modules-datatables.js') ?>"></script>
      <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>

      <script>
          CKEDITOR.replace('deskripsi');
      </script>
      <!-- Template JS File -->
      <script src="<?= asset('backend/js/scripts.js') ?>"></script>
      <script src="<?= asset('backend/js/custom.js') ?>"></script>

      <script>
          // Get the modal
          var modal = document.getElementById("myModal");

          // Get the image and insert it inside the modal - use its "alt" text as a caption
          var img = document.querySelectorAll(".img_bukti_transfer");

          var modalImg = document.getElementById("img01");
          var captionText = document.getElementById("caption");

          img.forEach(e => {
              e.onclick = function() {

                  modal.style.display = "block";
                  modalImg.src = this.src;
                  captionText.innerHTML = this.alt;
              }
          });




          // Get the <span> element that closes the modal
          var span = document.getElementsByClassName("close")[0];

          // When the user clicks on <span> (x), close the modal
          span.onclick = function() {
              modal.style.display = "none";
          }
      </script>

      </body>

      </html>