var totalFiles, neededFiles, percent;
function SetFilesTotal( total ) {
  totalFiles = total;
}
function SetFilesNeeded( needed ) {
  neededFiles = needed;
  percent = Math.round((totalFiles - neededFiles)/totalFiles * 100);
  document.getElementById("progress").innerHTML = "<div id='progressbar' class='progress-bar' role='progressbar' style='width:"+percent+"%;'></div>";
}
function SetStatusChanged( status ) {
  status = status;
  document.getElementById("statuschanger").innerHTML = "<p>" + status + "</p>";
  if(status = "Sending client info..."){
  	document.getElementById("progress").innerHTML = "<div class='progress'><div id='progressbar' class='progress-bar' role='progressbar' style='width:100%;'></div></div>";
  }
}