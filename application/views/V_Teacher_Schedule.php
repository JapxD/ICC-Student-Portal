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
    <link rel="stylesheet" href="css\V_Teacher_Schedule.css?<?= filemtime('css\V_Teacher_Schedule.css'); ?>">
</head>
<body>
       <!-- -----------------------------------------------------------------------------NAVIGATION BAR SECTION-------------------------------------------------------------------------------------------------------------------------------- -->
       <nav class="bg-gray-800">
      <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
        <div class="relative flex h-16 items-center justify-between">
<!-- -----------------------------BACK---------------------------------------------- -->
            
             <!-- --------------------------------------------------------------------------- -->
          <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
            
            <div class="flex flex-shrink-0 items-center">
              
            <img src="<?php echo base_url();?>images/iccl.webp" alt="" style="width: 50px;">
            </div>
            <div class="hidden sm:ml-6 sm:block">
              <a class="flex space-x-4">
                <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                <h1 class="text-gray-100 mt-5">     IMMACULADA CONCEPCION COLLEGE</h1>  
              
            </div>
          </div>
          <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
          <form action="/C_Teacher_Dashboard/" method="post">
            <button type="submit" class=" text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
              
              
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4">
                 <path fill-rule="evenodd" d="M12.5 9.75A2.75 2.75 0 0 0 9.75 7H4.56l2.22 2.22a.75.75 0 1 1-1.06 1.06l-3.5-3.5a.75.75 0 0 1 0-1.06l3.5-3.5a.75.75 0 0 1 1.06 1.06L4.56 5.5h5.19a4.25 4.25 0 0 1 0 8.5h-1a.75.75 0 0 1 0-1.5h1a2.75 2.75 0 0 0 2.75-2.75Z" clip-rule="evenodd" />
              </svg>
            </button>
            </form>
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
               <span> <?= $teacher_info['last_name'] . ', ' . $teacher_info['first_name'] ?></span>
               <br>
                          <form action="/C_MIS_Dashboard/logout" method="post">
                          <div class="hover:text-blue-500 ">
                          <input class="hover:font-bold block pr-12 text-sm text-gray-700 hover:text-blue-800" type="submit" value="Logout">
                          </div>
                          </form>
              </div>
            </div>
          
          </div>
        </div>
      </div>
    </nav>

<!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->


  
   
          
            <div class="">
            <table>

        <thead class="bg-gray-200 border-b-2 border-gray-200 ">
            <tr>
            <th class="w-64 p-3 text-sm font-semibold tracking-wide text-center"><pre>    Student Number</pre></th>
            <th class="w-64 p-3 text-sm font-semibold tracking-wide text-center">Student Name</th>
            <th class="w-64 p-3 text-sm font-semibold tracking-wide text-center">Year Level</th>
            <th class="w-64 p-3 text-sm font-semibold tracking-wide text-center">Section Name</th>
            <th class="w-64 p-3 text-sm font-semibold tracking-wide text-center">Status</th>
            <th class="w-64 p-3 text-sm font-semibold tracking-wide text-center">Preliminary Grade</th>
            <th class="w-64 p-3 text-sm font-semibold tracking-wide text-center">Midterm Grade</th>
            <th class="w-64 p-3 text-sm font-semibold tracking-wide text-center">Finals Grade</th>
            <th class="w-64 p-3 text-sm font-semibold tracking-wide text-center">Grade</th>
            <th class="w-64 p-3 text-sm font-semibold tracking-wide text-center">Remarks</th>
            </tr>
        </thead>





        <form action="/C_Teacher_Dashboard/saveStudentGrade" method="post"> 
              <input class="save" type="submit" value="save">

        <tbody class="divide-y divide-gray-100">
              <input type="hidden" name="schedule_id" value="<?=$schedule_id?>">
            <?php foreach ($teacher_student_schedule_list as $row): ?>
              
              
            <tr>

                <input type="hidden" name=student_schedule_id[] value="<?= $row['student_schedule_id'] ?>">
                <td class="p-3 text-sm whitespace-nowrap class bg-blue-200"><pre>      <?= $row['student_number'] ?></pre></td>
                <td class="p-3 text-sm whitespace-nowrap class bg-blue-200"><?= $row['student_name'] ?></td>
                <td class="p-3 text-sm whitespace-nowrap class bg-blue-200"><?= $row['year_level'] == 1 ? '1st Year' : ($row['year_level'] == 2 ? '2nd Year' : ($row['year_level'] == 3 ? '3rd Year' : '4th Year')) ?>
                </td>
                <td class="p-3 text-sm whitespace-nowrap class bg-blue-200"><?= $row['section_name'] ?></td>
                <td class="p-3 text-sm whitespace-nowrap class bg-blue-200"></td>
                
                  <td class="p-3 text-sm whitespace-nowrap class bg-blue-200"><input type="number"step=".01" name="prelim_grade[]" value="<?= $row['prelim_grade'] ?>">
                <td class="p-3 text-sm whitespace-nowrap class bg-blue-200"><input type="number"step=".01" name="midterm_grade[]" value="<?= $row['midterm_grade'] ?>">
                <td class="p-3 text-sm whitespace-nowrap class bg-blue-200"><input type="number"step=".01" name="final_grade[]" value="<?= $row['final_grade'] ?>">
                <td class="p-3 text-sm whitespace-nowrap class bg-blue-200"><input type="number"step=".01" name="grade[]" value="<?= $row['grade'] ?>">
                <td class="p-3 text-sm whitespace-nowrap class bg-blue-200">
                    <select class="opt" name="grade_remarks_id[]" value="<?= $row['grade_remarks_id'] ?>" disabled> 
                        <option value="" hidden>-</option>
                        <?php foreach ($grade_remarks_list as $option) : ?>
                        <option value="<?= $option['grade_remarks_id'] ?>" <?=$row['grade_remarks_id'] == $option['grade_remarks_id'] ? 'Selected' :''?>>
                        <?= $row['grade_remarks_id'] == $option['grade_remarks_id'] ? '' : ''?>
                        <?= $option['grade_remarks_id'] . ' - ' . $option['grade_remarks_name'] ?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                </td>
            </tr>
            
            <?php endforeach; ?>
            
        </tbody>
        </form>
    </table>
            </div>
      

    

            <script>
      function toggleProfileDropdown() {
          var dropdown = document.getElementById("myProfileDropdown");
          dropdown.classList.toggle("hidden");
      }
      
  </script>
</body>

</html>