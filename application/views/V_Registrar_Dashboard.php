<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<html>
<head>
<meta charset="utf-8"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <base href="<?= base_url(); ?>">
    <script src="https://cdn.tailwindcss.com"></script>
     <!-- <link rel="stylesheet" href="css/Employee_DD.css?<?= filemtime('css/V_Registrar_Dashboard.css'); ?>"> -->
</head>
<body class="bg-blue-500">
 <!-- -----------------------------------------------------------------------------NAVIGATION BAR SECTION-------------------------------------------------------------------------------------------------------------------------------- -->
 <nav class="bg-gray-800">
      <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
        <div class="relative flex h-16 items-center justify-between">
          <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
            <div class="flex flex-shrink-0 items-center">
            <img src="<?php echo base_url();?>images/iccl.webp" alt="" style="width: 50px;">
            </div>
            <div class="hidden sm:ml-6 sm:block">
              <a class="flex space-x-4">
                <h1 class="text-gray-100 mt-5">IMMACULADA CONCEPCION COLLEGE &nbsp;&nbsp; 
                | <span><?= $registrar_info['access_role_name']. ' | '.$registrar_info['last_name']?></span></h1>    
            </div>
          </div>

        
          <div class="relative ml-3">
              <div>
                <button type="button" onclick="toggleProfileDropdown()" class="relative flex rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                  <span class="absolute -inset-1.5"></span>
                  <span class="sr-only">Open user menu</span>
                  <img src="<?php echo base_url();?>images/<?= $registrar_info['profile_name'] == "" ? 'profile.png' : $registrar_info['profile_name'] ?>" alt="profile" style="width: 53px; height: 53px; border-radius: 20px;">   
                </button>
              </div>
              <div id="myProfileDropdown" class="hidden absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                <!-- Active: "bg-gray-100", Not Active: "" -->
               <span> <?= $registrar_info['first_name'] . ' ' . $registrar_info['last_name'] ?></span>
               
               <br>
               <form action="/C_Registrar_Dashboard/logout" method="post">
                <input class="hover:font-bold block pr-12 text-sm text-gray-700" type="submit" value="Logout">
                </form>
                

          </div>
        </div>
      </div>
    </nav>

<!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->

<main class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8 mt-12 mb-20">
<a class="p-2 rounded ml-12 bg-blue-200 border-gray-200 hover:bg-gray-800 hover:text-gray-200" href="C_Registrar_students">STUDENTS  ></a>
        <div class=" rounded-lg shadow mt-2 mb-12">
<section>
<div class="bg-gray-800 border-gray-200 text-center text-gray-200 pt-4">
            <span>Welcome! <?= $registrar_info['last_name'] . ', ' . $registrar_info['first_name'] ?></span><br><br>

<span><?= !empty($message) ? $message : '' ?></span> 
            </div>

<div class="p-3 text-sm bg-blue-200">
<form action="/C_Registrar_Dashboard/studentUpload" method="post" enctype="multipart/form-data"> 
    Select Excel to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input class="hover:text-blue-800 hover:text-bold hover:underline" type="submit" value="Upload Excel" name="submit">
</form>
</div>
</section>          
        </div>
</main>

    <br><br>
    
    
    
    <script>
      function toggleProfileDropdown() {
          var dropdown = document.getElementById("myProfileDropdown");
          dropdown.classList.toggle("hidden");
      }
    
  </script>
</body>

</html>