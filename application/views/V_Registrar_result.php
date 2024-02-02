<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>

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
                <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                <h1 class="text-gray-100 mt-5">     IMMACULADA CONCEPCION COLLEGE [REGISTRAR]</h1>   
              
            </div>
          </div>
          <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
          
    
            <!-- Profile dropdown -->
            
            <div class="relative ml-3">
              <div>
                <button type="button" onclick="toggleProfileDropdown()" class="relative flex rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                  <span class="absolute -inset-1.5"></span>
                  <span class="sr-only">Open user menu</span>
                  <img src="<?php echo base_url();?>images/pp.png" alt="" style="width: 55px;">
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
        </div>
      </div>
    </nav>

<!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
<<<<<<< HEAD
<form method="post" action="<?php echo base_url('C_Registrar_result/search'); ?>">
=======



<main>
<form method="post" action="<?php echo base_url('C_Student_subject'); ?>">
>>>>>>> aa891d54e98a6272b35d58fefcb2473afb533233
    <label for="searchName">Enter Name:</label>
    <input type="text" name="searchName" id="searchName">
    <input type="submit" value="Search">
</form>
<section>
<?php if (!empty($results)): ?>
  <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
        <div class="relative flex h-16 items-center justify-between">
        <div class="overflow-auto rounded-lg shadow mt-40">

        <table class="w-full">        
            <thead class="bg-gray-200 border-b-2 border-gray-200 ">
                <tr>
                <th class="w-64 p-3 text-sm font-semibold tracking-wide text-left"><pre>FIRST NAME</th>

                <th class="w-64 p-3 text-sm font-semibold tracking-wide text-left"><pre>LAST NAME</th>

                <th class="w-64 p-3 text-sm font-semibold tracking-wide text-left"><pre>COURSE NAME</th>

                <th class="w-64 p-3 text-sm font-semibold tracking-wide text-left"><pre>YEAR LEVEL</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-100">
                <?php foreach ($results as $result): ?>                 
                  <tr class="bg-gray-300">
                    <td class="p-3 text-sm whitespace-nowrap class bg-blue-200"><?= $result['first_name'] ?></td>
                    <td class="p-3 text-sm whitespace-nowrap class bg-blue-200"><?= $result['last_name'] ?></td>
                    <td class="p-3 text-sm whitespace-nowrap class bg-blue-200"><?= $result['course_id'] == 1 ? 'Bachelor of Science in Computer Science' : ($result['course_id'] == 2 ? 'Bachelor of Science in Information Technology' : ($result['course_id'] == 3 ? 'Bachelor of Science in Business Administration' : '4th Year')) ?></td>
                    <td class="p-3 text-sm whitespace-nowrap class bg-blue-200"><?= $result['year_level'] == 1 ? '1st Year' : ($result['year_level'] == 2 ? '2nd Year' : ($result['year_level'] == 3 ? '3rd Year' : '4th Year')) ?></td>
                  </tr>
                  <?php endforeach; ?>                                 
            </tbody>
                </table>
                
<?php else: ?>
    <p>No results found.</p>
<?php endif; ?>
    <br><br>
</section>
</main>





    

    
    <script>
      function toggleProfileDropdown() {
          var dropdown = document.getElementById("myProfileDropdown");
          dropdown.classList.toggle("hidden");
      }
    
  </script>
</body>

</html>