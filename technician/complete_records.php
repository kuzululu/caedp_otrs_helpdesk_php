<?php

include("../inc/config.php");
require_once "../inc/session.php";
include("../class/class.php");
include("../inc/connection.php");

$_SESSION["account_type"] == "technician" ? /* true condition */ : header("location: ../logout");

require_once "../controllers/controller.php";

?>

<?php require_once "template-parts/header.php"; ?>
<body>

<?php require_once "template-parts/navbar.php"; ?>

<section>
 <div class="container-fluid">
   <div class="row">
     <div class="col-md-12 col-lg-12 text-end">
       <audio id="notifsound" src="audio/notif.mp3"></audio>
       <small class="fw-bolder text-uppercase fst-italic"><a href="incident_records">Incident Report</a> : <span id="incidentCount" class="animate__animated animate__fadeIn animate__infinite infinite text-danger fs-5 fw-bolder"></span></small>
     </div>
   </div>
 </div> 
</section>

<section class="mt-3">
 <div class="container-fluid">
  <div class="row">
    <div class="col-md-12 col-lg-12">
     <h2 class="fw-bolder fst-italic text-uppercase animate__animated animate__fadeIn animate__infinite infinite">Completed Records</h2>
    </div>
  </div>  
 </div> 
</section>

<section class="mt-3">
 <div class="container-fluid">
  <div class="row">
  <div class="col-md-4 d-md-flex">
    <label class="mt-2">Filter:</label>
    <input type="search" id="filterComplete" class="form-control resetSearch" placeholder="Filter by Remarks, Unit Status, Services, Status Report, End User"> <button class="resetBtn btn btn-secondary btn-sm" type="button">Reset</button>
  </div> 
</div> 
 </div> 
</section>

<section class="mt-3">
 <div class="container-fluid">
  <div class="row">
  	<div class="col-md-12 col-lg-12 text-end bg-danger">
  	 <a href="addNewRecord" class="text-light text-decoration-none">Add New</a>
  	</div>
  </div>	
 </div>	
</section>

<section>
 <div class="container-fluid">
 <div class="row">

  <div class="col-md-12 col-lg-12 p-0">
  	
  <div class="table-responsive" id="CompleteRecords">
  	<table class="table table-hover">
  	 <thead>
  	 	<tr class="text-center align-middle">
  	 		<th>No.</th>
        <th>Ticket ID</th>
  	 		<th>Date Troubleshoot</th>
  	 		<th>Service</th>
  	 		<th>End User</th>
  	 		<th>Unit Status</th>
  	 		<th>Remarks</th>
        <th>Status Report</th>
  	 		<th>Actions</th>
  	 	</tr>
  	 </thead>
  	 <tbody>
<?php
 class ViewRecords{

 	private $rec;

 	public function __construct($rec){
 		$this->rec = $rec;
 	}

 	public function displayRecords(){
 	$ctr = 1;
 	while ($row = $this->rec->fetch_assoc()) {
 	$date = $row["date_troubleshoot"];
 	$newDate = new DateTime($date);
 	$formatDate = $newDate->format("M d, Y");
?>  	 
  <tr class="text-center align-middle">
  	<td class="align-top"><?= $ctr ?></td>
  	<td class="align-top"><?= htmlspecialchars($row["ticketId"]) ?></td>
    <td class="align-top"><?= htmlspecialchars($formatDate) ?></td>	
  	<td class="align-top"><?= htmlspecialchars($row["services"]) ?></td>	
  	<td class="align-top"><?= htmlspecialchars($row["end_user" ]) ?></td>	
  	<td class="align-top"><?= htmlspecialchars($row["unit_status"]) ?></td>	
  	<td class="align-top"><?= htmlspecialchars($row["remarks"]) ?></td>
    <td class="align-top"><?= htmlspecialchars($row["status_report"]) ?></td>
  	<td>
  		<a href="complete_report?id=<?= htmlspecialchars(urlencode(base64_encode($row['id']))) ?>&&technician=<?= urlencode(base64_encode($_SESSION['first_name'] . ' ' . $_SESSION['last_name'])) ?>" class="btn btn-outline-secondary btn-sm">View</a>
  	</td>
  </tr>
<?php
$ctr++;
   }
 }
}

$page = isset($_GET["page"]) ? $_GET["page"] : 1;
$recordsPerPage = 5;

$recordsManager = new CompleteRecords($conn);
$totalRecords = $recordsManager->recordsCount();

$pageCount = ceil($totalRecords / $recordsPerPage);

$rec = $recordsManager->records($page, $recordsPerPage);

$recordsView = new ViewRecords($rec);
$recordsView->displayRecords();
?>
  	 </tbody>	
  	</table>
  </div>

 <hr class="border border-2 border-secondary">
<!-- pagination link -->
<nav aria-label="Page navigation example" id="pageNav">

<ul class="pagination justify-content-end">

  <!-- Previous -->
  <li class="page-item <?= ($page <= 1) ? 'disabled' : ''; ?>">

    <a class="page-link"
       href="?page=<?= ($page - 1); ?>"
       tabindex="-1">

      Previous

    </a>

  </li>

<?php

// Define the range of pages to display
$range = 2;

// Number of pages to show before and after current page
$start = max(1, $page - $range);
$end = min($pageCount, $page + $range);

// Add first page
if ($start > 1) {

?>

  <li class="page-item">

    <a class="page-link" href="?page=1">

      1

    </a>

  </li>

  <li class="page-item disabled">

    <span class="page-link">..</span>

  </li>

<?php

}

// Display pages
for ($i = $start; $i <= $end; $i++) {

?>

  <li class="page-item <?= ($i == $page) ? 'active' : ''; ?>">

    <a class="page-link"
       href="?page=<?= $i; ?>">

      <?= $i; ?>

    </a>

  </li>

<?php

}

// Add last page
if ($end < $pageCount) {

?>

  <li class="page-item disabled">

    <span class="page-link">..</span>

  </li>

  <li class="page-item">

    <a class="page-link"
       href="?page=<?= $pageCount; ?>">

      <?= $pageCount; ?>

    </a>

  </li>

<?php

}

?>

  <!-- Next -->
  <li class="page-item <?= ($page >= $pageCount) ? 'disabled' : ''; ?>">

    <a class="page-link"
       href="?page=<?= ($page + 1); ?>">

      Next

    </a>

  </li>

</ul>

</nav>
   
   </div>
  </div>	
 </div>	
</section>

<?php require_once "template-parts/bottom.php"; ?>
<script type="text/javascript" src="js/checkSessionStatus.js"></script>
<script type="text/javascript" src="js/ajaxFetchIncidentCount.js"></script>
</body>
</html>