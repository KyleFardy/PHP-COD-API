<?php
    include "COD_API/COD_API.php";
    $API = new COD_API("your sso token here");
    $B04_STATS = $API->GET_B04_STATS("WagonMafia_", "psn");
    $MODERN_WARFARE_STATS = $API->GET_MODERN_WARFARE_STATS("WagonMafia_", "psn");
    $WARZONE_STATS = $API->GET_WARZONE_STATS("WagonMafia_", "psn");
    $VANGUARD_STATS = $API->GET_VANGUARD_STATS("WagonMafia_", "psn");
    $COLD_WAR_STATS = $API->GET_COLD_WAR_STATS("WagonMafia_", "psn");

    echo "BO4 Level : ".$B04_STATS->level.'<br>';
    echo "Modern Warfare Level : ".$MODERN_WARFARE_STATS->level.'<br>';
    echo "Warzone Level : ".$WARZONE_STATS->level.'<br>';
    echo "Vanguard Level : ".$VANGUARD_STATS->level.'<br>';
    echo "Cold War Level : ".$COLD_WAR_STATS->level.'<br>';
?>
