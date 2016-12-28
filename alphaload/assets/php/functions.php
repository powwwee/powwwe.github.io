<?php

function Is64($s){
  return StrLen(Trim($s)) == 17;
}

function ID64To32($steamid32){
  $type = (int) (((int) substr((string) $steamid32, -1)) & 1) ? 1 : 0;
  return sprintf("STEAM_0:%d:%d", $type, ((int) bcsub($steamid32, "76561197960265728") - $type) / 2);
}

function ID32To64($steamid64){
  $iServer = "0";
  $iAuthID = "0";
  $szAuthID = $steamid64;
  $szTmp = strtok($szAuthID, ":");
  while(($szTmp = strtok(":")) !== false) {
    $szTmp2 = strtok(":");
    if($szTmp2 !== false) {
            $iServer = $szTmp;
            $iAuthID = $szTmp2;
    }
  }
  if($iAuthID == "0") { return "0"; }
  $id64 = bcmul($iAuthID, "2");
  $id64 = bcadd($id64, bcadd("76561197960265728", $iServer));
  return $id64;
}
