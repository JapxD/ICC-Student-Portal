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
    <link rel="stylesheet" href="css\Header_Dashboard.css?<?= filemtime('css\Header_Dashboard.css'); ?>">
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
                | <span><?= $role_list['access_role_name'].' | '.$teacher_schedule_info['last_name']?></span></h1>    
            </div>
          </div>

          <div class="cont">
            <a  href="http://localhost/C_Program_Dashboard/index">Section</a>
          </div>
          <div class="cont">
            <a  href="http://localhost/C_Program_Dashboard/scheduleList">Schedule</a>
          </div>
        
              <div class="dropDown"> 
                <button class="dropbtn"> 
                <img src="<?php echo base_url();?>images/<?= $teacher_schedule_info['profile_name'] == "" ? 'default_img.png' : $teacher_schedule_info['profile_name'] ?>" alt="profile" style="width: 53px; height: 53px; border-radius: 20px;">   
                </button>
                <div class="dropDownContent">
                  <a href="/C_Program_Profile">Profile</a>
                  <a href="/C_Program_Dashboard/logout">Log-out</a>
                </div>
              </div>
                

          </div>
        </div>
      </div>
    </nav>
<!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->
<div>
  <form action=/C_Program_Dashboard/createSection method="post" target="_self">
      <input class="mt-36 ml-12 bg-blue-200 hover:bg-gray-800 hover:text-gray-200" type="submit" value="Create Section">    
    </form>
</div>

 <main class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8 mb-20">
        <div class="relative flex items-center justify-between">
        <div class=" rounded-lg shadow mt-2 mb-12">

    <section>
    <table>
        <thead class="bg-gray-200 border-b-2 border-gray-200 ">
                <tr>
                <th class="w-30 p-3 text-sm font-semibold tracking-wide text-left"><pre>Sections</pre></th>
                <th class="w-30 p-3 text-sm font-semibold tracking-wide text-left "></pre>
                <th class="w-30 p-3 text-sm font-semibold tracking-wide text-left"></pre><a class="underline hover:bg-blue-200" href="http://localhost/C_Program_Dashboard/scheduleList">Schedule</a></th>
                </tr>
            </thead>

         <tbody class="divide-y divide-gray-100">
            <?php foreach ($course_section as $row): ?>
            <tr class="bg-gray-300">
            
                <td class="p-3 text-sm whitespace-nowrap class bg-blue-200"><?= $row['section_name'] ?></td>
                <td class="p-3 text-sm whitespace-nowrap class ">
                    <a href="/C_Program_Dashboard/section/?section_id=<?= $row['section_id'] ?>"><span class="p-1.5 text-xs font-medium uppercase tracking wider text-blue-800 rounded-lg hover:font-bold"><pre>Edit</pre></span></a>
                </td>
                <td class="p-3 text-sm whitespace-nowrap class">
                    <a href="/C_Program_Dashboard/deleteSection/?section_id=<?= $row['section_id'] ?>"><span class="p-1.5 text-xs font-medium uppercase tracking wider text-blue-800 rounded-lg hover:font-bold"><pre>Delete</pre></span></a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    </section>

</div>
</div>
</main>



<script>
      function toggleProfileDropdown() {
          var dropdown = document.getElementById("myProfileDropdown");
          dropdown.classList.toggle("hidden");
      }
    
  </script>
</body>

</html>