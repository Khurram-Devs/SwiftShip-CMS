<?php

include 'db_connect.php';

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $referenceNumber = $_POST['referenceNumber'];

  $sql = "SELECT * FROM parcels WHERE reference_number = '$referenceNumber'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {

    $row = $result->fetch_assoc();

    switch ($row['status']) {
      case '1':
        $status =  "<span class='badge badge-pill badge-info'> Collected</span>";
        break;
      case '2':
        $status = "<span class='badge badge-pill badge-info'> Shipped</span>";
        break;
      case '3':
        $status = "<span class='badge badge-pill badge-primary'> In-Transit</span>";
        break;
      case '4':
        $status = "<span class='badge badge-pill badge-primary'> Arrived At Destination</span>";
        break;
      case '5':
        $status = "<span class='badge badge-pill badge-primary'> Out for Delivery</span>";
        break;
      case '6':
        $status = "<span class='badge badge-pill badge-primary'> Ready to Pickup</span>";
        break;
      case '7':
        $status = "<span class='badge badge-pill badge-success'>Delivered</span>";
        break;
      case '8':
        $status = "<span class='badge badge-pill badge-success'> Picked-up</span>";
        break;
      case '9':
        $status = "<span class='badge badge-pill badge-danger'> Unsuccessfull Delivery Attempt</span>";
        break;

      default:
        $status = "<span class='badge badge-pill badge-info'> Item Accepted by Courier</span>";

        break;
    };

    $type = $row['type'] == 1 ? "<span class='badge badge-primary'>Deliver to Recipient</span>" : "<span class='badge badge-info'>Pickup</span>";


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
      $branch_dt = "<dt>Nearest Branch to Recipient for Pickup:</dt>
          <dd id='branchTo'>" . $branchToAddress . "</dd>";
    };


    $parcelDetails =
      "
               <div class='container-fluid'>
                 <div class='row'>
                   <div class='col-md-12'>
                     <div class='callout callout-info'>
                       <dl>
                         <dt>Tracking Number:</dt>
                         <dd id='trackingNumber'><h4><b> $referenceNumber </b></h4></dd>
                       </dl>
                     </div>
                   </div>
                 </div>
                 <div class='row'>
                   <div class='col-md-6'>
                     <div class='callout callout-info'>
                       <b class='border-bottom border-primary'>Sender Information</b>
                       <dl>
                         <dt>Name:</dt>
                         <dd id='senderName'>" . $row['sender_name'] . "</dd> 
                         <dt>Address:</dt>
                         <dd id='senderAddress'>" . $row['sender_address'] . "</dd> 
                         <dt>Contact:</dt>
                         <dd id='senderContact'>" . $row['sender_contact'] . "</dd> 
                       </dl>
                     </div>
                     <div class='callout callout-info'>
                       <b class='border-bottom border-primary'>Recipient Information</b>
                       <dl>
                         <dt>Name:</dt>
                         <dd id='recipientName'>" . $row['recipient_name'] . "</dd> 
                         <dt>Address:</dt>
                         <dd id='recipientAddress'>" . $row['recipient_address'] . "</dd> 
                         <dt>Contact:</dt>
                         <dd id='recipientContact'>" . $row['recipient_contact'] . "</dd> 
                       </dl>
                     </div>
                   </div>
                   <div class='col-md-6'>
                     <div class='callout callout-info'>
                       <b class='border-bottom border-primary'>Parcel Details</b>
                       <div class='row'>
                         <div class='col-sm-6'>
                           <dl>
                             <dt>Weight:</dt>
                             <dd id='weight'>" . $row['weight'] . "</dd> 
                             <dt>Height:</dt>
                             <dd id='height'>" . $row['height'] . "</dd> 
                             <dt>Price:</dt>
                             <dd id='price'>" . $row['price'] . " Rs </dd> 
                           </dl>
                         </div>
                         <div class='col-sm-6'>
                           <dl>
                             <dt>Width:</dt>
                             <dd id='width'>" . $row['width'] . "</dd> 
                             <dt>Length:</dt>
                             <dd id='length'>" . $row['length'] . "</dd> 
                             <dt>Type:</dt>
                             <dd id='type'>" . $type . "</dd> 
                           </dl>
                         </div>
                       </div>
                       <dl>
                         <dt>Branch Accepted the Parcel:</dt>
                         <dd id='branchFrom'>" . $branchFromAddress  . "</dd>" . $branch_dt . "
                         <dt>Status:</dt>
                         <dd id='status'>
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
