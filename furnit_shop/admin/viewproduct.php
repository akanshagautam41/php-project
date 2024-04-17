<?php 
  include "header.php";
?>


                <div class="col-12">
                  <div class="card">
                    <div class="table-responsive">
                      <table class="table">
                        <thead class="table-light">
                          <tr>
                          
                            <th class="text-truncate"> id</th>
                            <th class="text-truncate">category</th>
                            <th class="text-truncate">sucategory</th>
                            <th class="text-truncate">Product id</th>
                            <th class="text-truncate">Product name</th>
                            <th class="text-truncate">Product description</th>
                            <th class="text-truncate">Product price</th>
                            <th class="text-truncate">Edit</th>
                            <th class="text-truncate">Delete</th>
                            
                          </tr>
                        </thead>
                        <tbody>

                        <?php
                        if(!empty($prd_arr))
                        {
                            foreach($prd_arr as $prd)
                            {

                         
                        ?>
                          <tr>
                            <td>
                            
                              <div class="d-flex align-items-center">
                              <div class="avatar avatar-sm me-3">
                                  <img src="assets/img/avatars/1.png" alt="Avatar" class="rounded-circle" />
                                </div>
                               <div>
                                
                                
                            <td class="text-truncate"><?php echo $prd->cate_id?></td>
                            <td class="text-truncate"><?php echo $prd->subcate_id?></td>
                            <td class="text-truncate"><?php echo $prd->prd_id?></td>
                            <td class="text-truncate"><?php echo $prd->prd_name?></td>
                            <td class="text-truncate"><?php echo $prd->prd_description?></td>
                            <td class="text-truncate"><?php echo $prd->prd_price?></td>
                                  
                                
                                </div>
                                
                              </div>
                             
                            </td>
                          
                            <!-- <td class="text-truncate">
                              <i class="mdi mdi-laptop mdi-24px text-danger me-1"></i> Admin
                            </td> -->
                           
                           
                            <!-- <td><span class="badge bg-label-warning rounded-pill">Pending</span></td> -->

                            <td><a href="/furnit_shop/admin/editproduct?editId=<?php echo $prd->prd_id;?>"><button class="bg-danger border text-white rounded-3 px-4 py-2 ">Edit</button></a></td>
                            <td><a href="/furnit_shop/admin/deleteproduct?delId=<?php echo $prd->prd_id;?>"><button class="bg-danger border text-white rounded-3 px-4 py-2 ">Delete</button></a></td>
                          
                          </tr>

                          <?php }}?>
                 
                        </tbody>
                      </table>
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
