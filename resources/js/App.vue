<template>
  <!-- Layout wrapper -->
  <div class="layout-wrapper layout-content-navbar" :class="{'layout-menu-expanded': isMobileMenuOpen}">
    <div class="layout-container">

      <!-- Menu -->
      <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme" v-if="authStore.isLogin">
        <div class="app-brand demo ">
          <a href="index.html" class="app-brand-link">
            <span class="app-brand-logo demo">
              <!-- SVG icon ໂລໂກ້ຂອງແອັບ -->
              <span class="text-primary">
                <svg width="25" viewBox="0 0 25 42" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                  <defs>
                    <path d="M13.7918663,0.358365126 L3.39788168,7.44174259 C0.566865006,9.69408886 -0.379795268,12.4788597 0.557900856,15.7960551 C0.68998853,16.2305145 1.09562888,17.7872135 3.12357076,19.2293357 C3.81463347,19.7207168 4.61631441,20.2088805 5.42240562,20.6653147 C8.43378546,22.3872235 11.0091207,24.0321799 12.4138722,25.6669935 C14.0016624,27.3294191 16.0353645,29.3871864 18.062363,31.5034876 L20.2110098,33.407955 L22.427774,35.3149795 L23.5119438,36.7562334 L23.5119438,36.7562334 L24.5161477,37.9620709 C24.8396264,38.3516087 25,38.9387199 25,39.5398234 L25,39.5398234 C25,40.1409269 24.8396264,40.7280381 24.5161477,41.1175759 L24.5161477,41.1175759 C24.1687567,41.5206857 23.5042466,41.9723225 22.9531061,42 C22.080585,42 21.3656916,41.7420442 20.787612,41.2055694 C19.9051397,40.4182939 18.4975001,38.9507973 16.7364065,37.3322976 L13.7918663,34.4230232 L13.7918663,34.4230232 L13.7918663,0.358365126 Z" id="path-1"></path>
                    <path d="M5.47320593,6.00457225 C4.05321814,8.21614461 2.46585135,10.3959311 1.67040255,11.4378853 L0.7698614,12.5539479 L0.557900856,15.7960551 C0.68998853,16.2305145 1.09562888,17.7872135 3.12357076,19.2293357 C3.81463347,19.7207168 4.61631441,20.2088805 5.42240562,20.6653147 C8.43378546,22.3872235 11.0091207,24.0321799 12.4138722,25.6669935 C14.0016624,27.3294191 16.0353645,29.3871864 18.062363,31.5034876 L20.2110098,33.407955 L23.5119438,36.7562334 L23.5119438,36.7562334 L24.5161477,37.9620709 C24.8396264,38.3516087 25,38.9387199 25,39.5398234 L25,39.5398234 C25,40.1409269 24.8396264,40.7280381 24.5161477,41.1175759 L24.5161477,41.1175759 C24.1687567,41.5206857 23.5042466,41.9723225 22.9531061,42 C22.080585,42 21.3656916,41.7420442 20.787612,41.2055694 C19.9051397,40.4182939 18.4975001,38.9507973 16.7364065,37.3322976 L13.7918663,34.4230232 L13.7918663,34.4230232 L13.7918663,0.358365126 Z" id="path-2"></path>
                    <path d="M0.368710326,1.54402633 L5.00072236,1.44217336 C5.1481498,1.41733932 5.28926447,1.51737119 5.31306352,1.6648316 L5.34003006,1.82103445 L4.2968694,10.0891559 C4.13780431,10.2978936 3.86450507,10.3705353 3.65576735,10.2114702 L3.53580431,10.1135401 L1.4816144,3.26802777 C1.3556272,2.71714882 1.29461153,2.15243292 1.30058226,1.58359006 L1.30058226,1.58359006 L0.368710326,1.54402633 Z" id="path-3"></path>
                    <path d="M0.384593,17.2461966 L0.531121,16.5362534 C0.8501178,14.6190747 1.30932844,12.8718617 1.76941372,11.1963727 L8.34967395,0.397665946 C8.64434272,-0.0384589046 9.22081549,-0.145667934 9.66020043,0.147819542 L10.0638758,0.39530263 C10.4842796,0.650631672 10.5898305,1.24686094 10.3344915,1.6672646 C9.46252996,3.01633509 8.60197771,4.37525232 7.84883442,5.74837766 C7.13500854,7.09407336 6.5859345,8.51357662 6.0967812,10.0064568 C5.8407851,10.7423035 5.44147318,11.5238216 5.06008674,12.327666 C4.74567664,13.0640659 4.49880017,13.8016983 4.29524045,14.5468652 L4.29524045,14.5468652 L0.384593,17.2461966 Z" id="path-4"></path>
                    <path d="M6.07669888,4.72989143 C6.15446051,4.65349557 6.24294862,4.58284635 6.3396651,4.52449337 L10.7441816,1.17862124 C11.216345,0.816027177 11.8386976,0.927021338 12.1819406,1.3787182 L12.4882512,1.75017244 C12.825226,2.18050253 12.7539258,2.77821175 12.3235957,3.11518654 L7.12543161,7.16110195 C6.79124414,7.43093445 6.42676059,7.70076695 6.07669888,7.95604696 L6.07669888,4.72989143 Z" id="path-5"></path>
                  </defs>
                  <g id="g-app-brand" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <g id="Path-1" class="text-primary" fill="currentColor">
                      <use xlink:href="#path-1"></use>
                    </g>
                    <g id="Path-2" class="text-primary" fill="currentColor">
                      <use xlink:href="#path-2"></use>
                    </g>
                    <g id="Path-3" class="text-primary" fill="currentColor">
                      <use xlink:href="#path-3"></use>
                    </g>
                    <g id="Path-4" class="text-primary" fill="currentColor">
                      <use xlink:href="#path-4"></use>
                    </g>
                    <g id="Path-5" class="text-primary" fill="currentColor">
                      <use xlink:href="#path-5"></use>
                    </g>
                  </g>
                </svg>
              </span>
            </span>
            <span class="app-brand-text demo menu-text fw-bold">Sneat</span>
          </a>

          <!-- ປຸ່ມ toggle ສໍາລັບເມນູໃນໂໝດມືຖື -->
          <a href="javascript:void(0);" class="layout-menu-toggle menu-toggle d-xl-none ms-auto" @click="toggleMobileMenu">
            <i class="ti ti-x ti-sm align-middle"></i>
          </a>
        </div>

        <div class="menu-inner-shadow"></div> 
        <!-- ລາຍການເມນູຫຼັກທີ່ຖືກສ້າງຂຶ້ນແບບ dynamic -->
        <ul class="menu-inner py-1">
          <li v-for="menuItem in menuItems" :key="menuItem.name" class="menu-item"
              :class="{'active': menuItem.active, 'open': menuItem.isOpen}">
            
            <!-- ລາຍການເມນູທີ່ມີ sub-menu -->
            <a v-if="menuItem.children && menuItem.children.length > 0" href="javascript:void(0);" class="menu-link menu-toggle" @click="toggleSubMenu(menuItem)">
              <i class="menu-icon tf-icons" :class="menuItem.icon"></i>
              <div data-i18n="menu-name">{{ menuItem.name }}</div>
            </a>

            <!-- ລາຍການເມນູທີ່ບໍ່ມີ sub-menu -->
            <router-link v-else :to="menuItem.path" class="menu-link">
              <i class="menu-icon tf-icons" :class="menuItem.icon"></i>
              <div data-i18n="menu-name">{{ menuItem.name }} </div>
            </router-link>

            <!-- Submenu ທີ່ຖືກສ້າງຂຶ້ນແບບ dynamic -->
            <ul v-if="menuItem.children && menuItem.children.length > 0" class="menu-sub">
              <li v-for="subItem in menuItem.children" :key="subItem.name" class="menu-item" :class="{'active': subItem.active}">
                <router-link :to="subItem.path" class="menu-link">
                  <div data-i18n="sub-menu-name">{{ subItem.name }}</div>
                </router-link>
              </li>
            </ul>
          </li>
        </ul>
      </aside>
      <!-- / Menu -->

      <!-- Layout page -->
      <div class="layout-page">
        <!-- Navbar -->
        <nav v-if="authStore.isLogin" class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
          <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
            <!-- ປຸ່ມ toggle ສໍາລັບເມນູໃນ navbar (ມືຖື) -->
            <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)" @click="toggleMobileMenu">
              <i class="ti ti-menu-2 ti-sm"></i>
            </a>
          </div>
          <!-- ໂຄງສ້າງ navbar ອື່ນໆຍັງຄືເກົ່າ -->
          <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
            <ul class="navbar-nav flex-row align-items-center ms-auto">
              <!-- Search -->
              <li class="nav-item navbar-search-wrapper me-2 me-xl-0">
                <a class="nav-link search-toggler" href="javascript:void(0);">
                  <i class="ti ti-search ti-md"></i>
                </a>
              </li>
              <!-- /Search -->
              <!-- Style Switcher -->
              <li class="nav-item dropdown-style-switcher dropdown me-2 me-xl-0">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                  <i class="ti ti-md"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-styles">
                  <li>
                    <a class="dropdown-item" href="javascript:void(0);" data-theme="light">
                      <span class="align-middle"><i class="ti ti-sun me-2"></i>Light</span>
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="javascript:void(0);" data-theme="dark">
                      <span class="align-middle"><i class="ti ti-moon me-2"></i>Dark</span>
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="javascript:void(0);" data-theme="system">
                      <span class="align-middle"><i class="ti ti-device-desktop me-2"></i>System</span>
                    </a>
                  </li>
                </ul>
              </li>
              <!-- / Style Switcher-->
              <!-- Notification -->
              <li class="nav-item dropdown-notifications dropdown">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                  <i class="ti ti-bell ti-md"></i>
                  <span class="badge bg-danger rounded-pill badge-notifications">5</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end py-0">
                  <li class="dropdown-menu-header border-bottom">
                    <div class="dropdown-header d-flex align-items-center py-3">
                      <h5 class="text-body mb-0 me-auto">Notification</h5>
                      <a href="javascript:void(0)" class="dropdown-notifications-all text-body" data-bs-toggle="tooltip" data-bs-placement="top" title="Mark all as read"><i class="ti ti-mail-opened fs-4"></i></a>
                    </div>
                  </li>
                  <li class="dropdown-notifications-list scrollable-container">
                    <ul class="list-group list-group-flush">
                      <li class="list-group-item list-group-item-action dropdown-notifications-item">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar avatar-online">
                              <img src="../../assets/img/avatars/1.png" alt="" class="h-auto rounded-circle">
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <h6 class="mb-1">Congratulation Lettie 🎉</h6>
                            <p class="mb-0">Won the monthly best seller badge</p>
                            <small class="text-muted">1h ago</small>
                          </div>
                          <div class="flex-shrink-0 dropdown-notifications-actions">
                            <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>
                            <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="ti ti-x"></span></a>
                          </div>
                        </div>
                      </li>
                      <li class="list-group-item list-group-item-action dropdown-notifications-item">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar">
                              <span class="avatar-initial rounded-circle bg-label-danger">CF</span>
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <h6 class="mb-1">Charles Franklin</h6>
                            <p class="mb-0">Accepted your connection request</p>
                            <small class="text-muted">12hr ago</small>
                          </div>
                          <div class="flex-shrink-0 dropdown-notifications-actions">
                            <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>
                            <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="ti ti-x"></span></a>
                          </div>
                        </div>
                      </li>
                      <li class="list-group-item list-group-item-action dropdown-notifications-item marked-as-read">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar">
                              <img src="../../assets/img/avatars/2.png" alt="" class="h-auto rounded-circle">
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <h6 class="mb-1">New message from Jane</h6>
                            <p class="mb-0">Your order is placed</p>
                            <small class="text-muted">5 days ago</small>
                          </div>
                          <div class="flex-shrink-0 dropdown-notifications-actions">
                            <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>
                            <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="ti ti-x"></span></a>
                          </div>
                        </div>
                      </li>
                      <li class="list-group-item list-group-item-action dropdown-notifications-item">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar">
                              <span class="avatar-initial rounded-circle bg-label-warning"><i class="ti ti-shopping-cart"></i></span>
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <h6 class="mb-1">Whoo! You have new order 🛒 </h6>
                            <p class="mb-0">ACME Inc. made new order $1,154</p>
                            <small class="text-muted">1 week ago</small>
                          </div>
                          <div class="flex-shrink-0 dropdown-notifications-actions">
                            <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>
                            <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="ti ti-x"></span></a>
                          </div>
                        </div>
                      </li>
                      <li class="list-group-item list-group-item-action dropdown-notifications-item">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar">
                              <img src="../../assets/img/avatars/9.png" alt="" class="h-auto rounded-circle">
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <h6 class="mb-1">Sanner</h6>
                            <p class="mb-0">Last week sales report generated</p>
                            <small class="text-muted">2 days ago</small>
                          </div>
                          <div class="flex-shrink-0 dropdown-notifications-actions">
                            <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>
                            <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="ti ti-x"></span></a>
                          </div>
                        </div>
                      </li>
                      <li class="list-group-item list-group-item-action dropdown-notifications-item">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar">
                              <span class="avatar-initial rounded-circle bg-label-info">KP</span>
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <h6 class="mb-1">New message from Andrew</h6>
                            <p class="mb-0">Higher education in Canada</p>
                            <small class="text-muted">1 week ago</small>
                          </div>
                          <div class="flex-shrink-0 dropdown-notifications-actions">
                            <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>
                            <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="ti ti-x"></span></a>
                          </div>
                        </div>
                      </li>
                      <li class="list-group-item list-group-item-action dropdown-notifications-item">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar">
                              <img src="../../assets/img/avatars/5.png" alt="" class="h-auto rounded-circle">
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <h6 class="mb-1">Send connection request</h6>
                            <p class="mb-0">Peter sent you connection request</p>
                            <small class="text-muted">4 days ago</small>
                          </div>
                          <div class="flex-shrink-0 dropdown-notifications-actions">
                            <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>
                            <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="ti ti-x"></span></a>
                          </div>
                        </div>
                      </li>
                      <li class="list-group-item list-group-item-action dropdown-notifications-item">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar">
                              <img src="../../assets/img/avatars/6.png" alt="" class="h-auto rounded-circle">
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <h6 class="mb-1">New message from Jane</h6>
                            <p class="mb-0">Your order is placed</p>
                            <small class="text-muted">5 days ago</small>
                          </div>
                          <div class="flex-shrink-0 dropdown-notifications-actions">
                            <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>
                            <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="ti ti-x"></span></a>
                          </div>
                        </div>
                      </li>
                      <li class="list-group-item list-group-item-action dropdown-notifications-item">
                        <div class="d-flex">
                          <div class="flex-shrink-0 me-3">
                            <div class="avatar">
                              <span class="avatar-initial rounded-circle bg-label-success"><i class="ti ti-cart"></i></span>
                            </div>
                          </div>
                          <div class="flex-grow-1">
                            <h6 class="mb-1">Order complete</h6>
                            <p class="mb-0">Refunded $X.XX to S. Smith</p>
                            <small class="text-muted">1 day ago</small>
                          </div>
                          <div class="flex-shrink-0 dropdown-notifications-actions">
                            <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>
                            <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="ti ti-x"></span></a>
                          </div>
                        </div>
                      </li>
                    </ul>
                  </li>
                  <li class="dropdown-menu-footer border-top">
                    <a href="javascript:void(0);" class="dropdown-item d-flex justify-content-center text-primary p-2 h-px-40 mb-1 align-items-center">
                      View all notifications
                    </a>
                  </li>
                </ul>
              </li>
              <!-- / Notification -->
              <!-- User -->
              <li class="nav-item navbar-dropdown dropdown-user dropdown">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                  <div class="avatar avatar-online">
                    <img src="../../assets/img/avatars/1.png" alt="" class="h-auto rounded-circle">
                  </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                  <li>
                    <a class="dropdown-item" href="pages-account-settings-account.html">
                      <div class="d-flex">
                        <div class="flex-shrink-0 me-3">
                          <div class="avatar avatar-online">
                            <img src="../../assets/img/avatars/1.png" alt="" class="h-auto rounded-circle">
                          </div>
                        </div>
                        <div class="flex-grow-1">
                          <span class="fw-medium d-block">John Doe</span>
                          <small class="text-muted">Admin</small>
                        </div>
                      </div>
                    </a>
                  </li>
                  <li>
                    <div class="dropdown-divider"></div>
                  </li>
                  <li>
                    <a class="dropdown-item" href="pages-profile-user.html">
                      <i class="ti ti-user-check me-2 ti-sm"></i>
                      <span class="align-middle">My Profile</span>
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="pages-account-settings-account.html">
                      <i class="ti ti-settings me-2 ti-sm"></i>
                      <span class="align-middle">Settings</span>
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="pages-account-settings-billing.html">
                      <span class="d-flex align-items-center align-middle">
                        <i class="ti ti-credit-card me-2 ti-sm"></i>
                        <span class="align-middle">Billing</span>
                        <span class="flex-shrink-0 badge badge-center rounded-pill bg-label-danger w-px-20 h-px-20">2</span>
                      </span>
                    </a>
                  </li>
                  <li>
                    <div class="dropdown-divider"></div>
                  </li>
                  <li>
                    <a class="dropdown-item" href="pages-help-center-landing.html">
                      <i class="ti ti-lifebuoy me-2 ti-sm"></i>
                      <span class="align-middle">Help</span>
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="pages-faq.html">
                      <i class="ti ti-help me-2 ti-sm"></i>
                      <span class="align-middle">FAQ</span>
                    </a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="pages-api-key.html">
                      <i class="ti ti-key me-2 ti-sm"></i>
                      <span class="align-middle">API Key</span>
                    </a>
                  </li>
                  <li>
                    <div class="dropdown-divider"></div>
                  </li>
                  <li>
                    <a class="dropdown-item" href="javascript:void(0);" @click="logout()">
                      <i class="ti ti-logout me-2 ti-sm"></i>
                      <span class="align-middle">Log Out</span>
                    </a>
                  </li>
                </ul>
              </li>
              <!-- /User -->
            </ul>
          </div>
          <!-- Search Small Screens -->
          <div class="navbar-search-wrapper search-input-wrapper d-none">
            <input type="text" class="form-control search-input container-xxl border-0" placeholder="Search..." aria-label="Search...">
            <i class="ti ti-x ti-sm search-toggler cursor-pointer"></i>
          </div>
        </nav>
        <!-- / Navbar -->
        <!-- Content wrapper -->
        <div class="content-wrapper">
          <!-- Content -->
          <div class="container-xxl flex-grow-1 container-p-y">
            <!-- {{  $route.path  }} -->
            <!-- Your dashboard content here -->
            <router-view></router-view>
            <!-- ... The rest of your content -->
          </div>
          <!-- / Content -->
          <!-- Footer -->
          <footer v-if="authStore.isLogin" class="content-footer footer bg-footer-theme"> 
            <div class="container-xxl">
              <div class="footer-container d-flex align-items-center justify-content-between py-4 flex-md-row flex-column">
                <div class="mb-2 mb-md-0">
                  ©
            
                  , made with ❤️ by <a href="https://themeselection.com" target="_blank" class="footer-link">ThemeSelection</a>
                </div>
                <div class="d-none d-lg-inline-block">
                  <a href="https://themeselection.com/license/" class="footer-link me-4" target="_blank">License</a>
                  <a href="https://themeselection.com/" target="_blank" class="footer-link me-4">More Themes</a>
                  <a href="https://demos.themeselection.com/sneat-bootstrap-html-admin-template/documentation/" target="_blank" class="footer-link me-6">Documentation</a>
                  <a href="https://themeselection.com/support/" target="_blank" class="footer-link d-none d-sm-inline-block">Support</a>
                </div>
              </div>
            </div>
          </footer>
          <!-- / Footer -->
          <div class="content-backdrop fade"></div>
        </div>
        <!-- Content wrapper -->
      </div>
      <!-- / Layout page -->
    </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>

    <!-- Drag Target Area To SlideIn Menu On Small Screens -->
    <div class="drag-target"></div>

  </div>
  <!-- / Layout wrapper -->
</template>
<script>
import 'boxicons/css/boxicons.min.css';
import { useAuthStore } from '@/Store/auth';
import axios from 'axios';

export default {   
  setup() {
    const authStore = useAuthStore();
    return { authStore };
  },
  name: 'App',
  data() {
    return {
      isMobileMenuOpen: false,
      menuItems: [
        {
          name: 'ສິນຄ້າ',
          icon: 'bx bx-list-ul', // Changed to Boxicons class
          path: '/product',
          active: false,
          isOpen: false,
          children: null,
        },
        { 
          name: 'ໝວດໝູ່',
          icon: 'bx bx-book-content', // Changed to Boxicons class
          path: '/category',
          active: false,
          isOpen: false,
          children: null,
        },
        { 
          name: 'ຂາຍ POS',
          icon: 'bx bx-cart', // Changed to Boxicons class
          path: '/pos',
          active: false,
          isOpen: false,
          children: null,
        },
        {  
          name: 'ການເຄື່ອນໄຫວ',
          icon: 'bx bx-bar-chart-square', // Changed to Boxicons class
          path: '/transection',
          active: false,
          isOpen: false,
          children: null,
        },
        { 
          name: 'ລາຍງານ',
          icon: 'bx bxs-report', // Changed to Boxicons class
          path: '/report',
          active: false,
          isOpen: false,
          children: null,
        },
        {
          name: 'ໜ້າຢືນຢັນຕົວຕົນ',
          icon: 'bx bx-lock-alt', // Changed to Boxicons class
          path: '#',
          active: false,
          isOpen: false,
          children: [
            { name: 'ເຂົ້າສູ່ລະບົບ', path: '#', active: false },
            { name: 'ລົງທະບຽນ', path: '#', active: false },
            { name: 'ຢືນຢັນອີເມວ', path: '#', active: false },
          ],
        },
      ],
    };
  },
  methods: {

    logout(){

      axios.get('/api/logout',{
        headers:{
          Authorization: `Bearer ${this.authStore.token}`
        }
      }).then(response => {
        if(response.data.success){
          // clear auth store
          this.authStore.Logout();
          this.$router.push('/login');
        }
      }).catch(error => {
        console.error(error);
      });
    },
    // ຟັງຊັນສໍາລັບການເປີດ/ປິດ sub-menu
    toggleSubMenu(menuItem) {
      menuItem.isOpen = !menuItem.isOpen;
    },
    // ຟັງຊັນສໍາລັບການເປີດ/ປິດເມນູໃນໂໝດມືຖື
    toggleMobileMenu() {
      this.isMobileMenuOpen = !this.isMobileMenuOpen;
    },
    // ຟັງຊັນເພື່ອກວດສອບຂະໜາດໜ້າຈໍ ແລະປິດເມນູມືຖືອັດຕະໂນມັດ
    checkScreenSize() {
      if (window.innerWidth > 1200) { // breakpoint ຂອງ laptop
        this.isMobileMenuOpen = false;Z
      }
    },
  },
  mounted() {
    // ເພີ່ມ event listener ເພື່ອກວດສອບຂະໜາດໜ້າຈໍເມື່ອມີການປ່ຽນແປງ
    window.addEventListener('resize', this.checkScreenSize);
  },
  beforeUnmount() {
    // ເອົາ event listener ອອກເມື່ອ component ຖືກທໍາລາຍ
    window.removeEventListener('resize', this.checkScreenSize);
  },
  watch: {
    // ກວດສອບຂະໜາດໜ້າຈໍໃນຂະບວນການໂຫລດ component
    '$route'() {
      // ກວດຊອບເມນູ active ສະແດງສະຖານະໃນເມນູ
        this.menuItems.forEach(item => {
          item.active = item.path === this.$route.path;
            if (item.children) {
                item.children.forEach(subItem => {
                subItem.active = subItem.path === this.$route.path;
                });
            }
        });
    },
  },
};
</script>
<style  scoped >
/* Your existing styles */

body:not(.modal-open) .layout-content-navbar .layout-navbar {
  z-index: 1000;
 }
</style>
