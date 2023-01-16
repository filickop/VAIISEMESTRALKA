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
    $video["user_shaders"] = "";
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
                    <input type=\"number\" name=\"Green\" class=\"form-control\" id=\"floatingInput\" min=\"0\" max=\"255\" placeholder=\"Green\" value=". $crosshair["green"] .">
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
                <div class=\"form-floating\">
                    <input type=\"text\" name=\"resolution\" class=\"form-control\" id=\"floatingInput\" placeholder=\"Resolution\" value=". $video["resolution"] .">
                    <label for=\"floatingInput\">Resolution</label>
                </div>
                <div class=\"form-floating\">
                    <input type=\"text\" name=\"aspect_ratio\" class=\"form-control\" id=\"floatingInput\" placeholder=\"Aspect Ratio\" value=". $video["aspect_ratio"] .">
                    <label for=\"floatingInput\">Aspect Ratio</label>
                </div>
                <div class=\"form-floating\">
                    <input type=\"text\" name=\"scalling_mode\" class=\"form-control\" id=\"floatingInput\" placeholder=\"Scaling Mode\" value=". $video["scalling_mode"] .">
                    <label for=\"floatingInput\">Scaling Mode</label>
                </div>
                <div class=\"form-floating\">
                    <input type=\"text\" name=\"brightness\" class=\"form-control\" id=\"floatingInput\" placeholder=\"Brightness\" value=". $video["brightness"] .">
                    <label for=\"floatingInput\">Brightness</label>
                </div>
                <div class=\"form-floating\">
                    <input type=\"text\" name=\"display_mode\" class=\"form-control\" id=\"floatingInput\" placeholder=\"Display Mode\" value=". $video["display_mode"] .">
                    <label for=\"floatingInput\">Display Mode</label>
                </div>
                <div class=\"form-floating\">
                    <input type=\"text\" name=\"global_shadow_qua\" class=\"form-control\" id=\"floatingInput\" placeholder=\"Global Shadow Quality\" value=". $video["global_shadow_qua"] .">
                    <label for=\"floatingInput\">Global Shadow Quality</label>
                </div>
                <div class=\"form-floating\">
                    <input type=\"text\" name=\"model_detail\" class=\"form-control\" id=\"floatingInput\" placeholder=\"Model / Texture Detail\" value=". $video["model_detail"] .">
                    <label for=\"floatingInput\">Model / Texture Detail</label>
                </div>
                <div class=\"form-floating\">
                    <input type=\"text\" name=\"texture_streaming\" class=\"form-control\" id=\"floatingInput\" placeholder=\"Texture Streaming\" value=". $video["texture_streaming"] .">
                    <label for=\"floatingInput\">Texture Streaming</label>
                </div>
                <div class=\"form-floating\">
                    <input type=\"text\" name=\"effect_detail\" class=\"form-control\" id=\"floatingInput\" placeholder=\"Effect Detail\" value=". $video["effect_detail"] .">
                    <label for=\"floatingInput\">Effect Detail</label>
                </div>
                <div class=\"form-floating\">
                    <input type=\"text\" name=\"shader_detail\" class=\"form-control\" id=\"floatingInput\" placeholder=\"Shader Detail\" value=". $video["shader_detail"] .">
                    <label for=\"floatingInput\">Shader Detail</label>
                </div>
                <div class=\"form-floating\">
                    <input type=\"text\" name=\"boost_player_c\" class=\"form-control\" id=\"floatingInput\" placeholder=\"Boost Player Contrast\" value=". $video["boost_player_c"] .">
                    <label for=\"floatingInput\">Boost Player Contrast</label>
                </div>
                <div class=\"form-floating\">
                    <input type=\"text\" name=\"multicore_ren\" class=\"form-control\" id=\"floatingInput\" placeholder=\"Multicore Rendering\" value=". $video["multicore_ren"] .">
                    <label for=\"floatingInput\">Multicore Rendering</label>
                </div>
                <div class=\"form-floating\">
                    <input type=\"text\" name=\"multisampling\" class=\"form-control\" id=\"floatingInput\" placeholder=\"Multisampling\" value=". $video["multisampling"] .">
                    <label for=\"floatingInput\">Multisampling</label>
                </div>
                <div class=\"form-floating\">
                    <input type=\"text\" name=\"fxaa\" class=\"form-control\" id=\"floatingInput\" placeholder=\"FXAA Anti-Aliasing\" value=". $video["fxaa"] .">
                    <label for=\"floatingInput\">FXAA Anti-Aliasing</label>
                </div>
                <div class=\"form-floating\">
                    <input type=\"text\" name=\"v_sync\" class=\"form-control\" id=\"floatingInput\" placeholder=\"V-Sync\" value=". $video["v_sync"] .">
                    <label for=\"floatingInput\">V-Sync</label>
                </div>
                <div class=\"form-floating\">
                    <input type=\"text\" name=\"motion_blur\" class=\"form-control\" id=\"floatingInput\" placeholder=\"Motion Blur\" value=". $video["motion_blur"] .">
                    <label for=\"floatingInput\">Motion Blur</label>
                </div>
                <div class=\"form-floating\">
                    <input type=\"text\" name=\"triple_monitor\" class=\"form-control\" id=\"floatingInput\" placeholder=\"Triple-Monitor Mode\" value=". $video["triple_monitor"] .">
                    <label for=\"floatingInput\">Triple-Monitor Mode</label>
                </div>
                <div class=\"form-floating\">
                    <input type=\"text\" name=\"user_shaders\" class=\"form-control\" id=\"floatingInput\" placeholder=\"Use Uber Shaders\" value=". $video["user_shaders"] .">
                    <label for=\"floatingInput\">Use Uber Shaders</label>
                </div>
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
