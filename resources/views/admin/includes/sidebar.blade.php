<div class="nav-left-sidebar sidebar-dark">
  <div class="menu-list">
      <nav class="navbar navbar-expand-lg navbar-light">
          <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav flex-column">
                  <li class="nav-divider">
                      Menu
                  </li>
                  <li class="nav-item ">
                      <a class="nav-link" href="{{route('admin.dashboard')}}">
                        <i class="fa fa-fw fa-user-circle"></i>Dashboard
                        <span class="badge badge-success">6</span>
                      </a>
                  </li>

                  <li class="nav-divider">
                      Quản lý tin tức
                  </li>

                  <li class="nav-item ">
                    <a class="nav-link" href="{{route('admin.news')}}">
                      <i class="fab fa-fw fa-wpforms"></i>Bài đăng
                      <span class="badge badge-success">6</span>
                    </a>
                  </li>

                  <li class="nav-item ">
                    <a class="nav-link" href="{{ route('admin.category') }}">
                      <i class="fab fa-fw fa-wpforms"></i>Danh mục
                      <span class="badge badge-success">6</span>
                    </a>
                  </li>

                  <li class="nav-item ">
                    <a class    ="nav-link" href="{{ route('get.list.rank') }}">
                      <i class="fab fa-fw fa-wpforms"></i>Giải đấu
                      <span class="badge badge-success">6</span>
                    </a>
                  </li>
                  <li class="nav-item ">
                    <a class    ="nav-link" href="{{ route('get.list.rank') }}">
                      <i class="fab fa-fw fa-wpforms"></i>Bảng xếp hạng
                      <span class="badge badge-success">6</span>
                    </a>
                  </li>
                  <li class="nav-item ">
                    <a class="nav-link" href="{{ route('admin.news') }}">
                      <i class="fab fa-fw fa-wpforms"></i>Lịch thi đấu
                      <span class="badge badge-success">6</span>
                    </a>
                  </li>

                  <li class="nav-divider">
                    Quản lý user
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="{{ route('get.list.admin') }}">
                      <i class="fab fa-fw fa-wpforms"></i>Quản trị viên
                      <span class="badge badge-success">6</span>
                    </a>
                  </li>

                  <li class="nav-item ">
                    <a class="nav-link" href="{{ route('get.list.user') }}">
                      <i class="fab fa-fw fa-wpforms"></i>Thành viên
                      <span class="badge badge-success">6</span>
                    </a>
                  </li>


                  <li class="nav-divider">
                    Cài đặt chung
                </li>

                <li class="nav-item ">
                  <a class="nav-link" href="{{route('admin.news')}}">
                    <i class="fab fa-fw fa-wpforms"></i>Setting
                    <span class="badge badge-success">6</span>
                  </a>
                </li>

                <li class="nav-item ">
                  <a class="nav-link" href="{{route('admin.news')}}">
                    <i class="fab fa-fw fa-wpforms"></i>Phân quyền
                    <span class="badge badge-success">6</span>
                  </a>
                </li>

                <li class="nav-item ">
                  <a class="nav-link" href="{{route('admin.news')}}">
                    <i class="fab fa-fw fa-wpforms"></i>Chính sách khách hàng
                    <span class="badge badge-success">6</span>
                  </a>
                </li>

                <li class="nav-item ">
                    <a class="nav-link" href="{{route('admin.news')}}">
                      <i class="fab fa-fw fa-wpforms"></i>Quảng cáo
                      <span class="badge badge-success">6</span>
                    </a>
                  </li>

              </ul>
          </div>
      </nav>
  </div>
</div>
