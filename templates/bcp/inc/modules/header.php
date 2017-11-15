<header>

  <style>

    .nav-mobile{
      background-color: #162c9a;
      color: white !important;
    }

    .nav-mobile-brand{
      font-size: 24pt;
      font-family: 'Raleway-reg';
      padding: 15px 15px 40px 15px;
    }

    .dropdown-mobile-nav{
      float: right;
    }

    .nav-mobile-body{
      background-color: white !important;
      color: black !important;
    }

    .nav-mobile-acc-title{
      font-size: 18pt;
    }

    #nav-m-acc{
      padding: 10px 5px 0px 5px !important;
    }

    #nav-m-acc .panel, #nav-m-acc .panel-heading{
      border-radius: 0px;
      border-color: #162c9a;
    }

    #nav-m-acc .panel-heading{
      background-color: #162c9a;
    }

    #nav-m-acc .panel-body .list-group .list-group-item:hover{
      background-color: #162c9a;
      color: white !important;
    }

    .nav-arrows{
      float: right;
      font-size: 18pt;
    }

    .extend-nav{
      position: absolute;
      background-color: rgba(0,0,0, 0.8);
      background-image: url("../img/banner/pattern.png");
      background-repeat: repeat;
      width: 100%;
      border-bottom: 1px solid #03A9F4;
    }

    .extend-nav-style{
      padding: 10px;
    }

    .extend-nav-head{
      color: white;
      font-family: 'Raleway-thin';
      padding-bottom: 3%;
      font-size: 15pt;
    }

    .extend-nav-body{
      color: white;
      font-family: 'Raleway-reg'
    }

  </style>

  <div id="sticky" class="header hd-c hd-c-text .hd-c-height hidden-xs">
      <div class="container-fluid">
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
                              <li><a onclick="toggleNavArrowEx(this)" id="nav-ex-admission" class="ddsys nav-ex">Admission <span class="nav-arrow"><i class="fa fa-chevron-circle-down" aria-hidden="true" data-nav-arrow="false"></i></span></a>
                                  <!-- <ul>
                                      <li><a href="<?=__BASE_URL__?>admission">Admission Requirements</a></li>
                                      <li><a href="<?=__BASE_URL__?>ep">Enrollment Procedures</a></li>

                                  </ul> -->
                              </li>
                              <li><a onclick="toggleNavArrowEx(this)" id="nav-ex-academic" class="ddsys nav-ex">Academic <span class="nav-arrow"><i class="fa fa-chevron-circle-down" aria-hidden="true" data-nav-arrow="false"></i></span></a>
                                  <!-- <ul>

                                      <li><a href="<?=__BASE_URL__?>academics">College</a></li>
                                      <li><a href="<?=__BASE_URL__?>shs">Senior High</a></li>
                                      <li><a href="<?=__BASE_URL__?>collegeoflaw">School of Law</a></li>

                                  </ul> -->
                              </li>
                              <li><a onclick="toggleNavArrowEx(this)" id="nav-ex-aboutus" class="ddsys nav-ex">About us <span class="nav-arrow"><i class="fa fa-chevron-circle-down" aria-hidden="true" data-nav-arrow="false"></i></span></a>
                                  <!-- <ul>
                                      <li> <a href="<?=__BASE_URL__?>about/profile/">College Profile</a></li>
                                      <li> <a href="<?=__BASE_URL__?>about/history/">College History</a></li>
                                      <li> <a href="<?=__BASE_URL__?>about/goalobj/">Goals &amp; Objective</a></li>
                                      <li> <a href="<?=__BASE_URL__?>facilities">Facilities</a></li>
                                  </ul> -->
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
                <h2 class="extend-nav-head">TRANSFEREES</h2>
                <div class="extend-nav-body">
                  <ol>
                    <li>Transcript of Record (TOR)</li>
                    <li>Certificate of Good Moral Character</li>
                    <li>Honorable Dismissal</li>
                    <li> NSO birth certificate (Photocopy)</li>
                    <li>Picture two pieces (1x1)</li>
                  </ol>
                </div>
              </div>

              <div class="col-lg-4 col-md-4 col-sm-4">
                <h2 class="extend-nav-head">FRESHMEN</h2>
                <div class="extend-nav-body">
                  <ol>
                    <li>Report Card / Form 137</li>
                    <li>Certificate of Good Moral Character</li>
                    <li>Picture two pieces (1x1)</li>
                    <li> NSO birth certificate (Photocopy)</li>
                  </ol>
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

              <div class="col-lg-4 col-md-4 col-sm-4 text-center">
                <h2 class="extend-nav-head">ADMISSION</h2>
                <div class="extend-nav-body">
                    <img src="<?=__PATH_TEMPLATE__?>img/icons/admission.png" width="35%"/>
                </div>
              </div>

              <div class="col-lg-4 col-md-4 col-sm-4">
                <h2 class="extend-nav-head">TRANSFEREES</h2>
                <div class="extend-nav-body">
                  <ol>
                    <li>Transcript of Record (TOR)</li>
                    <li>Certificate of Good Moral Character</li>
                    <li>Honorable Dismissal</li>
                    <li> NSO birth certificate (Photocopy)</li>
                    <li>Picture two pieces (1x1)</li>
                  </ol>
                </div>
              </div>

              <div class="col-lg-4 col-md-4 col-sm-4">
                <h2 class="extend-nav-head">FRESHMEN</h2>
                <div class="extend-nav-body">
                  <ol>
                    <li>Report Card / Form 137</li>
                    <li>Certificate of Good Moral Character</li>
                    <li>Picture two pieces (1x1)</li>
                    <li> NSO birth certificate (Photocopy)</li>
                  </ol>
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
              Academic <i class="fa fa-chevron-circle-down nav-arrows" onclick="toggleNavArrow(this)" data-nav-arrow="false"></i>
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
