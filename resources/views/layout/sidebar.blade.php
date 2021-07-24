<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Aditya alhafiz sundana || 1101181038</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{ asset (") }}" class="nav-link active">
              <i class="nav-icon fas fa-th"></i>
              <p> home</p>
            </a>
            </li>
            @foreach ($data_menu as $category)
            <li class="nav nav-treeview">
            <a href='#' class="nav-lin">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>{{ $category->namamenu }}<i class="right fas fa-angle-left"></i>
            </p>
            <ul class="nav nav-treeview">
              @foreach($category->childrenCategories as $childCategory)
              @include('layout.child_category',['child_category'=>$childCategory])
              @endforeach
              </ul>
              </li>
              @endforeach
              </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>