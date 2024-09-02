<!-- Header starts -->
<header>
  <div class="container bg-dark text-light py-3">
    <div class="row align-items-center">
      <!-- Logo section -->
      <div class="col-md-4">
        <!-- Logo -->
        <div class="logo">
          <a href="index.php" class="text-light text-decoration-none">
            <h2 class="logo-text"><span class="font-weight-bold">Catering Reservation</span></h2>
          </a>  
        </div>
        <!-- Logo ends -->
      </div>
      <!-- Button section -->
      <div class="col-md-8">
        <!-- Buttons -->
        <ul class="nav nav-tabs justify-content-evenly">
          <!-- Home button -->
          <li class="nav-item">
            <a href="index.php" class="nav-link text-light">
              <i class="fa fa-home me-2"></i> Home
            </a>                
          </li>
          
          <!-- Menu button -->
          <li class="nav-item">
            <a href="menu.php" class="nav-link text-light">
              <i class="fa fa-cutlery me-2"></i> Menu
            </a>                
          </li>
          
          <!-- Schedule button -->
          <li class="nav-item">
            <a href="schedule.php" class="nav-link text-light">
              <i class="fa fa-calendar me-2"></i> Schedule of Events
            </a>
          </li>

          <!-- Reservation button -->
          <li class="nav-item">
            <a href="reservation.php" class="nav-link text-light">
              <i class="fa fa-pencil me-2"></i> Schedule a Reservation
            </a>                
          </li>
          
          <!-- Contact button -->
          <li class="nav-item">
            <a href="contact.php" class="nav-link text-light">
              <i class="fa fa-phone me-2"></i> Contact Us
            </a>                
          </li>
         
        </ul>
      </div>
      <!-- Data section -->
    </div>
  </div>
  <?php include 'login_modal.php'; ?>
  <?php include 'details_modal.php'; ?>    
  <?php include 'reservation_modal.php'; ?>
  <?php include 'facilities_modal.php'; ?>
  <?php include 'culinary_modal.php'; ?>
</header>
