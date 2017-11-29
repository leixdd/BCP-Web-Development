<header>

  <div id="sticky" class="header hd-c hd-c-text .hd-c-height hidden-xs">
      <div class="container-fluid" id="standard-nav">
          <div class="row">
              <div class="col-lg-4 col-md-4 col-xs-12 col-sm-4  skewedBg">
                  <div class="logo">
                      <center>
                        <a href="<?=__BASE_URL__?>"><img src="<?=__PATH_TEMPLATE__?>img/logoMd.png" alt="" style="width: 100%;"></a>
                      </center>
                  </div>
              </div>
              <div class="col-lg-8 col-md-8 col-sm-8 ">
                  <div class="nav-menu">

                      <!-- Nav Start -->
                      <nav >
                          <ul>
                              <li><a class="ddsys" href="<?=__BASE_URL__?>">Home</a></li>
                              <li onmouseover="toggleNavArrowEx(this, false)" onclick="toggleNavArrowEx(this, true)"  id="nav-ex-admission" class="nav-ex"><a class="ddsys">Admission <span class="nav-arrow"><i class="fa fa-chevron-circle-down" aria-hidden="true" data-nav-arrow="false"></i></span></a></li>
                              <li onmouseover="toggleNavArrowEx(this, false)" onclick="toggleNavArrowEx(this, true)"  id="nav-ex-academic" class="nav-ex"><a class="ddsys">Programs <span class="nav-arrow"><i class="fa fa-chevron-circle-down" aria-hidden="true" data-nav-arrow="false"></i></span></a></li>
                              <li onmouseover="toggleNavArrowEx(this, false)" onclick="toggleNavArrowEx(this, true)"  id="nav-ex-aboutus"  class="nav-ex"><a class="ddsys">About us <span class="nav-arrow"><i class="fa fa-chevron-circle-down" aria-hidden="true" data-nav-arrow="false"></i></span></a>
                              </li>
                          </ul>
                      </nav>
                      <!-- Nav End -->


                  </div>
              </div>
          </div>
      </div>

      <div class="extend-nav">
        <div id="extend-nav-content">

        </div>
      </div>

      <div id="ex-add" hidden="true">
        <div class="extend-nav-style">
          <div class="container">
            <div class="row">

              <div class="col-lg-4 col-md-4 col-sm-4 text-center">
                <h2 class="extend-nav-head">ADMISSION</h2>
                <div class="extend-nav-body">
                    <img src="<?=__PATH_TEMPLATE__?>img/icons/admission.png" width="35%"/>
                </div>
              </div>

              <div class="col-lg-4 col-md-4 col-sm-4">
                <h2 class="extend-nav-head"><a href="<?=__BASE_URL__?>admission" class="btn btn-primary btn-sm">ADMISSION REQUIREMENTS &nbsp;&nbsp;<span class="fa fa-chevron-circle-right"></span></a></h2>
                <div class="extend-nav-body">
                  <ul>
                    <li>
                      For Transferee
                    </li>
                    <li>Transcript of Record (TOR)</li>
                    <li>Certificate of Good Moral Character</li>
                    <li>Honorable Dismissal</li>
                    <li> NSO birth certificate (Photocopy)</li>
                    <li>Picture two pieces (1x1)</li>
                  </ul>
                </div>


              </div>

              <div class="col-lg-4 col-md-4 col-sm-4">
                <h2 class="extend-nav-head"><a href="<?=__BASE_URL__?>admission" class="btn btn-primary btn-sm">ENROLLMENT PROCEDURES &nbsp;&nbsp;<span class="fa fa-chevron-circle-right"></span></a></h2>
                <div class="extend-nav-body">
                  <ul>
                    <li>
                      For Freshmen
                    </li>
                    <li>Report Card / Form 137</li>
                    <li>Certificate of Good Moral Character</li>
                    <li>Picture two pieces (1x1)</li>
                    <li> NSO birth certificate (Photocopy)</li>
                  </ul>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>

      <div id="ex-acad" hidden="true">
        <div class="extend-nav-style">
          <div class="container">
            <div class="row">

              <div class="col-lg-3 col-md-3 col-sm-3 text-center">
                <h2 class="extend-nav-head">Programs</h2>
                <div class="extend-nav-body">
                    <img src="<?=__PATH_TEMPLATE__?>img/icons/acads.png" width="50%"/>
                </div>
              </div>

              <div class="col-lg-3 col-md-3 col-sm-3">
                <h2 class="extend-nav-head"><a href="<?=__BASE_URL__?>academics" class="btn btn-primary btn-sm">College &nbsp;&nbsp;<span class="fa fa-chevron-circle-right"></span></a></h2>
                <div class="extend-nav-body">
                  <ul>
                    <li>BS in Information Technology</li>
                    <li>BS in Library and Information System</li>
                    <li>BS in Psychology</li>
                    <li>BS in Criminology</li>
                    <li>BS in Office Administration</li>
                    <li>&nbsp;</li>
                  </ul>

                </div>
              </div>

              <div class="col-lg-3 col-md-3 col-sm-3">
                <h2 class="extend-nav-head"><a href="<?=__BASE_URL__?>shs" class="btn btn-primary btn-sm">K to 12 &nbsp;&nbsp;<span class="fa fa-chevron-circle-right"></span></a></h2>
                <div class="extend-nav-body">
                  <ul>
                    <li>Accounting Business & Management</li>
                    <li>General Academic Strand</li>
                    <li>Science Technology Engineering & Mathematics</li>
                    <li>Humanities & Social Sciences</li>
                    <li>Information & Communication Technology</li>
                    <li>&nbsp;</li>
                  </ul>


                </div>
              </div>

              <div class="col-lg-3 col-md-3 col-sm-3">
                <h2 class="extend-nav-head"><a href="<?=__BASE_URL__?>collegeoflaw" class="btn btn-primary btn-sm">School of Law &nbsp;&nbsp;<span class="fa fa-chevron-circle-right"></span></a></h2>
                <div class="extend-nav-body">
                  <p>
                    The primary purpose of the Law School is to prepare men and women to meet the needs of progressive and modern technology in the various aspects in the practice of law.
                  </p>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>

      <div id="ex-about" hidden="true">
        <div class="extend-nav-style">
          <div class="container">
            <div class="row">

              <div class="col-lg-3 col-md-3 col-sm-3 text-center">
                <h2 class="extend-nav-head">About Us</h2>
                <div class="extend-nav-body">
                    <img src="<?=__PATH_TEMPLATE__?>img/icons/about.png" width="50%"/>
                </div>
              </div>

              <div class="col-lg-3 col-md-3 col-sm-3">
                <h2 class="extend-nav-head"><a href="<?=__BASE_URL__?>about/profile" class="btn btn-primary btn-sm">College Profile & History &nbsp;&nbsp;<span class="fa fa-chevron-circle-right"></span></a></h2>
                <div class="extend-nav-body">
                  <p>
                    Bestlink College of the Philippines is a non-stock, non-profit and non-sectarian institute founded in June 2002 in Quezon City. The emergence of 4-Year CHED ladderized programs changed its name from an institute with Computer TESDA-accredited courses to a college.
                  </p>
                </div>
              </div>

              <div class="col-lg-3 col-md-3 col-sm-3">
                <h2 class="extend-nav-head"><a href="<?=__BASE_URL__?>about/goalobj" class="btn btn-primary btn-sm">Goals &amp; Objective &nbsp;&nbsp;<span class="fa fa-chevron-circle-right"></span></a></h2>
                <div class="extend-nav-body">
                  <p>
                    BCP’s effort to provide an education which can be man’s tool to be liberated from all forms of ignorance and poverty. Hence, all its academic offerings are relevant tools to empower man to ably use his reason, intellect, and will to confront life’s challenges.
                  </p>
                </div>
              </div>

              <div class="col-lg-3 col-md-3 col-sm-3">
                <h2 class="extend-nav-head"><a href="<?=__BASE_URL__?>facilities" class="btn btn-primary btn-sm">Contacts &amp; Facilities &nbsp;&nbsp;<span class="fa fa-chevron-circle-right"></span></a></h2>
                <div class="extend-nav-body">
                  <ul>
                    <li>
                      Email: <a href="mailto:bcp-inquire@bcp.edu.ph?Subject=Hello%20BCP" style="color: #03A9F4;">bcp-inquire@bcp.edu.ph</a>
                    </li>
                    <li>
                      Website: <a href="<?=__BASE_URL__?>" style="color: #03A9F4;">www.bcp.edu.ph</a>
                    </li>
                    <li>
                      Phone: 417 - 4355
                    </li>
                  </ul>
                </div>
              </div>

            </div>
          </div>
        </div>
      </div>

  </div>
  <!-- Mobile start -->
  <div class="nav-mobile visible-xs">
    <div class="nav-mobile-brand">
      <span style="float: left">BCP</span>
      <i class="fa fa-bars dropdown-mobile-nav" data-target="#nav-m-body" data-toggle="collapse"></i>
    </div>
    <div id="nav-m-body" class="nav-mobile-body collapse">
      <!-- Mobile Accordion -->
      <div class="panel-group" id="nav-m-acc">


        <div class="panel panel-primary">
          <div class="panel-heading" id="nav-m-home" data-home-url="<?=__BASE_URL__?>">
            <div class="panel-title">
              Home
            </div>
          </div>
        </div>


        <div class="panel panel-primary">
          <div class="panel-heading" data-parent="nav-m-acc" data-toggle="collapse" href="#nav-acad">
            <div class="panel-title">
              Programs <i class="fa fa-chevron-circle-down nav-arrows" onclick="toggleNavArrow(this)" data-nav-arrow="false"></i>
            </div>
          </div>

          <div id="nav-acad" class="panel-collapse collapse">
            <div class="panel-body">
              <div class="list-group">
                <a href="<?=__BASE_URL__?>academics" class="list-group-item">
                  College
                </a>
                <a href="<?=__BASE_URL__?>shs" class="list-group-item">
                  Senior High
                </a>
                <a href="<?=__BASE_URL__?>collegeoflaw" class="list-group-item">
                  School of Law
                </a>
              </div>
            </div>
          </div>

        </div>

        <div class="panel panel-primary">
          <div class="panel-heading" data-parent="nav-m-acc" data-toggle="collapse" href="#nav-admi">
            <div class="panel-title">
              Admission <i class="fa fa-chevron-circle-down nav-arrows" onclick="toggleNavArrow(this)" data-nav-arrow="false"></i>
            </div>
          </div>

          <div id="nav-admi" class="panel-collapse collapse">
            <div class="panel-body">
              <div class="list-group">
                <a href="<?=__BASE_URL__?>admission" class="list-group-item">Admission Requirements</a>
                <a href="<?=__BASE_URL__?>ep" class="list-group-item">Enrollment Procedures</a>
              </div>
            </div>
          </div>

        </div>

        <div class="panel panel-primary">
          <div class="panel-heading" data-parent="nav-m-acc" data-toggle="collapse" href="#nav-about">
            <div class="panel-title">
              About us <i class="fa fa-chevron-circle-down nav-arrows" onclick="toggleNavArrow(this)" data-nav-arrow="false"></i>
            </div>
          </div>

          <div id="nav-about" class="panel-collapse collapse">
            <div class="panel-body">
              <div class="list-group">
                <a href="<?=__BASE_URL__?>about/profile/" class="list-group-item">College Profile</a>
                <a href="<?=__BASE_URL__?>about/history/" class="list-group-item">College History</a>
                <a href="<?=__BASE_URL__?>about/goalobj/" class="list-group-item">Goals &amp; Objective</a>
                <a href="<?=__BASE_URL__?>facilities" class="list-group-item">Facilities</a>
              </div>
            </div>
          </div>

        </div>


      </div>
      <!-- End Mobile Accordion  -->
    </div>
  </div>
  <!-- Mobile End -->
</header>
