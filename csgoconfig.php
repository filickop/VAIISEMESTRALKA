<?php
session_start();
require "DBStorage.php";
$storage = new DBStorage();

$mouse = $storage->readMouse($_SESSION["player"], $_GET["q"]);

$crosshair = $storage->readCrosshair($_SESSION["player"], $_GET["q"]);

$viewmodel = $storage->readViewmodel($_SESSION["player"], $_GET["q"]);

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

if($viewmodel == null) {
    $viewmodel["fov"] = "Unknown";
    $viewmodel["offsetx"] = "Unknown";
    $viewmodel["offsety"] = "Unknown";
    $viewmodel["offsetz"] = "Unknown";
    $viewmodel["righthand"] = "Unknown";
    $viewmodel["recoil"] = "Unknown";

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
            <h3>Viewmodel</h3>
        </div>
        <div class=\"row\">
            <table class=\"configSettings\">
                <tbody>
                <tr>
                    <th class=\"configTable-th\">FOV</th>
                    <td class=\"configTable-td\">". $viewmodel["fov"] ."</td>
                </tr>
                <tr>
                    <th class=\"configTable-th\">Offset X</th>
                    <td class=\"configTable-td\"> ". $viewmodel["offsetx"] ."</td>
                </tr>
                <tr>
                    <th class=\"configTable-th\">Offset Y</th>
                    <td class=\"configTable-td\">". $viewmodel["offsety"] ."</td>
                </tr>
                <tr>
                    <th class=\"configTable-th\">Offset Z</th>
                    <td class=\"configTable-td\"> ". $viewmodel["offsetz"] ."</td>
                </tr>
                <tr>
                    <th class=\"configTable-th\">Recoil</th>
                    <td class=\"configTable-td\">". $viewmodel["recoil"] ." </td>
                </tr>
                <tr>
                    <th class=\"configTable-th\">Righthand</th>
                    <td class=\"configTable-td\"> ". $viewmodel["righthand"] ."</td>
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
                    <th class=\"configTable-th\">Scaling Mode</th>
                    <td class=\"configTable-td\"> ". $video["scalling_mode"] ."</td>
                </tr>
                <tr>
                    <th class=\"configTable-th\">Brightness</th>
                    <td class=\"configTable-td\"> ". $video["brightness"] ."</td>
                </tr>
                <tr>
                    <th class=\"configTable-th\">Display Mode</th>
                    <td class=\"configTable-td\">". $video["display_mode"] ."</td>
                </tr>
                <tr>
                    <th class=\"configTable-th\">Global Shadow Quality</th>
                    <td class=\"configTable-td\"> ". $video["global_shadow_qua"] ."</td>
                </tr>
                <tr>
                    <th class=\"configTable-th\">Model / Texture Detail</th>
                    <td class=\"configTable-td\"> ". $video["model_detail"] ."</td>
                </tr>
                <tr>
                    <th class=\"configTable-th\">Texture Streaming</th>
                    <td class=\"configTable-td\">". $video["texture_streaming"] ."</td>
                </tr>
                <tr>
                    <th class=\"configTable-th\">Effect Detail</th>
                    <td class=\"configTable-td\">". $video["effect_detail"] ."</td>
                </tr><tr>
                    <th class=\"configTable-th\">Shader Detail</th>
                    <td class=\"configTable-td\"> ". $video["shader_detail"] ."</td>
                </tr>
                <tr>
                    <th class=\"configTable-th\">Boost Player Contrast</th>
                    <td class=\"configTable-td\">". $video["boost_player_c"] ."</td>
                </tr>
                <tr>
                    <th class=\"configTable-th\">Multicore Rendering</th>
                    <td class=\"configTable-td\">". $video["multicore_ren"] ."</td>
                </tr>
                <tr>
                    <th class=\"configTable-th\">Multisampling</th>
                    <td class=\"configTable-td\">". $video["multisampling"] ."</td>
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
                <tr>
                    <th class=\"configTable-th\">Triple-Monitor Mode</th>
                    <td class=\"configTable-td\">". $video["triple_monitor"] ."</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>";


?>