<?php
include("db_connect.php");


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $parcelId = $_POST['parcelId'];

  $sql = "SELECT * FROM parcels WHERE id = '$parcelId'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {

    $row = $result->fetch_assoc();

    switch ($row['status']) {
      case '1':
        $status =  "<span class='Vbadge Vbadge-pill Vbadge-info'> Collected</span>";
        break;
      case '2':
        $status = "<span class='Vbadge Vbadge-pill Vbadge-info'> Shipped</span>";
        break;
      case '3':
        $status = "<span class='Vbadge Vbadge-pill Vbadge-primary'> In-Transit</span>";
        break;
      case '4':
        $status = "<span class='Vbadge Vbadge-pill Vbadge-primary'> Arrived At Destination</span>";
        break;
      case '5':
        $status = "<span class='Vbadge Vbadge-pill Vbadge-primary'> Out for Delivery</span>";
        break;
      case '6':
        $status = "<span class='Vbadge Vbadge-pill Vbadge-primary'> Ready to Pickup</span>";
        break;
      case '7':
        $status = "<span class='Vbadge Vbadge-pill Vbadge-success'>Delivered</span>";
        break;
      case '8':
        $status = "<span class='Vbadge Vbadge-pill Vbadge-success'> Picked-up</span>";
        break;
      case '9':
        $status = "<span class='Vbadge Vbadge-pill Vbadge-danger'> Unsuccessfull Delivery Attempt</span>";
        break;

      default:
        $status = "<span class='Vbadge Vbadge-pill Vbadge-info'> Item Accepted by Courier</span>";

        break;
    };

    $type = $row['type'] == 1 ? "<span class='Vbadge Vbadge-primary'>Deliver to Recipient</span>" : "<span class='Vbadge Vbadge-info'>Pickup</span>";


    $from_branch = $row['from_branch_id'];
    $resultFrom = $conn->query("SELECT CONCAT(street, ', ', city, ', ', state, ', ', zip_code, ', ', country) AS address FROM branches WHERE id = $from_branch");
    if ($resultFrom && $resultFrom->num_rows > 0) {
      $branchFromData = $resultFrom->fetch_assoc();
      $branchFromAddress = $branchFromData['address'];
    }

    if ($row['type'] == 1) {
      $branch_dt = "";
      $branch_dt = "";
    } else {
      $To_branch = $row['to_branch_id'];
      $resultTo = $conn->query("SELECT CONCAT(street, ', ', city, ', ', state, ', ', zip_code, ', ', country) AS address FROM branches WHERE id = $To_branch");
      if ($resultTo && $resultTo->num_rows > 0) {
        $branchToData = $resultTo->fetch_assoc();
        $branchToAddress = $branchToData['address'];
      };
      $branch_dt = "<dt class='mt-2 fs-4 fw-semibold'>Nearest Branch to Recipient for Pickup:</dt>
          <dd id='branchTo'>" . $branchToAddress . "</dd>";
    };


    $parcelDetails =
      "
               <div class='container-fluid'>
                 <div class='row'>
                   <div class='col-md-12'>
                     <div class='callout callout-info'>
                       <dl>
                         <dt class='mt-2 fs-4 fw-semibold'>Tracking Number:</dt>
                         <dd id='trackingNumber'><h3><b>" . $row['reference_number'] . "</b></h3></dd>
                       </dl>
                     </div>
                   </div>
                 </div>
                 <div class='row'>
                   <div class='col-md-6'>
                     <div class='callout callout-info'>
                       <b class='border-bottom border-primary fs-5'>Sender Information</b>
                       <dl>
                         <dt class='mt-2 fs-4 fw-semibold'>Name:</dt>
                         <dd id='senderName'>" . $row['sender_name'] . "</dd> 
                         <dt class='mt-2 fs-4 fw-semibold'>Address:</dt>
                         <dd id='senderAddress'>" . $row['sender_address'] . "</dd> 
                         <dt class='mt-2 fs-4 fw-semibold'>Contact:</dt>
                         <dd id='senderContact'>" . $row['sender_contact'] . "</dd> 
                       </dl>
                     </div>
                     <div class='callout callout-info'>
                       <b class='border-bottom border-primary fs-5'>Recipient Information</b>
                       <dl>
                         <dt class='mt-2 fs-4 fw-semibold'>Name:</dt>
                         <dd id='recipientName'>" . $row['recipient_name'] . "</dd> 
                         <dt class='mt-2 fs-4 fw-semibold'>Address:</dt>
                         <dd id='recipientAddress'>" . $row['recipient_address'] . "</dd> 
                         <dt class='mt-2 fs-4 fw-semibold'>Contact:</dt>
                         <dd id='recipientContact'>" . $row['recipient_contact'] . "</dd> 
                       </dl>
                     </div>
                   </div>
                   <div class='col-md-6'>
                     <div class='callout callout-info'>
                       <b class='border-bottom border-primary fs-5'>Parcel Details</b>
                       <div class='row mt-2'>
                         <div class='col-sm-6'>
                           <dl>
                             <dt class='mt-2 fs-4 fw-semibold'>Weight:</dt>
                             <dd id='weight'>" . $row['weight'] . "</dd> 
                             <dt class='mt-2 fs-4 fw-semibold'>Height:</dt>
                             <dd id='height'>" . $row['height'] . "</dd> 
                             <dt class='mt-2 fs-4 fw-semibold'>Price:</dt>
                             <dd id='price'>" . $row['price'] . "</dd> 
                           </dl>
                         </div>
                         <div class='col-sm-6'>
                           <dl>
                             <dt class='mt-2 fs-4 fw-semibold'>Width:</dt>
                             <dd id='width'>" . $row['width'] . "</dd> 
                             <dt class='mt-2 fs-4 fw-semibold'>Length:</dt>
                             <dd id='length'>" . $row['length'] . "</dd> 
                             <dt class='mt-2 fs-4 fw-semibold'>Type:</dt>
                             <dd id='type'>" . $type . "</dd> 
                           </dl>
                         </div>
                       </div>
                       <dl>
                       <b class='border-bottom border-primary fs-5'>Branch Details</b>
                         <dt class='mt-2 fs-4 fw-semibold'>Branch Accepted the Parcel:</dt>
                         <dd id='branchFrom'>" . $branchFromAddress  . "</dd>" . $branch_dt . "
                         <dt class='mt-3 mb-1 fs-4 fw-semibold'><b class='border-bottom border-primary'>Status:</b></dt>
                         <dd class='mt-2' id='status'>
                         " . $status . "
                           </dd>
                       </dl>
                     </div>
                   </div>
                 </div>
               </div>
       ";
    echo $parcelDetails;
  } else {
    echo "No parcel found with the provided reference number.";
  }
} else {
  echo "Invalid request.";
}

$conn->close();
