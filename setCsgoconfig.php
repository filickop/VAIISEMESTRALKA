<?php

session_start();
require "DBStorage.php";
require "Auth.php";

$storage = new DBStorage();
$auth = new Auth();

$mouse = $storage->readMouse(Auth::getUser(), $_GET["q"]);

$crosshair = $storage->readCrosshair(Auth::getUser(), $_GET["q"]);

$viewmodel = $storage->readViewmodel(Auth::getUser(), $_GET["q"]);

$video = $storage->readVideo(Auth::getUser(), $_GET["q"]);

if($mouse == null) {
    $mouse["DPI"] = "";
    $mouse["sensitivity"] = "";
    $mouse["zoom_sens"] = "";
    $mouse["hz"] = "";
    $mouse["windows_sens"] = "";
    $mouse["raw_input"] = "";
    $mouse["mouse_acc"] = "";
}

if($crosshair == null) {
    $crosshair["drawoutline"] = "";
    $crosshair["alpha"] = "";
    $crosshair["red"] = "";
    $crosshair["green"] = "";
    $crosshair["blue"] = "";
    $crosshair["dot"] = "";
    $crosshair["gap"] = "";
    $crosshair["size"] = "";
    $crosshair["style"] = "";
    $crosshair["thickness"] = "";
    $crosshair["sniper_width"] = "";
}

if($viewmodel == null) {
    $viewmodel["fov"] = "";
    $viewmodel["offsetx"] = "";
    $viewmodel["offsety"] = "";
    $viewmodel["offsetz"] = "";
    $viewmodel["recoil"] = "";
    $viewmodel["righthand"] = "";
}

if($video == null) {
    $video["resolution"] = "";
    $video["aspect_ratio"] = "";
    $video["scalling_mode"] = "";
    $video["brightness"] = "";
    $video["display_mode"] = "";
    $video["global_shadow_qua"] = "";
    $video["model_detail"] = "";
    $video["texture_streaming"] = "";
    $video["effect_detail"] = "";
    $video["shader_detail"] = "";
    $video["boost_player_c"] = "";
    $video["multicore_ren"] = "";
    $video["multisampling"] = "";
    $video["fxaa"] = "";
    $video["v_sync"] = "";
    $video["motion_blur"] = "";
    $video["triple_monitor"] = "";
}


echo "
    <div class=\"row\">
        <div class=\"form-editdata configcard col\">
            <h3 class=\"h4 mb-3 fw-normal\">Mouse</h3>
            <div class=\"form-floating\">
                <input type=\"number\" name=\"DPI\" class=\"form-control\" id=\"floatingInput\" min=\"0\" placeholder=\"dpi\" value=". $mouse["DPI"] .">
                <label for=\"floatingInput\">DPI</label>
            </div>
            <div class=\"form-floating\">
                <input type=\"number\" name=\"sensitivity\" class=\"form-control\" id=\"floatingInput\" min=\"0\" step=\"0.1\" placeholder=\"Sensitivity\" value=". $mouse["sensitivity"] .">
                <label for=\"floatingInput\">Sensitivity</label>
            </div>
            <div class=\"form-floating\">
                <input type=\"number\" name=\"zoom_sens\" class=\"form-control\" id=\"floatingInput\" min=\"0\" placeholder=\"Zoom Sensitivity\" value=". $mouse["zoom_sens"] .">
                <label for=\"floatingInput\">Zoom Sensitivity</label>
            </div>
            <div class=\"form-floating\">
                <input type=\"number\" name=\"hz\" class=\"form-control\" id=\"floatingInput\" min=\"0\" placeholder=\"Hz\" value=". $mouse["hz"] .">
                <label for=\"floatingInput\">Hz</label>
            </div>
            <div class=\"form-floating\">
                <input type=\"number\" name=\"windows_sens\" class=\"form-control\" id=\"floatingInput\" min=\"0\" placeholder=\"Windows Sensitivity\" value=". $mouse["windows_sens"] .">
                <label for=\"floatingInput\">Windows Sensitivity</label>
            </div>
            <div class=\"form-floating\">
                <input type=\"number\" name=\"raw_input\" class=\"form-control\" id=\"floatingInput\" min=\"0\" max=\"1\" step=\"1\" placeholder=\"Raw Input\" value=". $mouse["raw_input"] .">
                <label for=\"floatingInput\">Raw Input</label>
            </div>
            <div class=\"form-floating\">
                <input type=\"number\" name=\"mouse_acc\" class=\"form-control\" id=\"floatingInput\" min=\"0\" max=\"1\" step=\"1\" placeholder=\"Mouse Acceleration\" value=". $mouse["mouse_acc"] .">
                <label for=\"floatingInput\">Mouse Acceleration</label>
            </div>
        </div>
        
        <div class=\"form-editdata configcard col\">
            <h3 class=\"h4 mb-3 fw-normal\">Viewmodel</h3>
            <div class=\"form-floating\">
                <input type=\"number\" name=\"fov\" class=\"form-control\" id=\"floatingInput\" min=\"0\" placeholder=\"FOV\" value=". $viewmodel["fov"] .">
                <label for=\"floatingInput\">FOV</label>
            </div>
            <div class=\"form-floating\">
                <input type=\"number\" name=\"offsetx\" class=\"form-control\" id=\"floatingInput\" min=\"0\" step=\"0.1\" placeholder=\"Offset X\" value=". $viewmodel["offsetx"] .">
                <label for=\"floatingInput\">Offset X</label>
            </div>
            <div class=\"form-floating\">
                <input type=\"number\" name=\"offsety\" class=\"form-control\" id=\"floatingInput\" min=\"0\" step=\"0.1\" placeholder=\"Offset Y\" value=". $viewmodel["offsety"] .">
                <label for=\"floatingInput\">Offset Y</label>
            </div>
            <div class=\"form-floating\">
                <input type=\"number\" name=\"offsetz\" class=\"form-control\" id=\"floatingInput\" min=\"0\" step=\"0.1\" placeholder=\"Offset Z\" value=". $viewmodel["offsetz"] .">
                <label for=\"floatingInput\">Offset Z</label>
            </div>
            <div class=\"form-floating\">
                <input type=\"number\" name=\"recoil\" class=\"form-control\" id=\"floatingInput\" min=\"0\" step=\"0.1\" max=\"1\" placeholder=\"Recoil\" value=". $viewmodel["recoil"] .">
                <label for=\"floatingInput\">Recoil</label>
            </div>
            <div class=\"form-floating\">
                <input type=\"number\" name=\"righthand\" class=\"form-control\" id=\"floatingInput\" min=\"0\" step=\"1\" max=\"1\" placeholder=\"Righthand\" value=". $viewmodel["righthand"] .">
                <label for=\"floatingInput\">Righthand</label>
            </div>
        </div>
        
    </div>
    
    <div class=\"row\">
        <div class=\"form-editdata configcard col\">
                <h3 class=\"h4 mb-3 fw-normal\">Crosshair</h3>
                <div class=\"form-floating\">
                    <input type=\"number\" name=\"drawoutline\" class=\"form-control\" id=\"floatingInput\" min=\"0\" placeholder=\"Drawoutline\" value=". $crosshair["drawoutline"] .">
                    <label for=\"floatingInput\">Drawoutline</label>
                </div>
                <div class=\"form-floating\">
                    <input type=\"number\" name=\"alpha\" class=\"form-control\" id=\"floatingInput\" min=\"0\" max=\"255\" placeholder=\"Alpha\" value=". $crosshair["alpha"] .">
                    <label for=\"floatingInput\">Alpha</label>
                </div>
                <div class=\"form-floating\">
                    <input type=\"number\" name=\"red\" class=\"form-control\" id=\"floatingInput\" min=\"0\" max=\"255\" placeholder=\"Red\" value=". $crosshair["red"] .">
                    <label for=\"floatingInput\">Red</label>
                </div>
                <div class=\"form-floating\">
                    <input type=\"number\" name=\"green\" class=\"form-control\" id=\"floatingInput\" min=\"0\" max=\"255\" placeholder=\"Green\" value=". $crosshair["green"] .">
                    <label for=\"floatingInput\">Green</label>
                </div>
                <div class=\"form-floating\">
                    <input type=\"number\" name=\"blue\" class=\"form-control\" id=\"floatingInput\" min=\"0\" max=\"255\" placeholder=\"Blue\" value=". $crosshair["blue"] .">
                    <label for=\"floatingInput\">Blue</label>
                </div>
                <div class=\"form-floating\">
                    <input type=\"number\" name=\"dot\" class=\"form-control\" id=\"floatingInput\" min=\"0\" max=\"1\" step=\"1\" placeholder=\"Dot\" value=". $crosshair["dot"] .">
                    <label for=\"floatingInput\">Dot</label>
                </div>
                <div class=\"form-floating\">
                    <input type=\"number\" name=\"gap\" class=\"form-control\" id=\"floatingInput\" min=\"0\" step=\"0.1\" placeholder=\"Gap\" value=". $crosshair["gap"] .">
                    <label for=\"floatingInput\">Gap</label>
                </div>
                <div class=\"form-floating\">
                    <input type=\"number\" name=\"size\" class=\"form-control\" id=\"floatingInput\" min=\"0\" step=\"0.1\" placeholder=\"Size\" value=". $crosshair["size"] .">
                    <label for=\"floatingInput\">Size</label>
                </div>
                <div class=\"form-floating\">
                    <input type=\"number\" name=\"style\" class=\"form-control\" id=\"floatingInput\" min=\"0\" max=\"5\" step=\"1\" placeholder=\"Style\" value=". $crosshair["style"] .">
                    <label for=\"floatingInput\">Style</label>
                </div>
                <div class=\"form-floating\">
                    <input type=\"number\" name=\"thickness\" class=\"form-control\" id=\"floatingInput\" min=\"0\" step=\"0.1\" placeholder=\"Thickness\" value=". $crosshair["thickness"] .">
                    <label for=\"floatingInput\">Thickness</label>
                </div>
                <div class=\"form-floating\">
                    <input type=\"number\" name=\"sniper_width\" class=\"form-control\" id=\"floatingInput\" min=\"0\" step=\"0.1\" placeholder=\"Sniper Width\" value=". $crosshair["sniper_width"] .">
                    <label for=\"floatingInput\">Sniper Width</label>
                </div>
            </div>
            
            <div class=\"form-editdata configcard col\">
                <h3 class=\"h4 mb-3 fw-normal\">Video Settings</h3>
                
                
                <label for=\"resolution\">Resolution</label>
                <div class=\"input-group mb-3\">
                    <select id=\"resolution\" name=\"resolution\" class=\"form-select\">
                    <option value=". $video["resolution"]." >". $video["resolution"]."</option>
                    <option value=\"1176x664\">1176x664</option>
                    <option value=\"1280x720\">1280x720</option>
                    <option value=\"1366x768\">1366x768</option>
                    <option value=\"1600x900\">1600x900</option>
                    <option value=\"1920x1080\">1920x1080</option>
                    <option value=\"3840x2160\">3840x2160</option>
                    </select>
                </div>

                <label for=\"aspect_ratio\">Aspect Ratio</label>
                <div class=\"input-group mb-3\">
                    <select id=\"aspect_ratio\" name=\"aspect_ratio\" class=\"form-select\">
                    <option value=". $video["aspect_ratio"]." >". $video["aspect_ratio"]."</option>
                    <option value=\"16:10\">16:10</option>
                    <option value=\"16:9\">16:9</option>
                    <option value=\"4:3\">4:3</option>
                    </select>
                </div>
                
                <label for=\"floatingInput\">Brightness</label>
                <div class=\"form-floating\">
                    <input type=\"number\" min=\"0\" max=\"130\" step=\"1\" name=\"brightness\" class=\"form-control\" id=\"floatingInput\" placeholder=\"Brightness\" value=". $video["brightness"] .">
                    
                </div>
                
                <label for=\"display_mode\">Display Mode</label>
                <div class=\"input-group mb-3\">
                    <select id=\"display_mode\" name=\"display_mode\" class=\"form-select\">
                    <option value=". $video["display_mode"].">". $video["display_mode"]."</option>
                    <option value=\"Fullscreen\">Fullscreen</option>
                    <option value=\"Windowed\">Windowed</option>
                    <option value=\"Fullscreen Windowed\">Fullscreen Windowed</option>
                    </select>
                </div>
                
                <label for=\"global_shadow_qua\">Global Shadow Quality</label>
                <div class=\"input-group mb-3\">
                    <select id=\"global_shadow_qua\" name=\"global_shadow_qua\" class=\"form-select\">
                    <option value=". $video["global_shadow_qua"]." >". $video["global_shadow_qua"]."</option>
                    <option value=\"High\">High</option>
                    <option value=\"Medium\">Medium</option>
                    <option value=\"Low\">Low</option>
                    <option value=\"Very Low\">Very Low</option>
                    </select>
                </div>
         
                <label for=\"model_detail\">Model / Texture Detail</label>
                <div class=\"input-group mb-3\">
                    <select id=\"model_detail\" name=\"model_detail\" class=\"form-select\">
                    <option value=". $video["model_detail"]." >". $video["model_detail"]."</option>
                    <option value=\"High\">High</option>
                    <option value=\"Medium\">Medium</option>
                    <option value=\"Low\">Low</option>
                    <option value=\"Very Low\">Very Low</option>
                    </select>
                </div>
                
                <label for=\"texture_streaming\">Texture Streaming</label>
                <div class=\"input-group mb-3\">
                    <select id=\"texture_streaming\" name=\"texture_streaming\" class=\"form-select\">
                    <option value=". $video["texture_streaming"]." >". $video["texture_streaming"]."</option>
                    <option value=\"Enabled\">Enabled</option>
                    <option value=\"Disabled\">Disabled</option>
                    </select>
                </div>
                
                <label for=\"effect_detail\">Effect Detail</label>
                <div class=\"input-group mb-3\">
                    <select id=\"effect_detail\" name=\"effect_detail\" class=\"form-select\">
                    <option value=". $video["effect_detail"].">". $video["effect_detail"]."</option>
                    <option value=\"High\">High</option>
                    <option value=\"Medium\">Medium</option>
                    <option value=\"Low\">Low</option>
                    <option value=\"Very Low\">Very Low</option>
                    </select>
                </div>
 
                <label for=\"shader_detail\">Shader Detail</label>
                <div class=\"input-group mb-3\">
                    <select id=\"shader_detail\" name=\"shader_detail\" class=\"form-select\">
                    <option value=". $video["shader_detail"]." >". $video["shader_detail"]."</option>
                    <option value=\"High\">High</option>
                    <option value=\"Medium\">Medium</option>
                    <option value=\"Low\">Low</option>
                    <option value=\"Very Low\">Very Low</option>
                    </select>
                </div>
                
                <label for=\"boost_player_c\">Boost Player Contrast</label>
                <div class=\"input-group mb-3\">
                    <select id=\"boost_player_c\" name=\"boost_player_c\" class=\"form-select\">
                    <option value=". $video["boost_player_c"]." >". $video["boost_player_c"]."</option>
                    <option value=\"Enabled\">Enabled</option>
                    <option value=\"Disabled\">Disabled</option>
                    </select>
                </div>
                
                <label for=\"multicore_ren\">Multicore Rendering</label>
                <div class=\"input-group mb-3\">
                    <select id=\"multicore_ren\" name=\"multicore_ren\" class=\"form-select\">
                    <option value=". $video["multicore_ren"]." >". $video["multicore_ren"]."</option>
                    <option value=\"Enabled\">Enabled</option>
                    <option value=\"Disabled\">Disabled</option>
                    </select>
                </div>
                
                <label for=\"multisampling\">Multisampling</label>
                <div class=\"input-group mb-3\">
                    <select id=\"multisampling\" name=\"multisampling\" class=\"form-select\">
                    <option value=". $video["multisampling"]." >". $video["multisampling"]."</option>
                    <option value=\"None\">None</option>
                    <option value=\"2x MSAA\">2x MSAA</option>
                    <option value=\"4x MSAA\">4x MSAA</option>
                    <option value=\"8x MSAA\">8x MSAA</option>
                    </select>
                </div>
                  
                <label for=\"fxaa\">FXAA Anti-Aliasing</label>
                <div class=\"input-group mb-3\">
                    <select id=\"fxaa\" name=\"fxaa\" class=\"form-select\">
                    <option value=". $video["fxaa"].">". $video["fxaa"]."</option>
                    <option value=\"Enabled\">Enabled</option>
                    <option value=\"Disabled\">Disabled</option>
                    </select>
                </div>
                
                <label for=\"v_sync\">V-Sync</label>
                <div class=\"input-group mb-3\">
                    <select id=\"v_sync\" name=\"v_sync\" class=\"form-select\">
                    <option value=". $video["v_sync"].">". $video["v_sync"]."</option>
                    <option value=\"Enabled\">Enabled</option>
                    <option value=\"Disabled\">Disabled</option>
                    </select>
                </div>
                
                <label for=\"motion_blur\">Motion Blur</label>
                <div class=\"input-group mb-3\">
                    <select id=\"motion_blur\" name=\"motion_blur\" class=\"form-select\">
                    <option value=". $video["motion_blur"].">". $video["motion_blur"]."</option>
                    <option value=\"Enabled\">Enabled</option>
                    <option value=\"Disabled\">Disabled</option>
                    </select>
                </div>
             
            <label for=\"triple_monitor\">Triple-Monitor Mode</label>
                <div class=\"input-group mb-3\">
                    <select id=\"triple_monitor\" name=\"triple_monitor\" class=\"form-select\">
                    <option value=". $video["triple_monitor"].">". $video["triple_monitor"]."</option>
                    <option value=\"Enabled\">Enabled</option>
                    <option value=\"Disabled\">Disabled</option>
                    </select>
                </div>
    </div>
    <div class=\"buttons row row-cols-2\">
                        <div class=\"col\">
                            <button class=\"w-100 btn btn-lg btn-primary sbutton\" name=\"update_csgo\" type=\"submit\">Save Settings</button>
                        </div>
                        <div class=\"col\">
                            <button class=\"w-100 btn btn-lg btn-primary red sbutton\" name=\"delete_csgo\" type=\"submit\">Delete Settings</button>
                        </div>
                    </div>
                
";

?>
