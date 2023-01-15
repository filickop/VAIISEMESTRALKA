<?php
require "DBStorage.php";
require "Auth.php";

$storage = new DBStorage();
$auth = new Auth();

$mouse = $storage->readMouse(Auth::getUser(), $_GET["q"]);

$crosshair = $storage->readCrosshair(Auth::getUser(), $_GET["q"]);

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


echo "
        <div class=\"form-editdata configcard col\">
            <h3 class=\"h4 mb-3 fw-normal\">Mouse</h3>
            <div class=\"form-floating\">
                <input type=\"number\" name=\"dpi\" class=\"form-control\" id=\"floatingInput\" placeholder=\"dpi\" value=". $mouse["DPI"] .">
                <label for=\"floatingInput\">DPI</label>
            </div>
            <div class=\"form-floating\">
                <input type=\"number\" name=\"sensitivity\" class=\"form-control\" id=\"floatingInput\" placeholder=\"Sensitivity\" value=". $mouse["sensitivity"] .">
                <label for=\"floatingInput\">Sensitivity</label>
            </div>
            <div class=\"form-floating\">
                <input type=\"number\" name=\"zoomsens\" class=\"form-control\" id=\"floatingInput\" placeholder=\"Zoom Sensitivity\" value=". $mouse["zoom_sens"] .">
                <label for=\"floatingInput\">Zoom Sensitivity</label>
            </div>
            <div class=\"form-floating\">
                <input type=\"number\" name=\"hz\" class=\"form-control\" id=\"floatingInput\" placeholder=\"Hz\" value=". $mouse["hz"] .">
                <label for=\"floatingInput\">Hz</label>
            </div>
            <div class=\"form-floating\">
                <input type=\"number\" name=\"windows_sens\" class=\"form-control\" id=\"floatingInput\" placeholder=\"Windows Sensitivity\" value=". $mouse["windows_sens"] .">
                <label for=\"floatingInput\">Windows Sensitivity</label>
            </div>
            <div class=\"form-floating\">
                <input type=\"number\" name=\"raw_input\" class=\"form-control\" id=\"floatingInput\" placeholder=\"Raw Input\" value=". $mouse["raw_input"] .">
                <label for=\"floatingInput\">Raw Input</label>
            </div>
            <div class=\"form-floating\">
                <input type=\"number\" name=\"mouse_acc\" class=\"form-control\" id=\"floatingInput\" placeholder=\"Mouse Acceleration\" value=". $mouse["mouse_acc"] .">
                <label for=\"floatingInput\">Mouse Acceleration</label>
            </div>
        </div>
        
        <div class=\"form-editdata configcard col\">
            <h3 class=\"h4 mb-3 fw-normal\">Crosshair</h3>
            <div class=\"form-floating\">
                <input type=\"number\" name=\"drawoutline\" class=\"form-control\" id=\"floatingInput\" placeholder=\"Drawoutline\" value=". $crosshair["drawoutline"] .">
                <label for=\"floatingInput\">Drawoutline</label>
            </div>
            <div class=\"form-floating\">
                <input type=\"number\" name=\"alpha\" class=\"form-control\" id=\"floatingInput\" placeholder=\"Alpha\" value=". $crosshair["alpha"] .">
                <label for=\"floatingInput\">Alpha</label>
            </div>
            <div class=\"form-floating\">
                <input type=\"number\" name=\"red\" class=\"form-control\" id=\"floatingInput\" placeholder=\"Red\" value=". $crosshair["red"] .">
                <label for=\"floatingInput\">Red</label>
            </div>
            <div class=\"form-floating\">
                <input type=\"number\" name=\"Green\" class=\"form-control\" id=\"floatingInput\" placeholder=\"Green\" value=". $crosshair["green"] .">
                <label for=\"floatingInput\">Green</label>
            </div>
            <div class=\"form-floating\">
                <input type=\"number\" name=\"blue\" class=\"form-control\" id=\"floatingInput\" placeholder=\"Blue\" value=". $crosshair["blue"] .">
                <label for=\"floatingInput\">Blue</label>
            </div>
            <div class=\"form-floating\">
                <input type=\"number\" name=\"dot\" class=\"form-control\" id=\"floatingInput\" placeholder=\"Dot\" value=". $crosshair["dot"] .">
                <label for=\"floatingInput\">Dot</label>
            </div>
            <div class=\"form-floating\">
                <input type=\"number\" name=\"gap\" class=\"form-control\" id=\"floatingInput\" placeholder=\"Gap\" value=". $crosshair["gap"] .">
                <label for=\"floatingInput\">Gap</label>
            </div>
            <div class=\"form-floating\">
                <input type=\"number\" name=\"size\" class=\"form-control\" id=\"floatingInput\" placeholder=\"Size\" value=". $crosshair["size"] .">
                <label for=\"floatingInput\">Size</label>
            </div>
            <div class=\"form-floating\">
                <input type=\"number\" name=\"style\" class=\"form-control\" id=\"floatingInput\" placeholder=\"Style\" value=". $crosshair["style"] .">
                <label for=\"floatingInput\">Style</label>
            </div>
            <div class=\"form-floating\">
                <input type=\"number\" name=\"thickness\" class=\"form-control\" id=\"floatingInput\" placeholder=\"Thickness\" value=". $crosshair["thickness"] .">
                <label for=\"floatingInput\">Thickness</label>
            </div>
            <div class=\"form-floating\">
                <input type=\"number\" name=\"sniper_width\" class=\"form-control\" id=\"floatingInput\" placeholder=\"Sniper Width\" value=". $crosshair["sniper_width"] .">
                <label for=\"floatingInput\">Sniper Width</label>
            </div>
        </div>
                    
                    
";



?>
