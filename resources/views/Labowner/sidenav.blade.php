   <aside
       class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 bg-gradient-dark"
       id="sidenav-main">
       <div class="sidenav-header">
           <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
               aria-hidden="true" id="iconSidenav"></i>
           <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/material-dashboard/pages/dashboard "
               target="_blank">
               <img src="./assets/img/logo-ct.png" class="navbar-brand-img h-100" alt="main_logo" />
               <span class="ms-1 font-weight-bold text-white">Welcome {{ Auth::user()->name }} </span>
           </a>
       </div>

       <hr class="horizontal light mt-0 mb-2" />
       <!-- sidenav -->
       <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
           <ul class="navbar-nav">


               <li class="nav-item">
                   <a class="nav-link text-white" href="{{ url('lab_profile') }}">
                       <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                           <i class="material-icons opacity-10">home</i>
                       </div>

                       <span class="nav-link-text ms-1">Create A Lab Profile</span>
                   </a>
               </li>
               <li class="nav-item">
                   <a class="nav-link text-white" href="{{ url('pay') }}">
                       <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                           <i class="material-icons opacity-10">money</i>
                       </div>

                       <span class="nav-link-text ms-1">Make Payment</span>
                   </a>
               </li>
               <li class="nav-item">
                   <a class="nav-link text-white" href="{{ url('view_lab_details') }}">
                       <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                           <i class="material-icons opacity-10">home</i>
                       </div>

                       <span class="nav-link-text ms-1">View Lab Details</span>
                   </a>
               </li>
               <li class="nav-item">
                   <a class="nav-link text-white" href="{{ url('view_appointments') }}">
                       <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                           <i class="material-icons opacity-10">book</i>
                       </div>

                       <span class="nav-link-text ms-1">view appointments</span>
                   </a>
               </li>
               <li class="nav-item">
                   <a class="nav-link text-white" href="{{ url('report') }}">
                       <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                           <i class="material-icons opacity-10">report</i>
                       </div>

                       <span class="nav-link-text ms-1">Generate Appointment Report</span>
                   </a>
               </li>



           </ul>
       </div>
   </aside>
