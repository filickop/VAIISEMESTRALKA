<?php
session_start();
require "DBStorage.php";
$storage = new DBStorage();

$mouse = $storage->readMouse($_SESSION["player"], $_GET["q"]);

$crosshair = $storage->readCrosshair($_SESSION["player"], $_GET["q"]);

$keyBinds = $storage->readKeyBinds($_SESSION["player"], $_GET["q"]);

$video = $storage->readVideo($_SESSION["player"], $_GET["q"]);

if($mouse == null) {
    $mouse["DPI"] = "Unknown";
    $mouse["sensitivity"] = "Unknown";
    $mouse["zoom_sens"] = "Unknown";
    $mouse["hz"] = "Unknown";
    $mouse["windows_sens"] = "Unknown";
    $mouse["raw_input"] = "Unknown";
    $mouse["mouse_acc"] = "Unknown";
}

if($crosshair == null) {
    $crosshair["drawoutline"] = "Unknown";
    $crosshair["alpha"] = "Unknown";
    $crosshair["red"] = "Unknown";
    $crosshair["green"] = "Unknown";
    $crosshair["blue"] = "Unknown";
    $crosshair["dot"] = "Unknown";
    $crosshair["gap"] = "Unknown";
    $crosshair["size"] = "Unknown";
    $crosshair["style"] = "Unknown";
    $crosshair["thickness"] = "Unknown";
    $crosshair["sniper_width"] = "Unknown";
}
if($keyBinds == null) {
    $keyBinds["slot1"] = "Unknown";
    $keyBinds["slot2"] = "Unknown";
    $keyBinds["slot3"] = "Unknown";
    $keyBinds["slot4"] = "Unknown";
    $keyBinds["slot5"] = "Unknown";
    $keyBinds["slot6"] = "Unknown";
    $keyBinds["slot7"] = "Unknown";
    $keyBinds["slot8"] = "Unknown";
    $keyBinds["crouch"] = "Unknown";
    $keyBinds["walk_sprint"] = "Unknown";
    $keyBinds["jump"] = "Unknown";
    $keyBinds["use_object"] = "Unknown";
}


if($video == null) {
    $video["resolution"] = "Unknown";
    $video["aspect_ratio"] = "Unknown";
    $video["scalling_mode"] = "Unknown";
    $video["brightness"] = "Unknown";
    $video["display_mode"] = "Unknown";
    $video["global_shadow_qua"] = "Unknown";
    $video["model_detail"] = "Unknown";
    $video["texture_streaming"] = "Unknown";
    $video["effect_detail"] = "Unknown";
    $video["shader_detail"] = "Unknown";
    $video["boost_player_c"] = "Unknown";
    $video["multicore_ren"] = "Unknown";
    $video["multisampling"] = "Unknown";
    $video["fxaa"] = "Unknown";
    $video["texture_streaming"] = "Unknown";
    $video["v_sync"] = "Unknown";
    $video["motion_blur"] = "Unknown";
    $video["triple_monitor"] = "Unknown";
    $video["user_shaders"] = "Unknown";

}




echo "  <div class=\"container row\">
            <div class=\"configcard\">
                <div class=\"row\">
                    <h3>Mouse</h3>
                </div>
            <div class=\"row mousecard-table\">
                <table class=\"configSettings\">
                    <tbody>
                        <tr >
                            <th class=\"configTable-th\">DPI</th>
                            <td class=\"configTable-td\">" . $mouse["DPI"] . "</td>
                        </tr>
                        <tr>
                            <th class=\"configTable-th\">Sensitivity</th> 
                            <td class=\"configTable-td\">" . $mouse["sensitivity"] . "</td> 
                        </tr>
                        <tr> 
                            <th class=\"configTable-th\">Zoom Sensitivity</th> 
                            <td class=\"configTable-td\">" . $mouse["zoom_sens"] . "</td> 
                        </tr>
                        <tr> 
                            <th class=\"configTable-th\">Hz</th> 
                            <td class=\"configTable-td\">" . $mouse["hz"] . "</td> 
                        </tr> 
                        <tr> 
                            <th class=\"configTable-th\">Windows Sensitivity</th> 
                            <td class=\"configTable-td\">" . $mouse["windows_sens"] . "</td> 
                        </tr>
                        <tr> 
                            <th class=\"configTable-th\">Raw Input</th> 
                             <td class=\"configTable-td\">" . $mouse["raw_input"] . "</td> 
                        </tr> 
                        <tr > 
                               <th class=\"configTable-th\">Mouse Acceleration</th> 
                                <td class=\"configTable-td\">" . $mouse["mouse_acc"] . "</td> 
                        </tr> 
                    </tbody> 
              </table> 
           </div> 
       </div> 
    </div> 



<div class=\"container row\">
    <div class=\"configcard\">
        <div class=\"row\">
            <h3>Crosshair</h3>
        </div>
        <div class=\"row crosshair-table\">
            <table class=\"configSettings\">
                <tbody>
                <tr>
                    <th class=\"configTable-th\">Drawoutline</th>
                    <td class=\"configTable-td\">" . $crosshair["drawoutline"] . "</td>
                </tr>
                <tr>
                    <th class=\"configTable-th\">Alpha</th>
                    <td class=\"configTable-td\">" . $crosshair["alpha"] . "</td>
                </tr>
                <tr>
                    <th class=\"configTable-th\">Blue</th>
                    <td class=\"configTable-td\">". $crosshair["blue"] ."</td>
                </tr>
                <tr>
                    <th class=\"configTable-th\">Green</th>
                    <td class=\"configTable-td\">". $crosshair["green"] . "</td>
                </tr>
                <tr>
                    <th class=\"configTable-th\">Red</th>
                    <td class=\"configTable-td\">". $crosshair["red"] ."</td>
                </tr>
                <tr>
                    <th class=\"configTable-th\">Dot</th>
                    <td class=\"configTable-td\"> ". $crosshair["dot"] . "</td>
                </tr>
                <tr>
                    <th class=\"configTable-th\">Gap</th>
                    <td class=\"configTable-td\">" . $crosshair["gap"] . "</td>
                </tr>
                <tr>
                    <th class=\"configTable-th\">Size</th>
                    <td class=\"configTable-td\">". $crosshair["size"] ."</td>
                </tr>
                <tr>
                    <th class=\"configTable-th\">Style</th>
                    <td class=\"configTable-td\">". $crosshair["style"] . "</td>
                </tr>
                <tr>
                    <th class=\"configTable-th\">Thickness</th>
                    <td class=\"configTable-td\"> ". $crosshair["thickness"] . "</td>
                </tr>
                <tr>
                    <th class=\"configTable-th\">Sniper Width</th>
                    <td class=\"configTable-td\">". $crosshair["sniper_width"] ."</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class=\"container row\">
    <div class=\"configcard\">
        <div class=\"row\">
            <h3>Keybinds</h3>
        </div>
        <div class=\"row\">
            <table class=\"configSettings\">
                <tbody>
                <tr>
                    <th class=\"configTable-th\">Walk</th>
                    <td class=\"configTable-td\">". $keyBinds["walk_sprint"] ."</td>
                </tr>
                <tr>
                    <th class=\"configTable-th\">Crouch</th>
                    <td class=\"configTable-td\"> ". $keyBinds["crouch"] ."</td>
                </tr>
                <tr>
                    <th class=\"configTable-th\">Jump</th>
                    <td class=\"configTable-td\">". $keyBinds["jump"] ."</td>
                </tr>
                <tr>
                    <th class=\"configTable-th\">Use Object</th>
                    <td class=\"configTable-td\"> ". $keyBinds["use_object"] ."</td>
                </tr>
                <tr>
                    <th class=\"configTable-th\">Primary Weapon</th>
                    <td class=\"configTable-td\">". $keyBinds["slot1"] ." </td>
                </tr>
                <tr>
                    <th class=\"configTable-th\">Secondary Weapon</th>
                    <td class=\"configTable-td\"> ". $keyBinds["slot2"] ."</td>
                </tr>
                <tr>
                    <th class=\"configTable-th\">Meele Weapon</th>
                    <td class=\"configTable-td\"> ". $keyBinds["slot3"] ."</td>
                </tr>
                <tr>
                    <th class=\"configTable-th\">Spike</th>
                    <td class=\"configTable-td\"> ". $keyBinds["slot4"] ."</td>
                </tr>
                <tr>
                    <th class=\"configTable-th\">Ability 1</th>
                    <td class=\"configTable-td\"> ". $keyBinds["slot5"] ."</td>
                </tr>
                <tr>
                    <th class=\"configTable-th\">Ability 2</th>
                    <td class=\"configTable-td\"> ". $keyBinds["slot6"] ."</td>
                </tr>
                <tr>
                    <th class=\"configTable-th\">Ability 3</th>
                    <td class=\"configTable-td\"> ". $keyBinds["slot7"] ."</td>
                </tr>
                <tr>
                    <th class=\"configTable-th\">Ability Ultimate</th>
                    <td class=\"configTable-td\"> ". $keyBinds["slot8"] ."</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class=\"container row\">
    <div class=\"configcard\">
        <div class=\"row\">
            <h3>Video Settings</h3>
        </div>
        <div class=\"row\">
            <table class=\"configSettings\">
                <tbody>
                <tr>
                    <th class=\"configTable-th\">Resolution</th>
                    <td class=\"configTable-td\">". $video["resolution"] ."</td>
                </tr>
                <tr>
                    <th class=\"configTable-th\">Aspect Ratio</th>
                    <td class=\"configTable-td\"> ". $video["aspect_ratio"] . "</td>
                </tr>
                <tr>
                    <th class=\"configTable-th\">Aspect Ratio Method</th>
                    <td class=\"configTable-td\"> ". $video["scalling_mode"] ."</td>
                </tr>
                <tr>
                    <th class=\"configTable-th\">Display Mode</th>
                    <td class=\"configTable-td\">". $video["display_mode"] ."</td>
                </tr>
                <tr>
                    <th class=\"configTable-th\">Multithreaded Rendering</th>
                    <td class=\"configTable-td\"> ". $video["multicore_ren"] ."</td>
                </tr>
                <tr>
                    <th class=\"configTable-th\">Material Quality</th>
                    <td class=\"configTable-td\"> ". $video["model_detail"] ."</td>
                </tr>
                <tr>
                    <th class=\"configTable-th\">Texture Quality</th>
                    <td class=\"configTable-td\">". $video["texture_streaming"] ."</td>
                </tr>
                <tr>
                    <th class=\"configTable-th\">Detail Detail</th>
                    <td class=\"configTable-td\">". $video["effect_detail"] ."</td>
                </tr><tr>
                    <th class=\"configTable-th\">UI Quaility</th>
                    <td class=\"configTable-td\"> ". $video["shader_detail"] ."</td>
                </tr>
                <tr>
                    <th class=\"configTable-th\">Vignette</th>
                    <td class=\"configTable-td\">". $video["boost_player_c"] ."</td>
                </tr>
                <tr>
                    <th class=\"configTable-th\">FXAA Anti-Aliasing</th>
                    <td class=\"configTable-td\">". $video["fxaa"] ."</td>
                </tr>
                <tr>
                    <th class=\"configTable-th\">V-Sync</th>
                    <td class=\"configTable-td\">". $video["v_sync"] ."</td>
                </tr>
                <tr>
                    <th class=\"configTable-th\">Motion Blur</th>
                    <td class=\"configTable-td\">". $video["motion_blur"] ."</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>";


?>