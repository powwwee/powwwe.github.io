<?php

  $sl = json_decode(file_get_contents($slsettings), true);

?>
<style type="text/css">
  body {
    <?= ($sl['solidBg'] == "true"?"background-color: ".$sl['solidBgColor']:"" ) ?>
  }
</style>

<div class="row">
  <div class="col-md-3">
    <div class="list-group">
      <a href="#top" class="list-group-item">Top Bar</a>
      <a href="#mid" class="list-group-item">Mid Section</a>
      <a href="#bottom" class="list-group-item">Bottom Section</a>
      <a href="#bgs" class="list-group-item">Background Choices</a>
    </div>
  </div>
  <div class="col-md-9">
    <div class="well" style="margin-bottom:20px">
      <form class="form" method="post">
        <div class="form-group">
          <p>Design Selection</p>
          <select class="form-control" name="design">
            <option <?= ($Design['design']=="space"?$sel:"") ?> value="space">SpaceLoad</option>
            <option <?= ($Design['design']=="csgo"?$sel:"") ?> value="csgo">CSGO Load</option>
          </select>
        </div>
        <div class="form-group">
          <input type="submit" value="Submit" name="submitdesign" class="form-control btn btn-success">
        </div>
      </form>
    </div>
    <form method="post">
      <h3 id="top"><b>Top Bar</b></h3>
      <div class="well">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <p>Top title</p>
              <input type="text" class="form-control" name="topTitle" value="<?= $sl['topTitle'] ?>">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <p>Font size</p>
              <input type="text" class="form-control" name="topTitleFont" value="<?= $sl['topTitleFont'] ?>">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <p>Round avatars?</p>
              <input type="checkbox" name="avatar_style" <?= ($sl['avatar_style']=="round"?"checked":"") ?>>
            </div>
          </div>
        </div>
      </div>
      <h3 id="mid"><b>Mid Section</b></h3>
      <div class="well">
        <h4><b>Left</b></h4>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <p>Title</p>
              <input type="text" class="form-control" name="leftTitle" value="<?= $sl['leftTitle'] ?>">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <p>Content <small>(<a href="https://github.com/adam-p/markdown-here/wiki/Markdown-Cheatsheet">Markdown supported</a>)</small></p>
              <textarea rows="10" class="form-control fixed-text" name="leftBox" value="<?= $sl['leftBox'] ?>"><?= $sl['leftBox'] ?></textarea>
            </div>
          </div>
        </div>
        <hr/>
        <h4><b>Middle</b></h4>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <p>Title</p>
              <input type="text" class="form-control" name="middleTitle" value="<?= $sl['middleTitle'] ?>">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <p>About section</p>
              <textarea rows="10" class="form-control fixed-text" name="about" value="<?= $sl['about'] ?>"><?= $sl['about'] ?></textarea>
            </div>
          </div>
        </div>
        <h4><b>Right</b></h4>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <p>Title</p>
              <input type="text" class="form-control" name="rightTitle" value="<?= $sl['rightTitle']; ?>">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <p>Rules <small>(<a href="https://github.com/adam-p/markdown-here/wiki/Markdown-Cheatsheet">Markdown supported</a>)</small></p>
              <textarea rows="10" class="form-control fixed-text" name="rules"><?= $sl['rules'] ?></textarea>
            </div>
          </div>
        </div>
      </div>
      <h3 id="bottom"><b>Bottom Bar</b></h3>
      <div class="well">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <p>Text delay <small>(in milliseconds)</small></p>
              <input type="text" class="form-control" name="textDelay" value="<?= $sl['textDelay'] ?>">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <p>Text 1</p>
              <input type="text" class="form-control" name="textOne" value="<?= $sl['textOne'] ?>">
            </div>
            <div class="form-group">
              <p>Text 2</p>
              <input type="text" class="form-control" name="textTwo" value="<?= $sl['textTwo'] ?>">
            </div>
            <div class="form-group">
              <p>Text 3</p>
              <input type="text" class="form-control" name="textThree" value="<?= $sl['textThree'] ?>">
            </div>
            <div class="form-group">
              <p>Text 4</p>
              <input type="text" class="form-control" name="textFour" value="<?= $sl['textFour'] ?>">
            </div>
            <div class="form-group">
              <p>Text 5</p>
              <input type="text" class="form-control" name="textFive" value="<?= $sl['textFive'] ?>">
            </div>
            <div class="form-group">
              <p>Text 6</p>
              <input type="text" class="form-control" name="textSix" value="<?= $sl['textSix'] ?>">
            </div>
            <div class="form-group">
              <p>Text 7</p>
              <input type="text" class="form-control" name="textSeven" value="<?= $sl['textSeven'] ?>">
            </div>
          </div>
        </div>
      </div>
      <h3 id="bgs"><b>Background Settings</b></h3>
      <div class="well">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
  						<p>Solid color</p>
  						<input type="checkbox" name="solidBg" <?= ($sl['solidBg']=="true"?"checked":"") ?>>
  					</div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
  						<p>Color</p>
  						<input type="text" class="form-control" name="solidBgColor" value="<?= $sl['solidBgColor'] ?>">
  					</div>
          </div>
        </div>
        <hr/>
        <div class="row">
          <div class="col-md-6 col-sm-12">
            <div class="form-group">
              <p>Random video <small>(random video from &quot;video/&quot; directory)</small></p>
              <input type="checkbox" name="videoBg" <?= ($sl['videoBg']=="true"?"checked":"") ?>>
            </div>
          </div>
        </div>
        <hr/>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
  						<p>Image slideshow <small>(Cycles through images that <a href="./upload.php">you've uploaded</a>)</small></p>
  						<input type="checkbox" name="slides" <?= ($sl['slides']=="true"?"checked":"") ?>>
  					</div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
  						<p>Slide delay</p>
  						<input type="text" class="form-control" name="backgroundDelay" value="<?= $sl['backgroundDelay'] ?>">
  					</div>
          </div>
        </div>
        <hr/>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <p>Pattern enabled?</p>
              <input type="checkbox" name="pattern" <?= ($sl['pattern']=="true"?"checked":"") ?>>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <p>Pattern choice</p>
              <select class="form-control" name="patternChoice">
                <option <?= ($sl['patternChoice']=="pattern1"?$sel:"") ?> value="pattern1">Pattern 1</option>
                <option <?= ($sl['patternChoice']=="pattern2"?$sel:"") ?> value="pattern2">Pattern 2</option>
                <option <?= ($sl['patternChoice']=="pattern3"?$sel:"") ?> value="pattern3">Pattern 3</option>
                <option <?= ($sl['patternChoice']=="pattern4"?$sel:"") ?> value="pattern4">Pattern 4</option>
              </select>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="coolmenu">
      <h3>Quick menu</h3>
      <div class="wrapper">
        <input type="submit" name="spaceload" class="form-control btn btn-info" value="Submit CSGOLoad Settings!">
        <a href="./upload.php" class="btn btn-success floater">Uploads Page</a>
        <a href="./index.php" target="_blank" class="btn btn-warning floater">View</a>
        <a href="./assets/php/logout.php" class="btn btn-danger floater">Logout</a>
      </div>
    </div>
  </form>
</div>

<div class="backtotop"><a data-scroll href="totaltop"><i class="glyphicon glyphicon-arrow-up"></i></a></div>
<script type="text/javascript" src="assets/js/smooth.js"></script>
<script type="text/javascript">
  smoothScroll.init({
    speed: 500,
    easing: 'easeInOutQuad',
    updateURL: true,
    offset: 50,
    callback: function (toggle, anchor ) {}
  });
  var mn = $(".navbar");
  var totop = $(".backtotop");

  $(window).scroll(function() {
    if($(this).scrollTop() > 260 ) {
      mn.addClass("scrolled");
      totop.addClass("appear");
    } else {
      mn.removeClass("scrolled");
      totop.removeClass("appear");
    }
  });
</script>
