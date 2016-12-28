<?php

  $cs = json_decode(file_get_contents($cssettings), true);

?>
  <style type="text/css">
  body {
    background: url('assets/uploads/csgoload/<?= $cs['singleBack'] ?>') no-repeat;
    background-size: cover !important;
    background-position: center;
    background-attachment: fixed;
  }
  </style>

  <div class="col-md-3">
    <div class="list-group">
      <a href="#top" data-scroll class="list-group-item">Top</a>
      <a href="#map" data-scroll class="list-group-item">Map</a>
      <a href="#topContent" data-scroll class="list-group-item">Top Content</a>
      <a href="#bottomContent" data-scroll class="list-group-item">Bottom Content</a>
      <a href="#bgs" data-scroll class="list-group-item">Backgrounds</a>
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
      <h3 id="top"><b>Top</b></h3>
      <div class="well">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <p>Hint icon</p>
              <select name="icon" class="form-control">
                <option <?= ($cs['icon']=="default"?$sel:"") ?> value="default">Default</option>
                <option <?= ($cs['icon']=="custom"?$sel:"") ?> value="custom">Custom</option>
              </select>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <p>Custom icon</p>
              <input type="text" class="form-control" value="<?= $cs['customicon'] ?>" name="customicon" placeholder="Custom icon path">
            </div>
          </div>
        </div>
        <hr/>
        <div class="row">
          <div class="col-md-6">
            <p>Hint delay</p>
            <input type="text" class="form-control" name="hintDelay" value="<?= $cs['hintDelay'] ?>">
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <p>Hint 1</p>
              <input type="text" class="form-control" value="<?= $cs['slide1'] ?>" name="slide1" placeholder="Hint 1">
            </div>
            <div class="form-group">
              <p>Hint 2</p>
              <input type="text" class="form-control" value="<?= $cs['slide2'] ?>" name="slide2" placeholder="Hint 2">
            </div>
            <div class="form-group">
              <p>Hint 3</p>
              <input type="text" class="form-control" value="<?= $cs['slide3'] ?>" name="slide3" placeholder="Hint 3">
            </div>
            <div class="form-group">
              <p>Hint 4</p>
              <input type="text" class="form-control" value="<?= $cs['slide4'] ?>" name="slide4" placeholder="Hint 4">
            </div>
            <div class="form-group">
              <p>Hint 5</p>
              <input type="text" class="form-control" value="<?= $cs['slide5'] ?>" name="slide5" placeholder="Hint 5">
            </div>
            <div class="form-group">
              <p>Hint 6</p>
              <input type="text" class="form-control" value="<?= $cs['slide6'] ?>" name="slide6" placeholder="Hint 6">
            </div>
          </div>
        </div>
      </div>
      <h3 id="map"><b>Map</b></h3>
      <div class="well">
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
  						<p>Gametracker</p>
  						<input type="checkbox" name="gametracker" <?= ($cs['gametracker']=="true"?"checked":"") ?>>
  					</div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
  						<p>CSGO Maps</p>
  						<input type="checkbox" name="csgomaps" <?= ($cs['csgomaps']=="true"?"checked":"") ?>>
  					</div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
  						<p>CSGO map selection</p>
  						<select name="csgomap" class="form-control">
  							<option <?= ($cs['csgomap']=="dust2"?$sel:"") ?> value="dust2">Dust II</option>
  							<option <?= ($cs['csgomap']=="nuke"?$sel:"") ?> value="nuke">Nuke</option>
  							<option <?= ($cs['csgomap']=="mirage"?$sel:"") ?> value="mirage">Mirage</option>
  							<option <?= ($cs['csgomap']=="inferno"?$sel:"") ?> value="inferno">Inferno</option>
  							<option <?= ($cs['csgomap']=="cobblestone"?$sel:"") ?> value="cobblestone">Cobblestone</option>
  							<option <?= ($cs['csgomap']=="overpass"?$sel:"") ?> value="overpass">Overpass</option>
  							<option <?= ($cs['csgomap']=="cache"?$sel:"") ?> value="cache">Cache</option>
  						</select>
  					</div>
          </div>
        </div>
      </div>
      <h3 id="topContent"><b>Top Content</b></h3>
      <div class="well">
        <p><b>Main title</b></p>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <p>Main title</p>
              <select name="mainT" class="form-control">
                <option <?= ($cs['mainT']=="gm"?$sel:"") ?> value="gm">Gamemode</option>
                <option <?= ($cs['mainT']=="map"?$sel:"") ?> value="map">Map</option>
                <option <?= ($cs['mainT']=="custom"?$sel:"") ?> value="custom">Custom</option>
              </select>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <p>Custom main title</p>
              <input type="text" class="form-control" name="mainTitle" value="<?= $cs['mainTitle'] ?>">
            </div>
          </div>
        </div>
        <p><b>Icon</b></p>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
  						<p>Icon</p>
  						<select name="icon2" class="form-control">
  							<option <?= ($cs['icon2']=="dust2"?$sel:"") ?> value="dust2">Dust II</option>
  							<option <?= ($cs['icon2']=="nuke"?$sel:"") ?> value="nuke">Nuke</option>
  							<option <?= ($cs['icon2']=="mirage"?$sel:"") ?> value="mirage">Mirage</option>
  							<option <?= ($cs['icon2']=="inferno"?$sel:"") ?> value="inferno">Inferno</option>
  							<option <?= ($cs['icon2']=="cobblestone"?$sel:"") ?> value="cobblestone">Cobblestone</option>
  							<option <?= ($cs['icon2']=="overpass"?$sel:"") ?> value="overpass">Overpass</option>
  							<option <?= ($cs['icon2']=="cache"?$sel:"") ?> value="cache">Cache</option>
  							<option <?= ($cs['icon2']=="custom"?$sel:"") ?> value="custom">Custom</option>
  						</select>
  					</div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
  						<p>Custom icon</p>
  						<input type="text" name="customicon2" class="form-control" value="<?= $cs['customicon2'] ?>">
  					</div>
          </div>
        </div>
        <p><b>Secondary title</b></p>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
  						<p>Secondary title</p>
  						<select name="secoT" class="form-control">
  							<option <?= ($cs['secoT']=="gm"?$sel:"") ?> value="gm">Gamemode</option>
  							<option <?= ($cs['secoT']=="map"?$sel:"") ?> value="map">Map</option>
  							<option <?= ($cs['secoT']=="custom"?$sel:"") ?> value="custom">Custom</option>
  						</select>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <p>Custom secondary title</p>
  						<input type="text" class="form-control" name="secoTitle" value="<?= $cs['secoTitle'] ?>">
  					</div>
          </div>
        </div>
      </div>
      <h3 id="bottomContent"><b>Bottom Content</b></h3>
      <div class="well">
        <div class="row">
          <div class="col-md-12">
            <?= "<div class='hideme'>".$cs['description']."</div>"; ?>
            <textarea name="description" cols="30" rows="4" class="form-control fixed-text" value="<?= $cs['description'] ?>"><?= $cs['description'] ?></textarea>
          </div>
        </div>
          <hr/>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
  						<p>Loading bar</p>
    					<input type="checkbox" name="loadingbar" <?= ($cs['loadingbar']=="true"?'checked':'') ?>>
  					</div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
  						<p>Color</p>
  						<input type="text" name="loadcolor" class="form-control" value="<?= $cs['loadcolor'] ?>">
  					</div>
          </div>
        </div>
      </div>
      <h3 id="bgs"><b>Backgrounds</b></h3>
      <div class="well">
        <p><b>Image slideshow</b> <small>(Fetches images from the <a href="./upload.php">uploads page</a>)</small></p>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
  						<p>Enabled?</p>
  						<input type="checkbox" name="slides" <?= ($cs['slides']=="true"?'checked':'') ?>>
  					</div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <p>Slide delay <small>(In milliseconds)</small></p>
              <input type="text" class="form-control" name="slideDelay" value="<?= $cs['slideDelay'] ?>">
            </div>
          </div>
        </div>
        <hr/>
        <p><b>Color</b></p>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
  						<p>Enabled?</p>
  						<input type="checkbox" name="solidBg" <?= ($cs['solidBg']=="true"?'checked':'') ?>>
  					</div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <p>Solid color hex</p>
              <input type="text" class="form-control" name="solidBgColor" value="<?= $cs['solidBgColor']; ?>">
            </div>
          </div>
        </div>
        <hr/>
        <p><b>Random video</b></p>
        <div class="form-group">
          <p>Enabled?</p>
          <input type="checkbox" name="videoBackground" <?= ($cs['videoBackground']=="true"?'checked':'') ?>>
        </div>
        <hr/>
        <p><b>Single image</b> <small>(You get these from the <a href="./upload.php">uploads page</a>)</small></p>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
  						<p>Enabled?</p>
  						<input type="checkbox" name="singleBackground" <?= ($cs['singleBackground']=="true"?'checked':'') ?>>
  					</div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <p>Single background</p>
              <input type="text" name="singleBack" class="form-control" value="<?= $cs['singleBack']; ?>">
            </div>
          </div>
        </div>
      </div>
      <div class="coolmenu">
        <h3>Quick menu</h3>
        <div class="wrapper">
          <input type="submit" name="csgoload" class="form-control btn btn-info" value="Submit CSGOLoad Settings!">
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
