<?php

session_start();
require "DBStorage.php";
require "Auth.php";

$storage = new DBStorage();
$auth = new Auth();

$mouse = $storage->readMouse(Auth::getUser(), $_GET["q"]);

$keyBinds = $storage->readKeyBinds(Auth::getUser(), $_GET["q"]);

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

if($keyBinds == null) {
    $keyBinds["slot1"] = "";
    $keyBinds["slot2"] = "";
    $keyBinds["slot3"] = "";
    $keyBinds["slot4"] = "";
    $keyBinds["slot5"] = "";
    $keyBinds["slot6"] = "";
    $keyBinds["slot7"] = "";
    $keyBinds["slot8"] = "";
    $keyBinds["crouch"] = "";
    $keyBinds["walk_sprint"] = "";
    $keyBinds["jump"] = "";
    $keyBinds["use_object"] = "";
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
    </div>    
    <div class=\"row\">
        <div class=\"form-editdata configcard col\">
                <h3 class=\"h4 mb-3 fw-normal\">Keybinds</h3>
                <div class=\"form-floating\">
                    <input type=\"text\" name=\"crouch\" class=\"form-control\" id=\"floatingInput\" placeholder=\"Crouch\" value=". $keyBinds["crouch"] .">
                    <label for=\"floatingInput\">Crouch</label>
                </div>
                <div class=\"form-floating\">
                    <input type=\"text\" name=\"jump\" class=\"form-control\" id=\"floatingInput\" placeholder=\"Jump\" value=". $keyBinds["jump"] .">
                    <label for=\"floatingInput\">Jump</label>
                </div>
                <div class=\"form-floating\">
                    <input type=\"text\" name=\"walk_sprint\" class=\"form-control\" id=\"floatingInput\" placeholder=\"Sprint\" value=". $keyBinds["walk_sprint"] .">
                    <label for=\"floatingInput\">Sprint</label>
                </div>
                <div class=\"form-floating\">
                    <input type=\"text\" name=\"use_object\" class=\"form-control\" id=\"floatingInput\" placeholder=\"Use Object\" value=". $keyBinds["use_object"] .">
                    <label for=\"floatingInput\">Use Object</label>
                </div>
                <div class=\"form-floating\">
                    <input type=\"text\" name=\"slot1\" class=\"form-control\" id=\"floatingInput\" placeholder=\"Harvesting Tool\" value=". $keyBinds["slot1"] .">
                    <label for=\"floatingInput\">Harvesting Tool</label>
                </div>
                <div class=\"form-floating\">
                    <input type=\"text\" name=\"slot2\" class=\"form-control\" id=\"floatingInput\" placeholder=\"Weapon Slot 1\" value=". $keyBinds["slot2"] .">
                    <label for=\"floatingInput\">Weapon Slot 1</label>
                </div>
                <div class=\"form-floating\">
                    <input type=\"text\" name=\"slot3\" class=\"form-control\" id=\"floatingInput\" placeholder=\"Weapon Slot 2\" value=". $keyBinds["slot3"] .">
                    <label for=\"floatingInput\">Weapon Slot 2</label>
                </div>
                <div class=\"form-floating\">
                    <input type=\"text\" name=\"slot4\" class=\"form-control\" id=\"floatingInput\" placeholder=\"Weapon Slot 3\" value=". $keyBinds["slot4"] .">
                    <label for=\"floatingInput\">Weapon Slot 3</label>
                </div>
                <div class=\"form-floating\">
                    <input type=\"text\" name=\"slot5\" class=\"form-control\" id=\"floatingInput\" placeholder=\"Weapon Slot 4\" value=". $keyBinds["slot5"] .">
                    <label for=\"floatingInput\">AWeapon Slot 4</label>
                </div>
                <div class=\"form-floating\">
                    <input type=\"text\" name=\"slot6\" class=\"form-control\" id=\"floatingInput\" placeholder=\"Weapon Slot 5\" value=". $keyBinds["slot6"] .">
                    <label for=\"floatingInput\">Weapon Slot 5</label>
                </div>
        </div>
    </div>
        <div class=\"row\">
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
            
                <label for=\"display_mode\">Window Mode</label>
                <div class=\"input-group mb-3\">
                    <select id=\"display_mode\" name=\"display_mode\" class=\"form-select\">
                    <option value=". $video["display_mode"].">". $video["display_mode"]."</option>
                    <option value=\"Fullscreen\">Fullscreen</option>
                    <option value=\"Windowed\">Windowed</option>
                    <option value=\"Fullscreen Windowed\">Fullscreen Windowed</option>
                    </select>
                </div>
                
                <label for=\"floatingInput\">Brightness</label>
                <div class=\"form-floating\">
                    <input type=\"number\" min=\"0\" max=\"100\" step=\"1\" name=\"brightness\" class=\"form-control\" id=\"floatingInput\" placeholder=\"Brightness\" value=". $video["brightness"] .">
                    
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
                
                <label for=\"shader_detail\">View Distance</label>
                <div class=\"input-group mb-3\">
                    <select id=\"shader_detail\" name=\"shader_detail\" class=\"form-select\">
                    <option value=". $video["shader_detail"]." >". $video["shader_detail"]."</option>
                    <option value=\"High\">High</option>
                    <option value=\"Medium\">Medium</option>
                    <option value=\"Low\">Low</option>
                    <option value=\"Very Low\">Very Low</option>
                    </select>
                </div>
                
                <label for=\"model_detail\">Textures</label>
                <div class=\"input-group mb-3\">
                    <select id=\"model_detail\" name=\"model_detail\" class=\"form-select\">
                    <option value=". $video["model_detail"]." >". $video["model_detail"]."</option>
                    <option value=\"High\">High</option>
                    <option value=\"Medium\">Medium</option>
                    <option value=\"Low\">Low</option>
                    <option value=\"Very Low\">Very Low</option>
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
                
            </div>
    </div>
    <div class=\"buttons row row-cols-2\">
                        <div class=\"col\">
                            <button class=\"w-100 btn btn-lg btn-primary sbutton\" name=\"update_fortnite\" type=\"submit\">Save Settings</button>
                        </div>
                        <div class=\"col\">
                            <button class=\"w-100 btn btn-lg btn-primary red sbutton\" name=\"delete_fortnite\" type=\"submit\">Delete Settings</button>
                        </div>
                    </div>
                
";

?>
