<?php 
  include "header.php";
?>


                <div class="col-12">
                <div class="container1">
    
<div class="container">
		<h2>Add Subcategory</h2>
	<form  method="post" enctype="multipart/form-data">
		<div class="form-group">
    <label for="firstname">Subcategory Name</label>
    <input type="text" class="form-control" id="exampleInputfirstname" name="firstname">
  </div>

  <button type="submit" class="btn btn-primary" name="create">Add Subcategory</button>
</form>
</div>
</div>
                </div>
       

              </div>
            </div>
            <!-- / Content -->

            <!-- Footer -->
            <footer class="content-footer footer bg-footer-theme">
              <div class="container-xxl">
                <div
                  class="footer-container d-flex align-items-center justify-content-between py-3 flex-md-row flex-column">
                  <div class="text-body mb-2 mb-md-0">
                    © <b id="dt"><b>
                    <script>

                      function getDate()
                      {
                        document.getElementById('dt').innerHTML = (new Date());
                      }
                      setInterval(getDate)
                    </script>
                    , made with <span class="text-danger"><i class="tf-icons mdi mdi-heart"></i></span> by
                    <a href="https://nirav.com" target="_blank" class="footer-link fw-medium"
                      >Nirav Patel</a
                    >
                  </div>
             
                </div>
              </div>
            </footer>
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->



    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="assets/vendor/libs/jquery/jquery.js"></script>
    <script src="assets/vendor/libs/popper/popper.js"></script>
    <script src="assets/vendor/js/bootstrap.js"></script>
    <script src="assets/vendor/libs/node-waves/node-waves.js"></script>
    <script src="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="assets/vendor/js/menu.js"></script>

    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="assets/vendor/libs/apex-charts/apexcharts.js"></script>

    <!-- Main JS -->
    <script src="assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="assets/js/dashboards-analytics.js"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>
