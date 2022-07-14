  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index3.html" class="brand-link">
          <img src="{{ asset('backend') }}/dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
              class="brand-image img-circle elevation-3" style="opacity: .8">
          <span class="brand-text font-weight-light">AdminLTE 3</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
              <div class="image">
                  <img src="{{ asset('backend') }}/dist/img/user2-160x160.jpg" class="img-circle elevation-2"
                      alt="User Image">
              </div>
              <div class="info">
                  <a href="#" class="d-block">{{ Auth::user()->name }}</a>
              </div>
          </div>

          <!-- SidebarSearch Form -->
          <div class="form-inline">
              <div class="input-group" data-widget="sidebar-search">
                  <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                      aria-label="Search">
                  <div class="input-group-append">
                      <button class="btn btn-sidebar">
                          <i class="fas fa-search fa-fw"></i>
                      </button>
                  </div>
              </div>
          </div>

          <!-- Sidebar Menu -->
          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                  data-accordion="false">
                  <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                  <li class="nav-item menu-open">
                      <a href="{{ route('dashboard') }}" class="nav-link active">
                          <i class="nav-icon fas fa-tachometer-alt"></i>
                          <p>Dashboard</p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="pages/widgets.html" class="nav-link">
                          <i class="nav-icon fas fa-th"></i>
                          <p>
                              Widgets
                              <span class="right badge badge-danger">New</span>
                          </p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-copy"></i>
                          <p>
                              Category
                              <i class="fas fa-angle-left right"></i>
                              <span class="badge badge-info right">2</span>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{ route('category.index') }}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>All Category</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ route('category.create') }}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Add Category</p>
                              </a>
                          </li>
                      </ul>
                  </li>
                  <li class="nav-item">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-copy"></i>
                          <p>
                              Sub Category
                              <i class="fas fa-angle-left right"></i>
                              <span class="badge badge-info right">2</span>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{ route('subcategory.index') }}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>All SubCategory</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ route('subcategory.create') }}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Add SubCategory</p>
                              </a>
                          </li>
                      </ul>
                  </li>
                  <li class="nav-item">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-copy"></i>
                          <p>
                              Post
                              <i class="fas fa-angle-left right"></i>
                              <span class="badge badge-info right">2</span>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{ route('posts.create') }}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Create Post</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="{{ route('posts.index') }}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Manage Post</p>
                              </a>
                          </li>
                      </ul>
                  </li>
                  <li class="nav-header">LABELS</li>
                  <li class="nav-item">
                      <form method="POST" action="{{ route('logout') }}" class="nav-link">
                          @csrf

                          <x-responsive-nav-link :href="route('logout')"
                              onclick="event.preventDefault();
                                    this.closest('form').submit();">
                              <i class="nav-icon far fa-circle text-warning"></i>
                              {{ __('Log Out') }}
                          </x-responsive-nav-link>
                      </form>
                  </li>
              </ul>
          </nav>
          <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
  </aside>
