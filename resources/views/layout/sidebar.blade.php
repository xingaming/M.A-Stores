<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{asset('dist/img/AdminLTELogo.png')}}" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">M.A</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Admin</a>
        </div>
      </div>

 <!-- Sidebar Menu -->
 <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
      <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->

      <li class="nav-item">
        <a href="#" class="nav-link">
          <i><ion-icon name="bag-handle-outline"></ion-icon></i>
          <p>
            Quản Lí Giỏ Hàng
            <i class="fas fa-angle-left right"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{url('/manage-order')}}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Quản Lí Đơn Đặt Hàng</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('/delivery')}}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Quản Lí Vận Chuyển</p>
            </a>
          </li>
        </ul>
      </li>
        <a href="" class="nav-link">
          <i><ion-icon name="prism-outline"></ion-icon></i>
          <p>
            Quản Lí Tin Tức Sự Kiện
            <i class="fas fa-angle-left right"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">
          <li class="nav-item">
            <a href="{{url('/index/news')}}" class="nav-link">
              <i class="far fa-circle nav-icon"></i>
              <p>Tin tức</p>
            </a>
          </li>
        </ul>
  </nav>
  <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
</aside>
