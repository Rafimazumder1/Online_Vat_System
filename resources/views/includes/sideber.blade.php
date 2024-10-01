<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <a class="nav-link" href="{{ route('/') }}">
                    Home
                </a>
                <!-- Setup Menu -->
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseSetup"
                    aria-expanded="false" aria-controls="collapseSetup">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Setup
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseSetup" aria-labelledby="headingOne"
                    data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ route('com.index') }}">Company Information</a>
                        <a class="nav-link" href="{{ route('uom.index') }}">UOM Information</a>
                        <a class="nav-link" href="{{ route('c&s.index') }}">Clint & Supplier</a>
                        <a class="nav-link" href="layout-sidenav-light.html">Light Sidenav</a>
                    </nav>
                </div>

                <!-- Reports Menu -->
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseReports"
                    aria-expanded="false" aria-controls="collapseReports">
                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                    Reports
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseReports" aria-labelledby="headingOne"
                    data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{ route('com.index') }}">Company Information</a>
                        <a class="nav-link" href="{{ route('c&s.index') }}">Supplier & Client</a>
                    </nav>
                </div>


                  <!-- System Configuration Menu -->
                  <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseSystemConfiguration"
                  aria-expanded="false" aria-controls="collapseSetup">
                  <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                  System Configuration
                  <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
              </a>
              <div class="collapse" id="collapseSystemConfiguration" aria-labelledby="headingOne"
                  data-bs-parent="#sidenavAccordion">
                  <nav class="sb-sidenav-menu-nested nav">
                      <a class="nav-link" href="{{ route('employe.index') }}">Employee Information</a>
                      <a class="nav-link" href="{{ route('create.user.form') }}">User Information</a>
                      <a class="nav-link" href="{{ route('create.role.form') }}">Desgination</a>

                  </nav>
              </div>




                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages"
                    aria-expanded="false" aria-controls="collapsePages">
                    <div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                    Pages
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapsePages" aria-labelledby="headingTwo"
                    data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                            data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                            Authentication
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>










                        <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordionPages">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="login.html">Login</a>
                                <a class="nav-link" href="register.html">Register</a>
                                <a class="nav-link" href="password.html">Forgot Password</a>
                            </nav>
                        </div>
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
                            data-bs-target="#pagesCollapseError" aria-expanded="false"
                            aria-controls="pagesCollapseError">
                            Error
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordionPages">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="401.html">401 Page</a>
                                <a class="nav-link" href="404.html">404 Page</a>
                                <a class="nav-link" href="500.html">500 Page</a>
                            </nav>
                        </div>
                    </nav>
                </div>



















                <div class="sb-sidenav-menu-heading">Addons</div>
                <a class="nav-link" href="tables.html">
                    <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                    Tables
                </a>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Powered by:</div>
           <p class="fst-italic"> IT Bangla Ltd.</p>
        </div>
    </nav>
</div>
