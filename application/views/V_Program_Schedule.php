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
    <link rel="stylesheet" href="css/Program.css?<?= filemtime('css/Program.css'); ?>">
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
                <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                <h1 class="text-gray-100 mt-5">     <span> <?= $teacher_schedule_info['course_name'] ?></span></h1> 
            </div>
            
          <div class="ml-5 mt-5">
            <a  href="http://localhost/C_Program_Dashboard/index">Section</a>
          </div>
          <div class="ml-5 mt-5">
            <a  href="http://localhost/C_Program_Dashboard/scheduleList">Schedule</a>
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
               <span> <?= $teacher_schedule_info['first_name'] . ' ' . $teacher_schedule_info['last_name'] ?></span>
               
               <br>
                          <form action="/C_MIS_Dashboard/logout" method="post">
                          <div>
                          <input class="hover:font-bold block pr-12 text-sm text-gray-700" type="submit" value="Logout">
                          </div>
                          </form>
              </div>
            </div>
          



          </div>
        </div>
      </div>
    </nav>

<!-- ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->

                     

<input type="text" name="" value="<?= $schedule_info['teacher_name'] ?>" disabled>
<input type="text" name="" value="<?= $schedule_info['subject_name'] ?>" disabled>

            <table class="table-sm">

        <thead class="bg-gray-200 border-b-2 border-gray-200 ">
            <tr>
            <th class="w-64 p-3 text-sm font-semibold tracking-wide text-center"><pre>Student Number</pre></th>
            <th class="w-64 p-3 text-sm font-semibold tracking-wide text-center">Student Name</th>
            <th class="w-64 p-3 text-sm font-semibold tracking-wide text-center">Year Level</th>
            <th class="w-64 p-3 text-sm font-semibold tracking-wide text-center">Section Name</th>
            <th class="w-64 p-3 text-sm font-semibold tracking-wide text-center">Status</th>
            <th class="w-64 p-3 text-sm font-semibold tracking-wide text-center">Preliminary Grade</th>
            <th class="w-64 p-3 text-sm font-semibold tracking-wide text-center">Midterm Grade</th>
            <th class="w-64 p-3 text-sm font-semibold tracking-wide text-center">Finals Grade</th>
            <th class="w-64 p-3 text-sm font-semibold tracking-wide text-center">Grade</th>
            <th class="w-64 p-3 text-sm font-semibold tracking-wide text-center">Remarks</th>
            <th class="w-64 p-3 text-sm font-semibold tracking-wide text-center"></th>
            </tr>
        </thead>


        <tbody class="divide-y divide-gray-100">
            <?php foreach ($teacher_student_schedule_list as $row): ?>
              
              
            <tr>

                <input type="hidden" name=student_schedule_id[] value="<?= $row['student_schedule_id'] ?>">
                <td class="p-3 text-sm whitespace-nowrap class bg-blue-200"><pre>      <?= $row['student_number'] ?></pre></td>
                <td class="p-3 text-sm whitespace-nowrap class bg-blue-200"><?= $row['student_name'] ?></td>
                <td class="p-3 text-sm whitespace-nowrap class bg-blue-200"><?= $row['year_level'] == 1 ? '1st Year' : ($row['year_level'] == 2 ? '2nd Year' : ($row['year_level'] == 3 ? '3rd Year' : '4th Year')) ?>
                </td>
                <td class="p-3 text-sm whitespace-nowrap class bg-blue-200"><?= $row['section_name'] ?></td>
                <td class="p-3 text-sm whitespace-nowrap class bg-blue-200"></td>
                <td class="p-3 text-sm whitespace-nowrap class bg-blue-200"><input type="number"step=".01" name="prelim_grade[]" value="<?= $row['prelim_grade'] ?>" disabled>
                <td class="p-3 text-sm whitespace-nowrap class bg-blue-200"><input type="number"step=".01" name="midterm_grade[]" value="<?= $row['midterm_grade'] ?>" disabled>
                <td class="p-3 text-sm whitespace-nowrap class bg-blue-200"><input type="number"step=".01" name="final_grade[]" value="<?= $row['final_grade'] ?>" disabled>
                <td class="p-3 text-sm whitespace-nowrap class bg-blue-200"><input type="number"step=".01" name="grade[]" value="<?= $row['grade'] ?>" disabled>
                  
                <td class="p-3 text-sm whitespace-nowrap class bg-blue-200">
                    <select class="opt" name="grade_remarks_id[]" value="<?= $row['grade_remarks_id'] ?>" disabled> 
                        <option value="" hidden>-</option>
                        <?php foreach ($grade_remarks_list as $option) : ?>
                        <option value="<?= $option['grade_remarks_id'] ?>" <?= $row['grade_remarks_id'] == $option['grade_remarks_id'] ? 'selected' : ''?>>
                        <?= $option['grade_remarks_id'] . ' - ' . $option['grade_remarks_name'] ?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                </td>
                <td class="p-3 text-sm whitespace-nowrap class">
                    <a href="/C_Program_Dashboard/deleteStudentSchedule/?student_schedule_id=<?= $row['student_schedule_id'] ?>&schedule_id=<?= $schedule_id ?>"><span class="p-1.5 text-xs font-medium uppercase tracking wider text-blue-800 rounded-lg hover:font-bold"><pre>Delete</pre></span></a>
                </td>
            </tr>
            
            <?php endforeach; ?>
            
        </tbody>
    </table>

            
    <form action=/C_Program_Dashboard/addSection method="post" target="_self">
    
    <input type="hidden" name=schedule_id value="<?= $schedule_id ?>">
    <select class="opt" name="section_id"> 
        <option value="" hidden>-</option>
        <?php foreach ($course_section as $option) : ?>
        <option value="<?= $option['section_id'] ?>" <?= $option['section_id'] == $schedule_info['section_id'] ? 'selected' : ''?>>
        <?= $option['section_name'] ?>
        </option>
        <?php endforeach; ?>
    </select>
      <input class="hover:bg-blue-200 hover:text-gray-800" type="submit" value="Add Section">    
    </form>
    
    <form action=/C_Program_Dashboard/addStudentSchedule method="post" target="_self">
    <input type="hidden" name=schedule_id value="<?= $schedule_id ?>">
    <input type="text" name="student_number" value="">
    <input class="hover:bg-blue-200 hover:text-gray-800" type="submit" value="Add Student">    
    </form>


<script>
      function toggleProfileDropdown() {
          var dropdown = document.getElementById("myProfileDropdown");
          dropdown.classList.toggle("hidden");
      }
    
  </script>
</body>

</html>