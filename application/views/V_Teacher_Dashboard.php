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
    <link rel="stylesheet" href="css/Header_Dashboard.css?<?= filemtime('css/Header_Dashboard.css'); ?>">
</head>
<body>




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
                | <span><?= $role_list['access_role_name'].' | '.$teacher_info['last_name']?></span></h1>    
            </div>
          </div>

        
              <div class="dropDown">
                <button class="dropbtn"> 
                <img src="<?php echo base_url();?>images/<?= $teacher_info['profile_name'] == "" ? 'default_img.png' : $registrar_info['profile_name'] ?>" alt="profile" style="width: 53px; height: 53px; border-radius: 20px;">   
                </button>
                <div class="dropDownContent">
                  <a href="/C_Teacher_Profile">Profile</a>
                  <a href="/C_Teacher_Dashboard/logout">Log-out</a>
                </div>
              </div>
                

          </div>
        </div>
      </div>
    </nav>

<!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->



<!-- <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8"> -->
    <!-- <div class="relative flex h-16 items-center justify-between"> -->

    <div class="overflow-auto rounded-lg shadow mt-20">
    <table>
        <thead class="bg-gray-200 border-b-2 ">
        <tr>
            <th class="w-64 p-3 text-sm font-semibold tracking-wide text-left"><pre>Subject</pre></th>

            <th class="w-32 p-3 text-sm font-semibold tracking-wide text-left"><pre>Room</pre></th>

            <th class="w-32 p-3 text-sm font-semibold tracking-wide text-left"><pre>Schedule</pre></th>

            <th class="w-32 p-3 text-sm font-semibold tracking-wide text-left"><pre>Year Level</pre></th>

            <th class="w-32 p-3 text-sm font-semibold tracking-wide text-left"><pre>Semester</pre></th>

            <th class="w-32 p-3 text-sm font-semibold tracking-wide text-left"><pre>Section Name</pre></th>

             <th class="w-32 p-3 text-sm font-semibold tracking-wide text-left"></th>
        </tr>   
        </thead>

        <tbody class="divide-y divide-gray-100">
            <?php foreach ($schedule_list as $row): ?>
            <tr class="bg-gray-300">
            
                <td class="p-3 text-sm whitespace-nowrap class bg-blue-200"><?= $row['subject_name'] ?></td>
                <td class="p-3 text-sm whitespace-nowrap class bg-blue-200"><?= $row['room_remarks'] ?></td> 
                <td class="p-3 text-sm whitespace-nowrap class bg-blue-200"><?= $row['schedule_remarks'] ?></td> 
                <td class="p-3 text-sm whitespace-nowrap class bg-blue-200"><pre>    <?= $row['year_level'] ?></pre></td>
                <td class="p-3 text-sm whitespace-nowrap class bg-blue-200"><pre>   <?= $row['semester'] ?></pre></td>
                <td class="p-3 text-sm whitespace-nowrap class bg-blue-200"><pre>  <?= $row['section_name'] ?></pre></td>
                <td class="p-3 text-sm whitespace-nowrap class ">
                    <a href="/C_Teacher_Dashboard/schedule/?schedule_id=<?= $row['schedule_id'] ?>"><span class="p-1.5 text-xs font-medium uppercase tracking wider text-blue-800 rounded-lg hover:font-bold"><pre>     Edit</pre></span></a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    </div>
    <!-- </div>     -->
    <!-- </div> -->
 




<script>
      function toggleProfileDropdown() {
          var dropdown = document.getElementById("myProfileDropdown");
          dropdown.classList.toggle("hidden");
      }
      
  </script>
</body>

</html>