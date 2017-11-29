<?php

$fb_page_id = "1366581603457271";
$profile_photo_src = "https://graph.facebook.com/1366581603457271/picture?type=square";
$access_token = "1025114747629167|53d6853e8abdf9de7ff509b94eb17a2d";
$fields = "id,message,picture,link,name,description,type,icon,created_time,from,object_id";
$limit = 5;

$json_link = "https://graph.facebook.com/1366581603457271/posts?access_token={$access_token}&fields={$fields}&limit={$limit}";
$json = file_get_contents($json_link);

$obj = json_decode($json, true);
$feed_item_count = count($obj['data']);


// to get 'time ago' text
function time_elapsed_string($datetime, $full = false) {

    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}


?>

<section id="topHome">
    <div class="topBanner" style="">
        <div class="topBanner-overlay">
            <div class="grad-t-w"></div>

        </div>
    </div>
</section>

<section id="welcomebcp">
  <div class="course wBCP" >
    <div class="container text-center">
      <div class="row">
        <div class="title" style="padding-bottom: 2px;">
            <h1 style="font-family: Raleway-thin; font-size: 36pt;">WELCOME TO <b style="font-family: Raleway-smb; color: #162c9a">BCP</b></h1>

        </div>
        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12" style="margin-bottom: 3%;">
          <section class="widget widget_text">
              <center>
                <div class="textwidget text">
                    <p class="sub-title-text text-center" style="width: 65%;">At <b>Bestlink College of the Philippines</b>, We provide and promote quality education with modern and unique techniques to able to enhance the skill and the knowledge of our dear students to make them globally competitive and productive citizens. </p>
                </div>
              </center>
          </section>
        </div>

        <div class="col-lg-3 col-sm-3 col-md-3 col-xs-6">
          <h1 style="font-family: Raleway-thin">22,000</h1>
          <h2 style="font-family: Raleway-reg">Students</h2>
          <img src="<?=__PATH_TEMPLATE__?>img/icons/grad.png" style="width: 75%"/>
        </div>
        <div class="col-lg-3 col-sm-3 col-md-3 col-xs-6">
          <h1 style="font-family: Raleway-thin">0</h1>
          <h2 style="font-family: Raleway-reg">Tuition Fee</h2>
          <img src="<?=__PATH_TEMPLATE__?>img/icons/tui.png" style="width: 75%"/>
        </div>
        <div class="col-lg-3 col-sm-3 col-md-3 col-xs-6">
          <h1 style="font-family: Raleway-thin">3</h1>
          <h2 style="font-family: Raleway-reg">Campuses</h2>
          <img src="<?=__PATH_TEMPLATE__?>img/icons/pop.png" style="width: 75%"/>
        </div>
        <div class="col-lg-3 col-sm-3 col-md-3 col-xs-6">
          <h1 style="font-family: Raleway-thin">K to 12</h1>
          <h2 style="font-family: Raleway-reg">Ready</h2>
          <img src="<?=__PATH_TEMPLATE__?>img/icons/zoom.png" style="width: 75%"/>
        </div>
    </div>
  </div>
  </div>
</section>

<section id="academics">
  <div class="hidden-xs hidden-sm">
    <div class="container-fluid">
      <div class="row">
        <div class="academe-overlay col-lg-6 col-md-6 col-sm-6">
          <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 academe-title text-center wow fadeInUp" style="margin-bottom: 4%;">
            Featured Courses
          </div>

          <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 text-center" style="margin-bottom: 5%;">
            <small class="text-center" style="color: white; font-family: Raleway-reg; width: 25%"><hr /></small>
          </div>

          <div class="col-lg-12 col-sm-12 col-md-12" style="padding-bottom: 3%;">
            <div class="academe-card">
              <div class="media">

                <div class="media-left">
                  <img src="<?=__PATH_TEMPLATE__?>img/banner/it-banner.jpg" class="media-object" style="width: 150px; height: 30%;">
                </div>

                <div class="media-body" style="font-family: Raleway-reg; padding-top: 5px;">
                  <h4 class="media-heading">
                    BS in Information Technology
                  </h4>
                  <small style="font-size: 10pt;">Prepares students to be IT professionals who are able to perform installation, operation, development, maintenance and administration of computer applications. </small>
                </div>

              </div>
            </div>
          </div>

          <div class="col-lg-12 col-sm-12 col-md-12" style="padding-bottom: 3%;">
            <div class="academe-card">
              <div class="media">

                <div class="media-left">
                  <img src="<?=__PATH_TEMPLATE__?>img/banner/ba-banner.jpg" style="width: 150px; height: 30%;">
                </div>

                <div class="media-body" style="font-family: Raleway-reg; padding-top: 5px;">
                  <h4 class="media-heading">
                    BS in Business Administration
                  </h4>
                  <small style="font-size: 10pt;">Designed to equip you with the knowledge and skills for effective marketing and sales strategies.</small>
                </div>

              </div>
            </div>
          </div>

          <div class="col-lg-12 col-sm-12 col-md-12" style="padding-bottom: 3%;">
            <div class="academe-card">
              <div class="media">

                <div class="media-left">
                  <img src="<?=__PATH_TEMPLATE__?>img/banner/crim-banner.jpg" style="width: 150px; height: 30%;">
                </div>

                <div class="media-body" style="font-family: Raleway-reg; padding-top: 5px;">
                  <h4 class="media-heading">
                    BS in Criminology
                  </h4>
                  <small style="font-size: 10pt;">For individuals who wish to have a career in the fields of law enforcement, security administration, crime detection and prevention or correctional administration.</small>
                </div>

              </div>
            </div>
          </div>

        </div>
        <div class="academe col-lg-6 col-md-6 col-sm-6">
        </div>
      </div>
    </div>

    <div class="academe-shs">
      <div class="banner-overlay">
        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 academe-title text-center wow fadeInUp" style="margin-bottom: 2%;">
          Senior High School
        </div>


        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12 text-center" style="margin-bottom: 5%;">
          <small class="text-center" style="color: white; font-family: Raleway-reg">Click buttons bellow to navigate</small>
        </div>

        <div id="shs-acad" class="container" style="padding-bottom: 3%;">
          <div class="hidden-xs">
            <div class="row">

              <div class="col-lg-4 col-sm-4 col-md-4 text-center">
                <div class="panel panel-primary panel-card-shs">
                  <div class="panel-heading">
                    ACADEMIC
                  </div>
                  <div class="panel-body">
                    <div class="list-group">
                      <a class="list-group-item" id="abm" data-toggle="modal" data-target="#myModal">
                        <span><img src="<?=__PATH_TEMPLATE__?>img/SHSICONS/ABM.png" /></span>
                        <p>Accounting Business &amp; Management</p>
                      </a>
                      <a class="list-group-item" id="gas" data-toggle="modal" data-target="#myModal">
                        <span><img src="<?=__PATH_TEMPLATE__?>img/SHSICONS/GAS.png" /></span>
                        <p>General Academic Strand</p>
                      </a>
                      <a class="list-group-item" id="stem" data-toggle="modal" data-target="#myModal">
                        <span><img src="<?=__PATH_TEMPLATE__?>img/SHSICONS/STEM.png" /></span>
                        <p>Science Technology Engineering &amp; Mathematics</p>
                      </a>
                      <a class="list-group-item" id="humss" data-toggle="modal" data-target="#myModal">
                        <span><img src="<?=__PATH_TEMPLATE__?>img/SHSICONS/HUMSS.png" /></span>
                        <p>Humanities &amp; Social Sciences</p>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-sm-4 col-md-4 text-center">
                <div class="panel panel-success panel-card-shs">
                  <div class="panel-heading">
                    TECH-VOC
                  </div>
                  <div class="panel-body">
                    <div class="list-group">
                      <a class="list-group-item" id="ict" data-toggle="modal" data-target="#myModal">
                        <span><img src="<?=__PATH_TEMPLATE__?>img/SHSICONS/ICT.png" /></span>
                        <p>Information &amp; Communication Technology</p>
                      </a>
                      <a class="list-group-item" id="he" data-toggle="modal" data-target="#myModal">
                        <span><img src="<?=__PATH_TEMPLATE__?>img/SHSICONS/HE.png" /></span>
                        <p>Home Economics</p>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-sm-4 col-md-4 text-center">
                <div class="panel panel-danger panel-card-shs">
                  <div class="panel-heading">
                    ARTS &amp; DESIGN
                  </div>
                  <div class="panel-body">
                    <div class="list-group">
                      <a class="list-group-item" id="pa" data-toggle="modal" data-target="#myModal">
                        <span><img src="<?=__PATH_TEMPLATE__?>img/SHSICONS/PA.png" /></span>
                        <p>Performing Arts</p>
                      </a>
                    </div>
                  </div>
                </div>
              </div>

            </div>

            </div>



            </div>
      </div>
    </div>
  </div>

  <div class="visible-xs visible-sm">
    <div class="contatiner-fluid">

    </div>
  </div>
</section>



<div class="container-fluid">

  <div class="row">
    <hr />
    <div class="col-lg-9 col-md-9 col-sm-9">

      <section id="newsann">
        <div class="container-fluid">
          <div class="row">
            <div class="title" style="padding-bottom: 2px; margin-top: 5%;">
                <h1 style="font-family: Raleway-thin; font-size: 36pt;">Latest <b style="font-family: Raleway-smb; color: #162c9a">Updates</b></h1>
            </div>

            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12" style="margin-bottom: 1%;">
              <section class="widget widget_text">
                  <center>
                    <div class="textwidget text">
                        <p class="sub-title-text text-center">Latest news and past events of BCP, <br /> Click <a href="<?=__BASE_URL__?>news"><b style="font-family: Raleway-smb; color: #162c9a">Here</b></a> for more news.</p>
                    </div>
                  </center>
              </section>
            </div>

            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
              <div id="news-bg">
                <div class="topBanner-overlay" style="height: 65vh;">
                    <div class="abs-bg">
                      <div class="container">
                        <div class="row">

                          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="color: white; padding-top: 3%">
                            <h2 id="news-title-feat" style="color: white; font-family: Raleway-thin"></h2>
                            <p id="news-content-feat" style="font-family: Raleway-reg"></p>
                          </div>

                        </div>
                      </div>
                    </div>
                </div>
              </div>
            </div>

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div id="owl-banner-carousel" class="owl-carousel owl-theme"  style="background: black;">
                <!-- News Loop -->
                    <?php
                        $n = new News();
                        $news_data = $n->rt_topNews();
                        if($news_data != null){
                    foreach ($news_data as $news) {
                            $news_url = __BASE_URL__.'news/'.Encode_id($news['news_id']).'/';
                            ?>

                            <div class="item load-item" >
                              <img id="news-img" src="<?= ($news['news_imagesurl']) == null ? __PATH_TEMPLATE__.'img/banner/empty.jpg' : $news['news_imagesurl'] ?>" alt="" class="img-responsive" style="width: 100%; height: 150px"/>
                              <span id="news-author" hidden><?= $news['news_author'] ?></span>
                              <span id="news-date" hidden><?= date("F j, Y",$news['news_date']); ?></span>
                              <span id="news-title" hidden><?= $news['news_title'] ?></span>
                              <span id="news-content" hidden><?= strip_tags(substr($news['news_content'], 0, 75))?>...</span>
                              <span id="news-url" hidden><?=$news_url;?></span>
                            </div>
                            <?php
                        }
                        }

                    ?>
                <!-- End news loop -->

              </div>
            </div>

          </div>
        </div>
      </section>
    </div>

    <div class="col-lg-3 col-md-3 col-sm-3">
        <div class="row">
            <div class="col-lg-12">
                <div>
                    <div class="text-center" style="background-color: #162c9a">
                        <div style="padding-top: 5%; padding-bottom: 5%">
                            <h3 style="font-family: Raleway-reg; color: white;">
                                Announcements @ <i><?= date("Y"); ?> </i>
                            </h3>
                            <small style="font-family: Raleway-thin; color: white;">Upcoming Events</small>
                        </div>
                    </div>
                    <div style="background: white">
                          <div class="list-group scrollable-content" style="border-radius: 0 !important;">
                                <!-- News Loop -->
                                    <?php
                                        $n = new News();
                                        $news_data = $n->rt_topEvent();
                                        if($news_data != null){
                                    foreach ($news_data as $news) {
                                            $news_url = __BASE_URL__.'news/'.Encode_id($news['news_id']).'/';
                                            ?>
                                                    <a href="<?=$news_url;?>" class="list-group-item" style="border-radius: 0 !important;">
                                                      <div class="media text-center" style="margin: -2%">
                                                        <div class="media-left">
                                                          <div style="padding: 10px; background-color: #162c9a; height: 100%; background-size: cover;">
                                                            <span style="font-family: Raleway-reg; color: white;" ><?= date("M",$news['news_date']); ?></span>
                                                          </div>
                                                          <div style="padding: 10px; background-color: #f2f2f2; background-size: cover; height: 100%" class="text-center">
                                                            <?= date("j",$news['news_date']); ?>
                                                          </div>
                                                        </div>
                                                        <div class="media-body">
                                                          <div class="media-heading">
                                                            <h5 class="list-group-item-heading"><?= $news['news_title'] ?></h5>
                                                          </div>
                                                        </div>
                                                      </div>
                                                    </a>


                                            <?php
                                        }
                                        }

                                    ?>
                                <!-- End news loop -->
                          </div>
                    </div>
                </div>


            </div>
        </div>
    </div>


    <div class="col-lg-3 col-md-3 col-sm-3">
        <div class="row">
            <div class="col-lg-12">
                <div>
                    <div class="text-center" style="background-color: #162c9a">
                        <div style="padding-top: 5%; padding-bottom: 5%">
                            <h3 style="font-family: Raleway-reg; color: white;">
                                Facebook Updates
                            </h3>
                            <small style="font-family: Raleway-thin; color: white;">Upcoming Events</small>
                        </div>
                    </div>
                    <div style="background: white">
                          <div class="list-group scrollable-content" style="border-radius: 0 !important;">
                            <!-- News Loop -->
                                <?php
                                        for($x=0; $x<$feed_item_count; $x++){

                                            // to get the post id
                                            $id = $obj['data'][$x]['id'];
                                            $post_id_arr = explode('_', $id);
                                            $post_id = $post_id_arr[1];

                                            // user's custom message
                                            $message = $obj['data'][$x]['message'];

                                            // picture from the link
                                            $picture = $obj['data'][$x]['picture'];
                                            $picture_url_arr = explode('&url=', $picture);
                                            $picture_url = urldecode($picture_url_arr[1]);

                                            // link posted
                                            $link = $obj['data'][$x]['link'];

                                            // name or title of the link posted
                                            $name = $obj['data'][$x]['name'];

                                            $description = $obj['data'][$x]['description'];
                                            $type = $obj['data'][$x]['type'];

                                            // when it was posted
                                            $created_time = $obj['data'][$x]['created_time'];
                                            $converted_date_time = date( 'Y-m-d H:i:s', strtotime($created_time));
                                            $ago_value = time_elapsed_string($converted_date_time);

                                            // from
                                            $page_name = $obj['data'][$x]['from']['name'];

                                            // useful for photo
                                            $object_id = $obj['data'][$x]['object_id'];

                                        ?>
                                                <a href="<?= $link ?>" class="list-group-item">

                                                  <h5 class="list-group-item-heading">
                                                        BCP Update - <i class="fa fa-clock-o"></i>&nbsp;<?= $ago_value ?>
                                                  </h5>
                                                  <small class="list-group-item-text">
                                                        <?= strip_tags(substr($message, 0, 150)) ?> ...
                                                        <?php
                                                             if($type=="status"){
                                                                echo "<div class='text-center'>";
                                                                    echo "View on Facebook";
                                                                echo "</div>";
                                                             }else if($type=="photo"){
                                                                echo "<img class='img-responsive' src='https://graph.facebook.com/{$object_id}/picture' />";
                                                             }else{
                                                                if($picture_url){
                                                                    echo "<div class='post-picture'>";
                                                                        echo "<img src='{$picture_url}' />";
                                                                    echo "</div>";
                                                                }

                                                                echo "<div class='post-info'>";
                                                                    echo "<div class='post-info-name'>{$name}</div>";
                                                                    echo "<div class='post-info-description'>{$description}</div>";
                                                                echo "</div>";
                                                            }
                                                        ?>
                                                  </small>
                                                </a>


                                        <?php

                                    }

                                ?>
                            <!-- End news loop -->
                          </div>
                    </div>
                </div>


            </div>
        </div>
    </div>

  </div>
</div>




<!-- Modals -->


  <div class="modal fade" id="myModal" role="dialog" style="margin-top: 5%;">
    <div class="modal-dialog modal-lg ">

      <div class="modal-content">
        <div class="modal-header modal-top">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" style="font-family: lightfont; color: white;" id="title-target"></h4>
        </div>
        <div class="modal-body" id="body-target" style="font-family: Raleway-reg; overflow-y: scroll; height: 350px;">

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
  </div>
