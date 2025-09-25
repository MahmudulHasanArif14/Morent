<?php
session_start();

if(!isset($_SESSION['email'])) {
    header("Location: index.php?error=" . urlencode("Please log in first."));
    exit;
}

$_SESSION = [];

// Destroy the session
session_destroy();

// Redirect with JS alert

echo '
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<!-- Logout Success Modal -->
<div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header border-bottom-0">
        <h5 class="modal-title" id="logoutModalLabel">Logged Out</h5>
      </div>
      <div class="modal-body">
        You have been logged out successfully.
      </div>
      <div class="modal-footer">
        <button type="button" id="logoutOkBtn" class="btn btn-primary" data-bs-dismiss="modal">OK</button>
      </div>
    </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>

  var logoutModal = new bootstrap.Modal(document.getElementById("logoutModal"));
  logoutModal.show();

  
  document.getElementById("logoutOkBtn").addEventListener("click", function () {
    window.location.href = "index.php";
  });
</script>
';
?>


?>