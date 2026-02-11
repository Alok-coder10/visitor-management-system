<html lang="en">
 <head>
  <meta charset="utf-8"/>
  <meta content="width=device-width, initial-scale=1" name="viewport"/>
  <title>
   Status of Visit with QR Code
  </title>
  <script src="https://cdn.tailwindcss.com">
  </script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
 </head>
 <body class="bg-gray-100 min-h-screen flex items-center justify-center p-6">
  <?php
    // Set QRid to a fixed value
    $qrId = "123";

    // Generate QR code image URL using a public API (https://api.qrserver.com/v1/create-qr-code/)
    $qrCodeUrl = "https://api.qrserver.com/v1/create-qr-code/?size=300x300&data=" . urlencode($qrId);
  ?>
  <div class="flex flex-col md:flex-row gap-6 max-w-4xl w-full">
   <div class="bg-white rounded-xl shadow-lg flex flex-col items-center p-10 flex-1">
    <img alt="QR code image generated for QR ID abc123" class="w-48 h-48 object-cover mb-6" height="300" src="<?php echo $qrCodeUrl; ?>" width="300"/>
    <h2 class="text-xl font-normal mb-1">
     Usernames
    </h2>
    <p class="text-sm font-light">
     visitor id
    </p>
   </div>
   <div class="bg-white rounded-xl shadow-lg p-8 flex flex-col justify-start w-80">
    <h2 class="text-2xl font-bold mb-6">
     Status of Visit
    </h2>
    <button class="bg-indigo-600 text-white rounded-full py-3 px-8 mb-6 w-full text-center text-lg font-normal">
     Requests Pending
    </button>
    <div class="bg-gray-300 rounded-xl p-4 text-sm leading-relaxed">
     <div class="flex items-center mb-2">
      <span class="inline-flex items-center justify-center w-5 h-5 rounded bg-green-500 text-white mr-2">
       <i class="fas fa-check">
       </i>
      </span>
      <span class="font-semibold">
       Visitor Verified
      </span>
     </div>
     <p>
      <span class="font-bold">
       Name:
      </span>
      Nishant Singh
     </p>
     <p>
      <span class="font-bold">
       Purpose:
      </span>
      Campus Interview
     </p>
     <p>
      <span class="font-bold">
       Date of Visit:
      </span>
      2025-04-24
     </p>
     <p>
      <span class="font-bold">
       Entry Time:
      </span>
      2025-04-24 18:36:55
     </p>
     <p>
      <span class="font-bold">
       Status:
      </span>
      in campus
     </p>
    </div>
   </div>
  </div>
 </body>
</html>